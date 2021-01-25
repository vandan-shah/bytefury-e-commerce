<?php

use App\Http\Controllers\Auth\Spa\LoginController;
use App\Http\Controllers\Auth\Spa\LogoutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;



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

Route::post('login', LoginController::class);

Route::get('logout', LogoutController::class);

Route::get('/orders/{order:order_code}', [OrdersController::class, 'show']);

Route::get('/home',[FrontController::class, 'index']);

Route::get('home/products',[FrontController::class, 'product']);

Route::get('/categories/{category}/product', [FrontController::class, 'products'])->name('category.product');

Route::get('product',[FrontController::class,'product']);

// Move other http requests to the Admin Dashboard App
// -------------------------------------------------

// Route::get('/admin/{vue?}', function () {
//     return view('app');
// })->where('vue', '[\/\w\.-]*')->name('admin')->middleware(['redirect-if-unauthenticated']);


// Move other http requests to the Vue App
// -------------------------------------------------

Route::get('/{vue?}', function () {
    return view('app');
})->where('vue', '[\/\w\.-]*')->name('login')->middleware(['guest']);
