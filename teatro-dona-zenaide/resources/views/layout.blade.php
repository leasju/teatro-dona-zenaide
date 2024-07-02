<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('view-title')</title>

        {{-- CSS Nativo --}}
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" type="text/css">

        {{-- Fonte - Roboto --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        {{-- Icons - Iconify: Implementando os ícones no CSS e utilizando a tag <span> para mostrar os ícones --}}

        {{-- CSS Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- JS Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        
    </head>

    <body>
        
        {{-- * Header/Navbar * --}}
        
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
    
                    {{-- Título e Botão de Menu da Navbar (o botão aparece apenas em dimensões menores de tela) --}}
                    <a class="navbar-brand" href="#">Teatro Dona Zenaide</a> {{-- o Logo oficial será colocado aqui posteriormente --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    {{-- Offcanvas Navbar --}}
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
    
                        {{-- Título e o Botão de Fechar da Offcanvas (menu lateral) --}}
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Teatro Dona Zenaide</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        
                        {{-- Corpo da Navbar --}}
                        <div class="offcanvas-body">
                            <ul class="navbar-nav nav-pills d-flex justify-content-end flex-grow-1">
                                <li class="nav-item">
                                <a class="nav-link roboto-regular active" aria-current="page" href="#">HOME</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link roboto-regular" href="#">SOBRE NÓS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link roboto-regular" href="#">SEU PROJETO NO TEATRO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link roboto-regular" href="#">CONTATOS</a>
                                </li>
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

        <footer>
            <div id="footer-area">
                <div class="container-fluid">
                    <div class="row">

                        {{-- Logo do Teatro Dona Zenaide --}}
                        <div class="col-md-12">
                            <a class="logo-brand" href="#">Teatro Dona Zenaide</a> {{-- o Logo oficial será colocado aqui posteriormente --}}
                        </div>
        
                        {{-- Divider do footer --}}
                        <hr class="divider divider--footer">
    
                        {{-- Seção: Onde nos encontrar --}}
                        <div class="col-md-4">
                            <h2 class="tnr-bold tnr-title-size tnr-title-size--xsm">ONDE NOS ENCONTRAR</h2>
                            <div id="contact-icons" class="d-flex">
                                <span class="ic--baseline-whatsapp"></span>
                                <span class="mdi--instagram"></span>
                                <span class="ic--outline-email"></span>
                            </div>
                        </div>

                        {{-- Seção: Localização --}}
                        <div class="col-md-4">
                            <h2 class="tnr-bold tnr-title-size tnr-title-size--xsm">LOCALIZAÇÃO</h2>
                            <p class="roboto-regular p-footer">R. Alfredo Bueno, 1151 - Centro, <br>Jaguariúna - SP, 13820-000</p>
                        </div>
                        
                        {{-- Seção: Fale conosco --}}
                        <div class="col-md-4">
                            <h2 class="tnr-bold tnr-title-size tnr-title-size--xsm">FALE CONOSCO</h2>
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

                                    <button class="main-btn">ENVIAR MENSAGEM</button>
                                </form>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
