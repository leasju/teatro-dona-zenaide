<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    // Propriedade pública para armazenar os detalhes do e-mail
    public $details;

    /**
     * Cria uma nova instância do objeto ContactMail.
     *
     * @param  array  $details  Detalhes da mensagem de contato
     * @return void
     */
    public function __construct($details)
    {
        // Inicializa a propriedade 'details' com os detalhes fornecidos
        $this->details = $details;
    }

    /**
     * Constrói a mensagem de e-mail.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nova Mensagem de Contato') // Define o assunto do e-mail
                    ->view('emails.contact'); // Define a view que será utilizada para o corpo do e-mail
    }
}