<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $codigoRecuperacion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($codigoRecuperacion)
    {
        $this->codigoRecuperacion = $codigoRecuperacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recoveryCode')
                    ->with('codigoRecuperacion', $this->codigoRecuperacion);
    }
}
