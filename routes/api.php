<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;

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

//rutas

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('client', ClientController::class)->names('client');  //Listo

Route::resource('inventory', InventoryController::class)->names('inventory'); //Listo

Route::resource('invoice', InvoiceController::class)->names('invoice');

Route::resource('person', PersonController::class)->names('person'); //Listo

Route::resource('product', ProductController::class)->names('product'); //Listo

Route::resource('provider', ProviderController::class)->names('provider'); //Listo

Route::resource('purchase', PurchaseController::class)->names('purchase');

Route::resource('roles', RolController::class)->names('roles');

Route::resource('invoicedetail', InvoiceDetail::class)->names('invoicedetail');

Route::resource('purchasedetail', PurchaseDetail::class)->names('purchasedetail');