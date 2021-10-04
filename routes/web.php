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
    Route::get('/', [\App\Http\Controllers\ResourceController::class, 'index'])->name('resources.index');
    Route::get('/test', [\App\Http\Controllers\ResourceController::class, 'resourceIndex'])->name('resources.test');
    // Route::get('/resources/create', [\App\Http\Controllers\ResourceController::class, 'create'])->name('resources.create');
    // Route::get('/resources/{resource}', [\App\Http\Controllers\ResourceController::class, 'edit'])->name('resources.edit');
    // Route::patch('/resources/{resource}', [\App\Http\Controllers\ResourceController::class, 'update'])->name('resources.update');
    // Route::get('/{key}', [\App\Http\Controllers\ResourceController::class, 'selectedResource'])->name('resources.selected');
    // Route::post('/resources', [\App\Http\Controllers\ResourceController::class, 'store'])->name('resources.store');
    // Route::get('/snippet/{resource}', [ResourceController::class, 'snippet'])->name('snippet.show');

    Route::prefix('articles')->as('articles.')->group(function() {
        Route::get('', [ArticleController::class, 'index'])->name('index');
        // Route::get('/create', [ArticleController::class, 'create'])->name('create');
        // Route::get('/update/{article}', [ArticleController::class, 'create'])->name('create');
    });

    Route::prefix('snippets')->as('snippets.')->group(function() {
        Route::get('', [SnippetController::class, 'index'])->name('index');
    });

    Route::prefix('blogs')->as('blogs.')->group(function() {
        Route::get('', [BlogController::class, 'index'])->name('index');
    });

    Route::prefix('packages')->as('packages.')->group(function() {
        Route::get('', [PackageController::class, 'index'])->name('index');
    });

    Route::prefix('videos')->as('videos.')->group(function() {
        Route::get('', [VideoController::class, 'index'])->name('index');
    });

    Route::prefix('books')->as('books.')->group(function() {
        Route::get('', [BookController::class, 'index'])->name('index');
    });
});
