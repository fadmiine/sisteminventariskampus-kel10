@extends('main', ['pageSlug' => 'dashboard'])

@section('content')
 <div class="content-wrapper">
          <div class="content"><!-- For Components documentaion -->


<!-- Products Inventory -->
<div class="card card-default">
  <div class="card-header">
    <h2>Manajemen Pengguna</h2>
  </div>
  <div class="card-body">
    <div class="collapse" id="collapse-data-tables">
      <pre class="language-html mb-4">
<a href="{{ route('manajemen_pengguna.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered" id="usersTable">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ ucfirst($user->role) }}</td>
        <td>
          <a href="{{ route('manajemen_pengguna.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('manajemen_pengguna.destroy', $user->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
      </pre>
    </div>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
      <thead>
        <tr>
          <th>Image</th>
          <th>Product Name</th>
          <th>ID</th>
          <th>Qty</th>
          <th>Variants</th>
          <th>Committed</th>
          <th>User Activity</th>
          <th>Sold</th>
          <th>In Stock</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

   
        <tr>
          <td class="py-0">
            <img src="images/products/products-xs-12.jpg" alt="Product Image">
          </td>
          <td>Magic Bullet Blender</td>
          <td>24552</td>
          <td>12</td>
          <td>30</td>
          <td>14</td>
          <td>
            <div id="tbl-chart-12"></div>
          </td>
          <td>26</td>
          <td>9</td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td class="py-0">
            <img src="images/products/products-xs-13.jpg" alt="Product Image">
          </td>
          <td>Kanana rucksack</td>
          <td>24553</td>
          <td>14</td>
          <td>65</td>
          <td>39</td>
          <td>
            <div id="tbl-chart-13"></div>
          </td>
          <td>9</td>
          <td>55</td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td class="py-0">
            <img src="images/products/products-xs-14.jpg" alt="Product Image">
          </td>
          <td>Copic Opaque White</td>
          <td>24554</td>
          <td>43</td>
          <td>29</td>
          <td>75</td>
          <td>
            <div id="tbl-chart-14"></div>
          </td>
          <td>7</td>
          <td>15</td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td class="py-0">
            <img src="images/products/products-xs-15.jpg" alt="Product Image">
          </td>
          <td>Headphones</td>
          <td>24555</td>
          <td>17</td>
          <td>6</td>
          <td>7</td>
          <td>
            <div id="tbl-chart-15"></div>
          </td>
          <td>6</td>
          <td>98</td>
          <td>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </td>
        </tr>



      </tbody>
    </table>

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