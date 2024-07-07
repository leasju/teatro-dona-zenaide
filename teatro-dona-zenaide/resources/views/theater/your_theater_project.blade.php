{{-- Puxando o layout --}}
@extends('layout')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Seu Projeto No Teatro - Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')

    {{-- * Your Theater Project Title Section * --}}
    <div class="d-flex justify-content-center" id="your-theater-project-title-section">
        {{-- Title: Seu Projeto No Teatro --}}
        <h1 class="tnr-bold tnr-title-size tnr-title-size--xlg">SEU PROJETO NO TEATRO</h1>
    </div>

    {{-- Call To Action Banner Section --}}
    <div class="d-flex align-items-center" id="call-to-action-banner-section">
        <div class="container">
            <div class="row d-flex justify-content-end">

                {{-- Call To Action Box --}}
                <div id="call-to-action-box" class="col-md-6 d-flex flex-column">

                    {{-- Title: Entre Em Cartaz --}}
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--lg">ENTRE EM CARTAZ</h2>

                    {{-- Parágrafo de introdução aos artistas --}}
                    <p class="roboto-regular">Venha conosco dar vida as suas ideias, tira-las do papel. No palco do Dona Zenaide tudo isso é possivel!</p>

                    {{-- Botão de Entre Em Contato --}}
                    <a class="main-btn main-btn--project" href="#">ENTRE EM CONTATO</a>
                    
                </div>

            </div>
        </div>
    </div>

@endsection