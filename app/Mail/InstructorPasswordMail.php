<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InstructorPasswordMail extends Mailable
{
    use SerializesModels;

    public $usuario;
    public $password;

    /**
     * Create a new message instance.
     */

    /**
     * Create a new message instance.
     */
    public function __construct($usuario, $password)
    {
        $this->usuario = $usuario;
        $this->password = $password;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenido a la plataforma'
        );
    }


    /**
     * Get the message content definition.
    
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function build()
    {
        return $this->view('emails.post-create') // Ruta de la vista
                    ->subject('Bienvenido a la plataforma') // Asunto del correo
                    ->with([
                        'nombre' => $this->usuario->nombre,
                        'password' => $this->password,
                    ]);
    }
}
