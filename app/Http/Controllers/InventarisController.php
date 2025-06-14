<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    // Tampilkan semua data inventaris
    public function index()
    {
        $data = Inventaris::all();
        return view('admin.inventaris.index', compact('data'));
    }

    // Tampilkan form tambah inventaris
    public function create()
    {
        return view('admin.inventaris.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'kondisi' => 'required|string|max:100',
             'jumlah' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,dipinjam,rusak'
        ]);

        Inventaris::create($validated);

        return redirect()->route('inventaris.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $item = Inventaris::findOrFail($id);
        return view('admin.inventaris.edit', compact('item'));
    }

    // Update data
   public function update(Request $request, $id)
{
    $request->validate([
         'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'kondisi' => 'required|string|max:100',
             'jumlah' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,dipinjam,rusak'
    ]);

    $inventaris = Inventaris::findOrFail($id);
    $inventaris->update([
        'nama_barang'     => $request->nama_barang,
        'kategori' => $request->kategori,
        'kondisi'  => $request->kondisi,
        'jumlah'   => $request->jumlah, // <-- pastikan ini ada
        'status'   => $request->status,
    ]);

    return redirect()->route('inventaris.index')->with('success', 'Data inventaris diperbarui.');
}

    // Hapus data
    public function destroy($id)
    {
        $item = Inventaris::findOrFail($id);
        $item->delete();

        return redirect()->route('inventaris.index')->with('success', 'Barang berhasil dihapus.');
    }
}
