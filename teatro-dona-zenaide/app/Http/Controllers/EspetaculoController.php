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
            'imagem_opcional_1' => 'nullable|image',
            'imagem_opcional_2' => 'nullable|image',
            'imagem_opcional_3' => 'nullable|image',
            'imagem_opcional_4' => 'nullable|image',
            'imagem_opcional_5' => 'nullable|image',
        ]);

        $espetaculo = Espetaculo::create($request->all());
     

        // Salvar imagem principal
    if ($request->hasFile('imagem_principal')) {
        $imagemPrincipal = $request->file('imagem_principal')->store('espetaculos', 'public');
        $espetaculo->imagens()->create([
            'img' => $imagemPrincipal,
            'principal' => true,
        ]);
    }

    // Salvar imagens opcionais
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
