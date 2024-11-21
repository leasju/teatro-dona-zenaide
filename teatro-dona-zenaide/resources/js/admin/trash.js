// * ----------------------------------------------------------FILTRO-----------------------------------------------------------------

// * Script para atualizar a página com base no filtro armazenado no localStorage quando o Modal de Delete for utilizado

document.addEventListener('DOMContentLoaded', function () {

    const currentFilterDelete = localStorage.getItem('filtro') || 'todos';

    // Adiciona os valores armazenados a um campo oculto do formulário ou envia via AJAX
    const filterFieldDelete = document.querySelector('#redirect-filter-delete');

    filterFieldDelete.value = currentFilterDelete;

});

// * Script para atualizar a página com base no filtro armazenado no localStorage quando o Modal de Restore for utilizado

document.addEventListener('DOMContentLoaded', function () {

    const currentFilterRestore = localStorage.getItem('filtro') || 'todos';

    // Adiciona os valores armazenados a um campo oculto do formulário ou envia via AJAX
    const filterFieldRestore = document.querySelector('#redirect-filter-restore');

    filterFieldRestore.value = currentFilterRestore;
    
});

// * ---------------------------------------------------------------------------------------------------------------------------------