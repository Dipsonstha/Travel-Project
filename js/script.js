let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

formBtn.addEventListener('click', () => {
    loginForm.classList.add('active');
});

formClose.addEventListener('click', () => {
    loginForm.classList.remove('active');
});

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

document.getElementById("forgot-password-link").addEventListener("click", function(event) {
    event.preventDefault();
    showForgotPassword();
  });   
  
  function showForgotPassword() {
    alert("Forgot password? Please contact our support team for assistance.");
  }