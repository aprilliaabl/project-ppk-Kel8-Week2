<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TaskController;

Route::resource('lists', ListController::class);

Route::post('lists/{list}/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('lists/{list}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('lists/{list}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('lists/{list}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::patch('lists/{list}/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
Route::delete('lists/{list}/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');