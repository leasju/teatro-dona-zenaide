{{-- Puxando o layout --}}
@extends('layouts.layout_admin')

{{-- Importando o arquivo JS da Trash --}}
@section('trash-js')

    {{-- Importando o arquivo JS da Trash --}}
    @vite('resources/js/admin/trash.js')

@endsection

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Lixeira - Administrador')

{{-- Conteúdo da Navbar --}}
@section('navbar-content')

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex justify-content-end flex-grow-1">
            <li class="nav-item">
                <a class="nav-link roboto-regular" id="admin-indicator" aria-current="page" href="/admin/cards">Modo Administrador</a>
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

    {{-- * Modal (Delete and Restore) --}}

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

                {{-- Enviar a URL para o back-end contendo o filtro ativo no momento e a página da paginação --}}
                <input type="hidden" id="redirect-filter-delete" name="filter">
                <input type="hidden" id="redirect-page-delete" name="page">

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
                <span class="ic--baseline-restore modal-icon mb-3"></span>
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

                {{-- Enviar a URL para o back-end contendo o filtro ativo no momento e a página da paginação --}}
                <input type="hidden" id="redirect-filter-restore" name="filter">
                <input type="hidden" id="redirect-page-restore" name="page">

                <button type="submit" class="btn btn-confirm-action btn-confirm-action--restore">Restaurar</button>
            </form>

        </x-slot>

    </x-admin.modal>


    {{-- * Tabela de Cards/Peças --}}

    <div id="table-cards-area">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">

                <div id="table-cards-box" class="col-md-12">

                    {{-- Conteúdo do Topo da Tabela de Peças --}}
                    <div class="table-top-content d-flex justify-content-between align-items-center mb-5">
                        {{-- Título da Tabela --}}
                        <h1 class="roboto-regular">Exclua ou Restaure Peças Removidas</h1>

                        <!-- Botão de voltar para a tela de cards -->
                        <a href="/admin/cards?filtro={{ request()->get('filtro', 'todos') }}" class="main-btn main-btn--back">
                            <span class="lets-icons--back"></span>
                            <span class="roboto-regular">Voltar</span>
                        </a>
                    </div>

                    {{-- Tabela de Peças --}}
                    <table class="table table-striped table-bordered text-center align-middle">

                        {{-- Cabeçalho da Tabela de Peças --}}
                        <thead>
                            <tr>
                                <th scope="col" class="roboto-regular">Nome da Peça</th>
                                <th scope="col" class="roboto-regular">Data</th>
                                <th scope="col" class="roboto-regular">Ação</th>
                            </tr>
                        </thead>

                        {{-- Corpo da Tabela - Conteúdo dinâmico conforme as peças cadastradas no Banco de Dados --}}
                        <tbody>
                            @forelse($espetaculos as $espetaculo)
                                <tr>
                                    <td>{{ $espetaculo->nomeEsp }}</td>
                                    <td>{{ $espetaculo->tempEsp }}</td> 
                                    
                                    {{-- Botões de Ação (restaurar e excluir) --}}
                                    <td id="action-buttons">
                                        
                                        {{-- Botão de Restaurar Peça --}}
                                        <button class="action-buttons-style action-buttons-style--restore" data-bs-toggle="modal" data-bs-target="#restoreModal" data-espetaculo-id="{{ $espetaculo->id }}" data-espetaculo-name="{{ $espetaculo->nomeEsp }}">
                                            <span class="ic--baseline-restore"></span>
                                        </button>

                                        {{-- Botão de Excluir Peça --}}
                                        <button class="action-buttons-style" data-bs-toggle="modal" data-bs-target="#deleteModal" data-espetaculo-id="{{ $espetaculo->id }}" data-espetaculo-name="{{ $espetaculo->nomeEsp }}">
                                            <span class="ph--trash-bold"></span>
                                        </button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Nenhum espetáculo removido.</td>
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

    {{-- Toast de Sucesso --}}
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    destination: "http://127.0.0.1:8000/admin/cards",
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,

                    // Espaçamento do canto da tela
                    offset: {
                        y: 100
                    },

                    // Ícone
                    avatar: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24px' height='24px' viewBox='0 0 24 24'%3E%3Cpath fill='%23fff' d='M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59z'/%3E%3C/svg%3E",

                    // Classe
                    className: "toast-success",
                    onClick: function() {}
                }).showToast();
            });
        </script>
    @endif

@endsection