<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\Espetaculo;


class EspetaculoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nomeEsp' => 'required',
            'tempEsp' => 'required',
            'duracaoEsp' => 'required',
            'classifEsp' => 'required',
            'descEsp' => 'required',
            'urlCompra' => 'required|url',
            'roteiristaEsp' => 'required',
            'elencoEsp' => 'required',
            'direcaoEsp' => 'required',
            'figurinoEsp' => 'required',
            'cenoEsp' => 'required',
            'luzEsp' => 'required',
            'sonoEsp' => 'required',
            'producaoEsp' => 'required',

            'days' => 'required|array',
            'schedules' => 'required|array',

            // Ficha técnica (não-obrigatória)
            'costEsp' => 'nullable',
            'cenoAssistEsp' => 'nullable',
            'cenoTec' => 'nullable',
            'designEsp' => 'nullable',
            'coProduçãoEsp' => 'nullable',
            'agradecimentos' => 'nullable',
            'imagem_principal' => 'required|image',
            'imagem_opcional_1' => 'nullable|image',
            'imagem_opcional_2' => 'nullable|image',
            'imagem_opcional_3' => 'nullable|image',
            'imagem_opcional_4' => 'nullable|image',
            'imagem_opcional_5' => 'nullable|image',
        ]);

        $espetaculo = Espetaculo::create($request->all());
   


        // Salvar imagem do card principal da peça
    if ($request->hasFile('imagem_principal')) {
        $imagemPrincipal = $request->file('imagem_principal')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemPrincipal,
            'principal' => true,
        ]);
    }

    // Salvar imagens opcionais do carrossel (Banner)
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

    // Salvar dias e horários
    foreach ($request->input('days') as $day) {
        // Cria o registro de dia no banco

        // $espetaculoDia = $espetaculo->days()->create([
        $espetaculoDia = $espetaculo->dias()->create([
            'dia' => $day, // Salva o dia (ex: Domingo, Segunda)
        ]);

        // Verifica se há horários para esse dia e os associa ao espetáculo
        if (isset($request->schedules[$day])) {
            foreach ($request->schedules[$day] as $schedule) {
                $espetaculoDia->horarios()->create([
                    'horario' => $schedule, // Salva o horário (ex: 14:00, 18:00)
                ]);
            }
        }
    }
        return redirect()->route('/sobre-nos');
    }
}
