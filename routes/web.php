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
    return view('welcome');
});

Route::get('/get/product', function () {
    return App\Models\Product::all();
});

Route::get('/get/category', function () {
    return App\Models\Category::all();
});

Route::get('/get/product/{id}', function ($id) {
    return App\Models\Product::where("id", "LIKE", $id)->get();
});

Route::get('/get/category/{id}', function ($id) {
    return App\Models\Category::where("id", "LIKE", $id)->get();
});

