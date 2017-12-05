<?php

namespace tienda\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class UserMail7 extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $mes;
    public $telefono;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$title,$email,$mes,$telefono)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mes=$mes;
        $this->telefono = $telefono;
        $this->subject=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('tienda.prueba.contactos7')
                    ->subject($this->subject)
                    ->from($this->email);

        ;
    }
}
