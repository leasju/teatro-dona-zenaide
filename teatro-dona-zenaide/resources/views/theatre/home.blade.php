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
                    <button class="main-btn main-btn--hero">VER PEÇAS</button>
                </div>

            </div>
        </div>
    </div>

@endsection