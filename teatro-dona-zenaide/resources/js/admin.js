// Imports JS
import './bootstrap';

// Imports CSS
import '../css/admin/global.css';
import '../css/admin/login.css';

// * Ativando os tooltips do Bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))