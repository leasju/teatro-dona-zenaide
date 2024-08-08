{{-- Puxando o layout --}}
@extends('layout')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Seu Projeto No Teatro - Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')

    {{-- * Your Theater Project Title Section * --}}
    <div class="d-flex justify-content-center" id="your-theater-project-title-section">
        {{-- Title: Seu Projeto No Teatro --}}
        <h1 class="tnr-bold tnr-title-size tnr-title-size--xlg text-center">SEU PROJETO NO TEATRO</h1>
    </div>

    {{-- * Call To Action Banner Section * --}}
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

    {{-- * Hold Your Event Section * --}}
    <div id="hold-your-event-section">
        <div class="container">
            <div class="row">

                {{-- Introdução de Faça Seu Evento --}}
                <div class="hold-your-event-introduction col-md-12 d-flex flex-column">
                    {{-- Title: Faça Seu Evento --}}
                    <h1 class="tnr-bold tnr-title-size tnr-title-size--lg">FAÇA SEU EVENTO</h1>

                    {{-- Subtitle: Torne o evento da sua empresa um grande espetáculo! --}}
                    <h2 class="roboto-regular">Torne o evento da sua empresa um grande espetáculo!</h2>

                    {{-- Parágrado introdutório --}}
                    <p class="roboto-regular">O Teatro Dona Zenaide oferece seu espaço para a realização de eventos escolares, sociais e corporativos.</p>
                </div>

                {{-- Lista de Eventos Recebidos --}}
                <div class="hold-your-event-list col-md-6">
                    <h2 class="roboto-regular">Eventos recebidos:</h2>

                    <ul class="d-flex flex-column hold-your-event-list-ul roboto-regular">
                        <li>Apresentações de final de ano</li>
                        <li>Colações de grau</li>
                        <li>Confraternizações</li>
                        <li>Eventos de relacionamento</li>
                        <li>Palestras</li>
                        <li>Reuniões</li>
                        <li>Treinamentos</li>
                        <li>Sessões fechadas de teatro</li>
                    </ul>
                </div>

                {{-- Lista de Estrutura --}}
                <div class="hold-your-event-list col-md-6">
                    <h2 class="roboto-regular">Estrutura:</h2>

                    <ul class="d-flex flex-column hold-your-event-list-ul roboto-regular">
                        <li>300 lugares</li>
                        <li>Estrutura completa de som e luz</li>
                        <li>Acesso fácil por transporte público e estacionamento</li>
                        <li>Salas de apoio</li>
                        <li>Acessibilidade para deficientes</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

@endsection