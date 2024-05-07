<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products/list',[ProductController::class,'index'])->name('products.list');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{ProductId}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('/products/{ProductId}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{ProductId}',[ProductController::class,'destroy'])->name('products.destroy');

// Route::get('/products/create', function () {
//     return view('products/create');
// });

require __DIR__.'/auth.php';
