<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return User::find(1)->profile;
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::get('/profile', 'edit')->name('profile.edit');
        //Route::patch('/profile',  'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
        Route::post('/profile/update', 'update')->name('profile.update');
    });

    Route::controller(PostsController::class)->prefix('admin/post')->group(function () {
        Route::get('/create', 'create')->name('post.create');
        Route::post('/store', 'store')->name('post.store');
        Route::get('/posts', 'index')->name('posts');
        Route::get('/posts/{id}', 'edit')->name('post.edit');
        Route::get('/trashbin', 'posttrash')->name('post.trashbin');
        Route::get('/delete/{id}', 'destroy')->name('post.delete');
        Route::get('/trashed/{id}', 'deleteforever')->name('post.trash');
        Route::get('/restore/{id}', 'restore')->name('post.restore');
        Route::get('/edit/{id}', 'edit')->name('post.edit');
        Route::post('/update/{id}', 'update')->name('post.update');
    });

    Route::controller(CategoriesController::class)->prefix('admin/category')->group(function () {
        // Route::get('/create', 'create')->name('category.create');
        Route::post('/store', 'store')->name('category.store');
        Route::get('/categories', 'index')->name('categories');
        Route::get('/edit/{id}', 'edit')->name('category.edit');
        Route::get('/delete/{id}', 'destroy')->name('category.delete');
        Route::put('/update/{id}', 'update')->name('category.update');
        Route::get('/trashbin', 'categorytrash')->name('category.trashbin');
        Route::get('/trashed/{id}', 'deleteforever')->name('category.trash');
        Route::get('/restore/{id}', 'restore')->name('category.restore');
    });

    Route::controller(TagsController::class)->prefix('tag')->group(function () {
        Route::get('/tags', 'index')->name('tags');
        Route::post('/store', 'store')->name('tag.store');
        Route::get('/delete/{id}', 'destroy')->name('tag.delete');
        Route::put('/update/{id}', 'update')->name('tag.update');
    });

    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/create', 'create')->name('user.create');
        Route::post('/store', 'store')->name('user.store');
        Route::get('/admin/{id}', 'admin')->name('user.admin');
        Route::get('/not_admin/{id}', 'not_admin')->name('user.not_admin');
        // Route::get('/profile', 'not_admin')->name('user.not_admin');
    });

    Route::controller(PasswordController::class)->group(function () {
        Route::put('/password_update', 'update')->name('password.update');
    });

});

require __DIR__.'/auth.php';
