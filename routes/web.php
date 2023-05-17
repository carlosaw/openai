<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/ingredientes', [HomeController::class, 'ingredientes']);
Route::post('/ingredientes', [HomeController::class, 'ingredientesAction'])->name('ingredientesAction');

Route::get('/copy', [HomeController::class, 'copy']);
Route::post('/copy', [HomeController::class, 'copyAction'])->name('copyAction');
