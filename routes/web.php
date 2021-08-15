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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('index');
Route::post('/create ', [App\Http\Controllers\BookController::class, 'store'])->name('create');
Route::get('/create ', [App\Http\Controllers\BookController::class, 'create'])->middleware('auth');
Route::get('/{book}', [App\Http\Controllers\BookController::class, 'show']);
Route::get('/{book}/edit', [App\Http\Controllers\BookController::class, 'edit']);
Route::put('/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('update');
Route::delete('/{book}', [App\Http\Controllers\BookController::class, 'destroy']);