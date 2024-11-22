// * ----------------------------------------------------------FILTRO-----------------------------------------------------------------

// * Script para manter o filtro ativo conforme recarregar a página ou navegar entre as telas

document.addEventListener('DOMContentLoaded', function () {

    // Seleciona todos os links de paginação
    const paginationLinks = document.querySelectorAll('.pagination a');

    // Recupera o filtro armazenado no localStorage; se não existir, usa 'todos' como padrão
    const currentFilter = localStorage.getItem('filtro') || 'todos';

    // Recupera o número da página armazenado no localStorage; se não existir, usa 1 como padrão
    const currentPage = localStorage.getItem('page') || 1;

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

// * Script para atualizar a página com base no filtro armazenado no localStorage quando o Modal de Delete for utilizado

document.addEventListener('DOMContentLoaded', function () {

    const currentFilterDelete = localStorage.getItem('filtro') || 'todos';
    const currentPageDelete = localStorage.getItem('page') || 1;

    // Adiciona os valores armazenados a um campo oculto do formulário ou envia via AJAX
    const filterFieldDelete = document.querySelector('#redirect-filter-delete');
    const pageFieldDelete = document.querySelector('#redirect-page-delete');

    if (filterFieldDelete && pageFieldDelete) {
        filterFieldDelete.value = currentFilterDelete;
        pageFieldDelete.value = currentPageDelete;
    }

});

// * Script para atualizar a página com base no filtro armazenado no localStorage quando o Modal de Restore for utilizado

document.addEventListener('DOMContentLoaded', function () {

    const currentFilterRestore = localStorage.getItem('filtro') || 'todos';
    const currentPageRestore = localStorage.getItem('page') || 1;

    // Adiciona os valores armazenados a um campo oculto do formulário ou envia via AJAX
    const filterFieldRestore = document.querySelector('#redirect-filter-restore');
    const pageFieldRestore = document.querySelector('#redirect-page-restore');

    if (filterFieldRestore && pageFieldRestore) {
        filterFieldRestore.value = currentFilterRestore;
        pageFieldRestore.value = currentPageRestore;
    }
    
});

// * ---------------------------------------------------------------------------------------------------------------------------------