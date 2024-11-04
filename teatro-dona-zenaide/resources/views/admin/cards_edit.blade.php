{{-- Puxando o layout --}}
@extends('layouts.layout_admin')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Edição da Peça - Administrador')

{{-- Conteúdo da Navbar --}}
@section('navbar-content')

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex justify-content-end flex-grow-1">
        <li class="nav-item">
            <a class="nav-link roboto-regular" id="admin-indicator" aria-current="page" href="/admin/cards">Modo Administrador</a>
        </li>
    </ul>
</div>

@endsection

{{-- Conteúdo da página --}}
@section('content')

<div id="table-cards-area">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center vh-100">
            <div id="table-cards-box-edit" class="col-md-12">

                {{-- Título da Peça para Edição --}}
                <div id="title-edit-esp">
                    <h1 class="roboto-medium">Edição - {{ $espetaculo->nomeEsp }}</h1>
                </div>

                {{-- Form Edit --}}
                <form action="/admin/cards/{{ $espetaculo->id}}/editar"  method="POST" enctype="multipart/form-data" id="formEdit">

                    @csrf
                    @method('PUT')

                    <div id="formEditAccordion">
                        <div class="accordion" id="accordionForm">

                            {{-- * Collapse 1: Informações da Peça --}}

                            <div class="accordion-item">

                                {{-- Header do Collapse 1 --}}
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInformacoesPeca" aria-expanded="true" aria-controls="collapseInformacoesPeca">
                                        Informações da Peça
                                    </button>
                                </h2>

                                {{-- Conteúdo do Collapse 1: Informações da Peça --}}
                                <div id="collapseInformacoesPeca" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionForm">
                                    <div class="accordion-body">

                                        {{-- Input de Nome da Peça --}}
                                        <div class="mb-3">
                                            <label for="nomeEsp" class="form-label">Nome da Peça <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" id="nomeEsp" name="nomeEsp" placeholder="Insira um nome" value="{{$espetaculo->nomeEsp}}" required>
                                        </div>

                                        {{-- Temporada da Peça --}}

                                        <label for="tempEsp" class="form-label">Temporada da Peça <span class="red-star" title="Campo obrigatório">*</span></label>
                                        <div class="mb-3 input-group">
                                            <input type="text" class="form-control" id="tempEsp" name="tempEsp" placeholder="Selecione uma temporada..." value="{{$espetaculo->tempEsp}}" required>
                                            <span class="input-group-text">
                                                <span class="fluent-mdl2--date-time"></span>
                                            </span>
                                        </div>

                                        {{-- Inputs de Sessões de Apresentação --}}
                                        <div class="mb-3 d-flex flex-column gap-2">

                                            <label>Dias e Horários das Sessões de Apresentação da Peça <span class="red-star" title="Campo obrigatório">*</span></label>
                                            @foreach(['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'] as $day)

                                            {{-- Looping pelos dias da semana (de Domingo a Sábado) para criar checkboxes e inputs de horários --}}

                                            {{-- Inputs Checkbox para selecionar os dias das sessões de apresentação --}}
                                            <div class="form-check ms-2">
                                                {{-- Checkbox para cada dia da semana, com o valor sendo o nome do dia (ex: Domingo) --}}
                                                <input class="form-check-input clear-checkbox-day checkbox-day" type="checkbox" value="{{ $day }}" id="check{{ $day }}" name="days[]"
                                                    {{ isset($diasHorarios[$day]) ? 'checked' : '' }}>

                                                {{-- Label para o checkbox, associada ao respectivo checkbox pelo atributo "for" --}}
                                                <label class="form-check-label" for="check{{ $day }}">
                                                    {{ ucfirst($day) }} {{-- O nome do dia é exibido na interface --}}
                                                </label>
                                            </div>

                                            {{-- Div que contém os campos de horário para o respectivo dia de apresentação --}}
                                            {{-- Inicialmente está oculta (classe d-none) e só será exibida quando o checkbox correspondente for marcado --}}
                                            <div id="schedules-{{ $day }}" class="mt-2 ms-2 {{ isset($diasHorarios[$day]) ? '' : 'd-none' }}">
                                                {{-- Div para agrupar os inputs de horário --}}
                                                <div class="schedule-wrapper mb-3">







                                                    @if(isset($diasHorarios[$day]))
                                                    @foreach($diasHorarios[$day] as $hora)
                                                    <div class="d-flex align-items-center mb-2">
                                                        <input type="time" class="form-control me-2" name="schedules[{{ $day }}][]" value="{{ $hora }}">

                                                    </div>
                                                    
                                                    @endforeach
                                                    @else


                                                    <div class="d-flex align-items-center mb-2">
                                                        {{-- Input para inserir o horário da sessão (formato de tempo) --}}
                                                        <input type="time" class="form-control me-2" name="schedules[{{ $day }}][]" placeholder="Horário">
                                                    </div>
                                                    @endif
                                                </div>

                                                {{-- Botão para adicionar mais horários para o respectivo dia de apresentação --}}
                                                {{-- O atributo "day-date" contém o nome do dia, para que o JavaScript saiba a qual dia esse botão se refere --}}
                                                <button type="button" class="btn btn-add-schedule add-schedule d-flex align-items-center mb-3" day-date="{{ $day }}">
                                                    <span class="ic--baseline-plus"></span>
                                                    <span class="roboto-regular">Novo horário</span>
                                                </button>
                                            </div>







                                            @endforeach
                                        </div>

                                        {{-- Input de Duração da Peça --}}
                                        <div class="mb-3">
                                            <label for="duracaoEsp" class="form-label">Duração da Peça (em minutos) <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="number" step="5" min="0" class="form-control" id="duracaoEsp" name="duracaoEsp" value="{{$espetaculo->duracaoEsp}}" placeholder="Insira uma duração (em minutos)" required>
                                        </div>

                                        {{-- Select de Classificação da Peça --}}
                                        <div class="mb-3">
                                            <label for="classifEsp" class="form-label">Classificação da Peça <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <select class="form-select" id="classifEsp" name="classifEsp" aria-label="Classificação" required>
                                                <option value="Livre" {{ $espetaculo->classifEsp == 'Livre' ? 'selected' : '' }}>Livre</option>
                                                <option value="1" {{ $espetaculo->classifEsp == '1' ? 'selected' : '' }}>10</option>
                                                <option value="2" {{ $espetaculo->classifEsp == '2' ? 'selected' : '' }}>12</option>
                                                <option value="3" {{ $espetaculo->classifEsp == '3' ? 'selected' : '' }}>14</option>
                                                <option value="4" {{ $espetaculo->classifEsp == '4' ? 'selected' : '' }}>16</option>
                                                <option value="5" {{ $espetaculo->classifEsp == '5' ? 'selected' : '' }}>18</option>
                                            </select>
                                        </div>

                                        {{-- Input de Descrição da Peça --}}
                                        <div class="mb-3">
                                            <label for="descEsp" class="form-label">Descrição da Peça <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <textarea class="form-control" rows="3" id="descEsp" name="descEsp" placeholder="Descrição" required>{{$espetaculo->descEsp}}</textarea>
                                        </div>

                                        {{-- Input de URL/Link de Compra da Peça --}}
                                        <div class="mb-3">
                                            <label for="urlCompra" class="form-label">URL/Link de Compra da Peça <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="url" class="form-control" id="urlCompra" name="urlCompra" value="{{$espetaculo->urlCompra}}" placeholder="https://exemplo.com" required>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- * Collapse 2: Imagens da Peça --}}

                            <div class="accordion-item">

                                {{-- Header do Collapse 2 --}}
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseImagensPeca" aria-expanded="false" aria-controls="collapseImagensPeca">
                                        Imagens da Peça
                                    </button>
                                </h2>

                                {{-- Conteúdo do Collapse 2: Imagens da Peça --}}
                                <div id="collapseImagensPeca" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionForm">
                                    <div class="accordion-body">

                                        {{-- Input de Imagem da Peça (Card) --}}
                                        <div class="mb-3">
                                            <label for="imagem_principal" class="form-label">Imagem do Cartão Principal da Peça <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="file" class="form-control" id="imagem_principal" name="imagem_principal" accept="image/*" aria-label="Escolher arquivo" required>
                                            <small class="text-muted">Formatos de imagem aceitos: .jpeg, .jpg, .png, .bmp, .gif, .svg ou .webp</small>
                                        </div>

                                        {{-- Inputs de Banner --}}
                                        @foreach([1, 2, 3, 4, 5] as $num)
                                        <div class="mb-3">
                                            <label for="imagemOpcional_{{ $num }}" class="form-label">Imagem do Banner da Peça {{ $num }}</label>
                                            <input type="file" class="form-control" id="imagemOpcional_{{ $num }}" name="imagemOpcional_{{ $num }}" accept="image/*" aria-label="Escolher arquivo">
                                            <small class="text-muted">Formatos de imagem aceitos: .jpeg, .jpg, .png, .bmp, .gif, .svg ou .webp</small>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>

                            {{-- * Collapse 3: Ficha Técnica (Obrigatórios) --}}

                            <div class="accordion-item">

                                {{-- Header do Collapse 3 --}}
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFichaTecnica" aria-expanded="false" aria-controls="collapseFichaTecnica">
                                        Ficha Técnica (Obrigatórios)
                                    </button>
                                </h2>

                                {{-- Conteúdo do Collapse 3: Ficha Técnica (Obrigatórios) --}}
                                <div id="collapseFichaTecnica" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionForm">
                                    <div class="accordion-body">

                                        {{-- Input de Texto --}}
                                        <div class="mb-3">
                                            <label for="roteiristaEsp" class="form-label">Roteiro <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" id="roteiristaEsp" name="roteiristaEsp" placeholder="Insira um ou mais representantes para roteiro" value="{{$espetaculo->roteiristaEsp}}" required>
                                        </div>
                                        
                                        {{-- Input de Elenco --}}
                                        <div class="mb-3">
                                            <label for="elencoEsp" class="form-label">Elenco <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" 
                                            id="elencoEsp" name="elencoEsp"  placeholder="Insira um ou mais representantes para elenco" value="{{$espetaculo->elencoEsp}}" required>   
                                        </div>

                                        {{-- Input de Direção --}}
                                        <div class="mb-3">
                                            <label for="direcaoEsp" class="form-label">Direção <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" id="direcaoEsp" name="direcaoEsp" placeholder="Insira um ou mais representantes para direção" value="{{$espetaculo->direcaoEsp}}" required>
                                        </div>

                                        {{-- Input de Figurino --}}
                                        <div class="mb-3">
                                            <label for="figurinoEsp" class="form-label">Figurino <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" 
                                            id="figurinoEsp" name="figurinoEsp" placeholder="Insira um ou mais representantes para figurino" value="{{$espetaculo->figurinoEsp}}" required>
                                        </div>
                                        
                                        {{-- Input de Cenografia --}}
                                        <div class="mb-3">
                                            <label for="cenoEsp" class="form-label">Cenografia <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" 
                                            id="cenoEsp" name="cenoEsp" placeholder="Insira um ou mais representantes para cenografia" value="{{$espetaculo->cenoEsp}}" required>
                                        </div>
                                        
                                        {{-- Input de Iluminação --}}
                                        <div class="mb-3">
                                            <label for="luzEsp" class="form-label">Iluminação <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" 
                                            id="luzEsp" name="luzEsp" placeholder="Insira um ou mais representantes para iluminação" value="{{$espetaculo->luzEsp}}" required>
                                        </div>

                                        {{-- Input de Sonorização --}}
                                        <div class="mb-3">
                                            <label for="sonoEsp" class="form-label">Sonorização <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" 
                                            id="sonoEsp" name="sonoEsp" placeholder="Insira um ou mais representantes para sonorização" value="{{$espetaculo->sonoEsp}}" required>
                                        </div>
                                        
                                        {{-- Input de Produção --}}
                                        <div class="mb-3">
                                            <label for="producaoEsp" class="form-label">Produção <span class="red-star" title="Campo obrigatório">*</span></label>
                                            <input type="text" class="form-control" 
                                            id="producaoEsp" name="producaoEsp" placeholder="Insira um ou mais representantes para produção" value="{{$espetaculo->producaoEsp}}" required>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- * Collapse 4: Ficha Técnica (Opcionais) --}}

                            <div class="accordion-item">

                                {{-- Header do Collapse 4 --}}
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOpcionaisFichaTecnica" aria-expanded="false" aria-controls="collapseOpcionaisFichaTecnica">
                                        Ficha Técnica (Opcionais)
                                    </button>
                                </h2>

                                {{-- Conteúdo do Collapse 4: Ficha Técnica (Opcionais) --}}
                                <div id="collapseOpcionaisFichaTecnica" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionForm">
                                    <div class="accordion-body">
                                        
                                        {{-- Input de Costureira --}}
                                        <div class="mb-3">
                                            <label for="costEsp" class="form-label">Costureira</label>
                                            <input type="text" class="form-control" 
                                            id="costEsp" name="costEsp" placeholder="Insira um ou mais representantes para costureira" value="{{$espetaculo->costEsp}}">
                                        </div>

                                        {{-- Input de Assistente de cenografia --}}
                                        <div class="mb-3">
                                            <label for="cenoAssistEsp" class="form-label">Assistente de cenografia</label>
                                            <input type="text" class="form-control" 
                                            id="cenoAssistEsp" name="cenoAssistEsp" placeholder="Insira um ou mais representantes para assistente de cenografia" value="{{$espetaculo->cenoAssistEsp}}">
                                        </div>

                                        {{-- Input de Cenotécnico --}}
                                        <div class="mb-3">
                                            <label for="cenoTec" class="form-label">Cenotécnico</label>
                                            <input type="text" class="form-control" 
                                            id="cenoTec" name="cenoTec" placeholder="Insira um ou mais representantes para cenotécnico" value="{{$espetaculo->cenoTec}}">
                                        </div>
                                        
                                        {{-- Input de Consultoria de Design --}}
                                        <div class="mb-3">
                                            <label for="designEsp" class="form-label">Consultoria de Design</label>
                                            <input type="text" class="form-control" 
                                            id="designEsp" name="designEsp" placeholder="Insira um ou mais representantes para consultoria de design" value="{{$espetaculo->designEsp}}">
                                        </div>
                                        
                                        {{-- Input de Co-produção --}}
                                        <div class="mb-3">
                                            <label for="coProducaoEsp" class="form-label">Co-produção</label>
                                            <input type="text" class="form-control" 
                                            id="coProducaoEsp" name="coProducaoEsp" placeholder="Insira um ou mais representantes para co-produção" value="{{$espetaculo->coProducaoEsp}}">
                                        </div>

                                        {{-- Input de Agradecimentos --}}
                                        <div class="mb-3">
                                            <label for="agradecimentos" class="form-label">Agradecimentos</label>
                                            <input type="text" class="form-control" 
                                            id="agradecimentos" name="agradecimentos" placeholder="Insira um ou mais representantes para agradecimentos" value="{{$espetaculo->agradecimentos}}">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer do  formulário de edição da peça --}}
                    <div id="footer-edit-esp">

                        {{-- Botões do Footer --}}
                        <a href="/admin/cards" id="linkVoltar">
                            <button type="button" class="btn btn-back">Voltar</button>
                        </a>
                        <button type="submit" class="btn btn-confirm-edit">Editar</button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection