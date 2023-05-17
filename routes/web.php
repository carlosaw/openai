<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::post('/ingredientes', [HomeController::class, 'ingredientesAction'])->name('ingredientesAction');