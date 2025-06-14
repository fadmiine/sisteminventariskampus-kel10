<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManajemenPenggunaController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
<<<<<<< Updated upstream

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

=======
// Arahkan root ke login
>>>>>>> Stashed changes
Route::get('/', function () {
    return redirect('/login');
});

<<<<<<< Updated upstream
// LOGIN & REGISTER
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
=======
// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// REGISTER (untuk user dan staff, bukan admin)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// DASHBOARD UTAMA (redirect atau tampilan umum kalau dibutuhkan)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// DASHBOARD BERDASARKAN ROLE
>>>>>>> Stashed changes
Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->middleware('auth')->name('admin.dashboard');
Route::get('/staff/dashboard', [DashboardController::class, 'staffDashboard'])->middleware('auth')->name('staff.dashboard');
Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->middleware('auth')->name('user.dashboard');

<<<<<<< Updated upstream
// MANAJEMEN PENGGUNA
Route::resource('manajemen_pengguna', ManajemenPenggunaController::class)->except(['show', 'edit', 'update']);

// INVENTARIS
Route::resource('inventaris', InventarisController::class)->middleware('auth');

// PEMINJAMAN
Route::middleware(['auth'])->group(function () {
    Route::resource('peminjaman', PeminjamanController::class);

=======

Route::resource('/manajemen_pengguna', UserController::class);
Route::resource('manajemen_pengguna', \App\Http\Controllers\ManajemenPenggunaController::class);
Route::resource('manajemen_pengguna', ManajemenPenggunaController::class)->except(['show', 'edit', 'update']);

Route::resource('inventaris', InventarisController::class);

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::resource('peminjaman', PeminjamanController::class);
    
>>>>>>> Stashed changes
    Route::middleware(['role:staff,admin'])->group(function () {
        Route::put('peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
        Route::put('peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');
    });
<<<<<<< Updated upstream

    Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
    Route::get('/pengembalian', [PeminjamanController::class, 'pengembalianIndex'])->name('pengembalian.index');
});

// LAPORAN
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/peminjaman', [LaporanController::class, 'peminjaman'])->name('laporan.peminjaman');
Route::get('/laporan/pengembalian', [LaporanController::class, 'pengembalian'])->name('laporan.pengembalian');
Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');
Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');
=======
});

Route::middleware('auth')->group(function () {
    // ...
});

Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    // hanya admin & staff
});

Route::post('/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
Route::put('peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');

Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');

Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])
    ->name('peminjaman.kembalikan');
Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');

    Route::get('/pengembalian', [PeminjamanController::class, 'pengembalianIndex'])
    ->middleware('auth')
    ->name('pengembalian.index');
Route::get('/admin/pengembalian', [PeminjamanController::class, 'pengembalianIndex'])->name('pengembalian.index');


Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/peminjaman', [LaporanController::class, 'peminjaman'])->name('laporan.peminjaman');
Route::get('/laporan/pengembalian', [LaporanController::class, 'pengembalian'])->name('laporan.pengembalian');

Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');
Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');

>>>>>>> Stashed changes
