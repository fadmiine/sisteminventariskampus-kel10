<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = $user->role;

        return view('dashboard', compact('user', 'role'));
    }

    public function adminDashboard()
    {
        $totalBarang = \App\Models\Barang::count();
    $totalPengguna = \App\Models\User::count();
    $totalPeminjamanAktif = \App\Models\Peminjaman::where('status', 'dipinjam')->count();
    $totalPengembalianHariIni = \App\Models\Peminjaman::whereDate('tanggal_kembali', today())->count();

    return view('admin.dashboard', compact(
        'totalBarang',
        'totalPengguna',
        'totalPeminjamanAktif',
        'totalPengembalianHariIni'
    ));
    }

    public function staffDashboard()
    {
        return view('staff.dashboard'); // resources/views/staff/dashboard.blade.php
    }

    public function userDashboard()
    {
        return view('user.dashboard'); // resources/views/user/dashboard.blade.php
    }

  

}
