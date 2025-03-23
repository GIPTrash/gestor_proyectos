<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Rutas públicas para registro y login
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

// Rutas protegidas mediante Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Rutas habituales de usuario (excluyendo 'store' ya que se usa 'register')
    Route::apiResource('users', UserController::class)->except(['store']);
    // Endpoints para la relación many-to-many
    Route::get('users/{user}/collaborative-projects', [UserController::class, 'getCollaborativeProjects']);
    Route::post('users/{user}/collaborative-projects', [UserController::class, 'addCollaborativeProject']);
    Route::delete('users/{user}/collaborative-projects/{project}', [UserController::class, 'removeCollaborativeProject']);
    
    Route::apiResource('projects', ProjectController::class);
    // Endpoints para la relación many-to-many
    Route::get('projects/{project}/collaborators', [ProjectController::class, 'getCollaborators']);
    Route::post('projects/{project}/collaborators', [ProjectController::class, 'addCollaborator']);
    Route::delete('projects/{project}/collaborators/{user}', [ProjectController::class, 'removeCollaborator']);
});