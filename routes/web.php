<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\InterestController;

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('interests', InterestController::class)->only(['index', 'show']);
});

Route::get('/', function () {
    return auth()->check() ? redirect('/interests') : redirect('/login');
});

require __DIR__.'/auth.php';
