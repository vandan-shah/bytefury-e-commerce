<?php

use App\Http\Controllers\Auth\Mobile\LoginController;
use App\Http\Controllers\Auth\Mobile\LogoutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

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


// Authentication & Password Reset
//----------------------------------

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', LoginController::class);

    Route::post('logout', LogoutController::class);
});


// Get authenticated user
//----------------------------------

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('customers', CustomersController::class);

    Route::apiResource('categories', CategoriesController::class);

    Route::apiResource('products', ProductsController::class);

    Route::apiResource('orders', OrdersController::class);

    Route::apiResource('brand', BrandController::class);

    Route::post('orders/{id}/approve',[StatusController::class, 'approve']);

    Route::post('orders/{id}/reject',[StatusController::class, 'reject']);
});
