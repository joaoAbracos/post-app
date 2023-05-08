<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::name('posts.')
    ->group(function () {
        Route::get('/posts', [PostController::class, 'index'])
            ->name('index');

        Route::get('/posts/{post}', [PostController::class, 'show'])
            ->name('show')
            ->where('user', '[0-9]+');

        Route::post('/posts', [PostController::class, 'store'])->name('store');

        Route::patch('/posts/{post}', [PostController::class, 'update'])->name('update');

        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy');
    });