<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemaController extends Controller
{
    public function index()
    {
        $temas = Tema::all();
        return response()->json($temas)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                         ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Datos incompletos o inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $tema = new Tema;
            $tema->nombre = $request->nombre;
            $tema->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Tema agregado exitosamente'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de base de datos: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $tema = Tema::find($id);
        if ($tema) {
            return response()->json($tema);
        } else {
            return response()->json(['error' => 'Tema no encontrado'], 404);
        }
    }
}
