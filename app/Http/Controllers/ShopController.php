<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;

class ShopController extends Controller
{
    public function index()
    {
        $barangs = Barang::where('stok', '>', 0)->get(); // Hanya barang dengan stok > 0
        return view('shop.index', compact('barangs'));
    }

    public function buy(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_pembeli' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // Periksa stok
        if ($barang->stok < $request->jumlah) {
            return back()->withErrors(['stok' => 'Stok barang tidak mencukupi.']);
        }

        // Kurangi stok
        $barang->stok -= $request->jumlah;
        $barang->save();

        // Simpan transaksi penjualan
        Penjualan::create([
            'barang_id' => $barang->id,
            'nama_pembeli' => $request->nama_pembeli,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('shop')->with('success', 'Pembelian berhasil.');
    }
}
