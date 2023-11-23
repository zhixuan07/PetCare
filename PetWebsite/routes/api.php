<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\userAuthController;
use \App\Http\Controllers\adminAuthController;
use \App\Http\Controllers\checkOutController;
use \App\Http\Controllers\reviewController;
use \App\Http\Controllers\ServiceController;
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
Route::get('/review/{id}',[reviewController::class,'showReview']);
Route::post('/checkout',[checkOutController::class,'checkout']);
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
Route::post('/service/checkout',[ServiceController::class,'serviceCheckout']);
Route::get('/userOrder/{id}',[OrderController::class,'getUserOrder']);
Route::post('/updateUserProfile/{id}',[userAuthController::class,'updateUser']);
Route::get('/services',[ServiceController::class,'showAllService']);
Route::post('/admin/updateService/{id}',[ServiceController::class,'updateAppointment']);
Route::post('/admin/cancelService/{id}',[ServiceController::class,'cancelAppointment']);
Route::get('/catFood', [ProductController::class,'getCatFood']);
Route::get('/dogFood', [ProductController::class,'getDogFood']);
Route::get('/catToy', [ProductController::class,'getCatToy']);
Route::get('/dogToy', [ProductController::class,'getDogToy']);
Route::get('/dogGrooming', [ProductController::class,'getDogGrooming']);
Route::get('/catGrooming', [ProductController::class,'getCatGrooming']);
Route::get('/admin/getMonthlySalesChart',[OrderController::class,'getMonthlySalesChart']);


