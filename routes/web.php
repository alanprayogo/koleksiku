<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

Route::middleware(['prevent-back'])->group(function () {
    // Guest Controller
    Route::middleware('guest')->group(function () {
        Route::get('/', [AuthController::class, 'showLogin'])->name('user-login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/register', [AuthController::class, 'showRegister'])->name('user-register');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });

    // Auth Controller
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    // Admin Controller
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('dashboard-admin');

        // Category Controller
        Route::get('/show-category', [CategoryController::class, 'showCategory']) ->name('show-category');
        Route::get('/show-add-category', [CategoryController::class, 'showAddCategory']) ->name('show-add-category');
        Route::post('/add-category', [CategoryController::class, 'addCategory']) ->name('add-category');
        Route::get('/show-edit-category/{id}', [CategoryController::class, 'showEditCategory']) ->name('show-edit-category');
        Route::put('/show-edit-category/{id}', [CategoryController::class, 'editCategory']) ->name('edit-category');
        Route::delete('/delete-category/{id}', [CategoryController::class, 'deleteCategory']) ->name('delete-category');
        
        // Book Controller
        Route::get('/show-book', [BookController::class, 'showBook']) ->name('show-book');
        Route::get('/show-add-book', [BookController::class, 'showAddBook']) ->name('show-add-book');
        Route::post('/add-book', [BookController::class, 'addBook']) ->name('add-book');
        Route::get('/show-edit-book/{id}', [BookController::class, 'showEditBook']) ->name('show-edit-book');
        Route::put('/show-edit-book/{id}', [BookController::class, 'editBook']) ->name('edit-book');
        Route::delete('/delete-book/{id}', [BookController::class, 'deleteBook']) ->name('delete-book');
    });


    // User Controller
    Route::middleware(['auth', 'user'])->group(function () {
        Route::get('/dashboard-user', [UserController::class, 'index'])->name('dashboard-user');
    });

});