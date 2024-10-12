<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('view-title')</title>

        {{-- Importando o arquivo JS com o Vite que contém os arquivos CSS e JS --}}
        @vite('resources/js/app.js')

        {{-- Icons - Iconify: Implementando os ícones no CSS e utilizando a tag <span> para mostrar os ícones --}}

        {{-- Fonte - Roboto --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        {{-- CSS Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>

    <body>
        
        {{-- * Header/Navbar * --}}
        
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
        
                    {{-- Logo do Teatro Dona Zenaide --}}
                    <a class="navbar-brand d-flex align-items-center" href="/">
                        <img src="{{ Vite::asset('resources/img/logo/logo-teatro-dona-zenaide.png') }}" class="img-fluid" alt="Logo Teatro Dona Zenaide">
                    </a>
                    
                    {{-- Theme Changer (Light/Dark) --}}
                    <label class="theme-container" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Aparência: Tema Claro" data-bs-delay='{"show":500,"hide":100}' data-bs-trigger="hover">
                        <input checked="checked" type="checkbox" id="chk">
                        <span class="heroicons--sun sun"></span>
                        <span class="ep--moon moon"></span>
                    </label>
        
                    {{-- Botão de Menu da Navbar (o botão aparece apenas em dimensões menores de tela) --}}
                    <button class="navbar-toggler navbar-menu-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    {{-- Offcanvas Navbar --}}
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
        
                        {{-- Logo e o Botão de Fechar da Offcanvas (menu lateral) --}}
                        <div class="offcanvas-header">
                            <a class="navbar-brand d-flex align-items-center" href="/">
                                <img src="{{ Vite::asset('resources/img/logo/logo-teatro-dona-zenaide.png') }}" class="img-fluid" alt="Logo Teatro Dona Zenaide">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        
                        {{-- Corpo da Navbar --}}
                        <div class="offcanvas-body">
                            <ul class="navbar-nav nav-pills d-flex justify-content-end flex-grow-1">
                                <li class="nav-item">
                                    {{-- request()->is('home') = se na url a requisição for home, inserir a classe active, se não, conteúdo em branco  --}}
                                    <a class="nav-link roboto-regular {{ request()->is('/') ? 'active' : ''}}" aria-current="page" href="/">HOME</a>
                                </li>

                                <hr class="divider divider--header">

                                <li class="nav-item">
                                    <a class="nav-link roboto-regular {{ request()->is('sobre-nos') ? 'active' : ''}}" href="/sobre-nos">SOBRE NÓS</a>
                                </li>

                                <hr class="divider divider--header">

                                <li class="nav-item">
                                    <a class="nav-link roboto-regular {{ request()->is('seu-projeto-no-teatro') ? 'active' : ''}}" href="/seu-projeto-no-teatro">SEU PROJETO NO TEATRO</a>
                                </li>

                                <hr class="divider divider--header">

                                <li class="nav-item">
                                    <a class="nav-link roboto-regular" id="contatos-link" href="#contatos">CONTATOS</a>
                                </li>

                                <hr class="divider divider--header">
                            </ul>
                        </div>
                    </div>
        
                </div>
            </nav>
        </header>

        {{-- * Content * --}}
        
        <main>
            @yield('content')
        </main>
        
        {{-- * Footer * --}}

        <footer id="contatos">
            <div id="footer-area">
                <div class="container-fluid">
                    <div class="row">

                        {{-- Logo do Teatro Dona Zenaide --}}
                        <div class="col-md-12">
                            <a class="navbar-brand d-flex align-items-center" href="/">
                                <img src="{{ Vite::asset('resources/img/logo/logo-teatro-dona-zenaide.png') }}" class="img-fluid" alt="Logo Teatro Dona Zenaide">
                            </a>
                        </div>
        
                        {{-- Divider do footer --}}
                        <hr class="divider divider--footer">
    
                        {{-- Seção: Onde nos encontrar --}}
                        <div class="col-md-4 col-sm-12 footer-section-center">
                            <h2 class="tnr-bold tnr-title-size tnr-title-size--sm">ONDE NOS ENCONTRAR</h2>
                            <div id="contact-icons" class="d-flex">
                                <a href="https://wa.me/551938375160"><span class="ic--baseline-whatsapp icon-effect-wobble whatsapp-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="(19) 3837-5160"></span></a>
                                <a href="https://www.instagram.com/teatrodejaguariunaoficial/"><span class="mdi--instagram icon-effect-wobble instagram-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="@teatrodejaguariunaoficial"></span></a>
                            </div>
                        </div>

                        {{-- Seção: Localização --}}
                        <div class="col-md-4 col-sm-12 footer-section-center">
                            <h2 class="tnr-bold tnr-title-size tnr-title-size--sm">LOCALIZAÇÃO</h2>
                            <p class="roboto-regular">R. Alfredo Bueno, 1151 - Centro, Jaguariúna - SP, 13820-000</p>
                        </div>
                        
                        {{-- Seção: Fale conosco --}}
                        <div class="col-md-4 col-sm-12 footer-section-text-center">
                            <h2 class="tnr-bold tnr-title-size tnr-title-size--sm">FALE CONOSCO</h2>
                            <div class="form-inputs">
                                <form action="">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="nome@exemplo.com">
                                        <label for="floatingInput">Email</label>
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Mensagem" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Mensagem</label>
                                    </div>

                                    <button class="main-btn main-btn--footer">
                                        <span>ENVIAR MENSAGEM</span>
                                        <span class="fluent--send-28-filled"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </footer>

        {{-- * Botão de Back to Top (voltar ao topo) --}}
        <button id="backToTop" class="back-to-top-btn d-flex align-items-center" title="Voltar ao topo">
            <span class="iconamoon--arrow-up-2"></span>
        </button>

        {{-- JS Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    </body>
</html>
