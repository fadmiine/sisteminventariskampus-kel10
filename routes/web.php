<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('main');
// });

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/index_staff', function () {
    return view('staff.index');
});

Route::get('/create_staff', function () {
    return view('staff.create');
});