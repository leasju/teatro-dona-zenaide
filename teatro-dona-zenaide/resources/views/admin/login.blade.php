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
                    <form action="/login">
                        {{-- Input de Email --}}
                        <h2 class="roboto-regular mb-3">E-mail</h2>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user" placeholder="nome@exemplo.com">
                            <label for="floatingInput">Insira seu e-mail</label>
                        </div>

                        {{-- Input de Senha --}}
                        <h2 class="roboto-regular mb-3">Senha</h2>
                        <div class="form-floating mb-5">
                            <input type="password" class="form-control" id="pass" placeholder="Senha">
                            <label for="floatingPassword">Insira sua senha</label>
                        </div>

                        {{-- Botão de Entrar --}}
                        <div class="d-flex justify-content-center">
                            <button class="main-btn" type="submit" name="submit">Entrar</button> 
                            {{--sugestao: adicionar botão "limpar"--}}
                            
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>
    </div>

    @isset($sucess)

<style>
  .toast{
      position: absolute;
      right: 20px;
      top:20px;
      background-color: rgba(255,255,255,0.96);
      animation: fade 1s forwards, fade 1s forwards; /*forwards termina a animação*/
      animation-delay: 0s, 3s;
      animation-direction:  normal, reverse;
  }

      @keyframes fade{
          from {opacity:0; user-select: none;
          to{opacity:1;}
      }
     
  }
</style>

<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      
      <strong class="me-auto">✅Sucesso</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Seu login foi efetuado com sucesso!
    </div>
  </div>




@endisset <!--fim isset-->
    

@endsection