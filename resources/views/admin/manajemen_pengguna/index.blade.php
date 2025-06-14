@extends('main', ['pageSlug' => 'manajemen_pengguna'])

@section('content')
 <div class="content-wrapper">
          <div class="content"><!-- For Components documentaion -->


<!-- Products Inventory -->
<div class="card card-default">
  <div class="card-header">
    <h2>Manajemen Pengguna</h2>
  </div>
 <div class="card-body">
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div></div> <!-- Kosong supaya "Tambah Pengguna" di kanan -->
    
    <a href="{{ route('manajemen_pengguna.create') }}" class="btn btn-sm btn-primary">
      <i class="mdi mdi-account-plus"></i> Tambah Pengguna
    </a>
  </div>

  <div class="table-responsive">
    <table id="productsTable" class="table table-hover table-product w-100">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td><button type="button" class="mb-1 btn btn-outline-primary btn-pill">

              <a href="{{ route('manajemen_pengguna.edit', $user->id) }}" >Edit</a></button>
              <form method="POST" action="{{ route('manajemen_pengguna.destroy', $user->id) }}" style="display:inline-block;">
                @csrf
                @method('DELETE')
              <button type="button" class="mb-1 btn btn-outline-secondary btn-pill" onclick="return confirm('Yakin?')">Hapus</button>
              </form>
            </td>
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
    <!-- jQuery (wajib) -->
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