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
                    <form action="/login" method="POST">
                        @csrf

                        {{-- Input de Email --}}
                        <h2 class="roboto-regular mb-3">E-mail</h2>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user" name="user" placeholder="nome@exemplo.com" required>
                            <label for="user">Insira seu e-mail</label>

                          {{-- Mensagem de erro para o usuário --}}
@error('user')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

                        {{-- Input de Senha --}}
                        <h2 class="roboto-regular mb-3">Senha</h2>
                        <div class="form-floating mb-5">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha" required>
                            <label for="pass">Insira sua senha</label>

                            
{{-- Mensagem de erro para a senha --}}
@error('pass')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

                        {{-- Botão de Entrar --}}
                        <div class="d-flex justify-content-center">
                            <button class="main-btn" type="submit" name="submit">Entrar</button> 

                            
                        </div>
                    </form>

                    {{-- Verificação e exibição de mensagem de sucesso --}} 
                    
                    @if(session('success'))
                       <div class="alert alert-success">
                    {{ session('success') }} </div>
                    @endif

                    {{-- Verificação e exibição de mensagem de erro --}}
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    
                </div>

            </div>
        </div>
    </div>

    
@endsection