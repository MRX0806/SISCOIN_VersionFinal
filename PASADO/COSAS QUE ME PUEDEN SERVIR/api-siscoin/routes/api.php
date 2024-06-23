<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RepositorioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FiltroController;

// Rutas para autenticación
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

// Ruta para recuperar contraseña
Route::post('password/reset', [PasswordController::class, 'reset']);

// Ruta para registro
Route::post('register', [RegisterController::class, 'register']);


// Rutas para usuarios
Route::apiResource('usuarios', UsuarioController::class);

// Rutas para comentarios
Route::get('temas/{id}/comentarios', [ComentarioController::class, 'index']);
Route::post('comentarios', [ComentarioController::class, 'store']);

// Rutas para temas
Route::apiResource('temas', TemaController::class);

// Rutas para estudiantes
Route::get('estudiantes/nombres-completos', [EstudianteController::class, 'getNombresCompletos']);



// Rutas para perfiles
Route::apiResource('perfiles', PerfilController::class);

// Rutas para repositorios
Route::apiResource('repositorios', RepositorioController::class);

// Opcional: Soporte OPTIONS para Preflight Requests
Route::options('{any}', function () {
    return response()->json([], 200)
                     ->header('Access-Control-Allow-Origin', '*')
                     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                     ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
})->where('any', '.*');

Route::get('habilidades', [FiltroController::class, 'getHabilidades']);
Route::get('caracteristicas', [FiltroController::class, 'getCaracteristicas']);
