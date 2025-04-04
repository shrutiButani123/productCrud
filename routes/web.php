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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ProductController::class, 'index'])->name('products');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/subcategory/{id}', [ProductController::class, 'getSubCategory'])->name('subcategory');
