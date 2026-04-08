<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
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

    Route::controller(PostsController::class)->prefix('admin/post')->group(function () {
        Route::get('/create', 'create')->name('post.create');
        Route::post('/store', 'store')->name('post.store');
    });

    Route::controller(CategoriesController::class)->prefix('admin/category')->group(function () {
        Route::get('/create', 'create')->name('category.create');
        Route::post('/store', 'store')->name('category.store');
        Route::get('/categories', 'index')->name('categories');
        Route::get('/edit/{id}', 'edit')->name('category.edit');
        Route::get('/delete/{id}', 'destroy')->name('category.delete');
        Route::post('/update/{id}', 'update')->name('category.update');
        Route::get('/trashed', 'trash')->name('category.trash');
    });

});

require __DIR__.'/auth.php';
