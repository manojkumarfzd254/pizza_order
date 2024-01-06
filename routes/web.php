<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/order",[PizzaOrderController::class,'showOrderForm'])->name('order.create');
Route::post("/order",[PizzaOrderController::class,'placeOrder'])->name('place-order');
