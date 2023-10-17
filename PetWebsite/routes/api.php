<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\ProductController;

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

Route::post('/adminLogin',[adminAuthController::class,'login']);
Route::get('/products', [ProductController::class,'index']);
Route::post('/products/add', [ProductController::class,'store']);
Route::delete('/products/{id}', [ProductController::class,'destroy']);
Route::post('/products/update/{id}', [ProductController::class,'update']);
Route::get("/admin/orders",[OrderController::class,'showAllOrders']);
Route::get("/admin/orders/{id}",[OrderController::class,'showOrderDetails']);
Route::patch("/admin/deleteOrder/{id}",[OrderController::class,'deleteOrder']);
Route::post('/admin/updateOrder/{id}',[OrderController::class,'updateStatus']);
