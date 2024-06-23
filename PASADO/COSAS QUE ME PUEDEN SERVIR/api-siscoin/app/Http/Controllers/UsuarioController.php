<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios)
                         ->header('Access-Control-Allow-Origin', '*')
                         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                         ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Datos incompletos o inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $usuario = new Usuario;
            $usuario->nombre = $request->nombre;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Usuario registrado exitosamente'
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
        $usuario = Usuario::find($id);
        if ($usuario) {
            return response()->json($usuario);
        } else {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }
}
