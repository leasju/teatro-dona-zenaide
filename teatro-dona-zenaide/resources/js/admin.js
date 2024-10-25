// Imports JS
import './bootstrap';

// Imports CSS
import '../css/admin/global.css';

import '../css/admin/login.css';
import '../css/admin/cards.css';

// * Ativando os tooltips do Bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// * Mostrar/Esconder a senha no Modo Administrador

// Garante que o código seja executado após o carregamento completo do DOM
document.addEventListener('DOMContentLoaded', function() {

    // Seleciona o botão para toggle a senha
    const togglePassword = document.querySelector('.togglePassword');

    // Seleciona o input de senha
    const password = document.querySelector('#pass');

    // Adiciona um evento de clique ao botão de toggle
    togglePassword.addEventListener("click", function () {

        // Verifica se o tipo do input de senha é "password" ou "text"
        const type = password.type === "password" ? "text" : "password";

        // Altera o tipo do input de senha para mostrar ou esconder a senha
        password.type = type;

        // Altera o ícone do botão de toggle
        this.classList.toggle("ri--eye-line");
        this.classList.toggle("ri--eye-off-line");

        // Altera a propriedade title do botão de toggle
        this.title = type === "password" ? "Mostrar senha" : "Esconder senha";

    });

});

// * Script das Sessões de Apresentação das Peças no Modal New

// Garante que o código seja executado após o carregamento completo do DOM
document.addEventListener('DOMContentLoaded', function() {

    // Mostrar ou ocultar o campo de horário quando marcar ou desmarcar o checkbox
    document.querySelectorAll('.form-check-input').forEach(function(checkbox) {  // Seleciona todos os checkboxes com a classe "form-check-input"
        checkbox.addEventListener('change', function() {  // Adiciona um evento de mudança para cada checkbox
            let day = this.value;  // Obtém o valor do checkbox, que representa o dia
            let schedulesDiv = document.getElementById('schedules-' + day);  // Seleciona a div que contém os horários para o dia

            if (this.checked) {  // Se o checkbox estiver marcado
                schedulesDiv.classList.remove('d-none');  // Remove a classe "d-none" para mostrar a div
            } else {  // Se o checkbox estiver desmarcado
                schedulesDiv.classList.add('d-none');  // Adiciona a classe "d-none" para ocultar a div
                schedulesDiv.querySelector('.schedule-wrapper').innerHTML = '';  // Remove todos os horários da div
            }
        });
    });

    // Função para adicionar eventos de remoção de horário
    function addRemoveScheduleEvent(button) {
        button.addEventListener('click', function() {  // Adiciona um evento de clique ao botão
            this.parentElement.remove();  // Remove o div pai que contém o input de horário e o botão
        });
    }

    // Função para adicionar um novo horário
    function addSchedule(day) {
        let scheduleWrapper = document.querySelector('#schedules-' + day + ' .schedule-wrapper');  // Seleciona o wrapper onde os horários serão adicionados
        
        // Cria um novo div para o horário e o botão de remoção
        let scheduleDiv = document.createElement('div');
        scheduleDiv.classList.add('d-flex', 'align-items-center', 'mb-2');  // Adiciona classes de estilo ao div

        // Cria o input de horário
        let newSchedule = document.createElement('input');
        newSchedule.type = 'time';  // Define o tipo do input como "time"
        newSchedule.name = 'schedules[' + day + '][]';  // Define o nome do input para o envio dos dados do formulário
        newSchedule.classList.add('form-control', 'me-2');  // Adiciona classes de estilo ao input

        // Cria o botão de remover
        let removeButton = document.createElement('button');
        removeButton.type = 'button';  // Define o tipo do botão como "button"
        removeButton.classList.add('btn', 'btn-danger', 'btn-remove-schedule');  // Adiciona classes de estilo ao botão
        removeButton.textContent = 'Remover';  // Define o texto do botão como "Remover"

        // Adiciona o input e o botão de remover ao div
        scheduleDiv.appendChild(newSchedule);
        scheduleDiv.appendChild(removeButton);

        // Adiciona o novo div ao wrapper de horários
        scheduleWrapper.appendChild(scheduleDiv);

        // Adiciona o evento de remoção ao botão de remover
        addRemoveScheduleEvent(removeButton);
    }

    // Adicionar mais horários
    document.querySelectorAll('.btn-add-schedule').forEach(function(button) {  // Seleciona todos os botões para adicionar horários
        button.addEventListener('click', function() {  // Adiciona um evento de clique a cada botão
            let day = this.getAttribute('day-date');  // Obtém o dia associado ao botão através do atributo "day-date"
            addSchedule(day);  // Chama a função para adicionar um novo horário para o dia especificado
        });
    });

    // Adiciona o evento de remover horário aos botões já existentes
    document.querySelectorAll('.btn-remove-schedule').forEach(function(button) {  // Seleciona todos os botões de remover horários já existentes
        addRemoveScheduleEvent(button);  // Adiciona o evento de remoção a cada botão
    });
});

// * Script para manter o primeiro item do accordion aberto por default no Modal New

// Garante que o código seja executado após o carregamento completo do DOM
document.addEventListener('DOMContentLoaded', function() {

    // Adiciona um listener para o evento 'shown.bs.modal', que é disparado quando o modal é exibido
    var newModal = document.getElementById('newModal');
    newModal.addEventListener('shown.bs.modal', function () {
        // Abre o primeiro item do accordion
        var firstAccordionItem = document.querySelector('#accordionForm .accordion-item:first-child .accordion-collapse');
        
        if (firstAccordionItem) {
            // Certifica-se de que o item está visível
            if (!firstAccordionItem.classList.contains('show')) {
                var bsCollapse = new bootstrap.Collapse(firstAccordionItem, {
                    toggle: true // Garante que o primeiro item do accordion seja exibido
                });
            }
        }
    });

    // Adiciona um listener para o evento 'hidden.bs.modal', que é disparado quando o modal é fechado
    newModal.addEventListener('hidden.bs.modal', function () {
        // Opcional: Se você quiser garantir que o primeiro item do accordion seja fechado quando o modal é fechado,
        // você pode adicionar o código abaixo. Caso contrário, você pode remover esta parte.

        // Encontra o primeiro item do accordion
        var firstAccordionItem = document.querySelector('#accordionForm .accordion-item:first-child .accordion-collapse');
        
        if (firstAccordionItem) {
            // Certifica-se de que o item está oculto ao fechar o modal
            if (firstAccordionItem.classList.contains('show')) {
                var bsCollapse = new bootstrap.Collapse(firstAccordionItem, {
                    toggle: false // Fecha o primeiro item do accordion
                });
            }
        }
    });

});

// * Script para o Modal de Visibilidade

document.addEventListener("DOMContentLoaded", function() {

    // Modal de Visibilidade
    const visibilityModal = document.getElementById('visibilityModal')

    // Ícone do Modal de Visibilidade
    const visibilityContentIconModal = document.getElementById('eye-icon-modal')

    // Botão do Modal de Visibilidade
    const btnModalVisibility = document.getElementById('btnModalVisibility')

    // Título do Modal de Visibilidade
    const titleModalVisibility = document.getElementById("visibilityModalLabel")

    // Texto do Modal de Visibilidade
    const textModalVisibility = document.getElementById('textModalVisibility')

    // Ícone do botão de abrir o Modal de Visibilidade
    const iconModalVisibility = document.querySelector('.eye-icon')

    // Campo do form "oculto"
    const oculto = document.getElementById('oculto')

    // Form do Modal de Visibilidade
    const formModal = document.getElementById('formModal')

    // Evento que é executado toda vez que o modal de visibilidade é aberto
    if (visibilityModal) {

        visibilityModal.addEventListener('show.bs.modal', event => {
            
            // O botão que abriu o modal
            const buttonModalOpen = event.relatedTarget;

            // Verificar se o botão possui a classe "visivel"
            if (buttonModalOpen.classList.contains('visivel')) {

                // Troca os textos do modal para o modo de "Ocultar"
                btnModalVisibility.innerText = "Ocultar"
                titleModalVisibility.innerText = "Esconder Peça"
                textModalVisibility.innerHTML = "Deseja ocultar a peça?"

                // Troca o ícone de olho do conteúdo do Modal de Visibilidade
                visibilityContentIconModal.classList.remove("ri--eye-line")
                visibilityContentIconModal.classList.add("ri--eye-off-line")

                // Atribui 1 (invisível) para o campo oculto
                oculto.value = 1
                
            }

            // Verificar se o botão possui a classe "invisivel"
            if (buttonModalOpen.classList.contains('invisivel')) {

                // Troca os textos do modal para o modo de "Exibir"
                btnModalVisibility.innerText = "Exibir"
                titleModalVisibility.innerText = "Mostrar Peça"
                textModalVisibility.innerHTML = "Deseja exibir a peça?"

                // Troca o ícone de olho do conteúdo do Modal de Visibilidade
                visibilityContentIconModal.classList.remove("ri--eye-off-line")
                visibilityContentIconModal.classList.add("ri--eye-line")

                // Atribui 0 (visível) para o campo oculto
                oculto.value = 0
                
            }

            // Adiciona o ID do espetaculo na rota do form
            // const id = buttonModalOpen.getAttribute('data-espetaculo-id')
            // formModal.action = `/admin/cards/${id}/visible`

            btnModalVisibility.onclick = () => {

                if (buttonModalOpen.classList.contains('visivel')) {
                    buttonModalOpen.classList.remove('visivel');
                    buttonModalOpen.classList.add('invisivel');

                    // Altera o ícone de olho do botão de abrir o Modal de Visibilidade
                    iconModalVisibility.classList.remove("ri--eye-line")
                    iconModalVisibility.classList.add("ri--eye-off-line")
                } 
                
                else {
                    buttonModalOpen.classList.remove('invisivel');
                    buttonModalOpen.classList.add('visivel');

                    // Altera o ícone de olho do botão de abrir o Modal de Visibilidade
                    iconModalVisibility.classList.remove("ri--eye-off-line")
                    iconModalVisibility.classList.add("ri--eye-line")
                }

            }

        })

    }

});

// * Script para resetar o Modal de Novo

document.addEventListener('DOMContentLoaded', function () {

    // Selecionando o input de temporada
    let seasonInput = document.querySelector("#tempEsp");

    // Inicializa o flatpickr para o input de temporada
    let seasonPicker = flatpickr(seasonInput, {
        mode: "range",
        dateFormat: "d/m/Y",
        locale: {
          rangeSeparator: " até ",
        },
    });

    // Função para mostrar/ocultar inputs de horários com base no checkbox
    function toggleScheduleInputs(day) {
        // Seleciona o contêiner de horários para o dia especificado
        const scheduleContainer = document.querySelector(`#schedules-${day}`);
        if (scheduleContainer) {
            // Mostra ou oculta o contêiner dependendo do estado do checkbox
            scheduleContainer.classList.toggle('d-none', !document.querySelector(`#check${day}`).checked);
        }
    }

    // Função para adicionar um input de horário padrão
    function addDefaultSchedule(day) {
        // Seleciona o contêiner de horários para o dia especificado
        const scheduleContainer = document.querySelector(`#schedules-${day}`);
        if (scheduleContainer) {
            // Remove todas as divs existentes com a classe 'schedule-wrapper'
            scheduleContainer.querySelectorAll('.schedule-wrapper').forEach(wrapper => {
                wrapper.remove();
            });

            // Cria uma nova div para o input de horário
            const wrapper = document.createElement('div');
            wrapper.className = 'schedule-wrapper mb-3';
            wrapper.innerHTML = `
                <div class="d-flex align-items-center mb-2">
                    <input type="time" class="form-control me-2" name="schedules[${day}][]" placeholder="Horário">
                </div>
            `;
            
            // Seleciona o botão de adicionar horários
            const addButton = scheduleContainer.querySelector('.btn-add-schedule');
            if (addButton) {
                // Insere o novo input antes do botão de adicionar horários
                scheduleContainer.insertBefore(wrapper, addButton);
            } else {
                // Adiciona o input ao final se o botão não existir
                scheduleContainer.appendChild(wrapper);
            }
        }
    }

    // Função para resetar o formulário
    function resetForm() {
        // Reseta todos os campos de input, textarea e select
        const form = document.querySelector('#newModal form');
        form.reset();

        // Reverte os checkboxes e campos dinâmicos
        document.querySelectorAll('.clear-checkbox-day').forEach(checkbox => {
            checkbox.checked = false;
            toggleScheduleInputs(checkbox.value); // Reverte visibilidade dos inputs de horários
        });

        // Remove todos os inputs de horários adicionais
        document.querySelectorAll('.schedule-wrapper').forEach(wrapper => {
            wrapper.remove();
        });

        // Limpa a seleção do flatpickr
        seasonPicker.clear();

        // Mantém o primeiro item do Accordion aberto
        const accordionCollapse = document.querySelector('#collapseInformacoesPeca');
        if (accordionCollapse) {
            // Recria a instância do Collapse do Bootstrap e mostra-o
            const bsCollapse = new bootstrap.Collapse(accordionCollapse, { toggle: false });
            bsCollapse.show();
        }
    }

    // Adiciona evento de clique ao botão de recarregar
    document.getElementById('clearModalButton').addEventListener('click', function () {
        resetForm();

        // Recria a instância do modal e mostra-o
        const modal = document.getElementById('newModal');
        const modalInstance = bootstrap.Modal.getInstance(modal) || new bootstrap.Modal(modal);
        modalInstance.show();
    });

    // Adiciona eventos para mostrar/ocultar inputs de horários ao marcar checkboxes
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            toggleScheduleInputs(this.value);
            if (this.checked) {
                addDefaultSchedule(this.value);
            }
        });
    });

    // Adiciona inputs de horário padrão para os dias que estão inicialmente marcados
    document.querySelectorAll('.form-check-input:checked').forEach(checkbox => {
        addDefaultSchedule(checkbox.value);
    });
});

/* Caso não dê certo com o BD e Back-End o jeito de resetar o Modal acima
    document.addEventListener('DOMContentLoaded', function () {
        // Função para mostrar/ocultar inputs de horários com base no checkbox
        function toggleScheduleInputs(day) {
            const scheduleContainer = document.querySelector(`#schedules-${day}`);
            if (scheduleContainer) {
                scheduleContainer.classList.toggle('d-none', !document.querySelector(`#check${day}`).checked);
            }
        }

        // Função para resetar o formulário
        function resetForm() {
            // Reseta todos os campos de input, textarea e select
            const form = document.querySelector('#neweditModal form');
            form.reset();

            // Reverter os checkboxes e campos dinâmicos
            document.querySelectorAll('.form-check-input').forEach(checkbox => {
                checkbox.checked = false;
                toggleScheduleInputs(checkbox.value); // Reverte visibilidade dos inputs de horários
            });

            // Remove inputs de horários adicionais
            document.querySelectorAll('.schedule-wrapper').forEach(wrapper => {
                while (wrapper.firstChild) {
                    wrapper.removeChild(wrapper.firstChild);
                }
            });

            // Manter o primeiro item do Accordion aberto
            const accordionCollapse = document.querySelector('#collapseInformacoesPeca');
            if (accordionCollapse) {
                const bsCollapse = new bootstrap.Collapse(accordionCollapse, { toggle: false });
                bsCollapse.show();
            }
        }

        // Adiciona evento de clique ao botão de recarregar
        document.getElementById('clearModalButton').addEventListener('click', function () {
            resetForm();

            // Recria a instância do modal e mostra-o
            const modal = document.getElementById('neweditModal');
            const modalInstance = bootstrap.Modal.getInstance(modal) || new bootstrap.Modal(modal);
            modalInstance.show();
        });

        // Adiciona eventos para mostrar/ocultar inputs de horários ao marcar checkboxes
        document.querySelectorAll('.form-check-input').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                toggleScheduleInputs(this.value);
            });
        });
    });
*/