<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\PersonController; */
/* use App\Http\Controllers\RolController; */
/* use App\Http\Controllers\InventoryController; */
/* use App\Http\Controllers\InvoiceController; */
/* use App\Http\Controllers\ProductController; */
/* use App\Http\Controllers\ProviderController; */
/* use App\Http\Controllers\PurchaseController; */
use App\Http\Controllers\Api\UserController;

//rutas
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    //rutas
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);
});

Route::resource('client', ClientController::class)->names('client');  //Listo

Route::resource('inventory', InventoryController::class)->names('inventory'); //Listo

Route::resource('invoice', InvoiceController::class)->names('invoice');

Route::resource('person', PersonController::class)->names('person'); //Listo

Route::resource('product', ProductController::class)->names('product'); //Listo

Route::resource('provider', ProviderController::class)->names('provider')->middleware('auth:sanctum'); //Listo

/* Route::resource('purchase', PurchaseController::class)->names('purchase'); */

/* Route::resource('roles', RolController::class)->names('roles'); */

/* Route::resource('invoicedetail', InvoiceDetail::class)->names('invoicedetail'); */

/* Route::resource('purchasedetail', PurchaseDetail::class)->names('purchasedetail'); */