<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\userAuthController;
use \App\Http\Controllers\adminAuthController;

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

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout',[AuthController::class,'logout']);

});

Route::post('/adminLogin',[adminAuthController::class,'login']);
Route::post('/userLogin',[userAuthController::class,'login']);
Route::post('/userRegister',[userAuthController::class,'register']);
Route::get('/products', [ProductController::class,'index']);
Route::post('/products/add', [ProductController::class,'store']);
Route::get('/product/{id}', [ProductController::class,'show']);
Route::delete('/products/{id}', [ProductController::class,'destroy']);
Route::post('/products/update/{id}', [ProductController::class,'update']);
Route::get("/admin/orders",[OrderController::class,'showAllOrders']);
Route::get("/admin/orders/{id}",[OrderController::class,'showOrderDetails']);
Route::patch("/admin/deleteOrder/{id}",[OrderController::class,'deleteOrder']);
Route::post('/admin/updateOrder/{id}',[OrderController::class,'updateStatus']);
Route::get('/admin/getTotalOrder',[OrderController::class,'getTotalOrder']);
Route::get('/admin/getTotalRevenue',[OrderController::class,'getTotalRevenue']);
Route::get('/admin/getTodayOrder',[OrderController::class,'getTodayOrder']);
Route::get('/admin/getTodayRevenue',[OrderController::class,'getTodayRevenue']);
Route::get('/admin/getTodayOrderChart',[OrderController::class,'getTodayOrderChart']);
Route::get('/admin/getTotalRevenueChart',[OrderController::class,'getTotalRevenueChart']);
Route::get('/admin/getTotalSalesByCategoryYearChart',[OrderController::class,'getTotalSalesByCategoryYearChart']);
