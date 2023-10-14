<?php

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

Route::get('/', function () {
    return view('layouts/master');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);


use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;

Route::get('/test', function () {
    // return phone::find(1)->typephone->name;

    $order = Order::find(1);
    $order_data = array(
        'data' => $order,
        'user' => $order->user,
        'detail' => $order->detail
    );

    $detail = Order_detail::where('order_id', 'like' , '%'.$order->id.'%')->get();
    $product_detail = $detail[0]->product;

    return compact('detail');

    // return Order_detail::find(1)->order->status;
    // return User::find(1)->name;
    // return Order::with(['name'])->where('user_id', '1');
});

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/edit/{id?}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::get('/product/remove/{id?}', [App\Http\Controllers\ProductController::class, 'remove']);
Route::get('/product/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('/product/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'update']);
Route::post('/product/insert', [App\Http\Controllers\ProductController::class, 'insert']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/category/edit/{id?}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::get('/category/remove/{id?}', [App\Http\Controllers\CategoryController::class, 'remove']);
Route::get('/category/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('/category/search', [App\Http\Controllers\CategoryController::class, 'search']);
Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'update']);
Route::post('/category/insert', [App\Http\Controllers\CategoryController::class, 'insert']);

Route::get('/cart/view', [App\Http\Controllers\CartController::class, 'viewCart']);
Route::get('/cart/add/{id?}', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('/cart/delete/{id?}', [App\Http\Controllers\CartController::class, 'deleteCart']);
Route::get('/cart/update/{id}/{qty}', [App\Http\Controllers\CartController::class, 'updateCart']);
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout']);
Route::get('/cart/complete', [App\Http\Controllers\CartController::class, 'complete']);
Route::get('/cart/finish', [App\Http\Controllers\CartController::class, 'finish_order']);