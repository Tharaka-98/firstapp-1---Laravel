<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// route for show index page
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

// route for show create product page
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

// route for store created products in the db
Route::post('/product', [ProductController::class, 'store'])->name('product.store');

// route for go to edit product page
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// route for update product page
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

// route for delete product from the db
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
