<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TodoController;

Route::resource('todos', TodoController::class);
Route::get('/', function () {
    return redirect()->route('todos.index');
});
Route::patch('todos/{todo}/toggle', [TodoController::class, 'toggle'])->name('todos.toggle');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('dashboard');
//     })->name('dashboard');
// });

// require __DIR__.'/settings.php';
// require __DIR__.'/auth.php';
