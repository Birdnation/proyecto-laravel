<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EstadoUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Mensaje de cambio de estado en sistema";
    public $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->usuario->status == 0) {
            return $this->view('emails.bloqueo');
        }else{
            return $this->view('emails.desbloqueo');
        }
    }
}
