// Imports JS
import '../bootstrap';

// Imports CSS
import '../../css/admin/global.css';

import '../../css/admin/login.css';
import '../../css/admin/cards.css';
import '../../css/admin/cards_edit.css';

// * ---------------------------------------------------------BOOTSTRAP---------------------------------------------------------------

// * Ativando os tooltips do Bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// * ---------------------------------------------------------------------------------------------------------------------------------

// * -----------------------------------------------------------LOGIN-----------------------------------------------------------------

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

// * ---------------------------------------------------------------------------------------------------------------------------------

// * ----------------------------------------------------------MODAIS-----------------------------------------------------------------

// * Script das Sessões de Apresentação das Peças no Modal New e no formEdit

document.addEventListener('DOMContentLoaded', function() {

    // Mostrar ou ocultar o campo de horário quando marcar ou desmarcar o checkbox
    document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let day = this.value;
            let schedulesDiv = document.getElementById('schedules-' + day);

            if (this.checked) {
                schedulesDiv.classList.remove('d-none');
                // Adicionar input padrão se a div de horários estiver vazia
                if (schedulesDiv.querySelector('.schedule-wrapper').children.length === 0) {
                    addDefaultSchedule(day); // Adiciona o input padrão
                }
            } else {
                schedulesDiv.classList.add('d-none');
                // Remove todos os horários ao desmarcar
                schedulesDiv.querySelector('.schedule-wrapper').innerHTML = '';
            }
        });
    });

    function addDefaultSchedule(day) {
        let scheduleWrapper = document.querySelector('#schedules-' + day + ' .schedule-wrapper');

        // Cria um novo div para o horário padrão
        let scheduleDiv = document.createElement('div');
        scheduleDiv.classList.add('d-flex', 'align-items-center', 'mb-2');

        // Cria o input de horário padrão
        let newSchedule = document.createElement('input');
        newSchedule.type = 'time';
        newSchedule.name = 'schedules[' + day + '][]';
        newSchedule.classList.add('form-control', 'me-2');

        // Adiciona o input ao div
        scheduleDiv.appendChild(newSchedule);

        // Adiciona o novo div ao wrapper de horários
        scheduleWrapper.appendChild(scheduleDiv);
    }

    // Função para adicionar eventos de remoção de horário
    function addRemoveScheduleEvent(button) {
        button.addEventListener('click', function() {
            this.parentElement.remove();  // Remove o div pai que contém o input de horário e o botão
        });
    }

    // Função para adicionar um novo horário
    function addSchedule(day) {
        let scheduleWrapper = document.querySelector('#schedules-' + day + ' .schedule-wrapper');

        // Cria um novo div para o horário e o botão de remoção
        let scheduleDiv = document.createElement('div');
        scheduleDiv.classList.add('d-flex', 'align-items-center', 'mb-2');

        // Cria o input de horário
        let newSchedule = document.createElement('input');
        newSchedule.type = 'time';
        newSchedule.name = 'schedules[' + day + '][]';
        newSchedule.classList.add('form-control', 'me-2');

        // Cria o botão de remover
        let removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-remove-schedule');
        removeButton.textContent = 'Remover';

        // Adiciona o input e o botão de remover ao div
        scheduleDiv.appendChild(newSchedule);
        scheduleDiv.appendChild(removeButton);

        // Adiciona o novo div ao wrapper de horários
        scheduleWrapper.appendChild(scheduleDiv);

        // Adiciona o evento de remoção ao botão de remover
        addRemoveScheduleEvent(removeButton);
    }

    // Adicionar mais horários
    document.querySelectorAll('.btn-add-schedule').forEach(function(button) {
        button.addEventListener('click', function() {
            let day = this.getAttribute('day-date');
            addSchedule(day);
        });
    });

    // Adiciona o evento de remover horário aos botões já existentes
    document.querySelectorAll('.btn-remove-schedule').forEach(function(button) {
        addRemoveScheduleEvent(button);
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

    // Identificação dos elementos

    // Seleciona o Modal de Visibilidade
    const visibilityModal = document.getElementById('visibilityModal');

    // Seleciona o botão de dentro do Modal de Visibilidade
    const btnModalVisibility = document.getElementById('btnModalVisibility');

    // Seleciona o título do Modal de Visibilidade
    const titleModalVisibility = document.getElementById("visibilityModalLabel");

    // Seleciona o texto do Modal de Visibilidade
    const textModalVisibility = document.getElementById('textModalVisibility');

    // Seleciona o ícone de olho do conteúdo do Modal de Visibilidade
    const visibilityContentIconModal = document.getElementById('eye-icon-modal');

    // Seleciona o campo hidden com o id de oculto para guardar o valor da visibilidade
    const oculto = document.getElementById('oculto');

    // Seleciona o form do Modal de Visibilidade
    const formModal = document.getElementById('formModalVisibility');

    // Variável para armazenar o botão que abriu o modal
    let buttonModalOpen; 

    // Restaurar estado dos ícones ao carregar a página
    document.querySelectorAll('.action-buttons-style--visibility').forEach(button => {

        // Seleciona o ID do espetáculo referente ao botão que abriu o Modal
        const id = button.getAttribute('data-espetaculo-id');

        // Seleciona o ícone referente a esse botão
        const iconElement = button.querySelector('.eye-icon');

        // Constante para armazenar o estado de visibilidade do botão
        const estadoVisibilidade = localStorage.getItem(`estadoVisibilidade-${id}`);

        // Define o ícone com base no estado salvo
        if (estadoVisibilidade === "invisivel") {
            button.classList.replace('visivel', 'invisivel');
            iconElement.classList.replace("ri--eye-line", "ri--eye-off-line");
            button.classList.add("opacity-invisivel"); // Adiciona opacidade
        } 
        
        else {
            button.classList.replace('invisivel', 'visivel');
            iconElement.classList.replace("ri--eye-off-line", "ri--eye-line");
            button.classList.remove("opacity-invisivel"); // Remove opacidade
        }
    });

    // Verifica se o modal de visibilidade existe
    if (visibilityModal) {

        // Verifica se o modal de visibilidade está aberto e adiciona um evento
        visibilityModal.addEventListener('show.bs.modal', event => {

            // Salva o botão que abriu o modal
            buttonModalOpen = event.relatedTarget; 

            // Seleciona o ID da peça referente à aquele botão que abriu o Modal
            const id = buttonModalOpen.getAttribute('data-espetaculo-id');

            // Seleciona o nome da peça referente à aquele botão que abriu o Modal
            const nome = buttonModalOpen.getAttribute('data-espetaculo-name');

            // Seleciona o ícone de olho referente à aquele botão que abriu o Modal
            const iconElement = buttonModalOpen.querySelector('.eye-icon'); // Ícone do botão específico

            // Define a rota do form com o ID específico
            formModal.action = `/espetaculos/${id}/ocultar`;

            // Verifica o estado atual e ajusta o modal
            if (buttonModalOpen.classList.contains('visivel')) {
                btnModalVisibility.innerText = "Ocultar";
                titleModalVisibility.innerHTML = `Esconder Peça: <p class="modalNomeEsp">${nome}</p>`;
                textModalVisibility.innerHTML = "Deseja ocultar a peça?";
                visibilityContentIconModal.classList.replace("ri--eye-line", "ri--eye-off-line");
                oculto.value = 1;
            } 
            
            else {
                btnModalVisibility.innerText = "Exibir";
                titleModalVisibility.innerHTML = `Mostrar Peça: <p class="modalNomeEsp">${nome}</p>`;
                textModalVisibility.innerHTML = "Deseja exibir a peça?";
                visibilityContentIconModal.classList.replace("ri--eye-off-line", "ri--eye-line");
                oculto.value = 0;
            }

            // Ao confirmar a ação, altera o estado e o ícone do botão correto
            btnModalVisibility.onclick = () => {
                if (buttonModalOpen.classList.contains('visivel')) {
                    buttonModalOpen.classList.replace('visivel', 'invisivel');
                    iconElement.classList.replace("ri--eye-line", "ri--eye-off-line");
                    buttonModalOpen.classList.add("opacity-invisivel"); // Adiciona opacidade
                    localStorage.setItem(`estadoVisibilidade-${id}`, "invisivel");
                } 
                
                else {
                    buttonModalOpen.classList.replace('invisivel', 'visivel');
                    iconElement.classList.replace("ri--eye-off-line", "ri--eye-line");
                    buttonModalOpen.classList.remove("opacity-invisivel"); // Remove opacidade
                    localStorage.setItem(`estadoVisibilidade-${id}`, "visivel");
                }
            };

        });

    }
});

// * Script para o Modal de Exclusão

document.addEventListener("DOMContentLoaded", function () {

    // Selecionando o Modal Delete
    const deleteModal = document.getElementById("deleteModal")

    // Selecionando o form do Modal Delete
    const formModalDelete = document.getElementById("formModalDelete")

    // Título do Modal de Visibilidade
    const titleModalDelete = document.getElementById("deleteModalLabel")

    // Se existe o Modal Delete...
    if (deleteModal) {

        // Lógica para ao abrir o Modal de Exclusão
        deleteModal.addEventListener("show.bs.modal", event => {

            // O botão que abriu o modal
            const buttonModalOpen = event.relatedTarget;

            // ID da peça relacionada ao botão que abriu o Modal de Exclusão
            const id = buttonModalOpen.getAttribute('data-espetaculo-id')

            // Adiciona o ID do espetaculo na rota do form
            formModalDelete.action = `/espetaculos/${id}/delete`

            // Nome da peça relacionada ao botão que abriu o Modal de Visibilidade
            const nome = buttonModalOpen.getAttribute('data-espetaculo-name')

            // Inserindo o texto no título do Modal com o nome da peça relacionada ao botão que abriu o Modal
            titleModalDelete.innerHTML = `Deletar Peça: <p class="modalNomeEsp">${nome}</p>`

        });

    }

})

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

// * ---------------------------------------------------------------------------------------------------------------------------------

// * ---------------------------------------------------------FORM EDIT---------------------------------------------------------------

// * Script para manter o primeiro item do accordion aberto por default no Form Edit específico

// Garante que o código seja executado após o carregamento completo do DOM
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona o primeiro item do accordion dentro do form com id 'formEdit'
    var firstAccordionItem = document.querySelector('#formEdit #accordionForm .accordion-item:first-child .accordion-collapse');
    
    if (firstAccordionItem) {
        // Certifica-se de que o item está visível
        if (!firstAccordionItem.classList.contains('show')) {
            var bsCollapse = new bootstrap.Collapse(firstAccordionItem, {
                toggle: true // Garante que o primeiro item do accordion seja exibido
            });
        }
    }
});

// * ---------------------------------------------------------------------------------------------------------------------------------

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