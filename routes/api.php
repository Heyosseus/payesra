<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login.store');
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::middleware('auth:api')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/token', function () {
    return csrf_token();
});
