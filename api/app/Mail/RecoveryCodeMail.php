<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RecoveryCodeMail extends Mailable
{
    public $codigoRecuperacion;

    public function __construct($codigoRecuperacion)
    {
        $this->codigoRecuperacion = $codigoRecuperacion;
    }

    public function build()
    {
        return $this->view('emails.recovery_code')
                    ->subject('Código de Seguridad')
                    ->with(['codigoRecuperacion' => $this->codigoRecuperacion]);
    }
}
