<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

// Route landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Prefix group untuk blogs
Route::prefix('blogs')->name('blogs.')->group(function () {
    // Redirect jika akses /blogs langsung
    Route::get('/', function () {
        return redirect()->route('blogs.list');
    })->name('index');

    // Tampilkan semua blog
    Route::get('/all', [BlogController::class, 'index'])->name('list');

    // Form tambah blog
    Route::get('/create', [BlogController::class, 'create'])->name('create');

    // Simpan blog baru
    Route::post('/store', [BlogController::class, 'store'])->name('store');

    // Detail blog
    Route::get('/{id}', [BlogController::class, 'show'])->name('show');

    // Form edit blog
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('edit');

    // Update blog
    Route::put('/{id}', [BlogController::class, 'update'])->name('update');

    // Hapus blog
    Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');
});
