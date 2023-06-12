<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/posts', [PostController::class, 'index'])->middleware('posts.all');
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store'])->name('store');
Route::get('/my_posts', [PostController::class, 'myPosts']);
Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.soft.delete');
Route::get('/trashed', [PostController::class, 'trashed']);
Route::get('/posts/force_delete/{id}', [PostController::class, 'forceDelete'])->name('posts.force');
Route::get('/posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');

Route::get('/all_users', [AdminController::class, 'all']);
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/edit/{id}', [AdminController::class, 'update'])->name('edit');
Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
