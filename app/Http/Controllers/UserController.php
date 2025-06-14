<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Hanya tampilkan staff & user
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.manajemen_pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.manajemen_pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|in:staff,user',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.manajemen_pengguna.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $manajemen_pengguna)
    {
        return view('admin.manajemen_pengguna.edit', ['user' => $manajemen_pengguna]);
    }

    public function update(Request $request, User $manajemen_pengguna)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $manajemen_pengguna->id,
            'role'  => 'required|in:staff,user',
        ]);

        $manajemen_pengguna->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ]);

        return redirect()->route('admin.manajemen_pengguna.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $manajemen_pengguna)
    {
        $manajemen_pengguna->delete();
        return redirect()->route('admin.manajemen_pengguna.index')->with('success', 'User berhasil dihapus.');
    }
}
