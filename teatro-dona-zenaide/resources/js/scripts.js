// * Ativando os tooltips do Bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// * Script para a alteração de temas (claro e escuro)

// Aguarda até que o conteúdo da página esteja totalmente carregado
document.addEventListener('DOMContentLoaded', () => {

    // Seleciona o elemento de checkbox com o ID 'chk'
    const checkbox = document.getElementById('chk');

    // Obtém o tema atual do localStorage, ou define como 'light' se não houver tema salvo
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Aplica o tema salvo e ajusta a checkbox e os ícones adequadamente
    if (currentTheme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
        checkbox.checked = true;
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        checkbox.checked = false;
    }
    
    // Adiciona um ouvinte de eventos para o evento 'change' no checkbox
    checkbox.addEventListener('change', () => {
            
        // Se o checkbox estiver marcado, aplica o tema escuro
        if (checkbox.checked) {
            // Aplicando o tema escuro
            document.documentElement.setAttribute('data-theme', 'dark');

            // Salva a preferência de tema como 'dark' no localStorage
            localStorage.setItem('theme', 'dark');
        }
        
        // Se o checkbox estiver desmarcado, aplica o tema claro
        else {
            // Aplicando o tema claro
            document.documentElement.setAttribute('data-theme', 'light');

            // Salva a preferência de tema como 'light' no localStorage
            localStorage.setItem('theme', 'light');
        }

    });

});