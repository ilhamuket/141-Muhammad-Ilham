<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home.index');
})->name('home');

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

    // Article Routes
    Route::prefix('article')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/', [ArticleController::class, 'store'])->name('article.store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::put('/{article}', [ArticleController::class, 'update'])->name('article.update');
        Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    });
    

    // Category Routes
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
});

require __DIR__.'/auth.php';
