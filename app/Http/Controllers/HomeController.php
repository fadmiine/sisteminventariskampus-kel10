<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard based on user role.
     *
     * @return \Illuminate\View\View
     */
    public function index()
{
    // Cek peran pengguna
    $userRole = auth()->user()->role;

    // Jika user adalah admin, tampilkan dashboard
    if ($userRole === 'admin') {
        $barang = Barang::all();
        
        $totaltransaksi = Penjualan::with('barang')->get();
        // Ambil 6 data penjualan terbaru
        $penjualan = Penjualan::with('barang')->orderBy('created_at', 'desc')->take(6)->get();

        // Barang Terjual (Per Hari)
        $barangTerjual = Penjualan::selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $barangTerjualDates = $barangTerjual->pluck('tanggal')->toArray();
        $barangTerjualCounts = $barangTerjual->pluck('jumlah')->toArray();

        // Pendapatan (Per Hari)
        $pendapatan = Penjualan::join('barangs', 'penjualans.barang_id', '=', 'barangs.id')
            ->selectRaw('DATE(penjualans.created_at) as tanggal, SUM(barangs.harga) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $pendapatanDates = $pendapatan->pluck('tanggal')->toArray();
        $pendapatanAmounts = $pendapatan->pluck('total')->toArray();

        // Transaksi Selesai (Per Hari)
        $transaksi = Penjualan::selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $transaksiDates = $transaksi->pluck('tanggal')->toArray();
        $transaksiCounts = $transaksi->pluck('jumlah')->toArray();

        $totalPendapatan = Penjualan::join('barangs', 'penjualans.barang_id', '=', 'barangs.id')
            ->selectRaw('SUM(penjualans.jumlah * barangs.harga) as total_pendapatan')
            ->value('total_pendapatan') ?? 0;

        $totalPendapatanBulanan = Penjualan::join('barangs', 'penjualans.barang_id', '=', 'barangs.id')
            ->selectRaw('MONTH(penjualans.created_at) as bulan, SUM(barangs.harga * penjualans.jumlah) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::create()->month($item->bulan)->format('F') => $item->total];
            });

        // Pendapatan Hari Ini
        $pendapatanHariIni = Penjualan::whereDate('penjualans.created_at', Carbon::today())
            ->join('barangs', 'penjualans.barang_id', '=', 'barangs.id')
            ->sum(\DB::raw('barangs.harga * penjualans.jumlah'));

        // Return dashboard view untuk admin
        return view('dashboard', compact(
            'barang',
            'penjualan',  // Menampilkan 6 data terbaru
            'barangTerjualDates',
            'barangTerjualCounts',
            'pendapatanDates',
            'pendapatanAmounts',
            'transaksiDates',
            'transaksiCounts',
            'totalPendapatan',
            'totalPendapatanBulanan',
            'pendapatanHariIni',
            'totaltransaksi'
        ));
    }

    // Jika user adalah customer, redirect ke halaman belanja
    if ($userRole === 'user') {
        return redirect()->route('shop');
    }

    // Default: akses ditolak
    return redirect('/')->with('error', 'Akses ditolak.');
}

    public function reset()
    {
        try {
            // Hapus semua data di tabel penjualans
            \DB::table('penjualans')->truncate();

            // Berikan respons sukses
            return redirect()->back()->with('success', 'Data penjualan berhasil direset.');
        } catch (\Exception $e) {
            // Jika ada error
            return redirect()->back()->with('error', 'Gagal mereset data penjualan: ' . $e->getMessage());
        }
    }
    
}
