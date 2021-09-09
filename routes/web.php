<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\ResourceController::class, 'index'])->name('resources.index');
    Route::get('/resources/{resource}', [\App\Http\Controllers\ResourceController::class, 'edit'])->name('resources.edit');
    Route::patch('/resources/{resource}', [\App\Http\Controllers\ResourceController::class, 'update'])->name('resources.show');
});
