<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\ResourceController::class, 'index'])->name('resources.index');
    Route::get('/resources/create', [\App\Http\Controllers\ResourceController::class, 'create'])->name('resources.create');
    Route::get('/resources/{resource}', [\App\Http\Controllers\ResourceController::class, 'edit'])->name('resources.edit');
    Route::patch('/resources/{resource}', [\App\Http\Controllers\ResourceController::class, 'update'])->name('resources.update');
    Route::get('/{key}', [\App\Http\Controllers\ResourceController::class, 'selectedResource'])->name('resources.selected');
    Route::post('/resources', [\App\Http\Controllers\ResourceController::class, 'store'])->name('resources.store');
});
