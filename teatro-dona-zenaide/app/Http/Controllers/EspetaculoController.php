<?php
namespace App\Http\Controllers;

use App\Models\Espetaculo;
use Illuminate\Http\Request;

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
            'costEsp' => 'required',
            'cenoAssistEsp' => 'required',
            'cenoTec' => 'required',
            'designEsp' => 'required',
            'coProduçãoEsp' => 'required',
            'agradecimentos' => 'required',
            'imagem_principal' => 'required|image',
            'imagens' => 'nullable|array',
            'imagens.*' => 'image',
        ]);

        $espetaculo = Espetaculo::create($request->all());

        // Salvar imagens
        if ($request->hasFile('imagem_principal')) {
            $espetaculo->imagens()->create([
                'imagem' => $request->file('imagem_principal')->store('espetaculos', 'public'),
                'principal' => true,
            ]);
        }

        if ($request->has('imagens')) {
            foreach ($request->file('imagens') as $imagem) {
                $espetaculo->imagens()->create([
                    'imagem' => $imagem->store('espetaculos', 'public'),
                ]);
            }
        }

        // Salvar dias e horários
        if ($request->has('dias')) {
            foreach ($request->input('dias') as $dia) {
                $espetaculoDia = $espetaculo->dias()->create([
                    'dia' => $dia,
                ]);

                if ($request->has('horarios')) {
                    foreach ($request->input('horarios') as $horario) {
                        $espetaculoDia->horarios()->create([
                            'horario' => $horario,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('espetaculos.index');
    }
}
