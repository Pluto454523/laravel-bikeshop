<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product/{category_id?}', [App\Http\Controllers\Api\ProductControllerApi::class, 'product_list']);
Route::post('/product/search', [App\Http\Controllers\Api\ProductControllerApi::class, 'product_search']);

Route::get('/category', [App\Http\Controllers\Api\CategoryControllerApi::class, 'category_list']);