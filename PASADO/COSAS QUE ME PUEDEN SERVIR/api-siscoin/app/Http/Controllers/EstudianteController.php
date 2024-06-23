<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function getNombresCompletos()
    {
        $estudiante = Estudiante::selectRaw('CONCAT(nombre, " ", apellido) AS nombre_completo')->get();
        return response()->json($estudiante)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                         ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
