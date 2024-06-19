<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpbeController;

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

// Route::get('/', \App\LoginController::class, 'index')->name('index');

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/spbe', [SpbeController::class, 'spbe'])->name('spbe');
    Route::get('/spbe/indikator', [SpbeController::class, 'indikator'])->name('spbe-indikator');

    Route::get('/user', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');
});
