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
        Log::info('Entrando en el método solicitarRecuperacion');
        $data = $request->all();
        Log::info('Datos de la solicitud: ', $data);

        $codigoRecuperacion = rand(100000, 999999);
        Log::info('Código de recuperación generado: ' . $codigoRecuperacion);

        try {
            Mail::to($request->email)->send(new RecoveryCodeMail($codigoRecuperacion));
            Log::info('Correo de recuperación enviado a: ' . $request->email);
            return response()->json(['status' => 'success', 'message' => 'Código de recuperación enviado al correo.']);
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo de recuperación: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'No se pudo enviar el correo de recuperación.']);
        }
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
