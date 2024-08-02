{{-- Puxando o layout --}}
@extends('layout')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Sobre Nós - Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')

    {{-- * About Banner Section * --}}
    <div class="d-flex justify-content-center align-items-center" id="about-banner-section">
        <h1 class="tnr-bold tnr-title-size tnr-title-size--xlg">SOBRE NÓS</h1>
    </div>

    {{-- * About Content Section * --}}
    <div id="about-content-section">
        <div class="container d-flex flex-column">

                {{-- Imagem do Teatro e Texto --}}
                <div class="row justify-content-between">

                    {{-- Imagem Teatro --}}
                    <div class="col-lg-5 col-sm-12 text-center about-content-margin-bottom">
                        <img src="{{ Vite::asset('resources/img/tela-about-us/img-sobre-teatro.png') }}" class="img-fluid" alt="">
                    </div>
    
                    {{-- Texto Teatro --}}
                    <div class="col-lg-5 col-sm-12">
                        <h2 class="roboto-bold">O TEATRO</h2>

                        <p class="roboto-regular"><span class="about-content-text-highlight">Bem-vindos ao Teatro Dona Zenaide</span>, um verdadeiro <span class="about-content-text-highlight">marco cultural</span> situado no coração de <span class="about-content-text-highlight">Jaguariúna, São Paulo</span>. Inaugurado com o propósito de ser um espaço dedicado à <span class="about-content-text-highlight">arte e à cultura</span>, o nosso teatro tem sido um <span class="about-content-text-highlight">palco vibrante</span> para uma variedade de espetáculos que vão desde <span class="about-content-text-highlight">peças teatrais</span> a <span class="about-content-text-highlight">shows musicais</span>, passando por <span class="about-content-text-highlight">apresentações de dança</span> e <span class="about-content-text-highlight">eventos comunitários</span>.</p>
                        
                        <p class="roboto-regular">Nomeado em homenagem à <span class="about-content-text-highlight">Dona Zenaide</span>, uma figura local de grande <span class="about-content-text-highlight">importância e dedicação à cultura</span>, nosso teatro carrega a missão de <span class="about-content-text-highlight">enriquecer a vida cultural da comunidade</span>. Com uma <span class="about-content-text-highlight">infraestrutura moderna</span> e uma <span class="about-content-text-highlight">capacidade acolhedora</span>, oferecemos uma <span class="about-content-text-highlight">experiência única</span> para artistas e público.</p>
                    </div>
                    
                </div>

                <hr class="divider divider--about">

                {{-- Texto e Imagem da Dona Zenaide --}}
                <div class="row justify-content-between">
    
                    {{-- Texto Dona Zenaide --}}
                    <div class="col-lg-5 col-sm-12 about-content-margin-bottom">
                        <h2 class="roboto-bold">DONA ZENAIDE</h2>

                        <p class="roboto-regular"><span class="about-content-text-highlight">Dona Zenaide</span> foi uma figura <span class="about-content-text-highlight">emblemática de Jaguariúna</span>, cuja vida e trabalho deixaram um <span class="about-content-text-highlight">impacto duradouro</span> na comunidade. Conhecida por sua <span class="about-content-text-highlight">paixão pela arte e pela cultura</span>, Dona Zenaide dedicou grande parte de sua vida a <span class="about-content-text-highlight">promover atividades culturais</span> e a <span class="about-content-text-highlight">incentivar o talento local</span>. Seu amor pelo <span class="about-content-text-highlight">teatro e pela música</span> inspirou gerações e ajudou a moldar a <span class="about-content-text-highlight">identidade cultural da cidade</span>.</p>
                        
                        <p class="roboto-regular">A inauguração do <span class="about-content-text-highlight">Teatro Dona Zenaide</span> foi um <span class="about-content-text-highlight">tributo merecido</span> a essa notável mulher, reconhecendo sua <span class="about-content-text-highlight">contribuição inestimável</span> para a cultura local. Seu espírito vive em cada <span class="about-content-text-highlight">apresentação</span>, em cada <span class="about-content-text-highlight">nota musical</span> e em cada <span class="about-content-text-highlight">aplauso</span> que ecoa em nosso teatro. <span class="about-content-text-highlight">Dona Zenaide</span> é, sem dúvida, uma <span class="about-content-text-highlight">inspiração eterna</span> para todos nós, lembrando-nos diariamente da <span class="about-content-text-highlight">importância da arte</span> em nossas vidas.</p>
                    </div>

                    {{-- Imagem Dona Zenaide --}}
                    <div class="col-lg-5 col-sm-12 text-center">
                        <img src="{{ Vite::asset('resources/img/tela-about-us/img-sobre-zenaide.png') }}" class="img-fluid" alt="">
                    </div>

                </div>

        </div>
    </div>

    {{-- * Technical Characteristics Section * --}}
    <div id="technical-characteristics-section">
        <div class="container">
            <div class="row">

                {{-- Title: Características Técnicas --}}
                <div class="technical-characteristics-title-div col-md-12 d-flex justify-content-center text-center">
                    <h1 class="tnr-bold tnr-title-size tnr-title-size--xlg">Características Técnicas</h1>
                </div>

                {{-- Menu de Navegação com Conteúdo Dinâmico --}}
                <ul class="nav nav-tabs d-flex justify-content-center align-items-center col-md-12" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="mapa-de-lugares-tab" data-bs-toggle="tab" data-bs-target="#mapa-de-lugares-tab-pane" type="button" role="tab" aria-controls="mapa-de-lugares-tab-pane" aria-selected="true">Mapa de Lugares</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hall-tab" data-bs-toggle="tab" data-bs-target="#hall-tab-pane" type="button" role="tab" aria-controls="hall-tab-pane" aria-selected="false">Hall</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="palco-tab" data-bs-toggle="tab" data-bs-target="#palco-tab-pane" type="button" role="tab" aria-controls="palco-tab-pane" aria-selected="false">Palco</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="equipamento-de-luz-tab" data-bs-toggle="tab" data-bs-target="#equipamento-de-luz-tab-pane" type="button" role="tab" aria-controls="equipamento-de-luz-tab-pane" aria-selected="false">Equipamento de Luz</button>
                    </li>
                </ul>

                {{-- Conteúdo do Menu de Navegação Dinâmico --}}
                <div class="tab-content" id="myTabContent">

                    {{-- Mapa de Lugares Conteúdo --}}
                    <div class="tab-pane fade show active" id="mapa-de-lugares-tab-pane" role="tabpanel" aria-labelledby="mapa-de-lugares-tab" tabindex="0">
                        <div class="row d-flex justify-content-center align-items-center row-gap-5">
                            <div class="col-lg-5 col-sm-12 text-center">
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-mapa-de-lugares.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-5 col-sm-12 d-flex flex-column align-items-center">
                                <ul class="technical-characteristics-ul d-flex flex-column">
                                    <li class="roboto-regular">Excelente lugar para <span class="technical-characteristics-text-highlight">exposições</span></li>
                                    <li class="roboto-regular">Aconchegante, acolhedor, climatizado e <span class="technical-characteristics-text-highlight">encantador</span></li>
                                    <li class="roboto-regular">Capacidade de <span class="technical-characteristics-text-highlight">130 pessoas</span> em pé</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Hall Conteúdo --}}
                    <div class="tab-pane fade" id="hall-tab-pane" role="tabpanel" aria-labelledby="hall-tab" tabindex="0">
                        <div class="row d-flex justify-content-center align-items-center row-gap-5">
                            <div class="col-lg-5 col-sm-12 text-center">
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-hall.jpeg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-5 col-sm-12 d-flex flex-column align-items-center">
                                <ul class="technical-characteristics-ul d-flex flex-column">
                                    <li class="roboto-regular">Excelente lugar para <span class="technical-characteristics-text-highlight">exposições</span></li>
                                    <li class="roboto-regular">Aconchegante, acolhedor, climatizado e <span class="technical-characteristics-text-highlight">encantador</span></li>
                                    <li class="roboto-regular">Capacidade de <span class="technical-characteristics-text-highlight">130 pessoas</span> em pé</li>
                                    <li class="roboto-regular">Conta com uma iluminação calorosa e <span class="technical-characteristics-text-highlight">surpreendente</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Palco Conteúdo --}}
                    <div class="tab-pane fade" id="palco-tab-pane" role="tabpanel" aria-labelledby="palco-tab" tabindex="0">
                        <div class="row d-flex justify-content-center align-items-center row-gap-5">
                            <div class="col-lg-5 col-sm-12 text-center">
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-palco.jpeg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-5 col-sm-12 d-flex flex-column align-items-center">
                                <ul class="technical-characteristics-ul d-flex flex-column">
                                    <li class="roboto-regular">Excelente estrutura para <span class="technical-characteristics-text-highlight">acolher todos</span> os espetáculos</li>
                                    <li class="roboto-regular">Dimensões do palco são de <span class="technical-characteristics-text-highlight">1.54m²</span> por <span class="technical-characteristics-text-highlight">4,7m²</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Equipamento de Luz Conteúdo --}}
                    <div class="tab-pane fade" id="equipamento-de-luz-tab-pane" role="tabpanel" aria-labelledby="equipamento-de-luz-tab" tabindex="0">
                        <div class="row d-flex justify-content-center align-items-center row-gap-5">
                            <div class="col-lg-5 col-sm-12 text-center">
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-equipamento-de-luz.jpeg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-5 col-sm-12 d-flex flex-column align-items-center">
                                <ul class="technical-characteristics-ul d-flex flex-column">
                                    <li class="roboto-regular">01 <span class="technical-characteristics-text-highlight">mesa Element</span></li>
                                    <li class="roboto-regular">01 monitor 15"</li>
                                    <li class="roboto-regular">12 <span class="technical-characteristics-text-highlight">DIMMERBOX</span> de 12 canais com 2000w por canal</li>
                                    <li class="roboto-regular"><span class="technical-characteristics-text-highlight">5 varas</span> fixas no palco</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection