// * Ativando os tooltips do Bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// * Script para a alteração de temas (claro e escuro)

// Aguarda até que o conteúdo da página esteja totalmente carregado
document.addEventListener('DOMContentLoaded', () => {

    // Selecionando os ícones do footer de contato
    const whatsappIcon = document.querySelector('.whatsapp-icon');
    const instagramIcon = document.querySelector('.instagram-icon');

    // Selecionando o ícone do menu lateral da OffCanvas NavBar
    const menuIcon = document.querySelector('.navbar-menu-icon');

    // Seleciona o elemento de checkbox com o ID 'chk'
    const checkbox = document.getElementById('chk');

    // Obtém o tema atual do localStorage, ou define como 'light' se não houver tema salvo
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Aplica o tema salvo e ajusta a checkbox e os ícones adequadamente
    if (currentTheme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
        checkbox.checked = true;

        // Muda a classe do ícone do WhatsApp para a versão branca
        whatsappIcon.classList.remove('ic--baseline-whatsapp');
        whatsappIcon.classList.add('ic--baseline-whatsapp-white');

        // Muda a classe do ícone do Instagram para a versão branca
        instagramIcon.classList.remove('mdi--instagram');
        instagramIcon.classList.add('mdi--instagram-white')

        // Muda a classe do ícone do Menu para a versão branca
        menuIcon.classList.remove('navbar-toggler');
        menuIcon.classList.add('navbar-toggler-white');

    } 
    
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        checkbox.checked = false;

        // Muda a classe do ícone do WhatsApp para a versão padrão
        whatsappIcon.classList.remove('ic--baseline-whatsapp-white');
        whatsappIcon.classList.add('ic--baseline-whatsapp');

        // Muda a classe do ícone do Instagram para a versão padrão
        instagramIcon.classList.remove('mdi--instagram-white');
        instagramIcon.classList.add('mdi--instagram')

        // Muda a classe do ícone do Menu para a versão padrão
        menuIcon.classList.add('navbar-toggler');
        menuIcon.classList.remove('navbar-toggler-white');
    }
    
    // Adiciona um ouvinte de eventos para o evento 'change' no checkbox
    checkbox.addEventListener('change', () => {
            
        // Se o checkbox estiver marcado, aplica o tema escuro
        if (checkbox.checked) {
            // Aplicando o tema escuro
            document.documentElement.setAttribute('data-theme', 'dark');

            // Salva a preferência de tema como 'dark' no localStorage
            localStorage.setItem('theme', 'dark');

            // Muda a classe do ícone do WhatsApp para a versão branca
            whatsappIcon.classList.remove('ic--baseline-whatsapp');
            whatsappIcon.classList.add('ic--baseline-whatsapp-white');

            // Muda a classe do ícone do Instagram para a versão branca
            instagramIcon.classList.remove('mdi--instagram');
            instagramIcon.classList.add('mdi--instagram-white')

            // Muda a classe do ícone do Menu para a versão branca
            menuIcon.classList.remove('navbar-toggler');
            menuIcon.classList.add('navbar-toggler-white');
        }
        
        // Se o checkbox estiver desmarcado, aplica o tema claro
        else {
            // Aplicando o tema claro
            document.documentElement.setAttribute('data-theme', 'light');

            // Salva a preferência de tema como 'light' no localStorage
            localStorage.setItem('theme', 'light');

            // Muda a classe do ícone do WhatsApp para a versão padrão
            whatsappIcon.classList.remove('ic--baseline-whatsapp-white');
            whatsappIcon.classList.add('ic--baseline-whatsapp');

            // Muda a classe do ícone do Instagram para a versão padrão
            instagramIcon.classList.remove('mdi--instagram-white');
            instagramIcon.classList.add('mdi--instagram')

            // Muda a classe do ícone do Menu para a versão padrão
            menuIcon.classList.add('navbar-toggler');
            menuIcon.classList.remove('navbar-toggler-white');
        }

    });

});

// * Script para fechar a OffCanvas NavBar ao interagir com o link de 'CONTATOS'

// Este evento garante que o código JavaScript só será executado após todo o conteúdo da página ter sido completamente carregado.
document.addEventListener("DOMContentLoaded", function() {

    // Obter o elemento do link de 'CONTATOS' usando seu ID.
    var contatosLink = document.getElementById('contatos-link');
    
    // Obter o elemento da OffCanvas Navbar usando seu ID.
    var offcanvasElement = document.getElementById('navbarOffcanvasLg');

    // Verificar se o elemento contatosLink realmente existe para evitar erros.
    if (contatosLink) {
        // Adicionar um ouvinte de evento de clique ao link de 'CONTATOS'.
        contatosLink.addEventListener('click', function() {
            // Usar o método getInstance do Bootstrap para obter a instância atual da OffCanvas Navbar.
            var bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            // Usar o método hide para fechar a OffCanvas Navbar.
            bsOffcanvas.hide();
        });
    }

});