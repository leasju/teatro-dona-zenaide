{{-- Puxando o layout --}}
@extends('layouts.layout_admin')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Login - Administrador')

{{-- Conteúdo da página --}}
@section('content')

    <div id="login-area">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center vh-100">

                <div id="login-box" class="col-md-6">

                    {{-- Título de Login --}}
                    <h1 class="roboto-medium text-center mb-5">Login</h1>

                    {{-- Form Login --}}
                    <form action="">
                        {{-- Input de Email --}}
                        <h2 class="roboto-regular mb-3">Email</h2>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="nome@exemplo.com">
                            <label for="floatingInput">Email</label>
                        </div>

                        {{-- Input de Senha --}}
                        <h2 class="roboto-regular mb-3">Senha</h2>
                        <div class="form-floating mb-5">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Senha">
                            <label for="floatingPassword">Senha</label>
                        </div>

                        {{-- Botão de Entrar --}}
                        <div class="d-flex justify-content-center">
                            <button class="main-btn">Entrar</button>
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>
    </div>

@endsection