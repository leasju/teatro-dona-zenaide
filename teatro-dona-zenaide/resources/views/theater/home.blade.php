{{-- Puxando o layout --}}
@extends('layouts.layout')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')
    
    {{-- * Hero Section * --}}
    <div id="hero-section">
        <div class="container-fluid">
            <div class="row">

                {{-- Conteúdo do Hero --}}
                <div class="hero-content col-md-12">
                    <div class="hero-text">
                        <h1 class="tnr-bold tnr-title-size tnr-title-size--lg">TEATRO DONA <br>ZENAIDE</h1>
                        <p class="roboto-regular">Entre no palco da imaginação e deixe-se envolver pelas histórias que ganham vida sob os holofotes. Bem-vindo ao nosso universo teatral, onde cada cena é uma jornada única e emocionante. Descubra conosco a magia das artes cênicas e embarque em uma experiência que transcende o tempo e o espaço. O espetáculo está prestes a começar. Você está pronto para ser parte dessa história?</p>
                    </div>

                    {{-- Botão de Ver Peças --}}
                    <a class="main-btn main-btn--hero" href="#pecas">
                        <span>VER PEÇAS</span>
                        <span class="ri--arrow-down-s-line"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- * Cards Section * --}}
    <div id="pecas" class="hidden-element">
        <div class="container-fluid">

                {{-- Title: Em Cartaz --}}
                <h2 class="tnr-bold tnr-title-size">EM CARTAZ</h2>

                {{-- Espetáculos --}}
                <div class="cards d-flex justify-content-center row">
                    
                    {{-- Verifica se há pelo menos um espetáculo visível --}}
                    @php
                        $espetaculosVisiveis = $espetaculos->filter(function($espetaculo) {
                            return $espetaculo->oculto === 0;
                        });
                    @endphp

                    {{-- Exibe a mensagem se não houver espetáculos visíveis ou cadastrados no Banco de Dados --}}
                    @if ($espetaculosVisiveis->isEmpty())
                        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{ Vite::asset('resources/img/tela-home/empty-state-img.png') }}" id="empty-state-img" class="img-fluid" alt="Empty State Image">
                            <h3 id="empty-state-title" class="roboto-medium">Não há espetáculos no momento</h3>
                            <p id="empty-state-text" class="roboto-light">Não há espetáculos agora, mas o próximo ato já está em preparação! Não perca por esperar as próximas novidades!</p>
                            <hr class="divider divider--empty">
                        </div>
                    @else
                        {{-- Foreach para cada espetáculo visível --}}
                        @foreach ($espetaculosVisiveis as $espetaculo)
                            <div class="card col-md-4 col-sm-12">
                                <img src="{{ asset('img/espetaculos/' . $espetaculo->imagemPrincipal->img) }}" class="card-img-top" alt="Imagem {{ $espetaculo->nomeEsp }}">
                                <div class="card-body">
                                    <p class="card-text roboto-regular">{{ $espetaculo->tempEsp }}</p>
                                    <hr class="divider divider--card">

                                    <h3 class="card-title">{{ $espetaculo->nomeEsp }}</h3>
                                    <a class="main-btn main-btn--card" href="{{ url('/espetaculos/' . $espetaculo->id) }}">
                                        <span class="fontisto--ticket"></span>
                                        <span>INGRESSOS</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>

        </div>
    </div>

    {{-- * About Us Section * --}}
    <div id="about-us-section" class="hidden-element">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">

                {{-- Imagem do Teatro --}}
                <img src="{{ Vite::asset('resources/img/tela-home/img-teatro.jpg') }}" class="col-lg-6 col-sm-12 img-fluid" alt="">

                {{-- Conteúdo do Sobre Nós --}}
                <div class="col-lg-6 col-sm-12 d-flex justify-content-center align-items-center">
                    <div id="about-us-content">
                        <h2 class="tnr-bold tnr-title-size">SEJA BEM VINDO AO TEATRO DONA ZENAIDE</h2>
                        <p class="roboto-light">Dê uma olhada em toda a estrutura de nosso local e fique a par de como as coisas funcionam por aqui!</p>
                        <a class="main-btn main-btn--about roboto-light" href="/sobre-nos">
                            <span>SAIBA MAIS SOBRE O TEATRO</span>
                            <span class="material-symbols-light--keyboard-double-arrow-right"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection