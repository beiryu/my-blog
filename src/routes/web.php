<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// To welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

// To blog page
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// To my post manage page
Route::get('/blog/my-posts', [BlogController::class, 'myPosts'])->name('blog.my-posts');

// To pending blog post
Route::get('/blog/pending', [BlogController::class, 'pending'])->name('blog.pending');

// To create blog page
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');

// To approve pending blog post
Route::get('/blog/{post}/approve', [BlogController::class, 'approve'])->name('blog.approve');

// To single blog post
Route::get('/blog/{post:slug}/{status?}', [BlogController::class, 'show'])->name('blog.show');

// To edit blog post
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// To update blog post
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');

// To delete blog post
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

// To store blog
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');

// To about page
Route::get('/about', function() {
    return view('about');
})->name('about');

// To contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', [RoleController::class, 'index'])->middleware(['auth', 'role:admin,user'])->name('dashboard');

// To user and category resource controller
Route::middleware(['auth'])->group(function () {
    
    Route::resource('/categories', CategoryController::class);
    Route::resource('/users', UserController::class);
});

require __DIR__.'/auth.php';
