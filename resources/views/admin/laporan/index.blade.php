@extends('main', ['pageSlug' => 'laporan'])

@section('content')
<div class="content-wrapper">
          <div class="content"><!-- For Components documentaion -->


<!-- Products Inventory -->
<div class="card card-default">
  <div class="card-header">
        <h3>Laporan Peminjaman & Pengembalian</h3>
    </div>
    <div class="card-body">
        <div class="mb-3">
    {{-- <a href="{{ route('laporan.export.excel', request()->query()) }}">Export Excel</a> --}}
<a href="{{ route('laporan.export.pdf', request()->query()) }}">Export PDF</a>
</div>

        <form method="GET" class="mb-3">
            <div class="row g-2">
                {{-- <select name="bulan" class="form-select">
    <option value="">Pilih Bulan</option>
    @for ($i = 1; $i <= 12; $i++)
        <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
        </option>
    @endfor
</select>

<select name="tahun" class="form-select">
    <option value="">Pilih Tahun</option>
    @for ($y = now()->year; $y >= 2020; $y--)
        <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
    @endfor
</select> --}}

                <div class="col-md-3">
                    <input type="date" name="tanggal_dari" value="{{ request('tanggal_dari') }}" class="form-control" placeholder="Dari tanggal">
                </div>
                <div class="col-md-3">
                    <input type="date" name="tanggal_sampai" value="{{ request('tanggal_sampai') }}" class="form-control" placeholder="Sampai tanggal">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

       <div class="table-responsive">
  <table id="laporanTable" class="table table-hover table-product w-100">
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
                    @forelse ($data as $p)
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
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
          </div>
</div>
<script src="{{ asset('theme') }}/plugins/jquery/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="{{ asset('theme') }}/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
  $('#laporanTable').DataTable({
    scrollX: true,
    autoWidth: false,
    responsive: false,
    columnDefs: [
      { targets: '_all', className: 'align-middle text-center' }
    ],
    pageLength: 5,
    lengthChange: false,
    language: {
      paginate: {
        previous: "Sebelumnya",
        next: "Berikutnya"
      },
      search: "Cari:"
    }
  });
});
</script>
@endsection
