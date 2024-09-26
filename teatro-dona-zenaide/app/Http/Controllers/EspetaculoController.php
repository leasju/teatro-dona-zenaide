<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Espetaculo;
use App\Models\EspDia;
use App\Models\EspHorario;
use App\Models\EspImagem;


class EspetaculoController extends Controller
{
    public function store(Request $request)
    {

        //dd($request->all());        
        \DB::enableQueryLog();

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
    $espetaculo = Espetaculo::create($request->only([
        'nomeEsp', 'tempEsp', 'duracaoEsp', 'classifEsp', 'descEsp', 'urlCompra',
        'roteiristaEsp', 'elencoEsp', 'direcaoEsp', 'figurinoEsp', 'cenoEsp',
        'luzEsp', 'sonoEsp', 'producaoEsp', 'costEsp', 'cenoAssistEsp', 'cenoTec', 'designEsp','coProducaoEsp','agradecimentos',
    ]));

 
   // Criação dos dias e horários
   foreach ($request->input('days') as $dayIndex => $day) {
    // Cria o dia para o espetáculo
    $espDia = EspDia::create([
        'fk_id_esp' => $espetaculo->id,
        'dia' => $day,
    ]);

    // Para cada dia, cria os horários correspondentes
    if (isset($request->input("schedules")[$dayIndex])) {
        foreach ($request->input("schedules.$dayIndex") as $hora) {
            EspHorario::create([
                'fk_id_dia' => $espDia->id,
                'hora' => $hora,
            ]);
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

   

}
        dd(\DB::getQueryLog());
         // Retorna para a página "sobre nós"
    return redirect('/sobre-nos')->with('success', 'Dados salvos com sucesso!');

    }
}