<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('view-title')</title>

        {{-- Importando o arquivo JS com o Vite que contém os arquivos CSS e JS --}}
        @vite('resources/js/admin/admin.js')

        {{-- Icons - Iconify: Implementando os ícones no CSS e utilizando a tag <span> para mostrar os ícones --}}

        {{-- Fonte - Roboto --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

        {{-- CSS Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- Toastify CSS --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        {{-- Flatpickr CSS --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    </head>

    <body>
        
        {{-- * Header/Navbar * --}}

        <header>
            <nav class="navbar navbar-expand fixed-top">
                <div class="container-fluid">
                    
                    {{-- Logo do Teatro Dona Zenaide --}}
                    <a class="navbar-brand d-flex align-items-center" href="/">
                        <img src="{{ Vite::asset('resources/img/logo/logo-teatro-dona-zenaide.png') }}" class="img-fluid" alt="Logo Teatro Dona Zenaide">
                    </a>

                    {{-- Corpo da Navbar --}}
                    @yield('navbar-content')
                    
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

        {{-- JS Toastify --}}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        {{-- JS Flatpickr --}}
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    </body>
</html>
