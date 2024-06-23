<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;

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
            $userRecord = DB::table('usuarios')
                ->where('User', $user)
                ->where('Password', $pass)
                ->first();

            if ($userRecord) {
                Session::put('user_id', $userRecord->ID_User);
                Session::put('nombre_usuario', $userRecord->Name_Complete);

                return response()->json([
                    'status' => 'success',
                    'user_id' => $userRecord->ID_User,
                    'nombre_usuario' => $userRecord->Name_Complete,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Usuario o contraseña incorrectos',
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de base de datos: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function verificarSesion()
    {
        if (Session::has('user_id')) {
            return response()->json([
                'status' => 'success',
                'nombre_usuario' => Session::get('nombre_usuario'),
                'user_id' => Session::get('user_id')
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No se ha iniciado sesión'
            ]);
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
