<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/articles/{article}', [HomeController::class, 'show'])->name('home.show');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('comments')->group(function () {
        Route::post('/articles/{article}/comments', [CommentsController::class, 'store'])->name('comments.store');
        Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
    });

    Route::prefix('article')->middleware('admin')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/{article}', [ArticleController::class, 'update'])->name('article.update');
        Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    });

    // Category Routes
    Route::prefix('category')->middleware('admin')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

});

require __DIR__.'/auth.php';
