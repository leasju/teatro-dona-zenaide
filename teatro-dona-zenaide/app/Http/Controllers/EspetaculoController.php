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
            'tempEsp' => 'required',
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
            'coProduçãoEsp' => 'nullable',
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
        $imagemOpicional1 = $request->file('imagem_opcional_1')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpicional1,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_2')) {
        $imagemOpicional2 = $request->file('imagem_opcional_2')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpicional2,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_3')) {
        $imagemOpicional3 = $request->file('imagem_opcional_3')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpicional3,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_4')) {
        $imagemOpicional4 = $request->file('imagem_opcional_4')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpicional4,
            'principal' => false,
        ]);
    }

    if ($request->hasFile('imagem_opcional_5')) {
        $imagemOpicional5 = $request->file('imagem_opcional_5')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemOpicional5,
            'principal' => false,
        ]);
    }

    // SALVAR DIAS E HORÁRIOS
    foreach ($request->input('days') as $day) {
        // Cria o registro de dia no banco

        // $espetaculoDia = $espetaculo->days()->create([
        $espDia = $espetaculo->dias()->create([
            'dia' => $day, // Salva o dia (ex: Domingo, Segunda)
        ]);

        // Verifica se há horários para esse dia e os associa ao espetáculo
        if (isset($request->schedules[$day])) {
            foreach ($request->schedules[$day] as $schedule) {
                $espDia->horarios()->create([
                    'horario' => $schedule, // Salva o horário (ex: 14:00, 18:00)
                ]);
            }
        }
    }
        return redirect()->route('/sobre-nos');
    }
}
