<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('user/{user}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');
});

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::post('/articles', [App\Http\Controllers\ArticleController::class, 'store']);
Route::delete('/articles/{article}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');

Route::get('/guides', [App\Http\Controllers\GuidesController::class, 'index'])->name('guides');
