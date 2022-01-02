<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SnippetController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ResourceController::class, 'index'])->name('resources.index');

    Route::prefix('articles')->as('articles.')->group(function() {
        Route::get('', [ResourceController::class, 'resourceIndex'])->name('index');
    });

    Route::prefix('snippets')->as('snippets.')->group(function() {
        Route::get('', [SnippetController::class, 'index'])->name('index');
        Route::get('create', [SnippetController::class, 'create'])->name('create');
        Route::get('{snippet}', [SnippetController::class, 'show'])->name('show');
        Route::get('edit/{snippet}', [SnippetController::class, 'edit'])->name('edit');
        Route::post('', [SnippetController::class, 'store'])->name('store');
        Route::patch('update/{snippet}', [SnippetController::class, 'update'])->name('update');
        Route::delete('delete/{snippet}', [SnippetController::class, 'destroy'])->name('delete');
    });

    Route::prefix('blogs')->as('blogs.')->group(function() {
        Route::get('', [ResourceController::class, 'resourceIndex'])->name('index');
    });

    Route::prefix('packages')->as('packages.')->group(function() {
        Route::get('', [ResourceController::class, 'resourceIndex'])->name('index');
    });

    Route::prefix('videos')->as('videos.')->group(function() {
        Route::get('', [ResourceController::class, 'resourceIndex'])->name('index');
    });

    Route::prefix('books')->as('books.')->group(function() {
        Route::get('', [ResourceController::class, 'resourceIndex'])->name('index');
    });

    Route::get('search', [ResourceController::class, 'search'])->name('search');
});
