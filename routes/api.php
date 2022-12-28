<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

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

Route::post('login/', [UserController::class, 'login']);

Route::post('register/user', [UserController::class, 'registerUser']);

Route::post('register/', [CustomerController::class, 'registerCustomer']);

Route::post('register/table/', [TableController::class, 'registerTable']);

Route::post('register/menu/', [MenuController::class, 'registerMenu']);

Route::post('register/order/', [OrderController::class, 'registerOrder']);

Route::get('orders/waiter/{waiter}', [OrderController::class, 'getOrdersWaiter']);

Route::get('orders/cooker/', [OrderController::class, 'getOrdersCooker']);

Route::get('orders/filters/', [OrderController::class, 'getOrdersByFilters']);

Route::get('orders/customer/{customer}', [OrderController::class, 'getOrdersByCustomer']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
