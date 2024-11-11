{{-- Puxando o layout --}}
@extends('layouts.layout')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', $espetaculo->nomeEsp . ' - Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')

{{-- * Play Slider Section * --}}
<div id="play-slider-section">
    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">

        {{-- Indicadores do Carousel --}}
        <div class="carousel-indicators">

            {{-- Se houver imagens opcionais chegando e não for apenas 1, mostrar os indicadores de slider, se não, não mostrar nada --}}
            @if(!$espetaculo->imagensOpcionais->isEmpty())
                @if($espetaculo->imagensOpcionais->count() <= 1)

                @else
                    {{-- Foreach para os indicadores do slider do espetáculo  --}}
                    @foreach($espetaculo->imagensOpcionais as $index => $imagem)
                        <button type="button" data-bs-target="#carouselImages" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                @endif
            @endif

        </div>

        {{-- Conteúdo do Carousel --}}
        <div class="carousel-inner">

            {{-- Foreach para as imagens do slider do espetáculo  --}}
            @foreach($espetaculo->imagensOpcionais as $index => $imagem)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('img/espetaculos/' . $imagem->img) }}" class="d-block w-100 c-img" alt="Imagem do espetáculo">
                </div>
            @endforeach

            {{-- Imagem padrão caso não haja imagens opcionais --}}
            @if($espetaculo->imagensOpcionais->isEmpty())
                <div class="carousel-item active">
                    <img src="{{ Vite::asset('resources/img/tela-play-info/img-banner.png') }}" class="d-block w-100 c-img" alt="Imagem padrão do espetáculo">
                </div>
            @endif

        </div>

        {{-- Se houver imagens opcionais chegando e não for apenas 1, mostrar os botões de anterior e próximo, se não, não mostrar nada  --}}
        @if(!$espetaculo->imagensOpcionais->isEmpty())
            @if($espetaculo->imagensOpcionais->count() <= 1)

            @else
                {{-- Botão de Voltar Slide --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>

                {{-- Botão de Próximo Slide --}}
                <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button> 
            @endif
        @endif

    </div>
</div>

{{-- * Play Info Section: o conteúdo será mudado dinâmicamente de acordo com os dados vindos do banco de dados * --}}
<div id="play-info-section">
    <div class="container-fluid">

        @php
        // Defina a ordem dos dias da semana
        $diasSemana = ['domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado'];

        // Ordene os dias do espetáculo conforme a ordem dos dias da semana
        $espetaculo->dias = $espetaculo->dias->sortBy(function($dia) use ($diasSemana) {
        return array_search(strtolower($dia->dia), $diasSemana);
        });
        @endphp

        {{-- Title: Nome da Peça Teatral --}}
        <h1 class="col-md-12 roboto-bold">{{ $espetaculo->nomeEsp }}</h1>

        {{-- Informações da Peça Teatral --}}
        <div id="play-info" class="row">
            <div class="col-lg-3 col-sm-6">
                <h2 class="roboto-regular">TEMPORADA</h2>
                <p class="roboto-regular">{{ $espetaculo->tempEsp }}</p>
            </div>

            <div class="col-lg-3 col-sm-6">
                <h2 class="roboto-regular">DURAÇÃO</h2>
                <p class="roboto-regular">{{ $espetaculo->duracaoEsp }} minutos</p>
            </div>

            <div class="col-lg-3 col-sm-6">
                <h2 class="roboto-regular">APRESENTAÇÕES</h2>
                @foreach($espetaculo->dias as $dia)
                @php
                // Ordene os horários do dia atual, do menor para o maior
                $dia->horarios = $dia->horarios->sortBy('hora');
                @endphp
                <p class="roboto-regular">
                    {{ $dia->dia }} -
                    @foreach ($dia->horarios as $horario)
                    {{ substr($horario->hora, 0, 5) }}h/
                    @endforeach
                </p>
                @endforeach
            </div>

            <div class="col-lg-3 col-sm-6">
                <h2 class="roboto-regular">CLASSIFICAÇÃO</h2>
                <p class="roboto-regular">
                    @switch($espetaculo->classifEsp)
                    @case("Livre")
                    Livre
                    @break
                    @case(1)
                    10 Anos
                    @break
                    @case(2)
                    12 Anos
                    @break
                    @case(3)
                    14 Anos
                    @break
                    @case(4)
                    16 Anos
                    @break
                    @case(5)
                    18 Anos
                    @break
                    @default
                    Não especificada
                    @endswitch
                </p>
            </div>
        </div>

        {{-- Sinopse da Peça Teatral --}}
        <div id="play-synopsis" class="col-md-12">
            <hr class="divider divider--play">

            <p class="roboto-regular">{{ $espetaculo->descEsp }}</p>

            <hr class="divider divider--play">
        </div>

        {{-- Botão para comprar o ingresso no Sympla --}}
        <a class="main-btn main-btn--play" href="{{ $espetaculo->urlCompra }}" target="_blank" rel="noopener noreferrer">
            <span>COMPRAR INGRESSO</span>
            <span class="tabler--arrow-right"></span>
        </a>

        {{-- Aviso sobre a compra de ingressos --}}
        <p id="play-ticket-info" class="roboto-regular">(A compra dos ingressos é feita de modo terceirizado pelo site do Sympla)</p>

    </div>
</div>

{{-- * Datasheet Section: o conteúdo será mudado dinâmicamente de acordo com os dados vindos do banco de dados * --}}
<div id="datasheet-section">
    <div class="container-fluid">
        <div class="row">

            {{-- Title: Ficha Técnica --}}
            <h1 class="tnr-bold tnr-title-size col-md-12">FICHA TÉCNICA</h1>

            {{-- Conteúdo da Ficha Técnica --}}

            {{-- Ficha Técnica --}}
            <div id="datasheet-content" class="col-md-12">

                {{-- Ficha Técnica (Obrigatórios) --}}

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Roteirista</h2>
                    <p class="roboto-regular">{{$espetaculo->roteiristaEsp}}</p>
                </div>

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Elenco</h2>
                    <p class="roboto-regular">{{$espetaculo->elencoEsp}}</p>
                </div>

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Direção</h2>
                    <p class="roboto-regular">{{$espetaculo->direcaoEsp}}</p>
                </div>

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Figurino</h2>
                    <p class="roboto-regular">{{$espetaculo->figurinoEsp}}</p>
                </div>

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Cenografia</h2>
                    <p class="roboto-regular">{{$espetaculo->cenoEsp}}</p>
                </div>

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Iluminação</h2>
                    <p class="roboto-regular">{{$espetaculo->luzEsp}}</p>
                </div>

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Sonorização</h2>
                    <p class="roboto-regular">{{$espetaculo->sonoEsp}}</p>
                </div>

                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Produção</h2>
                    <p class="roboto-regular">{{$espetaculo->producaoEsp}}</p>
                </div>

                {{-- Ficha Técnica (Opcionais) --}}

                @if($espetaculo->costEsp)
                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Costureira(s)</h2>
                    <p class="roboto-regular">{{ $espetaculo->costEsp }}</p>
                </div>
                @endif

                @if($espetaculo->cenoAssistEsp )
                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Assistente(s) de cenografia</h2>
                    <p class="roboto-regular">{{$espetaculo->cenoAssistEsp}}</p>
                </div>
                @endif

                @if($espetaculo->cenoTec)
                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Cenotécnico</h2>
                    <p class="roboto-regular">{{$espetaculo->cenoTec}}</p>
                </div>
                @endif

                @if($espetaculo->designEsp)
                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Consultoria de design</h2>
                    <p class="roboto-regular">{{$espetaculo->designEsp}}</p>
                </div>
                @endif

                @if($espetaculo->coProducaoEsp)
                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Co-Produção</h2>
                    <p class="roboto-regular">{{$espetaculo->coProducaoEsp}}</p>
                </div>
                @endif

                @if($espetaculo->agradecimentos)
                <div class="datasheet-item">
                    <h2 class="tnr-bold tnr-title-size tnr-title-size--md">Agradecimentos</h2>
                    <p class="roboto-regular">{{$espetaculo->agradecimentos}}</p>
                </div>
                @endif

            </div>

        </div>
    </div>
</div>

@endsection