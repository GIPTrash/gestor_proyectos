<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rutas para los usuarios
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);    
    Route::post('/users', [UserController::class, 'store']);    
    Route::get('/users/{id}', [UserController::class, 'show']);    
    Route::put('/users/{id}', [UserController::class, 'update']);    
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});
