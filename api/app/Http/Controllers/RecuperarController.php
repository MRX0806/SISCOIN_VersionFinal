<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecoveryCodeMail;

class RecuperarController extends Controller
{
    public function solicitarRecuperacion(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $code = rand(100000, 999999); // Genera un código de 6 dígitos

        // Lógica para guardar el código en la base de datos con el email correspondiente (no mostrada aquí)

        Mail::to($request->email)->send(new RecoveryCodeMail($code));

        return response()->json(['message' => 'Correo de recuperación enviado.'], 200);
    }

    public function verificarCodigo(Request $request)
    {
        $request->validate(['codigo' => 'required']);
        $codigo = $request->input('codigo');

        $user = DB::table('Usuarios')->where('Recovery_Code', $codigo)->first();

        if ($user) {
            return response()->json(['status' => 'success', 'message' => 'Código verificado correctamente.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Código incorrecto.']);
        }
    }

    public function cambiarContraseña(Request $request)
    {
        $request->validate(['nueva_contraseña' => 'required|min:8']);
        $nuevaContraseña = $request->input('nueva_contraseña');

        $user = DB::table('Usuarios')->where('Recovery_Code', $request->header('Codigo'))->first();

        if ($user) {
            DB::table('Usuarios')->where('ID_User', $user->ID_User)->update([
                'Password' => $nuevaContraseña,
                'Recovery_Code' => null
            ]);

            return response()->json(['status' => 'success', 'message' => 'Contraseña cambiada correctamente.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Código incorrecto.']);
        }
    }
}
