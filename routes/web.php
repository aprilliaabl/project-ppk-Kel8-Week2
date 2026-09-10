<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListMemberController;

Route::get('/', function () {
    return view('welcome');
});

// Semua route di bawah ini hanya bisa diakses oleh user yang sudah login
Route::middleware('auth')->group(function () {

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
