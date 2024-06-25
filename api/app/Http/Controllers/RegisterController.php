<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'Nombre_Completo' => 'required|string', 
            'Correo' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            DB::table('Usuarios')->insert([
                'Name_Complete' => $request->input('Nombre_Completo'),
                'Email' => $request->input('Correo'),
                'User' => $request->input('username'),
                'Password' => $request->input('password')
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Usuario registrado exitosamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de base de datos: ' . $e->getMessage(),
            ], 500);
        }
    }
}
