// * ----------------------------------------------------------FILTRO-----------------------------------------------------------------

// * Script para manter o filtro ativo conforme recarregar a página ou navegar entre as telas

// Aguarda o carregamento completo do DOM antes de executar o código
document.addEventListener('DOMContentLoaded', function () {

    // Seleciona todos os links do dropdown com o atributo 'data-filter'
    const filterLinks = document.querySelectorAll('.dropdown-menu a[data-filter]');

    // Seleciona todos os links de paginação
    const paginationLinks = document.querySelectorAll('.pagination a');

    // Recupera o filtro armazenado no localStorage; se não existir, usa 'todos' como padrão
    const currentFilter = localStorage.getItem('filtro') || 'todos';

    // Recupera o número da página armazenado no localStorage; se não existir, usa 1 como padrão
    const currentPage = localStorage.getItem('page') || 1;

    // Adiciona um evento de clique a cada link do dropdown
    filterLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Obtém o valor do filtro selecionado a partir do atributo 'data-filter'
            const selectedFilter = this.getAttribute('data-filter');

            // Armazena o filtro selecionado no localStorage
            localStorage.setItem('filtro', selectedFilter);

            // Reseta a página para 1 ao trocar o filtro, para evitar inconsistências
            localStorage.setItem('page', 1);
        });
    });

    // Adiciona um evento de clique a cada link de paginação
    paginationLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Extrai os parâmetros da URL do link clicado
            const urlParams = new URLSearchParams(this.href.split('?')[1]);

            // Obtém o número da página dos parâmetros da URL; se não existir, usa 1 como padrão
            const page = urlParams.get('page') || 1;

            // Armazena o número da página no localStorage
            localStorage.setItem('page', page);
        });
    });

    // Verifica se o filtro armazenado no localStorage já está na URL atual
    if (currentFilter && window.location.search.indexOf(`filtro=${currentFilter}`) === -1) {
        // Constrói uma nova URL com o filtro e a página armazenados
        const newUrl = `${window.location.origin}${window.location.pathname}?filtro=${currentFilter}&page=${currentPage}`;

        // Redireciona o usuário para a nova URL
        window.location.href = newUrl;
    }
});

// * Script para atualizar a página com base no filtro e página armazenados no localStorage quando o Modal de New for utilizado

document.addEventListener('DOMContentLoaded', function () {

    const currentFilterNew = localStorage.getItem('filtro') || 'todos';
    const currentPageNew = localStorage.getItem('page') || 1;

    // Adiciona os valores armazenados a um campo oculto do formulário ou envia via AJAX
    const filterFieldNew = document.querySelector('#redirect-filter-new');
    const pageFieldNew = document.querySelector('#redirect-page-new');

    if (filterFieldNew && pageFieldNew) {
        filterFieldNew.value = currentFilterNew;
        pageFieldNew.value = currentPageNew;
    }

});

// * Script para atualizar a página com base no filtro e página armazenados no localStorage quando o Modal de Visibility for utilizado

document.addEventListener('DOMContentLoaded', function () {

    const currentFilterVisibility = localStorage.getItem('filtro') || 'todos';
    const currentPageVisibility = localStorage.getItem('page') || 1;

    // Adiciona os valores armazenados a um campo oculto do formulário ou envia via AJAX
    const filterFieldVisibility = document.querySelector('#redirect-filter-visibility');
    const pageFieldVisibility = document.querySelector('#redirect-page-visibility');

    if (filterFieldVisibility && pageFieldVisibility) {
        filterFieldVisibility.value = currentFilterVisibility;
        pageFieldVisibility.value = currentPageVisibility;
    }

});

// * Script para atualizar a página com base no filtro e página armazenados no localStorage quando o Modal de Remove for utilizado

document.addEventListener('DOMContentLoaded', function () {

    const currentFilterRemove = localStorage.getItem('filtro') || 'todos';
    const currentPageRemove = localStorage.getItem('page') || 1;

    // Adiciona os valores armazenados a um campo oculto do formulário ou envia via AJAX
    const filterFieldRemove = document.querySelector('#redirect-filter-remove');
    const pageFieldRemove = document.querySelector('#redirect-page-remove');

    if (filterFieldRemove && pageFieldRemove) {
        filterFieldRemove.value = currentFilterRemove;
        pageFieldRemove.value = currentPageRemove;
    }

});

// * ---------------------------------------------------------------------------------------------------------------------------------