@extends('main', ['pageSlug' => 'inventaris'])

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Tambah Data Inventaris</h4>
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

    <form method="POST" action="{{ route('inventaris.store') }}">
      @csrf

      <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control rounded-0" id="nama_barang" value="{{ old('nama_barang') }}" placeholder="Contoh: Laptop Asus" required>
      </div>

      <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" class="form-control rounded-0" id="kategori" value="{{ old('kategori') }}" placeholder="" required>      
      </div>

      <div class="form-group">
        <label for="kondisi">Kondisi</label>
        <select name="kondisi" class="form-control rounded-0" id="kondisi" required>
          <option value="">-- Pilih Kondisi --</option>
          <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
          <option value="Cukup" {{ old('kondisi') == 'Cukup' ? 'selected' : '' }}>Cukup</option>
          <option value="Buruk" {{ old('kondisi') == 'Buruk' ? 'selected' : '' }}>Buruk</option>
        </select>
      </div>
      <div class="form-group">
    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $inventaris->jumlah ?? 1) }}" required min="1">
</div>
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control rounded-0" id="status" required>
          <option value="">-- Pilih Status --</option>
          <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
          <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
          <option value="rusak" {{ old('status') == 'rusak' ? 'selected' : '' }}>Rusak</option>
        </select>
      </div>

      <div class="form-footer mt-4">
        <button type="submit" class="btn btn-secondary btn-pill">Simpan</button>
        <a href="{{ route('inventaris.index') }}" class="btn btn-light btn-pill">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection
