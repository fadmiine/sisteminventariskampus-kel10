@extends('main', ['pageSlug' => 'manajemen_pengguna'])

@section('content')
<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header">
        <h2>Edit Pengguna</h2>
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

        <form method="POST" action="{{ route('manajemen_pengguna.update', $user->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
          </div>

          <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control" required>
              <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
              <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
          </div>

          <div class="form-group">
            <label>Password (Kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
          </div>

          <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>

          <button type="submit" class="btn btn-primary mt-3">Update</button>
          <a href="{{ route('manajemen_pengguna.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
