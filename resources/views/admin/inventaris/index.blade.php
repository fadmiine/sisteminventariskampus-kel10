@extends('main', ['pageSlug' => 'inventaris'])

@section('content')
<div class="content-wrapper">
          <div class="content"><!-- For Components documentaion -->


<!-- Products Inventory -->
<div class="card card-default">
  <div class="card-header">
    <h2>Data Inventaris</h2>
  </div>
 <div class="card-body">
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div></div> 
    <a href="{{ route('inventaris.create') }}" class="btn btn-sm btn-primary">
      <i class="mdi mdi-account-plus"></i> Tambah Barang
    </a>
  </div>
        <div class="table-responsive">
    <table id="productsTable" class="table table-hover table-product w-100">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Kondisi</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->kondisi }}</td>
                         <td>{{ $item->jumlah }}</td>
                        <td>
                            @if ($item->status === 'tersedia')
                                <span class="badge badge-pill badge-success">Tersedia</span>
                            @elseif ($item->status === 'dipinjam')
                                <span class="badge badge-pill badge-secondary">Dipinjam</span>
                            @else
                                <span class="badge badge-pill badge-danger">Rusak</span>
                            @endif
                        </td>
                        <td> <button type="button" class="mb-1 btn btn-outline-primary btn-pill">
                            <a href="{{ route('inventaris.edit', $item->id) }}">Edit</a> </button>
                            <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                               <button type="button" class="mb-1 btn btn-outline-secondary btn-pill" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($data->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data inventaris.</td>
                    </tr>
                @endif
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

<!-- Inisialisasi DataTables -->
<script>
 $(document).ready(function() {
  $('#productsTable').DataTable({
    pageLength: 5,
    lengthChange: false, // ⬅️ ini yang menyembunyikan "Show X entries"
    lengthMenu: [5, 10, 25, 50],
    language: {
      paginate: {
        previous: "Sebelumnya",
        next: "Berikutnya"
      }
    }
  });
});

</script>


@endsection
