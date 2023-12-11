<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('')->group(function () {
    Route::get('/', [ProductController::class, 'renderAllProducts']);
    Route::get('/manage-post', [ProductController::class, 'renderManagePosts'])->name('manage-post');
    Route::get('/create-post', [ProductController::class, 'renderCreatePost']);
    Route::get('/edit-post', [ProductController::class, 'renderEditPost']);
    Route::get('/login', [UserController::class, 'renderLogin']);
    Route::get('/register', [UserController::class, 'renderRegister']);
});

Route::prefix('/api')->group(function () {
    Route::post('/search', [ProductController::class, 'searchProducts']);
});

Route::prefix('/controller')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/create-post', [ProductController::class, 'createPost']);
    Route::post('/delete-post', [ProductController::class, 'deletePost']);
    Route::post('/edit-post', [ProductController::class, 'editPost']);
});