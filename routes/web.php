<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
})->name('welcome');
Route::get('checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('success_checkout', function () {
    return view('success_checkout');
})->name('success_checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route Socialite
Route::get('sign-in-google', [UserController::class, 'googleRedirect'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'googleCallback'])->name('user.google.callback');

require __DIR__.'/auth.php';
