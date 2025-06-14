<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManajemenPenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.manajemen_pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('admin.manajemen_pengguna.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,staff'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('manajemen_pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manajemen_pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.manajemen_pengguna.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:staff,user',
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    if ($request->filled('password')) {
        $validated['password'] = Hash::make($request->password);
    } else {
        unset($validated['password']);
    }

    $user->update($validated);

    return redirect()->route('manajemen_pengguna.index')->with('success', 'Pengguna berhasil diupdate.');
}

}
