const header = document.querySelector("header");

window.addEventListener("scroll", function () {
    header.classList.toggle("sticky", window.scrollY > 0);
});

// Seleciona o ícone do menu e a barra de navegação 
let menuIcon = document.querySelector('#menu-icon'); let navbar = document.querySelector('.navbar'); 
// Alterna entre ativar e desativar o menu ao clicar no ícone 
menuIcon.onclick = () => { navbar.classList.toggle('active'); };