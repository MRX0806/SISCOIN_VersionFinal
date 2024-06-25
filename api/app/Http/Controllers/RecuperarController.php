<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\RecoveryCodeMail;

class RecuperarController extends Controller
{
    private function generarCodigo($longitud = 8) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $codigo;
    }

    public function enviarCodigo(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');

        // Consultar si el correo electrónico existe en la base de datos
        $user = DB::table('usuarios')->where('Email', $email)->first();

        if ($user) {
            $codigoRecuperacion = $this->generarCodigo();
            DB::table('usuarios')->where('Email', $email)->update(['Recovery_Code' => $codigoRecuperacion]);
            Mail::to($email)->send(new RecoveryCodeMail($codigoRecuperacion));

            Session::put('email', $email);
            Session::flash('message', 'El código de recuperación ha sido enviado a tu correo electrónico.');
            Session::flash('message_type', 'success');
        } else {
            Session::flash('message', 'El correo electrónico ingresado no está registrado.');
            Session::flash('message_type', 'error');
        }

        return redirect()->back();
    }

    public function verificarCodigo(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string'
        ]);

        $codigoIngresado = $request->input('codigo');
        $email = Session::get('email');

        if ($email) {
            $user = DB::table('usuarios')->where('Email', $email)->where('Recovery_Code', $codigoIngresado)->first();

            if ($user) {
                $contrasenaActual = $user->Password;
                $mensaje = "Código ingresado: " . htmlspecialchars($codigoIngresado) . "\nContraseña recuperada: " . $contrasenaActual;

                echo '<script>
                        alert("' . $mensaje . '");
                        window.location = "/login";
                      </script>';
            } else {
                Session::flash('message', 'El código ingresado no es válido.');
                Session::flash('message_type', 'error');
            }
        } else {
            Session::flash('message', 'No se ha iniciado la recuperación de contraseña.');
            Session::flash('message_type', 'error');
        }

        return redirect()->back();
    }
}
