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
      
    {{-- * New/Edit Modal --}}
    <x-admin.modal modalclasswidth="modal-lg" id="neweditModal" labelledby="neweditModalLabel" title="Adicionar Nova Peça">

        {{-- Conteúdo do Modal --}}
        <x-slot name="content">

            {{-- Form New/Edit --}}
            <form action="">
                
                @csrf

                {{-- * Collapse 1: Informações da Peça --}}

                {{-- Input de Nome da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Nome da Peça</label>
                    <input type="text" class="form-control" placeholder="Insira um nome" value="" required>
                </div>

                {{-- Temporada da Peça --}}
                <label class="form-label">Temporada da Peça</label>
                <div class="mb-3 input-group">
                    <input type="date" class="form-control" id="season" placeholder="Selecione uma temporada..." value="" required>
                    <span class="input-group-text">
                        <span class="fluent-mdl2--date-time"></span>
                    </span>
                </div>

                {{-- Inputs de Sessões de Apresentação --}}
                <div class="mb-3 d-flex flex-column gap-2">
                    <label>Dias e Horários das Sessões de Apresentação da Peça</label>
                    @foreach(['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'] as $day)
                        {{-- Looping pelos dias da semana (de Domingo a Sábado) para criar checkboxes e inputs de horários --}}
                    
                        {{-- Inputs Checkbox para selecionar os dias das sessões de apresentação --}}
                        <div class="form-check ms-2">
                            {{-- Checkbox para cada dia da semana, com o valor sendo o nome do dia (ex: Domingo) --}}
                            <input class="form-check-input checkbox-day" type="checkbox" value="{{ $day }}" id="check{{ $day }}" name="days[]">
                            
                            {{-- Label para o checkbox, associada ao respectivo checkbox pelo atributo "for" --}}
                            <label class="form-check-label" for="check{{ $day }}">
                                {{ $day }}  {{-- O nome do dia é exibido na interface --}}
                            </label>
                        </div>
                    
                        {{-- Div que contém os campos de horário para o respectivo dia de apresentação --}}
                        {{-- Inicialmente está oculta (classe d-none) e só será exibida quando o checkbox correspondente for marcado --}}
                        <div id="schedules-{{ $day }}" class="mt-2 ms-2 d-none">
                            {{-- Div para agrupar os inputs de horário --}}
                            <div class="schedule-wrapper mb-3">
                                {{-- Input para inserir o horário da sessão (formato de tempo) --}}
                                <input type="time" class="form-control mb-2" name="schedules[{{ $day }}][]" placeholder="Horário">
                            </div>
                    
                            {{-- Botão para adicionar mais horários para o respectivo dia de apresentação --}}
                            {{-- O atributo "data-dia" contém o nome do dia, para que o JavaScript saiba a qual dia esse botão se refere --}}
                            <button type="button" class="btn btn-add-schedule add-schedule d-flex align-items-center mb-3" day-date="{{ $day }}">
                                <span class="ic--baseline-plus"></span>
                                <span class="roboto-regular">Novo horário</span>
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- Input de Duração da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Duração da Peça (em minutos)</label>
                    <input type="number" step="5" class="form-control" placeholder="Insira uma duração (em minutos)" required>
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

                {{-- * Collapse 2: Imagens da Peça --}}

                {{-- Input de Imagem da Peça --}}
                <div class="mb-3">
                    <label class="form-label">Imagem da Peça</label>
                    <input type="file" class="form-control" aria-label="Escolher arquivo" required>
                </div>

                {{-- * Collapse 3: Ficha Técnica --}}


                {{-- * Collapse 4: Opcionais (Ficha Técnica) --}}


            </form>

        </x-slot>

        {{-- Footer do Modal --}}
        <x-slot name="footer">

            {{-- Botões do Footer --}}
            <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Fechar</button>
            <form action="">
                <button type="submit" class="btn btn-confirm-action">Salvar</button>
            </form>

        </x-slot>

    </x-admin.modal>

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
            <form action="">
                <button type="submit" class="btn btn-confirm-action btn-confirm-action--delete">Excluir</button>
            </form>

        </x-slot>

    </x-admin.modal>

    {{-- * Visibility Modal --}}
    <x-admin.modal modalclasswidth="" id="visibilityModal" labelledby="visibilityModalLabel" title="Esconder Peça">
    
        {{-- Conteúdo do Modal --}}
        <x-slot name="content">

            {{-- Texto de Confirmação da Ação --}}
            <div class="d-flex flex-column justify-content-center align-items-center">
                <span class="ri--eye-line modal-icon mb-3"></span>
                <h2 class="roboto-medium">Deseja ocultar a Peça?</h2>
            </div>

        </x-slot>

        {{-- Footer do Modal --}}
        <x-slot name="footer">

            {{-- Botões do Footer --}}
            <button type="button" class="btn btn-exit" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-confirm-action btn-confirm-action--visibility">Ocultar</button>

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
                                    <button class="action-buttons-style" data-bs-toggle="modal" data-bs-target="#deleteModal"><span class="ph--trash-bold"></span></button>

                                    {{-- Botão de Visibilidade da Peça --}}
                                    <label class="action-buttons-style action-buttons-style--visibility" data-bs-toggle="modal" data-bs-target="#visibilityModal">
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