<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'Nombre_Completo' => 'required|string|max:255',
            'Correo' => 'required|email|max:255|unique:Usuarios,Email',
            'username' => 'required|string|max:50|unique:Usuarios,User',
            'password' => 'required|string|min:8',
        ]);

        try {
            DB::table('Usuarios')->insert([
                'Name_Complete' => $request->input('Nombre_Completo'),
                'Email' => $request->input('Correo'),
                'User' => $request->input('username'),
                'Password' => Hash::make($request->input('password')), // Hash de la contraseña
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
