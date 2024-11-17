{{-- Puxando o layout --}}
@extends('layouts.layout_admin')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Peças - Administrador')

{{-- Conteúdo da Navbar --}}
@section('navbar-content')

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex justify-content-end flex-grow-1">
            <li class="nav-item">
                <a class="nav-link roboto-regular" id="admin-indicator" aria-current="page" href="#">Modo Administrador</a>
            </li>
            <li class="nav-item">
                {{-- Botão de Logout --}}
                <a class="nav-link roboto-regular d-flex align-items-center gap-1" id="logout-icon" aria-current="page" data-bs-title="Logout" href="/admin/logout">
                  Sair
                  <span class="material-symbols--logout"></span>
                </a>
            </li>
        </ul>
    </div>

@endsection

{{-- Conteúdo da página --}}
@section('content')

    {{-- * Modal (Delete) --}}

    {{-- * Delete Modal --}}
    <x-admin.modal modalclasswidth="" id="deleteModal" labelledby="deleteModalLabel" title="Deletar Peça">
    
        {{-- Conteúdo do Modal --}}
        <x-slot name="content">
            
            {{-- Texto de Confirmação da Ação --}}
            <div class="d-flex flex-column justify-content-center align-items-center">
                <span class="ph--trash-bold modal-icon mb-3"></span>
                <h2 class="roboto-medium">Deseja prosseguir com a exclusão?</h2>
            </div>

        </x-slot>

        {{-- Footer do Modal --}}
        <x-slot name="footer">

            {{-- Botões do Footer --}}
            <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Fechar</button>
            <form action="" method="POST" id="formModalDelete">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-confirm-action btn-confirm-action--delete">Excluir</button>
            </form>

        </x-slot>

    </x-admin.modal>

    {{-- * Restore Modal --}}
    <x-admin.modal modalclasswidth="" id="restoreModal" labelledby="restoreModalLabel" title="Restaurar Peça">
    
        {{-- Conteúdo do Modal --}}
        <x-slot name="content">
            
            {{-- Texto de Confirmação da Ação --}}
            <div class="d-flex flex-column justify-content-center align-items-center">
                <span class="ph--trash-bold modal-icon mb-3"></span>
                <h2 class="roboto-medium">Deseja prosseguir com a restauração?</h2>
            </div>

        </x-slot>

        {{-- Footer do Modal --}}
        <x-slot name="footer">

            {{-- Botões do Footer --}}
            <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Fechar</button>
            <form action="" method="POST" id="formModalRestore">
                @method('PUT')
                @csrf

                <button type="submit" class="btn btn-confirm-action btn-confirm-action--remove">Restaurar</button>
            </form>

        </x-slot>

    </x-admin.modal>


    {{-- * Tabela de Cards/Peças --}}

    <div id="table-cards-area">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center vh-100">

                <div id="table-cards-box" class="col-md-12">

                    {{-- Conteúdo do Topo da Tabela de Peças --}}
                    <div class="table-top-content d-flex justify-content-between align-items-center mb-5">
                        {{-- Título da Tabela --}}
                        <h1 class="roboto-regular">Lixeira (exclua ou restaure peças excluídas)</h1>

                        <!-- BOTÃO DE VOLTAR PARA A TELA DE CARDS -->
                        {{-- Botão ir para a lixeira --}}
                        <button class="main-btn main-btn--trash">
                            <a href="/admin/cards">Voltar</a>
                        </button>

                    </div>

                    {{-- Tabela de Peças --}}
                    <table class="table table-striped table-bordered text-center align-middle">
                        {{-- Cabeçalho da Tabela de Peças --}}
                        <thead>
                            <tr>
                                <th scope="col" class="roboto-regular">ID</th>
                                <th scope="col" class="roboto-regular">Nome da Peça</th>
                                <th scope="col" class="roboto-regular">Data</th>
                                <th scope="col" class="roboto-regular">Ação</th>
                            </tr>
                        </thead>

                        {{-- Corpo da Tabela - Conteúdo dinâmico conforme as peças cadastradas no Banco de Dados --}}
                        <tbody>
                            @forelse($espetaculos as $espetaculo)
                                <tr>
                                    <td>{{ $espetaculo->id }}</td>
                                    <td>{{ $espetaculo->nomeEsp }}</td>
                                    <td>{{ $espetaculo->tempEsp }}</td> 
                                    
                                    {{-- Botões de Ação (editar, excluir e alterar visibilidade) --}}
                                    <td id="action-buttons">
                                        
                                        {{-- Botão de Restaurar Peça --}}
                                        <button class="action-buttons-style" data-bs-toggle="modal" data-bs-target="#restoreModal" data-espetaculo-id="{{ $espetaculo->id }}" data-espetaculo-name="{{ $espetaculo->nomeEsp }}">
                                            <span class="ph--arrow-bold"></span>
                                        </button>

                                        {{-- Botão de Excluir Peça --}}
                                        <button class="action-buttons-style" data-bs-toggle="modal" data-bs-target="#deleteModal" data-espetaculo-id="{{ $espetaculo->id }}" data-espetaculo-name="{{ $espetaculo->nomeEsp }}">
                                            <span class="ph--trash-bold"></span>
                                        </button>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Nenhum espetáculo excluído.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                    {{-- Paginação dos Espetáculos --}}
                    {{ $espetaculos->links() }}

                </div>
            </div>
        </div>
    </div>

@endsection