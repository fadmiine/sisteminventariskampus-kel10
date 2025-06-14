<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // ===============================
    // 1. Fitur Lihat & Buat Peminjaman
    // ===============================

    public function index()
{
    if (in_array(Auth::user()->role, ['admin', 'staff'])) {
        // Admin & Staff hanya lihat yang belum dikembalikan
        $peminjaman = Peminjaman::with(['user', 'barang', 'approver'])
            ->where('status', '!=', 'dikembalikan')
            ->latest()
            ->get();
    } else {
        // User hanya lihat peminjaman miliknya yang belum dikembalikan
        $peminjaman = Peminjaman::with(['barang'])
            ->where('user_id', Auth::id())
            ->where('status', '!=', 'dikembalikan')
            ->latest()
            ->get();
    }

    return view('admin.peminjaman.index', compact('peminjaman'));
}


    public function create()
    {
        $barang = Inventaris::where('status', 'tersedia')->get();
        return view('admin.peminjaman.create', compact('barang'));
    }

  public function store(Request $request)
{
    // 1. Validasi
    $request->validate([
        'inventaris_id'   => 'required|exists:inventaris,id',
        'jumlah_pinjam'   => 'required|integer|min:1',
        'tanggal_pinjam'  => 'required|date|after_or_equal:today',
        'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
    ]);

    // 2. Cek stok
    $inv = Inventaris::findOrFail($request->inventaris_id);
    if ($request->jumlah_pinjam > $inv->jumlah) {
        return back()->with('error', 'Jumlah pinjam melebihi stok tersedia.');
    }

    // 3. Simpan peminjaman
    Peminjaman::create([
        'user_id'        => Auth::id(),
        'inventaris_id'  => $inv->id,
        'jumlah_pinjam'  => $request->jumlah_pinjam,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali'=> $request->tanggal_kembali,
        'status'         => 'menunggu',
    ]);

    return redirect()->route('peminjaman.index')
                     ->with('success', 'Permintaan peminjaman dikirim.');
}



    // ===============================
    // 2. Fitur Edit, Update, Hapus (Staff/Admin)
    // ===============================

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if (!in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403);
        }

        return view('admin.peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if (!in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403);
        }

        $request->validate([
            'tanggal_kembali' => 'nullable|date|after_or_equal:' . $peminjaman->tanggal_pinjam,
        ]);

        $peminjaman->update([
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if (!in_array(Auth::user()->role, ['admin', 'staff']) && $peminjaman->user_id !== Auth::id()) {
            abort(403);
        }

        if ($peminjaman->status === 'disetujui') {
            $peminjaman->barang->update(['status' => 'tersedia']);
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman dihapus.');
    }

    // ===============================
    // 3. Fitur Validasi (Setujui / Tolak)
    // ===============================

   public function approve($id)
{
    $peminjaman = Peminjaman::with('barang')->findOrFail($id);

    if (!in_array(auth()->user()->role, ['admin', 'staff'])) {
        abort(403, 'Unauthorized');
    }

    if ($peminjaman->status !== 'menunggu') {
        return back()->with('error', 'Peminjaman ini sudah diproses.');
    }

    // Cek stok
    if ($peminjaman->barang->jumlah < $peminjaman->jumlah_pinjam) {
        return back()->with('error', 'Stok barang tidak cukup.');
    }

    // Kurangi jumlah
    $peminjaman->barang->decrement('jumlah', $peminjaman->jumlah_pinjam);

    // Update status inventaris kalau habis
    $peminjaman->barang->refresh(); // baca ulang data
    if ($peminjaman->barang->jumlah === 0) {
        $peminjaman->barang->update(['status' => 'dipinjam']);
    }

    // Update status peminjaman
    $peminjaman->update([
        'status' => 'disetujui',
        'disetujui_oleh' => auth()->id(),
    ]);

    return back()->with('success', 'Peminjaman disetujui dan stok berkurang.');
}





    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if (!in_array(auth()->user()->role, ['admin', 'staff'])) {
            abort(403, 'Unauthorized');
        }

        if ($peminjaman->status !== 'menunggu') {
            return back()->with('error', 'Peminjaman ini sudah diproses.');
        }

        $peminjaman->update([
            'status' => 'ditolak',
            'disetujui_oleh' => auth()->id(),
        ]);

        $peminjaman->barang->update([
            'status' => 'tersedia',
        ]);

        return back()->with('success', 'Peminjaman ditolak.');
    }

  public function kembalikan(Request $request, $id)
{
    $peminjaman = Peminjaman::with('barang')->findOrFail($id);

    if ($peminjaman->status !== 'disetujui') {
        return back()->with('error', 'Barang belum dipinjam atau sudah dikembalikan.');
    }

    $request->validate([
        'kondisi_kembali' => 'required|in:baik,rusak,hilang',
    ]);

    // Tambah stok jika tidak hilang
    if ($request->kondisi_kembali !== 'hilang') {
        $peminjaman->barang->increment('jumlah', $peminjaman->jumlah_pinjam);
    }

    // Simpan status + kondisi
    $peminjaman->update([
        'status' => 'dikembalikan',
        'kondisi_kembali' => $request->kondisi_kembali,
    ]);

    if ($peminjaman->barang->jumlah > 0) {
        $peminjaman->barang->update(['status' => 'tersedia']);
    }

    return back()->with('success', 'Barang berhasil dikembalikan.');
}



public function pengembalianIndex()
{
    // Tampilkan semua data yang SUDAH dikembalikan
    $riwayatPengembalian = Peminjaman::with(['user', 'barang', 'approver'])
        ->where('status', 'dikembalikan')
        ->latest()
        ->get();

    return view('admin.pengembalian.index', compact('riwayatPengembalian'));
}


    
}
