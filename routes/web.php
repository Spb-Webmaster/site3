<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArticleController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [ArticleController::class, 'show'])->name('posts.post');
Route::get('cats/{cat}', [CategoryController::class, 'show'])->name('cats.index');

Route::get('cabinet', [CabinetController::class, 'index'])->name('cabinet.index');
Route::post('cabinet', [CabinetController::class, 'store'])->name('cabinet');

require __DIR__.'/auth.php';

