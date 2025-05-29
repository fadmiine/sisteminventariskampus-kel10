<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
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

    public function index()
{
    // Ambil semua data penjualan untuk ditampilkan
    $penjualan = Penjualan::with('barang')->orderBy('created_at', 'desc')->get();

    return view('penjualan', compact('penjualan'));
}


}
