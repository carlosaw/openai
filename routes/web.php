<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CopyController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/ingredientes', [HomeController::class, 'ingredientes']);
Route::post('/ingredientes', [HomeController::class, 'ingredientesAction'])->name('ingredientesAction');

Route::get('/copy', [CopyController::class, 'index']);
Route::post('/copy', [CopyController::class, 'copyAction'])->name('copyAction');
