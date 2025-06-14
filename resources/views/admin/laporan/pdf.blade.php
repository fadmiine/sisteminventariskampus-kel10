<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Kondisi Kembali</th>
                <th>Disetujui Oleh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $p)
                <tr>
                    <td>{{ $p->barang->nama_barang }}</td>
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->tanggal_kembali ?? '-' }}</td>
                    <td>{{ $p->jumlah_pinjam }}</td>
                    <td>{{ ucfirst($p->status) }}</td>
                    <td>{{ $p->kondisi_kembali ?? '-' }}</td>
                    <td>{{ $p->approver->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
