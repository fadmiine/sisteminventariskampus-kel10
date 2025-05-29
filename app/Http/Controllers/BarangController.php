<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('barang', 'public');
        if (!$fotoPath) {
            return redirect()->back()->withErrors(['foto' => 'Gagal menyimpan file']);
        }
    }

    // Simpan data barang
    $barang = Barang::create([
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'foto' => $fotoPath,
    ]);

    if ($barang) {
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    } else {
        return redirect()->back()->with('error', 'Gagal menyimpan data.');
    }
}

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Barang::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::disk('public')->delete($barang->foto);
            }
            $barang->foto = $request->file('foto')->store('barang', 'public');
        }

        $barang->update($request->except(['foto']));
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
