<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Versioning (v1)
Route::prefix('v1')->group(function () {
    // Menghandle posts
    Route::prefix('posts')->group(function () { // http://localhost:8000/api/v1/posts
        Route::get('/', [PostController::class, 'index']); // Mengambil semua data.
        Route::post('/', [PostController::class, 'store']); // Menyimpan data.
        Route::get('{id}', [PostController::class, 'show']); // Mengambil detail data by id.
        Route::put('{id}', [PostController::class, 'update']); // Mengupdate data by id.
        Route::delete('{id}', [PostController::class, 'destroy']); // Menghapus data by id.
    });

    // Menghandle comments
    Route::prefix('comments')->group(function () { // http://localhost:8000/api/v1/comments
        Route::post('/', [CommentController::class, 'store']); // Membuat komentar baru.
        Route::delete('{$id}', [CommentController::class, 'destroy']); // Menghapus komentar.
    });
});
