<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $new_password = $request->input('password');

        try {
            // Verificar si el usuario existe en la base de datos
            $user = DB::table('Usuarios')->where('User', $username)->first();

            if ($user) {
                // El usuario existe, proceder a actualizar la contraseña
                DB::table('Usuarios')
                    ->where('User', $username)
                    ->update(['Password' => $new_password]); // Actualiza la contraseña directamente

                return response()->json([
                    'status' => 'success',
                    'message' => 'Contraseña actualizada exitosamente',
                ]);
            } else {
                // Usuario no encontrado en la base de datos
                return response()->json([
                    'status' => 'error',
                    'message' => 'Usuario no encontrado. Por favor, verifique el nombre de usuario e inténtelo nuevamente.',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

}
