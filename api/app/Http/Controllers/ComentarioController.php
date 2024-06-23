<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    public function index($temaId)
    {
        $comentarios = Comentario::where('tema_id', $temaId)->get();
        return response()->json($comentarios)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                         ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tema_id' => 'required|integer',
            'comentario' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Datos incompletos o inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $comentario = new Comentario;
            $comentario->tema_id = $request->tema_id;
            $comentario->comentario = $request->comentario;
            $comentario->fecha = now();
            $comentario->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Comentario agregado exitosamente'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de base de datos: ' . $e->getMessage()
            ], 500);
        }
    }
}
