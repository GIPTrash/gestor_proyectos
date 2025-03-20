<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Rutas protegidas con autenticación mediante Sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    // Rutas para los usuarios utilizando apiResource
    Route::apiResource('users', UserController::class);

    // Rutas para los proyectos utilizando apiResource
    Route::apiResource('projects', ProjectController::class);
});
