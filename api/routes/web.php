<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/archivo/create', [ArchivoController::class, 'create']);
Route::post('/archivo/store', [ArchivoController::class, 'store']);
Route::post('/conversations', [ConversationController::class, 'store']);
Route::get('/conversations/{id}/messages', [MessageController::class, 'index']);
Route::post('/conversations/{id}/messages', [MessageController::class, 'store']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

