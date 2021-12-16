<?php

use Illuminate\Http\Request;
use Database\Factories\WalletFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\WalletController;
use App\Http\Controllers\API\XenditController;
use App\Http\Controllers\API\PromotionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return view('layouts.main', [
        'title' => 'Main'
    ]);
});

Route::get('xendit/va/list',  [XenditController::class, 'index']);
Route::get('xendit/va/getBalance',  [XenditController::class, 'getBalance']);
Route::post('xendit/va/createCustomer',  [XenditController::class, 'createCustomer']);
Route::post('xendit/va/createVa',  [XenditController::class, 'createVa']);
Route::post('xendit/va/callback',  [XenditController::class, 'callback']);
Route::get('xendit/va/makePayout',  [XenditController::class, 'doPayout']);
Route::post('xendit/va/makePayout',  [XenditController::class, 'makePayout']);
Route::get('xendit/va/getPayout',  [XenditController::class, 'getPayout']);
Route::put('xendit/va/TopUpVA',  [XenditController::class, 'TopUpVA']);
Route::get('xendit/va/makeInvoice',  [XenditController::class, 'doInvoice']);
Route::post('xendit/va/makeInvoice',  [XenditController::class, 'makeInvoice']);

// Wallet view
Route::get('/wallet', [WalletController::class, 'index']);

// Get a wallet by id
Route::get('/wallet/{wallet:id}', [WalletController::class, 'walletGet']);

// Create a wallet
Route::post('/wallet/create', [WalletController::class, 'walletCreate']);

// Bank
Route::get('/banks', [BankController::class, 'index']);
Route::get('/banks/api', [BankController::class, 'bankGet']);
Route::post('/banks/create', [BankController::class, 'bankCreate']);
Route::put('/banks/{bank:id}', [BankController::class, 'bankIsDeleted']);

// Promo
Route::get('/promos', [PromotionController::class, 'index']);
Route::get('/promos/api', [PromotionController::class, 'promoGet']);
Route::post('/promos/create', [PromotionController::class, 'promoCreate']);
Route::put('/promos/{promo:id}', [PromotionController::class, 'promoIsDeleted']);

