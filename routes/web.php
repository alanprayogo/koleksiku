<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/show-category', [CategoryController::class, 'showCategory']) ->name('show-category');
Route::get('/show-add-category', [CategoryController::class, 'showAddCategory']) ->name('show-add-category');
Route::get('/show-edit-category', [CategoryController::class, 'showEditCategory']) ->name('show-edit-category');
Route::get('/show-book', [BookController::class, 'showBook']) ->name('show-book');
