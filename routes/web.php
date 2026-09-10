<?php

use Illuminate\Support\Facades\Route;
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