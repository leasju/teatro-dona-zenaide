{{-- Puxando o layout --}}
@extends('layouts.layout_admin')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Peças - Administrador')

{{-- Conteúdo da página --}}
@section('content')

    <div id="table-cards-area">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center vh-100">

                <div id="table-cards-box" class="col-md-12">

                    {{-- Conteúdo do Topo da Tabela de Peças --}}
                    <div class="table-top-content d-flex justify-content-between align-items-center mb-5">
                        {{-- Título da Tabela --}}
                        <h1 class="roboto-regular">Crie, Edite ou Exclua uma Peça</h1>

                        {{-- Botão de Adicionar Peça --}}
                        <button class="main-btn main-btn--new">
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