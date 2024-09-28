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

        // dd($request->all());        
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
            /*'hora.*' => 'required|array',
            'dia.*' => 'required|array',*/

            'days' => 'required|array', 
            'schedules.*' => 'required|array',

            

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

 
// Loop dos dias 
foreach ($request->input('days') as $dayIndex => $day) {
    // Cria o registro do dia
    $dia = EspDia::create([
        'fk_id_esp' => $espetaculo->id,
        'dia' => $day, // Aqui armazenamos o dia
    ]);

    // Verifica se existem horários para o dia atual
    $schedules = $request->input("schedules.$day");

    // Se schedules não for um array, transforma em um array para evitar erros
    if (!is_array($schedules)) {
        $schedules = [$schedules]; // Coloca o valor único em um array
    }

    // Insere os horários
    foreach ($schedules as $hora) {
        // Verificação se 'hora' não é nulo ou vazio
        if (!empty($hora)) {
            // Cria o horário e armazena o ID do horário criado
            $horario = EspHorario::create([
                'fk_id_dia' => $dia->id,
                'hora' => $hora, // Aqui armazenamos o horário
            ]);

            // Inserir na tabela associativa esp_dia_hora para manter a relação
            DB::table('esp_dia_hora')->insert([
                'fk_id_esp' => $espetaculo->id,
                'fk_id_dia' => $dia->id,
                'fk_id_hora' => $horario->id, // ID do horário recém-criado
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            Log::warning("Horário nulo ou vazio no dia $day");  // Loga a situação de horário nulo
        }
        }
    }

    
     // Salvando a imagem principal do espetáculo
     if ($request->hasFile('imagem_principal')) {
        $imagemPrincipal = $request->file('imagem_principal')->store('espetaculos', 'public');
        $imgPrincipal = EspImagem::create([  // Armazenar o resultado da criação
            'fk_id_esp' => $espetaculo->id,
            'img' => $imagemPrincipal,
            'principal' => true,
        ]);

        // Inserir na tabela associativa esp_img para manter a relação com o espetáculo
        DB::table('esp_img')->insert([
            'fk_id_esp' => $espetaculo->id,
            'fk_id_img' => $imgPrincipal->id,
            'created_at' => now(),
            'updated_at' => now(),
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
                    $imgOpcional = EspImagem::create([
                        'fk_id_esp' => $espetaculo->id,
                        'img' => $imagem,
                        'principal' => false,  // As imagens opcionais não são principais
                    ]);
    
                    // Inserir na tabela associativa esp_img para manter a relação
                    DB::table('esp_img')->insert([
                        'fk_id_esp' => $espetaculo->id,
                        'fk_id_img' => $imgOpcional->id, // ID da imagem opcional
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
    
        // Retorna para a página "sobre nós"
        return redirect('/sobre-nos')->with('success', 'Dados salvos com sucesso!');
   
        } // Fim da funcão store

        public function index()
        {
            $espetaculos = Espetaculo::all(); // Pega todos os espetáculos
            return view('/admin/cards', compact('espetaculos')); // Substitua 'sua_view' pelo nome da sua view
        } 
 
    }

