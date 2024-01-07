<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/', [ProductController::class, 'renderAllProducts'])->name('home');
    Route::get('/login', [UserController::class, 'renderLogin'])->name('login');
    Route::get('/register', [UserController::class, 'renderRegister'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('')->group(function () {
        Route::get('/manage-post', [ProductController::class, 'renderManagePosts'])->name('manage-post')->name('manage-post');
        Route::get('/create-post', [ProductController::class, 'renderCreatePost'])->name('create-post');
        Route::get('/edit-post', [ProductController::class, 'renderEditPost'])->name('edit-post');
    });
});    

Route::prefix('/api')->group(function () {
    Route::post('/search', [ProductController::class, 'searchProducts'])->name('search-products');
});

Route::prefix('/controller')->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name('login-controller');
    Route::post('/register', [UserController::class, 'register'])->name('register-controller');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout-controller');
    Route::post('/create-post', [ProductController::class, 'createPost'])->name('create-post-controller');
    Route::post('/delete-post', [ProductController::class, 'deletePost'])->name('delete-post-controller');
    Route::post('/edit-post', [ProductController::class, 'editPost'])->name('edit-post-controller');
}); 