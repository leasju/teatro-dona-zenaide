<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('view-title')</title>

        {{-- Importando o arquivo JS com o Vite que contém os arquivos CSS e JS --}}
        @vite('resources/js/admin.js')

        {{-- Icons - Iconify: Implementando os ícones no CSS e utilizando a tag <span> para mostrar os ícones --}}

        {{-- Fonte - Roboto --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

        {{-- CSS Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>

    <body>
        
        {{-- * Header/Navbar * --}}

        <header>
            <nav class="navbar navbar-expand fixed-top">
                <div class="container-fluid">
                    
                    {{-- Logo do Teatro Dona Zenaide --}}
                    <a class="navbar-brand" href="/">Teatro Dona Zenaide</a>

                    {{-- Corpo da Navbar --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex justify-content-end flex-grow-1">
                            <li class="nav-item">
                                <a class="nav-link roboto-regular" id="admin-indicator" aria-current="page" href="#">Modo Administrador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link roboto-regular" id="logout-icon" aria-current="page" href="#"><span class="material-symbols--logout" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Logout"></span></a>
                            </li>
                        </ul>
                    </div>

                </div>
              </nav>
        </header>

        {{-- * Content * --}}
        
        <main>
            @yield('content')
        </main>

        {{-- JS Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    </body>
</html>
