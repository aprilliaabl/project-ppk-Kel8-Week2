<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListMemberController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard-admin', function () {
        return view('dashboard_admin');
    });

    Route::get('/dashboard-user', function () {
        return view('dashboard_user');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

    // SRS-06: Kolaborasi List — Kelola member dalam list
    // GET    /lists/{list}/members         → tampil halaman daftar member
    // POST   /lists/{list}/members         → tambah member baru
    // DELETE /lists/{list}/members/{user}  → hapus member dari list
    Route::get('/lists/{list}/members', [ListMemberController::class, 'index'])
        ->name('lists.members.index');

    Route::post('/lists/{list}/members', [ListMemberController::class, 'store'])
        ->name('lists.members.store');

    Route::delete('/lists/{list}/members/{user}', [ListMemberController::class, 'destroy'])
        ->name('lists.members.destroy');
});