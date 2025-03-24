<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Rutas protegidas con autenticación mediante Sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    // Rutas para los usuarios
    Route::get('/users', [UserController::class, 'index']);    
    Route::post('/users', [UserController::class, 'store']);    
    Route::get('/users/{id}', [UserController::class, 'show']);    
    Route::put('/users/{id}', [UserController::class, 'update']);    
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // Rutas para los proyectos
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::get('/projects/{id}', [ProjectController::class, 'show']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
});
