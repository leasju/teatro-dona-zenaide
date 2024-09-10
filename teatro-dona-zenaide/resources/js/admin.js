// Imports JS
import './bootstrap';

// Imports CSS
import '../css/admin/global.css';

import '../css/admin/login.css';
import '../css/admin/cards.css';

// * Ativando os tooltips do Bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// * Script das Sessões de Apresentação das Peças

// Quando o documento é totalmente carregado, a função é executada
document.addEventListener('DOMContentLoaded', function() {

    // Seleciona todos os elementos com a classe 'form-check-input' (checkboxes)
    document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
        
        // Para cada checkbox, adiciona um evento 'change' (quando marcado ou desmarcado)
        checkbox.addEventListener('change', function() {
            
            // Obtém o valor do checkbox (neste caso, o nome do dia da semana)
            let day = this.value;
            
            // Seleciona a div correspondente ao horário do dia marcado
            let schedulesDiv = document.getElementById('schedules-' + day);

            // Se o checkbox estiver marcado (checked)
            if (this.checked) {
                // Remove a classe 'd-none' para exibir o campo de horários
                schedulesDiv.classList.remove('d-none');
            } else {
                // Apenas oculta o campo de horários, sem removê-lo
                schedulesDiv.classList.add('d-none');
            }
        });
    });

    // Seleciona todos os botões com a classe 'add-schedule' (botões para adicionar mais horários)
    document.querySelectorAll('.add-schedule').forEach(function(button) {
        
        // Para cada botão, adiciona um evento 'click'
        button.addEventListener('click', function() {
            
            // Obtém o valor do dia da semana atribuído ao botão (day-date)
            let day = this.getAttribute('day-date');
            
            // Seleciona o container onde os inputs de horário devem ser adicionados
            let schedulesWrapper = document.querySelector('#schedules-' + day + ' .schedule-wrapper');
            
            // Cria um novo elemento de input do tipo 'time'
            let newSchedule = document.createElement('input');
            newSchedule.type = 'time';  // Define o tipo do input como 'time'
            
            // Define o nome do input como 'schedules[' + day + '][]' para que seja enviado corretamente no formulário
            newSchedule.name = 'schedules[' + day + '][]';
            
            // Adiciona classes de estilização do Bootstrap ao novo input
            newSchedule.classList.add('form-control', 'mb-2');
            
            // Adiciona o novo input ao container de horários
            schedulesWrapper.appendChild(newSchedule);
        });
    });
});

// * Script Input de Temporada

flatpickr("#season", {
    mode: "range",
    dateFormat: "d/m/Y"
});