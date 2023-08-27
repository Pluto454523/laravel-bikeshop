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

// use App\Models\phone;
// Route::get('/test', function () {
//     return phone::find(1)->typephone->name;
// });

Route::get('product', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('product/edit/{id?}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::get('product/remove/{id?}', [App\Http\Controllers\ProductController::class, 'remove']);
Route::get('product/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('product/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('product/update', [App\Http\Controllers\ProductController::class, 'update']);
Route::post('product/insert', [App\Http\Controllers\ProductController::class, 'insert']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/category/edit/{id?}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::get('/category/remove/{id?}', [App\Http\Controllers\CategoryController::class, 'remove']);
Route::get('/category/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('/category/search', [App\Http\Controllers\CategoryController::class, 'search']);
Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'update']);
Route::post('/category/insert', [App\Http\Controllers\CategoryController::class, 'insert']);
