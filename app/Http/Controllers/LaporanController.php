<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeminjamanExport;


class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with(['barang', 'user', 'approver']);

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan tanggal dari dan sampai
        if ($request->filled('tanggal_dari') && $request->filled('tanggal_sampai')) {
            $query->whereBetween('tanggal_pinjam', [$request->tanggal_dari, $request->tanggal_sampai]);
        }

        // Filter berdasarkan bulan dan tahun
        if ($request->filled('bulan') && $request->filled('tahun')) {
            $query->whereMonth('tanggal_pinjam', $request->bulan)
                  ->whereYear('tanggal_pinjam', $request->tahun);
        }

        $data = $query->orderBy('tanggal_pinjam', 'desc')->get();

        return view('admin.laporan.index', compact('data'));
    }

    public function exportExcel(Request $request)
{
    return Excel::download(new PeminjamanExport($request), 'laporan_peminjaman.xlsx');
}

public function exportPDF(Request $request)
{
    $query = Peminjaman::with(['barang', 'user', 'approver']);

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('tanggal_dari') && $request->filled('tanggal_sampai')) {
        $query->whereBetween('tanggal_pinjam', [$request->tanggal_dari, $request->tanggal_sampai]);
    }

    $data = $query->get();

    $pdf = Pdf::loadView('admin.laporan.pdf', compact('data'));
    return $pdf->download('laporan_peminjaman.pdf');
}

}
