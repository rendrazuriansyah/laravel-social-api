<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JWTMiddleware;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\JWTAuthController;

// API Versioning (v1)
Route::prefix('v1')->group(function () {
    // Handle auth...
    Route::post('register', [JWTAuthController::class, 'register']);
    Route::post('login', [JWTAuthController::class, 'login']);

    // Menghandle posts
    Route::middleware(JWTMiddleware::class)->prefix('posts')->group(function () { // http://localhost:8000/api/v1/posts
        Route::get('/', [PostController::class, 'index']); // Mengambil semua data.
        Route::post('/', [PostController::class, 'store']); // Menyimpan data.
        Route::get('{id}', [PostController::class, 'show']); // Mengambil detail data by id.
        Route::put('{id}', [PostController::class, 'update']); // Mengupdate data by id.
        Route::delete('{id}', [PostController::class, 'destroy']); // Menghapus data by id.
    });

    // Menghandle comments
    Route::middleware(JWTMiddleware::class)->prefix('comments')->group(function () { // http://localhost:8000/api/v1/comments
        Route::post('/', [CommentController::class, 'store']); // Membuat komentar baru.
        Route::delete('{$id}', [CommentController::class, 'destroy']); // Menghapus komentar.
    });

    // Menghandle likes
    Route::middleware(JWTMiddleware::class)->prefix('likes')->group(function () {
        Route::post('/', [LikeController::class, 'store']); // Menyimpan like baru.
        Route::delete('{id}', [LikeController::class, 'destroy']); // Menghapus like.
    });

    // Menghandle messages
    Route::middleware(JWTMiddleware::class)->prefix('messages')->group(function () {
        Route::post('/', [MessageController::class, 'store']); // Mengirim pesan.
        Route::get('{id}', [MessageController::class, 'show']); // Melihat detail pesan.
        Route::get('getMessages/{user_id}', [MessageController::class, 'getMessages']); // Melihat pesan-pesan berdasarkan user id.
        Route::delete('{id}', [MessageController::class, 'destroy']); // Menghapus pesan.
    });
});
