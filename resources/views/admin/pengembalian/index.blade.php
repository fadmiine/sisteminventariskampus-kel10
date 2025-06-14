@extends('main', ['pageSlug' => 'pengembalian'])

@section('content')

<div class="content-wrapper">
          <div class="content"><!-- For Components documentaion -->


<!-- Products Inventory -->
<div class="card card-default">
  <div class="card-header">
        <h3>Riwayat Pengembalian</h3>
  </div>
   <div class="card-body">
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div></div> 
<div class="table-responsive">
  <table id="pengembalianTable" class="table table-hover table-product w-100">
    <thead class="text-center">
      <tr>
        <th>Nama Barang</th>
        <th>Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Jumlah</th>
        <th>Kondisi Saat Kembali</th>
        <th>Disetujui Oleh</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @forelse ($riwayatPengembalian as $p)
        <tr>
          <td>{{ $p->barang->nama_barang }}</td>
          <td>{{ $p->user->name }}</td>
          <td>{{ $p->tanggal_pinjam }}</td>
          <td>{{ $p->tanggal_kembali ?? '-' }}</td>
          <td>{{ $p->jumlah_pinjam }}</td>
          <td>{{ $p->kondisi_kembali ? ucfirst($p->kondisi_kembali) : '-' }}</td>
          <td>{{ $p->approver->name ?? '-' }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada data pengembalian.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</div>
  </div>
</div>
          </div>
</div>
<script src="{{ asset('theme') }}/plugins/jquery/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="{{ asset('theme') }}/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

<!-- Inisialisasi DataTables -->
<script>
$(document).ready(function () {
  $('#pengembalianTable').DataTable({
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
