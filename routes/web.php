<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProfilesController, PostController};

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

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');
