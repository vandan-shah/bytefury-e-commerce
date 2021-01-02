<?php

use App\Http\Controllers\Auth\Mobile\LoginController;
use App\Http\Controllers\Auth\Mobile\LogoutController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use Illuminate\Http\Request;
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
});
