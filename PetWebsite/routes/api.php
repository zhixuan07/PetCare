<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/adminLogin',[\App\Http\Controllers\adminAuthController::class,'login']);
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index']);
Route::post('/products/add', [\App\Http\Controllers\ProductController::class,'store']);
Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class,'destroy']);
Route::post('/products/update/{id}', [\App\Http\Controllers\ProductController::class,'update']);
Route::get("/admin/orders",[\App\Http\Controllers\OrderController::class,'index']);
