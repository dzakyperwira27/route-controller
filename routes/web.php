<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::resource('blogs', BlogController::class);

Route::get('/', function () {
    return view('index');
});
