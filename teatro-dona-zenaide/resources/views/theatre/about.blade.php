{{-- Puxando o layout --}}
@extends('layout')

{{-- Mudando o título da página dinâmicamente --}}
@section('view-title', 'Sobre Nós - Teatro Dona Zenaide')

{{-- Conteúdo da página --}}
@section('content')

    {{-- * About Banner Section * --}}
    <div id="about-banner-section">
        <img src="{{ asset('/assets/img/img-sobre-banner.jpg') }}" class="img-fluid" alt="">
    </div>

    {{-- * About Content Section * --}}
    <div id="about-content-section">
        <div class="container d-flex flex-column">

                {{-- Imagem do Teatro e Texto --}}
                <div class="row justify-content-between">

                    {{-- Imagem Teatro --}}
                    <div class="col-md-5">
                        <img src="{{ asset('/assets/img/img-sobre-teatro.png') }}" class="img-fluid" alt="">
                    </div>
    
                    {{-- Texto Teatro --}}
                    <div class="col-md-5">
                        <p class="roboto-regular"><span class="about-content-text-highlight">Bem-vindos ao Teatro Dona Zenaide</span>, um verdadeiro <span class="about-content-text-highlight">marco cultural</span> situado no coração de <span class="about-content-text-highlight">Jaguariúna, São Paulo</span>. Inaugurado com o propósito de ser um espaço dedicado à <span class="about-content-text-highlight">arte e à cultura</span>, o nosso teatro tem sido um <span class="about-content-text-highlight">palco vibrante</span> para uma variedade de espetáculos que vão desde <span class="about-content-text-highlight">peças teatrais</span> a <span class="about-content-text-highlight">shows musicais</span>, passando por <span class="about-content-text-highlight">apresentações de dança</span> e <span class="about-content-text-highlight">eventos comunitários</span>.</p>
                        
                        <p class="roboto-regular">Nomeado em homenagem à <span class="about-content-text-highlight">Dona Zenaide</span>, uma figura local de grande <span class="about-content-text-highlight">importância e dedicação à cultura</span>, nosso teatro carrega a missão de <span class="about-content-text-highlight">enriquecer a vida cultural da comunidade</span>. Com uma <span class="about-content-text-highlight">infraestrutura moderna</span> e uma <span class="about-content-text-highlight">capacidade acolhedora</span>, oferecemos uma <span class="about-content-text-highlight">experiência única</span> para artistas e público.</p>
                    </div>
                    
                </div>

                {{-- Texto e Imagem da Dona Zenaide --}}
                <div class="row justify-content-between">
    
                    {{-- Texto Dona Zenaide --}}
                    <div class="col-md-5">
                        <p class="roboto-regular"><span class="about-content-text-highlight">Dona Zenaide</span> foi uma figura <span class="about-content-text-highlight">emblemática de Jaguariúna</span>, cuja vida e trabalho deixaram um <span class="about-content-text-highlight">impacto duradouro</span> na comunidade. Conhecida por sua <span class="about-content-text-highlight">paixão pela arte e pela cultura</span>, Dona Zenaide dedicou grande parte de sua vida a <span class="about-content-text-highlight">promover atividades culturais</span> e a <span class="about-content-text-highlight">incentivar o talento local</span>. Seu amor pelo <span class="about-content-text-highlight">teatro e pela música</span> inspirou gerações e ajudou a moldar a <span class="about-content-text-highlight">identidade cultural da cidade</span>.</p>
                        
                        <p class="roboto-regular">A inauguração do <span class="about-content-text-highlight">Teatro Dona Zenaide</span> foi um <span class="about-content-text-highlight">tributo merecido</span> a essa notável mulher, reconhecendo sua <span class="about-content-text-highlight">contribuição inestimável</span> para a cultura local. Seu espírito vive em cada <span class="about-content-text-highlight">apresentação</span>, em cada <span class="about-content-text-highlight">nota musical</span> e em cada <span class="about-content-text-highlight">aplauso</span> que ecoa em nosso teatro. <span class="about-content-text-highlight">Dona Zenaide</span> é, sem dúvida, uma <span class="about-content-text-highlight">inspiração eterna</span> para todos nós, lembrando-nos diariamente da <span class="about-content-text-highlight">importância da arte</span> em nossas vidas.</p>
                    </div>

                    {{-- Imagem Dona Zenaide --}}
                    <div class="col-md-5">
                        <img src="{{ asset('/assets/img/img-sobre-zenaide.png') }}" class="img-fluid" alt="">
                    </div>

                </div>

        </div>
    </div>

@endsection