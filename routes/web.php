<?php

use App\Http\Controllers\Auth\Spa\LoginController;
use App\Http\Controllers\Auth\Spa\LogoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MyOrderController;
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

Route::get('orders/{order:order_code}', [OrdersController::class, 'show']);

Route::get('home',[FrontController::class, 'index']);

Route::get('home/products',[FrontController::class, 'product']);

Route::get('categories/{category}/product', [FrontController::class, 'products'])->name('category.product');

Route::get('products/{product}',[FrontController::class, 'product'])->name('product.id');

Route::view('customerlogin', 'front.login.login');
Route::post('customerlogin', [AuthController::class, 'login'])->name('customerlogin');

Route::view('customerregistration','front.login.registration');
Route::post('customerregistration', [AuthController::class,'register'])->name('customerregistration');

Route::get('allproducts', [FrontController::class, 'allProduct'])->name('allProduct');

Route::group( ['middleware' => 'auth'],function () {

    Route::resource('cart', CartController::class);

    Route::view('myorders','front.order.index');
    Route::get('myorders', [MyOrderController::class, 'display']);  

    Route::view('profile', 'customer.list');
    Route::get('profile',[FrontController::class,'userprofile']);
    Route::post('profile',[FrontController::class,'update'])->name('update');

    Route::get('customerlogout', [AuthController::class, 'logout'])->name('customerlogout');
});

Route::view('order_success', 'front.order-success.index');

Route::view('about_us', 'front.about-us.index');

// Move other http requests to the Admin Dashboard App
// -------------------------------------------------

Route::get('/admin/{vue?}', function () {
    return view('app');
})->where('vue', '[\/\w\.-]*')->name('admin');


// Move other http requests to the Vue App
// -------------------------------------------------

Route::get('/{vue?}', function () {
    return view('app');
})->where('vue', '[\/\w\.-]*')->name('login')->middleware(['guest']);
