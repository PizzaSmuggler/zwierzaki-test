<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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
Route::get( '/', [WelcomeController::class, 'index'])->name('search');

Route::middleware(['auth','verified'])->group(function(){
    Route::resource('adverts',AdvertController::class);
    //Route::get('/getBreeds/{id}',[DropdownController::class,'getBreeds']);
    //Route::get('/getCities/{id}',[DropdownController::class,'getCities']);
    Route::get( '/users/list', [UserController::class, 'index'])->middleware('isAdmin');
    Route::delete('/users/{user}',[UserController::class, 'destroy'])->middleware('isAdmin');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
//Route::get( '/adverts', [AdvertController::class, 'index'])->name('adverts.index')->middleware('auth');
//Route::get( '/adverts/create', [AdvertController::class, 'create'])->name('adverts.create')->middleware('auth');
//Route::get( '/adverts/{advert}', [AdvertController::class, 'show'])->name('adverts.show')->middleware('auth');
//Route::post( '/adverts', [AdvertController::class, 'store'])->name('adverts.store')->middleware('auth');
//Route::get( '/adverts/edit/{advert}', [AdvertController::class, 'edit'])->name('adverts.edit')->middleware('auth');
//Route::post( '/adverts/{advert}', [AdvertController::class, 'update'])->name('adverts.update')->middleware('auth');
//Route::delete('/adverts/{advert}',[AdvertController::class, 'destroy'])->name('adverts.destroy')->middleware('auth');

//Route::get( '/users/list', [UserController::class, 'index'])->middleware('auth');
//Route::delete('/users/{user}',[UserController::class, 'destroy'])->middleware('auth');

Route::get('/getBreeds/{id}',[DropdownController::class,'getBreeds']);
Route::get('/getCities/{id}',[DropdownController::class,'getCities']);


Auth::routes(['verify'=>true]) ;
