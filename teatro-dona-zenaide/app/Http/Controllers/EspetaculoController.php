<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use App\Models\Espetaculo;
use App\Models\EspDia;
use App\Models\EspHorario;
use App\Models\EspImagem;


class EspetaculoController extends Controller {

    // * ------------------------------------------THEATER------------------------------------------

    // Carrega todos os espetáculos para a tela inicial
    public function showHomepage()
    {
        // Obtém todos os espetáculos disponíveis, incluindo a imagem principal
        $espetaculos = Espetaculo::with('imagemPrincipal')->get();
 
        // Retorna a view da página inicial com os espetáculos
        return view('theater.home', compact('espetaculos'));
    }

    // Carrega as imagens na tela do espetáculo
    public function show($id)
    {
        // Recupere o espetáculo e suas imagens (tanto principais quanto opcionais)
        $espetaculo = Espetaculo::with(['imagens' => function ($query) {
             // Carrega todas as imagens, tanto as principais quanto as opcionais
             $query->orderBy('principal', 'desc'); // Ordena para que as principais venham primeiro, se necessário
        }])->findOrFail($id);
 
        // Separar as imagens principais e opcionais
        $imagemPrincipal = $espetaculo->imagens->where('principal', true)->first();
        $imagensOpcionais = $espetaculo->imagens->where('principal', false);
 
        // Verifique se não há imagens opcionais, e se não houver, defina imagens padrão
        if ($imagensOpcionais->isEmpty()) {
            // Defina aqui as imagens padrão, se necessário
            $imagensOpcionais = collect([
                (object) ['img' => 'img-banner1.jpg'],
                (object) ['img' => 'img-banner2.jpg'],
                (object) ['img' => 'img-banner3.jpg'],
                (object) ['img' => 'img-banner4.jpg'],
                (object) ['img' => 'img-banner5.jpg'],
            ]);
        }
 
        // Retorna a view com os dados do espetáculo, imagem principal e imagens opcionais
        return view('theater.play_info', compact('espetaculo', 'imagemPrincipal', 'imagensOpcionais'));
    }

    // * -------------------------------------------ADMIN-------------------------------------------

    // INDEX: Mostrar todos os espetáculos
    public function index() : View
    {
        // Exibe todos os espetáculos para o administrador (inclusive os ocultos)
        $espetaculos = Espetaculo::all(); 

        // Retorna para a view '/admin/cards' e faz a paginação de 5 em 5 espetáculos por página
        return view('/admin/cards', [
            'espetaculos' => DB::table('espetaculos')->paginate(5)
        ]); 
    }

    // STORE: Salvar dados do Espetaculo
    public function store(Request $request)
    {
        
        // dd($request->all());        
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

            // Validação dos dias e horários
            // .* usado para permitir mais de um horário 
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
        ], [
            // Mensagens personalizadas
            'required' => 'Os dados preenchidos estão incorretos ou incompletos.',
            'image' => 'Por favor, envie apenas arquivos de imagem (.jpeg, .png, etc.).',
        ]);

        // Criação do espetáculo (somente os campos que pertencem ao Espetaculo)
        $espetaculo = Espetaculo::create($request->only([
            'nomeEsp',
            'tempEsp',
            'duracaoEsp',
            'classifEsp',
            'descEsp',
            'urlCompra',
            'roteiristaEsp',
            'elencoEsp',
            'direcaoEsp',
            'figurinoEsp',
            'cenoEsp',
            'luzEsp',
            'sonoEsp',
            'producaoEsp',
            'costEsp',
            'cenoAssistEsp',
            'cenoTec',
            'designEsp',
            'coProducaoEsp',
            'agradecimentos',
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
            // Obtém o arquivo da imagem
            $imagemPrincipal = $request->file('imagem_principal');

            // Define o caminho para onde a imagem será movida (public/img/espetaculos)
            $nomeImagemPrincipal = time() . '_' . $imagemPrincipal->getClientOriginalName();
            $imagemPrincipal->move(public_path('img/espetaculos'), $nomeImagemPrincipal);

            $imgPrincipal = EspImagem::create([
                'fk_id_esp' => $espetaculo->id,
                'img' => $nomeImagemPrincipal,
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
            $imagemOpcional = "imagemOpcional_" . $i; // Corrigido para "imagemOpcional"

            // Verifica se o arquivo foi enviado para este campo
            if ($request->hasFile($imagemOpcional)) {
                // Armazena a imagem no sistema de arquivos e obtém o caminho
                $imagem = $request->file($imagemOpcional);

                // Define o caminho para onde a imagem será movida (public/img/espetaculos)
                $nomeImagemOpcional = time() . '_' . $imagem->getClientOriginalName();
                $imagem->move(public_path('img/espetaculos'), $nomeImagemOpcional);

                // Cria o registro da imagem no banco de dados
                $imgOpcional = EspImagem::create([
                    'fk_id_esp' => $espetaculo->id,
                    'img' => $nomeImagemOpcional,
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

        // Retorna para a página "/admin/cards"
        return redirect('/admin/cards')->with('success', 'Dados salvos com sucesso!');

    } // Fim da função store

    // EDIT: Mostra o form para editar um espetáculo
    public function edit($id) 
    {
        // Busca o espetáculo pelo ID
        $espetaculo = Espetaculo::findOrFail($id);

        // Retorna o form para editar o espetáculo com os dados
        return view('/admin/cards_edit', compact('espetaculo'));
    }

    // UPDATE: Atualiza os dados do espetáculo
    public function update(Request $request)
    {
        
    }

    // DESTROY: Deletar um espetáculo
    public function destroy($id)
    {
        // Encontre as imagens associadas ao espetáculo na tabela 'imagens'
        $imagens = DB::table('imagens')->where('fk_id_esp', $id)->get();
    
        // Exclua os arquivos de imagem do sistema de arquivos
        foreach ($imagens as $imagem) {
            if (!empty($imagem->img)) { // Verifica se o caminho da imagem não está vazio
                $imagePath = public_path('img/espetaculos/' . $imagem->img);
                if (File::exists($imagePath)) {
                    File::delete($imagePath); // Exclui a imagem do sistema de arquivos
                }
            }
        }
    
        // Exclua os registros na tabela 'esp_img' que associam as imagens ao espetáculo
        DB::table('esp_img')->where('fk_id_esp', $id)->delete();
    
        // Exclua os registros na tabela 'imagens'
        DB::table('imagens')->where('fk_id_esp', $id)->delete();
    
        // Exclua os registros relacionados na tabela 'esp_dia_hora'
        DB::table('esp_dia_hora')->where('fk_id_esp', $id)->delete();
    
        // Agora você pode deletar o espetáculo
        $espetaculo = Espetaculo::findOrFail($id);
        $espetaculo->delete();
    
        return redirect('/admin/cards')->with('success', 'Espetáculo excluído com sucesso!');
    }
 
    // OCULTAR: Ocultar um espetáculo
    public function ocultar($id)
    {
        // Busca o espetáculo pelo ID
        $espetaculo = Espetaculo::findOrFail($id);
 
        // Alterna o estado de ocultação
        $espetaculo->oculto = !$espetaculo->oculto;
        $espetaculo->save(); // Salva a mudança no banco de dados
 
        // Retorna uma mensagem de sucesso
        $message = $espetaculo->oculto ? 'Espetáculo ocultado com sucesso!' : 'Espetáculo exibido com sucesso!';
        return redirect('/admin/cards')->with('success', $message);
    }

}