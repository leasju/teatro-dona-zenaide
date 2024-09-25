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

      /*  dd($request->all()); */
        $dataSaved = [];
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
        

    // Crie uma nova instância de Espetaculo
    $espetaculo = new Espetaculo();
        $espetaculo->nomeEsp = $request->input('nomeEsp');
        $espetaculo->tempEsp = $request->input('tempEsp');
        $espetaculo->duracaoEsp = $request->input('duracaoEsp');
        $espetaculo->classifEsp = $request->input('classifEsp');
        $espetaculo->descEsp = $request->input('descEsp');
        $espetaculo->urlCompra = $request->input('urlCompra');
        $espetaculo->roteiristaEsp = $request->input('roteiristaEsp');
        $espetaculo->elencoEsp = $request->input('elencoEsp');
        $espetaculo->direcaoEsp = $request->input('direcaoEsp');

        $espetaculo->figurinoEsp = $request->input('figurinoEsp');
        $espetaculo->cenoEsp = $request->input('cenoEsp');
        $espetaculo->luzEsp = $request->input('luzEsp');
        $espetaculo->sonoEsp = $request->input('sonoEsp');
        $espetaculo->producaoEsp = $request->input('producaoEsp');
        $espetaculo->costEsp = $request->input('costEsp');

        $espetaculo->cenoAssistEsp = $request->input('cenoAssistEsp');
        $espetaculo->cenoTec = $request->input('cenoTec');
        $espetaculo->designEsp = $request->input('designEsp');
        $espetaculo->coProducaoEsp = $request->input('coProducaoEsp');
        $espetaculo->agradecimentos = $request->input('agradecimentos');

        // Salve o Espetaculo
        $espetaculo->save();
        $dataSaved['espetaculo'] = $espetaculo->toArray();

    // Crie uma nova instância de EspDia para cada dia
    foreach ($request->input('days') as $index => $day) {
        $espDia = new EspDia();
        $espDia->fk_espetaculo_id = $espetaculo->id;
        $espDia->dia = $day;
        $espDia->save();
        $dataSaved['espDia'][] = $espDia->toArray();


        // Crie uma nova instância de EspHorario para cada horário
        $espHorario = new EspHorario();
        $espHorario->fk_espetaculo_dia_id = $espDia->id;
        $espHorario->hora_id = $request->input('schedules')[$index];
        $espHorario->save();
        $dataSaved['espHorario'][] = $espHorario->toArray();
    }

    // Crie uma nova instância de EspImagem para cada imagem principal
    if ($request->hasFile('imagem_principal')) {
        $imagemPrincipal = $request->file('imagem_principal')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemPrincipal,
            'principal' => true,
        ]);
        $dataSaved['imagem_principal'] = $espetaculo->imagens()->get()->toArray();
    }

    // SALVA IMAGEM OPCIONAL (não-obrigatória)

    $imagensOpcionais = [];

    if ($request->hasFile('imagem_opcional_1')) {
        $imagemOpcional1 = $request->file('imagem_opcional_1')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional1,
            'principal' => false,
        ]);
        $imagensOpcionais[] = $espetaculo->imagens()->get()->toArray();
    }

    // SALVA IMAGEM OPCIONAL (não-obrigatória)
    if ($request->hasFile('imagem_opcional_2')) {
        $imagemOpcional2 = $request->file('imagem_opcional_2')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional2,
            'principal' => false,
        ]);
        $imagensOpcionais[] = $espetaculo->imagens()->get()->toArray();
    }

    // SALVA IMAGEM OPCIONAL (não-obrigatória)
    if ($request->hasFile('imagem_opcional_3')) {
        $imagemOpcional3 = $request->file('imagem_opcional_3')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional3,
            'principal' => false,
        ]);
        $imagensOpcionais[] = $espetaculo->imagens()->get()->toArray();
    }

    // SALVA IMAGEM OPCIONAL (não-obrigatória)
    if ($request->hasFile('imagem_opcional_4')) {
        $imagemOpcional4 = $request->file('imagem_opcional_4')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional4,
            'principal' => false,
        ]);
        $imagensOpcionais[] = $espetaculo->imagens()->get()->toArray();
    }

    // SALVA IMAGEM OPCIONAL (não-obrigatória)
    if ($request->hasFile('imagem_opcional_5')) {
        $imagemOpcional5 = $request->file('imagem_opcional_5')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpcional5,
            'principal' => false,
        ]);
        $imagensOpcionais[] = $espetaculo->imagens()->get()->toArray();
    }

    return redirect('/sobre-nos')->with('success', 'Dados salvos com sucesso!');

    }
}
