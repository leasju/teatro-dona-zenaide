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

        /*dd($request->all());*/
        
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

            // Validação dos dias e horários
            // .* usado para permitir mais de um horário 
            'hora.*' => 'required|array',
            'dia' => 'required|array',
            

            // (não-obrigatório) Ficha técnica 
            'costEsp' => 'nullable',
            'cenoAssistEsp' => 'nullable',
            'cenoTec' => 'nullable',
            'designEsp' => 'nullable',
            'coProducaoEsp' => 'nullable',
            'agradecimentos' => 'nullable',

            // Validação das imagens
            'imagem_principal' => 'required|image',
            'imagem_opcional_1' => 'nullable|image',
            'imagem_opcional_2' => 'nullable|image',
            'imagem_opcional_3' => 'nullable|image',
            'imagem_opcional_4' => 'nullable|image',
            'imagem_opcional_5' => 'nullable|image',
        ]);
        
    // Criação do espetáculo (somente os campos que pertencem ao Espetaculo)
    $espetaculo = Espetaculo::create([
        'nomeEsp' => $request->input('nomeEsp'),
        'tempEsp' => $request->input('tempEsp'),
        'duracaoEsp' => $request->input('duracaoEsp'),
        'classifEsp' => $request->input('classifEsp'),
        'descEsp' => $request->input('descEsp'),
        'urlCompra' => $request->input('urlCompra'),
        'roteiristaEsp' => $request->input('roteiristaEsp'),
        'elencoEsp' => $request->input('elencoEsp'),
        'direcaoEsp' => $request->input('direcaoEsp'),
        'figurinoEsp' => $request->input('figurinoEsp'),
        'cenoEsp' => $request->input('cenoEsp'),
        'luzEsp' => $request->input('luzEsp'),
        'sonoEsp' => $request->input('sonoEsp'),
        'producaoEsp' => $request->input('producaoEsp'),
        'costEsp' => $request->input('costEsp'),
        'cenoAssistEsp' => $request->input('cenoAssistEsp'),
        'cenoTec' => $request->input('cenoTec'),
        'designEsp' => $request->input('designEsp'),
        'coProducaoEsp' => $request->input('coProducaoEsp'),
        'agradecimentos' => $request->input('agradecimentos'),
    ]);

 
   // Criação dos dias e horários
   foreach ($request->input('days') as $dayIndex => $day) {
    // Cria o dia para o espetáculo
    $espDia = EspDia::create([
        'fk_id_esp' => $espetaculo->id,
        'dia' => $day,
    ]);

    // Para cada dia, cria os horários correspondentes
    if (isset($request->input("schedules")[$day])) {
        foreach ($request->input("schedules.$day") as $horario) {
            EspHorario::create([
                'fk_espetaculo_dia_id' => $espDia->id,
                'hora' => $horario,
            ]);
        }
    }
}

     // Salvando a imagem principal do espetáculo
     if ($request->hasFile('imagem_principal')) {
        $imagemPrincipal = $request->file('imagem_principal')->store('espetaculos', 'public');
        EspImagem::create([
            'fk_id_esp' => $espetaculo->id,
            'img' => $imagemPrincipal,
            'principal' => true,
        ]);
    }

    // SALVA IMAGEM OPCIONAL (não-obrigatória)


    // Salvando as imagens opcionais do espetáculo (caso existam)
    for ($i = 1; $i <= 5; $i++) {
        // Nomes fixos para os campos de imagens opcionais
        $imagemOpcional = "imagem_opcional_" . $i;

        // Verifica se o arquivo foi enviado para este campo
        if ($request->hasFile($imagemOpcional)) {
            // Armazena a imagem no sistema de arquivos e obtém o caminho
            $imagem = $request->file($imagemOpcional)->store('espetaculos', 'public');
            
            // Cria o registro da imagem no banco de dados
            EspImagem::create([
                'fk_id_esp' => $espetaculo->id,
                'img' => $imagem,
                'principal' => false,  // As imagens opcionais não são principais
            ]);
        }
    }

    return redirect('/sobre-nos')->with('success', 'Dados salvos com sucesso!');

    }
}
