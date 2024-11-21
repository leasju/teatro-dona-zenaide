<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'email' => 'required|email',  // O campo 'email' deve ser preenchido e ter um formato de e-mail válido
            'message' => 'required',  // O campo 'message' deve ser preenchido
        ]);

        // Prepara os detalhes do e-mail
        $details = [
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Envia o e-mail para o destinatário
        Mail::to('giovaniwhb@gmail.com')->send(new ContactMail($details));

        return redirect()->back()->with('success', 'Email enviado com sucesso!');
    }
}
