<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Armazenamento de imagens
use App\Models\Espetaculos; 
use App\Models\Horarios;
use App\Models\Images;
use App\Models\Dias;
use App\Models\EspDiaHora;



class EspetaculosController extends Controller
{
    // Validar dos dados inseridos no formulário de criação de espetáculo
    public function store(Request $request)
    {
        
{
    // Valida os dados da solicitação
    $validatedData = $request->validate([
        'nomeEsp' => 'required|string|max:255',
        'tempEsp' => 'required|string|max:255',
        'duracaoEsp' => 'required|integer',
        'classifEsp' => 'required|string|max:255',
        'descEsp' => 'required|string',
        'urlCompra' => 'required|string',
        'roteiristaEsp' => 'required|string|max:255',
        'elencoEsp' => 'required|string',
        'direcaoEsp' => 'required|string|max:255',
        'figurinoEsp' => 'required|string|max:255',
        'cenoEsp' => 'required|string|max:255',
        'luzEsp' => 'required|string|max:255',
        'sonoEsp' => 'required|string|max:255',
        'producaoEsp' => 'required|string|max:255',
        'costEsp' => 'nullable|string|max:255',
        'cenoAssistEsp' => 'nullable|string|max:255',
        'cenoTec' => 'nullable|string|max:255',
        'designEsp' => 'nullable|string|max:255',
        'coProduçãoEsp' => 'nullable|string|max:255',
        'agradecimentos' => 'nullable|string',
        'image_id' => 'required|exists:images,id',
        'dia_id' => 'required|exists:dias,id',
        'horario_id' => 'required|exists:horarios,id',
    ]);

    // Cria uma nova instância de Espetaculo
    $espetaculo = new Espetaculos();
    $espetaculo->nomeEsp = $validatedData['nomeEsp'];
    $espetaculo->tempEsp = $validatedData['tempEsp'];
    $espetaculo->duracaoEsp = $validatedData['duracaoEsp'];
    $espetaculo->classifEsp = $validatedData['classifEsp'];
    $espetaculo->descEsp = $validatedData['descEsp'];
    $espetaculo->urlCompra = $validatedData['urlCompra'];
    $espetaculo->roteiristaEsp = $validatedData['roteiristaEsp'];
    $espetaculo->elencoEsp = $validatedData['elencoEsp'];
    $espetaculo->direcaoEsp = $validatedData['direcaoEsp'];
    $espetaculo->figurinoEsp = $validatedData['figurinoEsp'];
    $espetaculo->cenoEsp = $validatedData['cenoEsp'];
    $espetaculo->luzEsp = $validatedData['luzEsp'];
    $espetaculo->sonoEsp = $validatedData['sonoEsp'];
    $espetaculo->producaoEsp = $validatedData['producaoEsp'];
    $espetaculo->costEsp = $validatedData['costEsp'];
    $espetaculo->cenoAssistEsp = $validatedData['cenoAssistEsp'];
    $espetaculo->cenoTec = $validatedData['cenoTec'];
    $espetaculo->designEsp = $validatedData['designEsp'];
    $espetaculo->coProduçãoEsp = $validatedData['coProduçãoEsp'];
    $espetaculo->agradecimentos = $validatedData['agradecimentos'];
    $espetaculo->image_id = $validatedData['image_id'];

    // Salva a instância de Espetaculo
    $espetaculo->save();

    // Cria uma nova instância de EspetaculoImage
    $espetaculoImage = new Images();
    $espetaculoImage->esp_id = $espetaculo->id;
    $espetaculoImage->image_id = $validatedData['image_id'];
    $espetaculoImage->ordem = 1; // Ordem padrão
    $espetaculoImage->save();

    // Cria uma nova instância de EspDiaHora
    $espDiaHora = new EspDiaHora();
    $espDiaHora->esp_id = $espetaculo->id;
    $espDiaHora->dia_id = $validatedData['dia_id'];
    $espDiaHora->horario_id = $validatedData['horario_id'];
    $espDiaHora->save();

    // Retorna uma resposta de sucesso
    return response()->json(['message' => 'Espetáculo criado com sucesso'], 201);
}

        /* Armazenar a imagem da peça
        $imagePath = Storage::put('espetaculos', $request->imgCard);
        $espetaculo->images()->create(['path' => $imagePath]); // Relaciona a imagem com a peça

        // Inserir os horários
        foreach ($request->diasEsp as $dia) {
        $horario = new Horarios(); // Cria uma instância da classe Horarios
        $horario->piece_id = $espetaculo->id;
        $horario->save(); // Salva o horário

        $espetaculo = Espetaculos::create($request->all());

        // Salvar a imagem principal
        $bannerImage = $request->file('banner_image');
        $caminhoImagemPrincipal = $bannerImage->store('espetaculos/' . $espetaculo->id);
        $espetaculo->image_id = Images::create(['path' => $caminhoImagemPrincipal])->id;
        $espetaculo->save();
    
        // Salvar as imagens do carrossel (se houver)
        if ($request->hasFile('carImages')) {
            foreach ($request->file('car_images') as $image) {
               
            }
        }
    }

        return redirect()->route('/sobre-nos')->with('success', 'Peça cadastrada com sucesso!'); */
    }

    // INDEX
    public function index(){
        $indexCardsList = Espetaculos::all(); // Seleciona todos os "espetaculos" e armazena no array $indexCardsList
        return view('admin/cards', ['indexCardsList' => $indexCardsList]);
    }
}