<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// ******************* PRODUCT ROUNTING *******************
Route::get('/get/product', function () {
    return App\Models\Product::all();
});

Route::get('/get/product/{id}', function ($id) {
    return App\Models\Product::where("id", "LIKE", $id)->get();
});

Route::post('/add/product', function () {
    
});

Route::get('/product', [App\Http\Controllers\ProductController::class , 'index' ]);
Route::post('/product/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::get('/product/search', [App\Http\Controllers\ProductController::class, 'search']);



// ******************* CATEGORY ROUNTING *******************
Route::get('/get/category', function () {
    return App\Models\Category::all();
});

Route::get('/get/category/{id}', function ($id) {
    return App\Models\Category::where("id", "LIKE", $id)->get();
});

Route::post('/add/category', function () {
    
});