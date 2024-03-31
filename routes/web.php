<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register.show');
    Route::post('/register', 'register')->name('register.store');
    Route::get('/login', 'showLoginForm')->name('login.show');
    Route::post('/login', 'login')->name('login.store');
    Route::get('/logout', 'logout')->middleware('auth');
});

Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
