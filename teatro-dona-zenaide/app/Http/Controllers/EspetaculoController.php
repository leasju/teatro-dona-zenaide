<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\Espetaculo;
use App\Models\EspDia;
use App\Models\EspHorario;
use App\Models\EspImagem;


class EspetaculoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            // Informações da peça 
            'nomeEsp' => 'required',
            'tempEsp' => 'required|date',
            'duracaoEsp' => 'required',
            'classifEsp' => 'required',
            'descEsp' => 'required',
            'urlCompra' => 'required|url',

            // (obrigatório) Ficha-técnica
            'roteiristaEsp' => 'required',
            'elencoEsp' => 'required',
            'direcaoEsp' => 'required',
            'figurinoEsp' => 'required',
            'cenoEsp' => 'required',
            'luzEsp' => 'required',
            'sonoEsp' => 'required',
            'producaoEsp' => 'required',

            // Classificados como 'array' para armazenarem mais de um dia e horário 
            'horario' => 'required',
            'dia' => 'required',
            'days' => 'required|array',
            'schedules' => 'required|array',

            // (não-obrigatório) Ficha técnica 
            'costEsp' => 'nullable',
            'cenoAssistEsp' => 'nullable',
            'cenoTec' => 'nullable',
            'designEsp' => 'nullable',
            'coProducaoEsp' => 'nullable',
            'agradecimentos' => 'nullable',

            // Imagens
            'imagem_principal' => 'required|image',
            'imagem_opcional_1' => 'nullable|image',
            'imagem_opcional_2' => 'nullable|image',
            'imagem_opcional_3' => 'nullable|image',
            'imagem_opcional_4' => 'nullable|image',
            'imagem_opcional_5' => 'nullable|image',
        ]);

        $espetaculo = Espetaculo::create($request->all());
   

        // SALVA IMAGEM PRINCIPAL (obrigatória)
    if ($request->hasFile('imagem_principal')) {
        $imagemPrincipal = $request->file('imagem_principal')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemPrincipal,
            'principal' => true,
        ]);
    }

    // SALVAR IMAGENS OPCIONAIS DO CARROSSEL (Banner)
    if ($request->hasFile('imagem_opcional_1')) {
        $imagemOpcional1 = $request->file('imagem_opcional_1')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional1,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_2')) {
        $imagemOpcional2 = $request->file('imagem_opcional_2')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional2,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_3')) {
        $imagemOpcional3 = $request->file('imagem_opcional_3')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional3,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_4')) {
        $imagemOpcional4 = $request->file('imagem_opcional_4')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional4,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_5')) {
        $imagemOpcional5 = $request->file('imagem_opcional_5')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional5,
            'principal' => false,
        ]);
    }

    foreach ($request->days as $index => $day) {
        $espetaculo->dias()->create([
            'dia' => $day,
            'horario' => $request->schedules[$index],
        ]);
    }
        
    
    return redirect('/sobre-nos');
    }
}
