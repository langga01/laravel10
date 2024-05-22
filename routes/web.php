<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;


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
// Route::get('/',[HomeController::class, 'dashboard']);

// Route::get('/user',[HomeController::class, 'index'])->name('index');
// Route::get('/create',[HomeController::class, 'create'])->name('user.create');
// Route::post('/store',[HomeController::class, 'store'])->name('user.store');

// Route::get('/edit/{id}',[HomeController::class, 'edit'])->name('user.edit');
// Route::put('/update/{id}',[HomeController::class, 'update'])->name('user.update');
// Route::delete('/delete/{id}',[HomeController::class, 'delete'])->name('user.delete');

Route::get('/login',[LoginController::class, 'index'])->name('login');

Route::controller(HomeController::class)->group(function(){
    Route::get('/','dashboard');
    Route::get('/user','index')->name('index');
    Route::get('/create','create')->name('user.create');
    Route::post('/store','store')->name('user.store');
    Route::get('/edit/{id}','edit')->name('user.edit');
    Route::put('/update/{id}','update')->name('user.update');
    Route::delete('/delete/{id}','delete')->name('user.delete');
});