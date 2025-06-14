@extends('main', ['pageSlug' => 'index_staff'])

@section('content')

<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/dashboard" class="btn btn-primary mb-3">Tambah Staff</a>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Staff</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Email</th>
                                <th>Tanggal Direkrut</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection