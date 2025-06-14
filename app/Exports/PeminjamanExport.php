<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Peminjaman::with(['barang', 'user', 'approver']);

        if ($this->request->filled('status')) {
            $query->where('status', $this->request->status);
        }

        if ($this->request->filled('tanggal_dari') && $this->request->filled('tanggal_sampai')) {
            $query->whereBetween('tanggal_pinjam', [$this->request->tanggal_dari, $this->request->tanggal_sampai]);
        }

        return $query->get()->map(function ($p) {
            return [
                'Nama Barang'       => $p->barang->nama_barang,
                'Peminjam'          => $p->user->name,
                'Tanggal Pinjam'    => $p->tanggal_pinjam,
                'Tanggal Kembali'   => $p->tanggal_kembali ?? '-',
                'Jumlah'            => $p->jumlah_pinjam,
                'Status'            => ucfirst($p->status),
                'Kondisi Kembali'   => $p->kondisi_kembali ?? '-',
                'Disetujui Oleh'    => $p->approver->name ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Barang',
            'Peminjam',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Jumlah',
            'Status',
            'Kondisi Kembali',
            'Disetujui Oleh',
        ];
    }
}
