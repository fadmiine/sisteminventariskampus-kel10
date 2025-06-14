@extends('main', ['pageSlug' => 'manajemen_pengguna'])

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Tambah Pengguna</h4>
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

    <form method="POST" action="{{ route('manajemen_pengguna.store') }}">
      @csrf

      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control rounded-0" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama" required>
      </div>

      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control rounded-0" id="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Masukkan Password" required>
      </div>

      <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control rounded-0" id="password_confirmation" placeholder="Ulangi Password" required>
      </div>

      <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control rounded-0" id="role" required>
          <option value="">-- Pilih Role --</option>
          <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
          <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
        </select>
      </div>

      <div class="form-footer mt-4">
        <button type="submit" class="btn btn-secondary btn-pill">Simpan</button>
        <a href="{{ route('manajemen_pengguna.index') }}" class="btn btn-light btn-pill">Batal</a>
      </div>

    </form>
  </div>
</div>
@endsection
