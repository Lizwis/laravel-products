<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminProductsController;





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


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/', [ProductsController::class, 'index']);


Route::post('/validateCart', [CheckoutController::class, 'validateCart']);
Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/admin/products', [AdminProductsController::class, 'index'])->middleware('auth:sanctum');
Route::post('/admin/products/store', [AdminProductsController::class, 'store'])->middleware('auth:sanctum');
Route::get('/admin/product/show/{product}', [AdminProductsController::class, 'show'])->middleware('auth:sanctum');
Route::post('/admin/product/update/{product}', [AdminProductsController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/admin/product/delete/{product}', [AdminProductsController::class, 'delete'])->middleware('auth:sanctum');
