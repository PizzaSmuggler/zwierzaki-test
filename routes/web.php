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
    return view('welcome');
});
Route::get( '/adverts', [\App\Http\Controllers\AdvertController::class, 'index'])->name('adverts.index')->middleware('auth');
Route::get( '/adverts/create', [\App\Http\Controllers\AdvertController::class, 'create'])->name('adverts.create')->middleware('auth');
Route::post( '/adverts', [\App\Http\Controllers\AdvertController::class, 'store'])->name('adverts.store')->middleware('auth');
Route::get( '/adverts/edit/{advert}', [\App\Http\Controllers\AdvertController::class, 'edit'])->name('adverts.edit')->middleware('auth');
Route::post( '/adverts/{advert}', [\App\Http\Controllers\AdvertController::class, 'update'])->name('adverts.update')->middleware('auth');
Route::delete('/adverts/{advert}',[\App\Http\Controllers\AdvertController::class, 'destroy'])->name('adverts.destroy')->middleware('auth');

Route::get( '/users/list', [\App\Http\Controllers\UserController::class, 'index'])->middleware('auth');
Route::delete('/users/{user}',[\App\Http\Controllers\UserController::class, 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
