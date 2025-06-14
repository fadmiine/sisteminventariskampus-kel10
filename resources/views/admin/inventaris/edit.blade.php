@extends('main', ['pageSlug' => 'inventaris'])

@section('content')
<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header">
        <h2>Edit Data Inventaris</h2>
      </div>
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('inventaris.update', $item->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $item->nama_barang) }}" required>
          </div>

          <div class="form-group">
            <label>Kategori</label>
             <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $item->kategori) }}" required>
        
          </div>

          <div class="form-group">
            <label>Kondisi</label>
            <select name="kondisi" class="form-control" required>
              <option value="Baik" {{ $item->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
              <option value="Cukup" {{ $item->kondisi == 'Cukup' ? 'selected' : '' }}>Cukup</option>
              <option value="Buruk" {{ $item->kondisi == 'Buruk' ? 'selected' : '' }}>Buruk</option>
            </select>
          </div>
           <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $item->jumlah) }}" min="0" required>
        </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
              <option value="tersedia" {{ $item->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
              <option value="dipinjam" {{ $item->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
              <option value="rusak" {{ $item->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary mt-3">Update</button>
          <a href="{{ route('inventaris.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
