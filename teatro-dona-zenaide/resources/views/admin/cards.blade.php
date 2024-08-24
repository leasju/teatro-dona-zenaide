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
                <a class="nav-link roboto-regular" id="logout-icon" aria-current="page" href="#"><span class="material-symbols--logout" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Logout"></span></a>
            </li>
        </ul>
    </div>

@endsection

{{-- Conteúdo da página --}}
@section('content')

    {{-- * Modal (New/Edit, Delete and Visibility) --}}
      
    {{-- New/Edit Modal --}}
    <x-admin.modal id="neweditModal" labelledby="neweditModalLabel" title="Adicionar Nova Peça">

        {{-- Conteúdo do Modal --}}
        <x-slot name="content">

            {{-- Form New/Edit --}}
            <form action="">
                
                @csrf

                {{-- Input de Nome da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Nome da Peça</label>
                    <input type="text" class="form-control" placeholder="Nome" value="" required>
                </div>

                {{-- Input de Imagem da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Imagem da Peça</label>
                    <input type="file" class="form-control" aria-label="Escolher arquivo" required>
                </div>

                {{-- Select de Dias de Apresentação da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Dias de Apresentação da Peça</label>
                    <h2 class="roboto-regular">Segure Ctrl (ou Cmd no Mac) para selecionar múltiplos dias.</h2>
                    <select class="form-select" size="9" multiple aria-label="Dias de Apresentação" required>
                        <option value="1" class="mb-1">Domingo</option>
                        <option value="2" class="mb-1">Segunda</option>
                        <option value="3" class="mb-1">Terça</option>
                        <option value="4" class="mb-1">Quarta</option>
                        <option value="5" class="mb-1">Quinta</option>
                        <option value="6" class="mb-1">Sexta</option>
                        <option value="7" class="mb-1">Sábado</option>
                    </select>
                </div>

                {{-- Input de Duração da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Duração da Peça</label>
                    <input type="text" class="form-control" placeholder="Duração" required>
                </div>

                {{-- Select de Classificação da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Classificação da Peça</label>
                    <select class="form-select" aria-label="Classificação" required>
                        <option selected>Livre</option>
                        <option value="1">10</option>
                        <option value="2">12</option>
                        <option value="3">14</option>
                        <option value="4">16</option>
                        <option value="5">18</option>
                    </select>
                </div>

                {{-- Input de Descrição da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Descrição da Peça</label>
                    <textarea class="form-control" rows="3" placeholder="Descrição"></textarea>
                </div>

                {{-- Input de URL/Link de Compra da Peça --}}
                <div class="mb-3">
                    <label class="form-label">URL/Link de Compra da Peça</label>
                    <input type="url" class="form-control" placeholder="https://exemplo.com" required>
                </div>

            </form>

        </x-slot>

        {{-- Footer do Modal --}}
        <x-slot name="footer">

            {{-- Botões do Footer --}}
            <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Fechar</button>
            <form action="">
                <button type="submit" class="btn btn-save">Salvar</button>
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
                        <h1 class="roboto-regular">Crie, Edite ou Exclua uma Peça</h1>

                        {{-- Botão de Adicionar Peça --}}
                        <button class="main-btn main-btn--new" data-bs-toggle="modal" data-bs-target="#neweditModal">
                            <span class="ic--baseline-plus"></span>
                            <span class="roboto-regular">Novo</span>
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

                            {{-- Linhas da Tabela - Conteúdo dinâmico conforme as peças cadastradas no Banco de Dados --}}
                            <tr>
                                {{-- Campos da Peça --}}
                                <th scope="row">N°ID</th>
                                <td>Dinâmico</td>
                                <td>Dinâmico</td>

                                {{-- Botões de Ação (editar, excluir e alterar visibilidade) --}}
                                <td id="action-buttons">

                                    {{-- Botão de Editar Peça --}}
                                    <button class="action-buttons-style action-buttons-style--edit"><span class="bx--edit"></span></button>

                                    {{-- Botão de Excluir Peça --}}
                                    <button class="action-buttons-style"><span class="ph--trash-bold"></span></button>

                                    {{-- Botão de Visibilidade da Peça --}}
                                    <label class="action-buttons-style action-buttons-style--visibility">
                                        <input type="checkbox">
                                        <span class="d-flex justify-content-center align-items-center"><span class="ri--eye-line"></span></span>
                                    </label>

                                </td>
                            </tr>

                        </tbody>

                        {{-- Paginação das peças será feito posteriormente, ao estar com o Banco de Dados e Back-End (usando laravel e bootstrap para isso) --}}

                      </table>

                </div>

            </div>
        </div>
    </div>

@endsection