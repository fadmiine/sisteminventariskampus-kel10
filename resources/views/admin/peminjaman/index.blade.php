@extends('main', ['pageSlug' => 'peminjaman'])

@section('content')
<div class="content-wrapper">
          <div class="content"><!-- For Components documentaion -->


<!-- Products Inventory -->
<div class="card card-default">
  <div class="card-header">
        <h3>Data Peminjaman</h3>
  </div>
        <div class="card-body">
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div></div> 
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm">Ajukan Peminjaman</a>
    </div>
<div class="table-responsive">
    <table id="peminjamanTable" class="table table-hover table-product w-100">
            <thead class="text-center">
                <tr>
                    <th>Nama Barang</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Disetujui Oleh</th>
                    <th style="min-width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
               @foreach ($peminjaman as $p)
<tr>
    <td>{{ $p->barang->nama_barang }}</td>
    <td>{{ $p->user->name }}</td>
    <td>{{ $p->tanggal_pinjam }}</td>
    <td>{{ $p->tanggal_kembali ?? '-' }}</td>
    <td>{{ $p->jumlah_pinjam }}</td>
    <td>{{ ucfirst($p->status) }}</td>
    <td>{{ $p->approver->name ?? '-' }}</td>
    <td>
    {{-- ADMIN/STAFF bisa setujui atau tolak --}}
    <div class="d-flex flex-column gap-1">
    @if ($p->status === 'menunggu' && in_array(auth()->user()->role, ['admin', 'staff']))
        <form action="{{ route('peminjaman.approve', $p->id) }}" method="POST" style="display:inline-block;">
            @csrf
            <button class="btn btn-success btn-sm w-100 mb-1">Setujui</button>
        </form>

        <form action="{{ route('peminjaman.reject', $p->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('PUT')
            <button class="btn btn-danger btn-sm w-100">Tolak</button>
        </form>
    @endif

    {{-- USER bisa kembalikan barang --}}
    @if ($p->status === 'disetujui' && auth()->user()->id === $p->user_id)
        <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="POST" style="margin-top: 5px;">
            @csrf
            <div class="input-group input-group-sm">
                                      <select name="kondisi_kembali" class="form-select" required>
                                          <option value="">Kondisi</option>
                                          <option value="baik">Baik</option>
                                          <option value="rusak">Rusak</option>
                                          <option value="hilang">Hilang</option>
                                      </select>
                                     
<button type="submit" class="btn btn-success">Kembalikan</button>
                                  </div>
        </form>
    @elseif ($p->status === 'dikembalikan')
        <span class="badge badge-pill badge-success">Sudah Dikembalikan ({{ ucfirst($p->kondisi_kembali) }})</span>
    @endif

    {{-- Jika tidak ada aksi --}}
    @if (
        !($p->status === 'menunggu' && in_array(auth()->user()->role, ['admin', 'staff'])) &&
        !($p->status === 'disetujui' && auth()->user()->id === $p->user_id) &&
        $p->status !== 'dikembalikan'
    )
        -
    @endif
    </div></td>

</tr>
@endforeach

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
  $('#peminjamanTable').DataTable({
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
