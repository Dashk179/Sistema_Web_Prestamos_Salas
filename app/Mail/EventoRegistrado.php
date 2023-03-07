<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventoRegistrado extends Mailable
{
    use Queueable, SerializesModels;
public $fecha_entrada;
public $fecha_salida;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $fecha_inicio,$fecha_fin)
    {
     $this->fecha_entrada = $fecha_inicio;
     $this->fecha_salida  =  $fecha_fin;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Evento Registrado',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'correo.EventoRegistrado',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
