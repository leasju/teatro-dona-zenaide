{{-- Puxando o layout --}}
@extends('layouts.layout')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Sobre Nós - Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')

    {{-- * About Banner Section * --}}
    <div class="d-flex justify-content-center align-items-center" id="about-banner-section">
        <h1 class="tnr-bold tnr-title-size tnr-title-size--lg">SOBRE NÓS</h1>
    </div>

    {{-- * About Content Section * --}}
    <div id="about-content-section">
        <div class="container d-flex flex-column">

                {{-- Imagem do Teatro e Texto --}}
                <div class="row justify-content-between">

                    {{-- Imagem Teatro Antigo --}}
                    <div class="col-lg-5 col-sm-12 text-center about-content-margin-bottom">
                        <img src="{{ Vite::asset('resources/img/tela-about-us/img-teatro-antigo.png') }}" class="img-fluid" alt="">
                    </div>
    
                    {{-- Texto Teatro --}}
                    <div class="col-lg-5 col-sm-12">
                        <h2 class="roboto-bold">O TEATRO</h2>

                        <p class="roboto-regular"><span class="about-content-text-highlight">O Teatro Municipal de Jaguariúna</span>, carinhosamente chamado de <span class="about-content-text-highlight">Teatro Dona Zenaide</span>, é uma <span class="about-content-text-highlight">joia da arquitetura contemporânea</span> que se destaca no cenário cultural da cidade. Situado em um <span class="about-content-text-highlight">edifício histórico</span> que, por muitos anos, foi o <span class="about-content-text-highlight">cinema local</span>, o teatro passou por uma <span class="about-content-text-highlight">reforma completa</span> e foi reinaugurado em 2008. O <span class="about-content-text-highlight">projeto de revitalização</span> foi cuidadosamente pensado para transformar o espaço em um dos <span class="about-content-text-highlight">principais centros culturais</span> da região, atendendo aos <span class="about-content-text-highlight">eventos mais importantes</span> e valorizando a <span class="about-content-text-highlight">rica cultura de Jaguariúna</span>.</p>
                        
                        <p class="roboto-regular">Nomeado em homenagem à <span class="about-content-text-highlight">Dona Zenaide</span>, uma figura local de grande <span class="about-content-text-highlight">importância e dedicação à cultura</span>, nosso teatro carrega a missão de <span class="about-content-text-highlight">enriquecer a vida cultural da comunidade</span>. Com uma <span class="about-content-text-highlight">infraestrutura moderna</span> e uma <span class="about-content-text-highlight">capacidade acolhedora</span>, oferecemos uma <span class="about-content-text-highlight">experiência única</span> para artistas e público.</p>
                    </div>
                    
                </div>

                <hr class="divider divider--about">

                {{-- Continuação texto teatro --}}
                <div class="row justify-content-between">
    
                    {{-- Texto Continuação --}}
                    <div class="col-lg-5 col-sm-12 about-content-margin-bottom">

                    <p class="roboto-regular"><span class="about-content-text-highlight">Com seu ambiente acolhedor e versátil</span>, o <span class="about-content-text-highlight">Teatro Dona Zenaide</span> se tornou o <span class="about-content-text-highlight">palco ideal</span> para receber uma <span class="about-content-text-highlight">diversidade impressionante de atrações</span>. <span class="about-content-text-highlight">Artistas renomados</span>, tanto <span class="about-content-text-highlight">brasileiros quanto internacionais</span>, já passaram por seu palco, encantando o público com espetáculos que vão desde o <span class="about-content-text-highlight">teatro clássico</span> à <span class="about-content-text-highlight">música contemporânea</span>. O espaço também é dedicado a <span class="about-content-text-highlight">exposições de arte</span>, <span class="about-content-text-highlight">apresentações de coral</span>, <span class="about-content-text-highlight">espetáculos de dança</span>, <span class="about-content-text-highlight">palestras inspiradoras</span> e outros <span class="about-content-text-highlight">eventos que conectam a comunidade</span>.</p>
                        
                    <p class="roboto-regular">A <span class="about-content-text-highlight">atmosfera única</span> do teatro e a <span class="about-content-text-highlight">qualidade das atrações</span> fazem dele um <span class="about-content-text-highlight">ponto de visita imperdível</span> para quem deseja vivenciar o melhor da <span class="about-content-text-highlight">cultura local</span>. Seja para um <span class="about-content-text-highlight">passeio em família</span>, uma <span class="about-content-text-highlight">noite de cultura com amigos</span> ou um <span class="about-content-text-highlight">momento de apreciação artística</span>, o <span class="about-content-text-highlight">Teatro Dona Zenaide</span> é, sem dúvida, um convite para se <span class="about-content-text-highlight">encantar e mergulhar</span> na <span class="about-content-text-highlight">arte e história de Jaguariúna</span>.</p>
                    </div>

                    {{-- Imagem Teatro Atual --}}
                    <div class="col-lg-5 col-sm-12 text-center">
                        <img src="{{ Vite::asset('resources/img/tela-about-us/img-teatro-atual.png') }}" class="img-fluid" alt="">
                    </div>

                </div>

        </div>
    </div>

    {{-- * Technical Characteristics Section * --}}
    <div id="technical-characteristics-section" class="hidden-element">
        <div class="container">
            <div class="row">

                {{-- Title: Características Técnicas --}}
                <div class="technical-characteristics-title-div col-md-12 d-flex justify-content-center text-center">
                    <h1 class="tnr-bold tnr-title-size tnr-title-size--lg">Características Técnicas</h1>
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
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-mapa-de-lugares.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-5 col-sm-12 d-flex flex-column align-items-center">
                                <ul class="technical-characteristics-ul d-flex flex-column">
                                <li class="roboto-regular">Ambiente confortável e totalmente <span class="technical-characteristics-text-highlight">climatizado</span></li>
                                <li class="roboto-regular"><span class="technical-characteristics-text-highlight">Poltronas de couro</span> espaçosas e confortáveis</li>
                                <li class="roboto-regular">Excelente visibilidade de qualquer ponto da <span class="technical-characteristics-text-highlight">plateia</span></li>
                                <li class="roboto-regular">Capacidade máxima de <span class="technical-characteristics-text-highlight">375 pessoas</span></li>
                            </ul>
                         </div>
                    </div>
                </div>

                    {{-- Hall Conteúdo --}}
                    <div class="tab-pane fade" id="hall-tab-pane" role="tabpanel" aria-labelledby="hall-tab" tabindex="0">
                        <div class="row d-flex justify-content-center align-items-center row-gap-5">
                            <div class="col-lg-5 col-sm-12 text-center">
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-hall.jpg') }}" class="img-fluid" alt="">
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
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-palco.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-5 col-sm-12 d-flex flex-column align-items-center">
                                <ul class="technical-characteristics-ul d-flex flex-column">
                                    <li class="roboto-regular">Excelente estrutura para <span class="technical-characteristics-text-highlight">acolher todos</span> os espetáculos</li>
                                    <li class="roboto-regular">Dimensões do palco são de <span class="technical-characteristics-text-highlight">8,50m</span> por <span class="technical-characteristics-text-highlight">8,45m</span></li>
                                    <li class="roboto-regular">Dimensões do pró-cenio são de <span class="technical-characteristics-text-highlight">2,17m</span> por <span class="technical-characteristics-text-highlight">8,45m</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Equipamento de Luz Conteúdo --}}
                    <div class="tab-pane fade" id="equipamento-de-luz-tab-pane" role="tabpanel" aria-labelledby="equipamento-de-luz-tab" tabindex="0">
                        <div class="row d-flex justify-content-center align-items-center row-gap-5">
                            <div class="col-lg-5 col-sm-12 text-center">
                                <img src="{{ Vite::asset('resources/img/tela-about-us/img-equipamento-de-luz.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-5 col-sm-12 d-flex flex-column align-items-center">
                                <ul class="technical-characteristics-ul d-flex flex-column">
                                    <li class="roboto-regular">18 <span class="technical-characteristics-text-highlight">Varas de cenário</span></li>
                                    <li class="roboto-regular">4 Bambolinas</li>
                                    <li class="roboto-regular">5 <span class="technical-characteristics-text-highlight">Varas de luz</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection