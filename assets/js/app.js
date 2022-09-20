import '../css/app.scss';
import boostrap from 'bootstrap';
window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');


document.addEventListener('DOMContentLoaded',()=> {
    enableDropdowns();
})

const enableDropdowns = () => {
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
    const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
}