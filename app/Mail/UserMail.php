<?php

namespace tienda\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $subjet;
    public $carrito;
    public $idpedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $subjet,$carrito,$idpedido)
    {
        $this->content = $content;
        $this->subjet = $subjet;
        $this->carrito = $carrito;
        $this->idpedido = $idpedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('tienda.prueba.contactos')
                    ->subject($this->subjet)
                    ->from('ventas@support.com');

        ;
    }
}
