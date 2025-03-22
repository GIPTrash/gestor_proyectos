<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Rutas públicas para registro y login
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

// Rutas protegidas mediante Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Excluimos el método store, ya que se usa el endpoint de register
    Route::apiResource('users', UserController::class)->except(['store']);
    Route::apiResource('projects', ProjectController::class);
});
