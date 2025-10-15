<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blogs', function () {
    return redirect('/');
})->name('blogs.index');

Route::resource('blogs', BlogController::class);
