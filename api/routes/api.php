<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BusquedaController;
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
use App\Http\Controllers\RecuperarController;

// Opcional: Soporte OPTIONS para Preflight Requests
Route::options('{any}', function () {
    return response()->json([], 200)
                     ->header('Access-Control-Allow-Origin', '*')
                     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                     ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
})->where('any', '.*');



Route::post('register', [RegisterController::class, 'register']);



Route::post('/enviar-codigo', [RecuperarController::class, 'enviarCodigo'])->name('enviar.codigo');
Route::post('/verificar-codigo', [RecuperarController::class, 'verificarCodigo'])->name('verificar.codigo');


Route::post('/login', [AuthController::class, 'login']);
Route::get('/verificar-sesion', [AuthController::class, 'verificarSesion']);
Route::post('/logout', [AuthController::class, 'logout']);


// Asegúrate de que esta línea esté en tu archivo routes/api.php
Route::get('/perfil/{id}', [PerfilController::class, 'show']);


// Ruta para recuperar contraseña
Route::post('password/reset', [PasswordController::class, 'reset']);


// Rutas para comentarios
Route::get('temas/{id}/comentarios', [ComentarioController::class, 'index']);
Route::post('comentarios', [ComentarioController::class, 'store']);

// Rutas para temas
Route::apiResource('temas', TemaController::class);

// Rutas para estudiantes
Route::get('estudiantes/nombres-completos', [EstudianteController::class, 'getNombresCompletos']);

// Rutas para repositorios
Route::apiResource('repositorios', RepositorioController::class);

Route::get('/habilidades', [BusquedaController::class, 'getHabilidades']);
Route::get('/caracteristicas', [BusquedaController::class, 'getCaracteristicas']);



Route::get('/estudiantes', [BusquedaController::class, 'obtenerEstudiantes']);
Route::post('/estudiantes/filtrar', [BusquedaController::class, 'filtrarEstudiantes']);

Route::get('/api/habilidades', [BusquedaController::class, 'obtenerHabilidades']);
Route::get('/api/caracteristicas', [BusquedaController::class, 'obtenerCaracteristicas']);

Route::get('/api/estudiantes', [BusquedaController::class, 'cargarEstudiantes']);
Route::post('/api/estudiantes/filtrar', [BusquedaController::class, 'filtrarEstudiantes']);



