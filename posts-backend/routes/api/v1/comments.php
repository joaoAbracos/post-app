<?php

use App\Http\Controllers\Api\CommentController;
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
Route::name('comments.')
    ->group(function () {
        Route::get('/comments', [CommentController::class, 'index'])
            ->name('index');

        Route::get('/comments/{comments}', [CommentController::class, 'show'])
            ->name('show')
            ->where('user', '[0-9]+');

        Route::post('/comments', [CommentController::class, 'store'])->name('store');

        Route::patch('/comments/{comments}', [CommentController::class, 'update'])->name('update');

        Route::delete('/comments/{comments}', [CommentController::class, 'destroy'])->name('destroy');
    });