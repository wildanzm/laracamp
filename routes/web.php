<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
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

Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');



Route::middleware(['auth'])->group(function () {
    // Chekout Route
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
    // User Dashboard Route
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route Socialite
Route::get('sign-in-google', [UserController::class, 'googleRedirect'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'googleCallback'])->name('user.google.callback');

require __DIR__ . '/auth.php';
