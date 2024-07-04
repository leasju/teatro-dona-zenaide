{{-- Puxando o layout --}}
@extends('layout')

{{-- Mudando o título da página dinâmicamente --}}
@section('view-title', 'Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')
    
    {{-- * Hero Section * --}}
    <div id="hero-section">
        <div class="container-fluid">
            <div class="row">

                <div class="hero-content col-md-12">
                    <div class="hero-text">
                        <h1 class="tnr-bold tnr-title-size tnr-title-size--xlg">TEATRO DONA ZENAIDE</h1>
                        <p class="roboto-regular">Entre no palco da imaginação e deixe-se envolver pelas histórias que ganham vida sob os holofotes. Bem-vindo ao nosso universo teatral, onde cada cena é uma jornada única e emocionante. Descubra conosco a magia das artes cênicas e embarque em uma experiência que transcende o tempo e o espaço. O espetáculo está prestes a começar. Você está pronto para ser parte dessa história?</p>
                    </div>
                    <button class="main-btn main-btn--hero">
                        <span>VER PEÇAS</span>
                        <span class="ri--arrow-down-s-line"></span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- * Cards Section * --}}
    <div id="cards-section">
        <div class="container-fluid">

                {{-- Title: Em Cartaz --}}
                <h2 class="tnr-bold tnr-title-size tnr-title-size--lg">EM CARTAZ</h2>

                {{-- Cards: Posteriormente, com o Banco de Dados, englobar os cards em um forelse de acordo com os dados vindos --}}
                <div class="cards d-flex justify-content-center row">
                    
                    {{-- Forelse aqui dentro, para cada peça no BD, mais um card --}}
                    <div class="card col-md-4"">
                        <img src="{{ asset('/assets/img/img-card.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            {{-- Data do Card e Divider --}}
                            <p class="card-text roboto-regular">SAB, 31 DE MAR - 13:00</p>
                            <hr class="divider divider--card">

                            {{-- Título e Botão --}}
                            <h3 class="card-title">Lorem Ipsum</h3>
                            <button class="main-btn main-btn--card">
                                <span class="fontisto--ticket"></span>
                                <span>INGRESSOS</span>                                
                            </button>
                        </div>
                    </div>
                    
                </div>

        </div>
    </div>

    {{-- * About Us Section * --}}
    <div id="about-us-section">
        <div class="container-fluid">
            <div class="row">

                {{-- Imagem do Teatro --}}
                <img src="{{ asset('/assets/img/img-teatro.jpg') }}" class="col-md-6 col-sm-12 img-fluid" alt="">

                {{-- Conteúdo do Sobre Nós --}}
                <div class="col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                    <div id="about-us-content">
                        <h2 class="tnr-bold tnr-title-size tnr-title-size--lg">SEJA BEM VINDO AO TEATRO DONA ZENAIDE</h2>
                        <p class="roboto-light">Dê uma olhada em toda a estrutura de nosso local e fique a par de como as coisas funcionam por aqui!</p>
                        <button class="main-btn main-btn--about roboto-light">
                            <span>SAIBA MAIS SOBRE O TEATRO</span>
                            <span class="material-symbols-light--keyboard-double-arrow-right"></span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection