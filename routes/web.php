<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListMemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;


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

    // SRS-08: Manajemen User oleh Admin
    Route::get('/admin/users', [AdminUserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/users/create', [AdminUserController::class, 'create'])
        ->name('admin.users.create');

    Route::post('/admin/users', [AdminUserController::class, 'store'])
        ->name('admin.users.store');

    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])
        ->name('admin.users.destroy');
});