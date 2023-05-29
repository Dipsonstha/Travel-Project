let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');
let formBtn = document.querySelector('#login-btn');
let loginFormContainer = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

formBtn.addEventListener('click', () => {
    loginFormContainer.classList.add('active');
});

formClose.addEventListener('click', () => {
    loginFormContainer.classList.remove('active');
});

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};
