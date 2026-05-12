<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnvSettingsController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('welcome');
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/contact', 'contact')->name('contact.show');
    Route::get('/about', 'about')->name('about.show');
    Route::get('/blog', 'blog')->name('blog.show');
    Route::get('/categories', 'allCategories')->name('blog.categories');
    Route::get('/tags', 'allTags')->name('blog.tags');
    Route::get('/category/{id}', 'categoryPosts')->name('category.posts');
    Route::get('/tag/{id}', 'tagPosts')->name('tag.posts');
    Route::post('/contactsubmit', 'handleContact')->name('contact.footer.submit');
    Route::get('/blog/{slug}', 'blogDetails')->name('blog.details');
});

Route::get('/test', function () {
    return User::find(1)->profile;
});

Route::get('dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::controller(EnvSettingsController::class)->group(function(){
        Route::post('/env_update','updateEnv')->name('settings.updateEnv');
        Route::get('/env_view','index')->name('env_view');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::get('/profile/edit', 'edit')->name('profile.edit');
        Route::delete('/profile/destroy', 'destroy')->name('profile.destroy');
        Route::post('/profile/update', 'update')->name('profile.update');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get('/messages', 'showContacts')->name('messages');
        Route::get('/messages/delete/{id}', 'deleteContacts')->name('messages.delete');
        Route::get('/messages/trash', 'showTrashedContacts')->name('messages.trash');
        Route::get('/messages/restore/{id}', 'restoreContact')->name('messages.restore');
        Route::get('/messages/force-delete/{id}', 'permanentDeleteContact')->name('messages.force_delete');
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
        Route::post('/store', 'store')->name('category.store');
        Route::get('/categories', 'index')->name('categories');
        Route::get('/edit/{id}', 'edit')->name('category.edit');
        Route::get('/delete/{id}', 'destroy')->name('category.delete');
        Route::put('/update/{id}', 'update')->name('category.update');
        Route::get('/trashbin', 'categorytrash')->name('category.trashbin');
        Route::get('/trashed/{id}', 'deleteforever')->name('category.trash');
        Route::get('/restore/{id}', 'restore')->name('category.restore');
    });

    Route::controller(TagsController::class)->prefix('admin/tag')->group(function () {
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
        Route::get('/delete/{id}', 'destroy')->name('user.delete');
        Route::get('/trashbin', 'usertrash')->name('user.trashbin');
        Route::get('/trashed/{id}', 'deleteforever')->name('user.trash');
        Route::get('/restore/{id}', 'restore')->name('user.restore');
    });

    Route::controller(PasswordController::class)->group(function () {
        Route::put('/password_update', 'update')->name('password.update');
    });

    Route::controller(SettingsController::class)->group(function () {
        Route::get('/settings', 'index')->name('settings');
        Route::post('/settings/update', 'update')->name('settings.update');
    });

});

require __DIR__.'/auth.php';
