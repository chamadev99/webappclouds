<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/menu-page', [LinkController::class, 'index'])->name('link');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/filter}', [ApiController::class, 'filter'])->name('filter');
    Route::get('/sync-record/{id}', [LinkController::class, 'sync'])->name('sync-record.view');
    Route::post('/sync', [LinkController::class, 'store'])->name('sync');
    Route::get('/menu-show/{id}', [LinkController::class, 'show'])->name('menu.show');
    Route::get('/menu-edit/{id}', [LinkController::class, 'edit'])->name('menu.edit');
    Route::put('/menu-update', [LinkController::class, 'update'])->name('menu.update');
    Route::delete('/menu-delete/{id}', [LinkController::class, 'destroy'])->name('menu.delete');
});

require __DIR__ . '/auth.php';
