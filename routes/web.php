<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

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

// product
Route::get('/products', ProductsController::class .'@index')->name('product.index');

Route::get('/products/create', ProductsController::class . '@create')->name('product.create');

Route::post('/products', ProductsController::class .'@store')->name('product.store');

Route::get('/products/{product}/edit', ProductsController::class .'@edit')->name('product.edit');

Route::put('/products/{product}', ProductsController::class .'@update')->name('product.update');

Route::delete('/products/{product}', ProductsController::class .'@destroy')->name('product.destroy');

        

// category
Route::get('/', CategoriesController::class .'@index')->name('category.index');

Route::get('/category/create', CategoriesController::class . '@create')->name('category.create');

Route::post('/category', CategoriesController::class .'@store')->name('category.store');

Route::get('/category/{category}', CategoriesController::class .'@show')->name('category.show');

Route::get('/category/{category}/edit', CategoriesController::class .'@edit')->name('category.edit');

Route::put('/category/{category}', CategoriesController::class .'@update')->name('category.update');

Route::delete('/category/{category}', CategoriesController::class .'@destroy')->name('category.destroy');
