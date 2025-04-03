<?php

use App\Http\Controllers\Admin\BillControllere;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use  App\Http\Controllers\PageController;
use  App\Http\Controllers\ProductController;
use  App\Http\Controllers\CartController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\Admin\HomeController;
use  App\Http\Controllers\Admin\CategoryController;
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
//admin//
Route::prefix('admin')->middleware('isAdmin')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');

    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/list-product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product', [ProductController::class, 'create'])->name('admin.product');
    Route::post('/product', [ProductController::class, 'store'])->name('admin.product');
    Route::get('/update-product/{id}', [ProductController::class, 'edit'])->name('admin.product.update');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    Route::get('/bill', [BillControllere::class, 'index'])->name('admin.bill');
    Route::get('/bill-detai/{id}', [BillControllere::class, 'show'])->name('admin.bill.detai');

});

Route::get('/trangchu', [PageController::class, 'index'])->name('trangchu');
Route::get('/cart/{id}', [PageController::class, 'addToCart'])->name('add_cart');
Route::get('/search', [PageController::class, 'search'])->name('search');

Route::get('/create-user', [UserController::class, 'create'])->name('create');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::get('/login-user', [UserController::class, 'getLogin'])->name('login');
Route::post('/login-user', [UserController::class, 'postLogin'])->name('login');
Route::get('/logout-user', [UserController::class, 'logout'])->name('logout');

Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::post('/order', [PageController::class, 'order'])->name('order');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/detail/{id}', [ProductController::class, 'show'])->name('detail');

Route::get('/shopping-cart', [CartController::class, 'index'])->name('cart');
Route::patch('reduce-one/{id}',[CartController::class, 'reduce'])->name('cart.reduce');
Route::delete('delete-item/{id}',[CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('increase-item/{id}',[CartController::class, 'increase'])->name('cart.increase');
