<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cards;

class CardsController extends Controller
{

    public function cardsAdm(Request $request)
{

     // Validação da imagem anexada no forms e outros campos
     $request->validate([
        'evento' => 'required|string',
        'artista' => 'required|string',
        'data' => 'required|date',
        'local' => 'required|string',
        'hora' => 'required|date_format:H:i',
        'duracao' => 'required|numeric',
        'tempo' => 'required|string',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'desc' => 'required|string',
    ]);

        // Armazenamento da imagem
    if ($request->hasFile('img')) {
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
    }

     // Pega valores inseridos no forms de criação de cards e armazena nas variáveis de objeto "ocard"
    $ocard = new Cards(); // "Cards" é a classe

    $ocard->nome_evento = $request->evento;
    $ocard->artista_evento = $request->artista;
    $ocard->data_evento = $request->data;
    $ocard->local_evento = $request->local;
    $ocard->hora_evento = $request->hora;
    $ocard->duracao_evento = $request->duracao;
    $ocard->tempo_evento = $request->tempo;
    $ocard->img_evento = $imageName; //Salva o nome da imagem
    $ocard->desc_evento = $request->desc;

    $ocard->save(); // Salva no banco de dados

        return view('/cards/create_card', ["sucess"=>true]); // Retorna para a view do forms de criação de cards
    }


    // INDEX
    public function index(){

        // Seleciona todos os "cards" e armazena no array $indexCardsList
        $indexCardsList = Cards::all();

        // Retorna para a view da lista de cards ()
        return view('cards/cards_list', ['indexCardsList' => $indexCardsList]);
    }


    // CARDS MENU
    public function cardsMenu()
{
    // Seleciona todos os "cards" e armazena no array $menuCardsList
    $menuCardsList = cards::all();
    return view('cards/cards_menu', ['menuCardsList' => $menuCardsList]);
}
    
// BOTAO EXCLUIR LISTA 
    public function destroy($id) {

    // findOrFail - Procure esses dados no Banco de Dados, se não achar, de erro/falha 
    // Retornar o tipo do Banco de Dados
    $type = Type::findOrFail($id);

    // Excluir o tipo do Banco de Dados
    $type->delete();

    // Redirecionar para a página dos tipos
    return redirect('/types');

} // Fim do destroy


//BOTAO EDITAR LISTA
public function edit(Request $request) {

    // Verificar se o tipo existe
    // findOrFail - Procure esses dados no Banco de Dados, se não achar, de erro/falha 
    // Retornar o tipo do Banco de Dados
    $type = Type::findOrFail($request->id);

    // Se existir, alterar os dados
    // Atributos da classe Type
    $type->name = $request->name; // O atributo name da tabela Type é igual ao que veio da requisição com o nome de "name"
    $type->unit = $request->unit;
    $type->reference_value = $request->reference_value;
    $type->description = $request->description;

    // Editar os dados
    $type->save();

    // Redirecionar para a página dos tipos e ver se o editar funcionou
    return redirect('/types');

}
    
}