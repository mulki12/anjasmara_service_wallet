<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\WalletController;
use App\Http\Controllers\API\PromotionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Bank
Route::get('/banks', [BankController::class, 'webview'])->name('bank');

// Wallet
Route::get('/wallet', [WalletController::class, 'webview'])->name('wallet');

// Promo
Route::get('/promotion', [PromotionController::class, 'webview'])->name('promo');

// Log
Route::get('/log', [LogController::class, 'webview'])->name('log');
