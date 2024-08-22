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


                     {{-- Verificação e exibição dos erros de validação --}} 

                     @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif


                    {{-- Form Login --}}
                    <form action="/login" method="POST">
                        @csrf

                        {{-- Input de Email --}}
                        <h2 class="roboto-regular mb-3">E-mail</h2>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user" name="user" placeholder="nome@exemplo.com" required>
                            <label for="floatingInput">Insira seu e-mail</label>
                        </div>

                        {{-- Input de Senha --}}
                        <h2 class="roboto-regular mb-3">Senha</h2>
                        <div class="form-floating mb-5">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha" required>
                            <label for="floatingPassword">Insira sua senha</label>
                        </div>

                        {{-- Botão de Entrar --}}
                        <div class="d-flex justify-content-center">
                            <button class="main-btn" type="submit" name="submit">Entrar</button> 
                            {{--sugestao: adicionar botão "limpar"--}}
                            
                        </div>
                    </form>

                    {{-- Verificação e exibição de mensagem de sucesso --}} 
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Verificação e exibição dos erros de validação --}} 
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                    
                </div>

            </div>
        </div>
    </div>

    
@endsection