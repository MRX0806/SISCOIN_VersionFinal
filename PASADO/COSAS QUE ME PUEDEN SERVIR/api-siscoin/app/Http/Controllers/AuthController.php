<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = $request->input('username');
        $pass = $request->input('password');

        try {
            $userRecord = DB::table('Usuarios')
                ->where('User', $user)
                ->where('Password', $pass)
                ->first();

            if ($userRecord) {
                Session::put('nombre_usuario', $user);

                return response()->json([
                    'status' => 'success',
                    'message' => "Inicio de sesión exitoso. Bienvenido, $user",
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error al iniciar sesión. Inténtelo nuevamente',
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de base de datos: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        Session::flush();
        return response()->json([
            'status' => 'success',
            'message' => 'Sesión cerrada exitosamente',
        ]);
    }
}
