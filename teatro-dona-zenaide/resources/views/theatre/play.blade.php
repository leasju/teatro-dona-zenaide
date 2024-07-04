{{-- Puxando o layout --}}
@extends('layout')

{{-- Mudando o título da página dinâmicamente --}}
@section('view-title', 'Nome da Peça - Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')

    {{-- * Play Banner Section * --}}
    <div id="play-banner-section">
        <img src="{{ asset('/assets/img/img-banner.jpg') }}" class="img-fluid" alt="">
    </div>

    {{-- * Play Info Section * --}}
    <div id="play-info-section">
        <div class="container-fluid">

                {{-- Title: Nome da Peça Teatral --}}
                <h1 class="col-md-12 roboto-bold">GARFIELD - FORA DE CASA</h1>

                {{-- Informações da Peça Teatral --}}
                <div id="play-info" class="row">
                    <div class="col-md-3">
                        <h2 class="roboto-regular">TEMPORADA</h2>
                        <p class="roboto-regular">de 05/05/2024 a 23/07/2024</p>
                    </div>
    
                    <div class="col-md-3">
                        <h2 class="roboto-regular">DURAÇÃO</h2>
                        <p class="roboto-regular">90 minutos</p>
                    </div>
    
                    <div class="col-md-3">
                        <h2 class="roboto-regular">APRESENTAÇÕES</h2>
                        <p class="roboto-regular">Seg, Ter, Qua - 19:30h</p>
                    </div>
    
                    <div class="col-md-3">
                        <h2 class="roboto-regular">CLASSIFICAÇÃO</h2>
                        <p class="roboto-regular">Livre</p>
                    </div>
                </div>

                {{-- Sinopse da Peça Teatral --}}
                <div id="play-synopsis" class="col-md-12">
                    <hr class="divider divider--play">

                    <p class="roboto-regular">Garfield tem um reencontro inesperado com seu pai, que estava há muito tempo desaparecido - um gato de rua todo desengonçado que atrai o filho para um assalto de alto risco.</p>

                    <hr class="divider divider--play">
                </div>

                {{-- Botão para comprar o ingresso no Sympla --}}
                <button class="main-btn main-btn--play col-md-3">
                    <span>COMPRAR INGRESSO</span>
                    <span class="tabler--arrow-right"></span>
                </button>

                {{-- Aviso sobre a compra de ingressos --}}
                <p id="play-ticket-info" class="roboto-regular">(A compra dos ingressos é feita de modo terceirizado pelo site do Sympla)</p>

        </div>
    </div>

@endsection