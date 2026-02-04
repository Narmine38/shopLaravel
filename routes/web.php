<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::get('/hello', function () {
    return 'Hello Laravel!';
});

Route::get('/', [PageController::class, 'home'])
    ->name('home');

Route::get('/about', [PageController::class, 'about'])
    ->name('about');

Route::get('/contact', [PageController::class, 'contact']);

Route::resource('products', ProductController::class);

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');
