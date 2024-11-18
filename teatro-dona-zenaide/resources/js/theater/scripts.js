// * ---------------------------------------------------------BOOTSTRAP---------------------------------------------------------------

// * Ativando os tooltips do Bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// * ---------------------------------------------------------------------------------------------------------------------------------

// * -------------------------------------------------------THEME CHANGER-------------------------------------------------------------

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
        instagramIcon.classList.add('mdi--instagram-white');

        // Adiciona a classe dark-theme ao ícone do Menu
        menuIcon.classList.add('dark-theme');

    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        checkbox.checked = false;

        // Muda a classe do ícone do WhatsApp para a versão padrão
        whatsappIcon.classList.remove('ic--baseline-whatsapp-white');
        whatsappIcon.classList.add('ic--baseline-whatsapp');

        // Muda a classe do ícone do Instagram para a versão padrão
        instagramIcon.classList.remove('mdi--instagram-white');
        instagramIcon.classList.add('mdi--instagram');

        // Remove a classe dark-theme do ícone do Menu
        menuIcon.classList.remove('dark-theme');
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
            instagramIcon.classList.add('mdi--instagram-white');

            // Adiciona a classe dark-theme ao ícone do Menu
            menuIcon.classList.add('dark-theme');

        } else {
            // Aplicando o tema claro
            document.documentElement.setAttribute('data-theme', 'light');

            // Salva a preferência de tema como 'light' no localStorage
            localStorage.setItem('theme', 'light');

            // Muda a classe do ícone do WhatsApp para a versão padrão
            whatsappIcon.classList.remove('ic--baseline-whatsapp-white');
            whatsappIcon.classList.add('ic--baseline-whatsapp');

            // Muda a classe do ícone do Instagram para a versão padrão
            instagramIcon.classList.remove('mdi--instagram-white');
            instagramIcon.classList.add('mdi--instagram');

            // Remove a classe dark-theme do ícone do Menu
            menuIcon.classList.remove('dark-theme');
        }

    });

});

// * Script para alterar o texto da tooltip baseado no tema (claro ou escuro)

// Executa o código quando o conteúdo da página é carregado
document.addEventListener("DOMContentLoaded", function() {

    // Obter o elemento do checkbox
    var checkbox = document.getElementById('chk');
    
    // Obter o elemento do contêiner do tema (label)
    var themeContainer = document.querySelector('.theme-container');
    
    // Função que atualiza o texto da tooltip baseado no estado do checkbox
    function updateTooltip() {
        if (checkbox.checked) {
            // Se o checkbox estiver marcado, definir o texto da tooltip como "Aparência: Tema Escuro"
            themeContainer.setAttribute('data-bs-title', 'Aparência: Tema Escuro');
        } 
        
        else {
            // Se o checkbox não estiver marcado, definir o texto da tooltip como "Aparência: Tema Claro"
            themeContainer.setAttribute('data-bs-title', 'Aparência: Tema Claro');
        }
        
        // Atualizar manualmente a tooltip para refletir o novo título
        var tooltip = bootstrap.Tooltip.getInstance(themeContainer);
        if (tooltip) {
            tooltip.setContent({ '.tooltip-inner': themeContainer.getAttribute('data-bs-title') });
        }
    }

    // Adicionar o evento de mudança ao checkbox para atualizar a tooltip quando o tema for alterado
    checkbox.addEventListener('change', updateTooltip);

    // Inicializa a tooltip com o Bootstrap
    new bootstrap.Tooltip(themeContainer);
    
    // Atualiza a tooltip na inicialização
    updateTooltip();
});

// * ---------------------------------------------------------------------------------------------------------------------------------

// * -------------------------------------------------------LINK CONTATOS-------------------------------------------------------------

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

// * Script para corrigir erro de "pulo" no link de contatos em telas menores que 768px

document.addEventListener('DOMContentLoaded', function () {
    const footerLink = document.querySelector('a[href="#contatos"]');
    const footer = document.querySelector('#contatos');
    const navbar = document.querySelector('.navbar');

    if (footerLink && footer && navbar) {
        footerLink.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Scroll inicial para revelar elementos ocultos
            footer.scrollIntoView({ behavior: 'smooth' });
            
            // Recalcula e ajusta a posição após um breve atraso
            setTimeout(() => {
                const navbarHeight = navbar.offsetHeight;
                const footerPosition = footer.getBoundingClientRect().top + window.scrollY;
                window.scrollTo({
                    top: footerPosition - navbarHeight,
                    behavior: 'smooth'
                });
            }, 500); // Ajuste este valor conforme necessário
        });
    }
});

// * ---------------------------------------------------------------------------------------------------------------------------------

// * ----------------------------------------------------BACK TO TOP BUTTON-----------------------------------------------------------

// * Script para o Back to Top Button

// Variável que armazena o estado atual da visibilidade do botão
let isButtonVisible = false;

// Função que é executada quando o usuário rola a página
window.onscroll = function() {
    scrollFunction();
};

// Função que verifica a posição de rolagem da página e exibe/esconde o botão
function scrollFunction() {
    const backToTopBtn = document.getElementById("backToTop");
    const scrollPosition = document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000;

    // Exibe o botão se o scroll for maior que 1000px e o botão estiver invisível
    if (scrollPosition && !isButtonVisible) {
        backToTopBtn.classList.add("show");  // Adiciona a classe 'show'
        backToTopBtn.classList.remove("hide");  // Remove a classe 'hide'
        isButtonVisible = true;  // Atualiza o estado para visível
    } 
    // Esconde o botão se o scroll for menor que 1000px e o botão estiver visível
    else if (!scrollPosition && isButtonVisible) {
        backToTopBtn.classList.add("hide");  // Adiciona a classe 'hide' para animação de fade
        setTimeout(() => {
            backToTopBtn.classList.remove("show");  // Remove a classe 'show' após a animação de fade
        }, 500);  // Define o tempo para corresponder à animação do CSS
        isButtonVisible = false;  // Atualiza o estado para invisível
    }
}

// Função que volta para o topo da página quando o botão for clicado
document.getElementById("backToTop").addEventListener("click", function() {
    // Faz rolagem suave para o topo
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

    // Adiciona a animação de esconder o botão após o clique
    const backToTopBtn = document.getElementById("backToTop");
    backToTopBtn.classList.add("hide");  // Adiciona a classe 'hide' para animação de fade
    setTimeout(() => {
        backToTopBtn.classList.remove("show");  // Remove a classe 'show' após a animação de fade
    }, 500);  // Define o tempo para corresponder à animação do CSS

    isButtonVisible = false;  // Atualiza o estado para invisível
});

// * ---------------------------------------------------------------------------------------------------------------------------------

// * ------------------------------------------------ANIMAÇÃO DOS ELEMENTOS-----------------------------------------------------------

// * Script para a animação de visualização dos elementos com a API Intersection Observer

// Função que usa IntersectionObserver para animar os elementos quando entram na viewport
document.addEventListener("DOMContentLoaded", function () {
    // Seleciona todos os elementos que serão animados
    const hiddenElements = document.querySelectorAll('.hidden-element');
    
    // Configuração do IntersectionObserver
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            // Se o elemento estiver visível, adiciona a classe 'show'
            if (entry.isIntersecting) {
                entry.target.classList.add('show-section');
                observer.unobserve(entry.target);  // Para de observar após animar
            }
        });
    }, {
        threshold: 0.1  // Inicia a animação quando 10% do elemento estiver visível
    });
    
    // Observa cada elemento oculto
    hiddenElements.forEach(element => {
        observer.observe(element);
    });
});

// * ---------------------------------------------------------------------------------------------------------------------------------




