<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

         // Prepara os detalhes do e-mail
         $details = [
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Envia o e-mail para o destinatário
        Mail::to('alanmoreiraduart@gmail.com')->send(new ContactMail($details));

        // Redireciona de volta para a página anterior com uma mensagem de sucesso
        return back()->with('success', 'Sua mensagem foi enviada com sucesso!');
    }
}
