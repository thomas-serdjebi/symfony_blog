import '../css/app.scss';
import boostrap from 'bootstrap';
window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');


document.addEventListener('DOMContentLoaded',()=> {
    new App();
})

class App {
    constructor(){
        this.enableDropdowns();
        this.handleCommentForm();

    }

    enableDropdowns(){
        const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
        const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))

    }

    handleCommentForm(){
        const commentForm = document.querySelector('form.comment-form')
        
        if ( null === commentForm) {
            return;
        }

        commentForm.addEventListener('submit', async(e) => {
            e.preventDefault();
        })
    }
}
