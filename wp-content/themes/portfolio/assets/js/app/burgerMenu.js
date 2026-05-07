const burger = document.querySelector('.navigation__burger');
const menu = document.querySelector('.navigation__menu');
const body = document.body;

burger.addEventListener('click', () => {
    burger.classList.toggle('active');
    menu.classList.toggle('active');
    body.classList.toggle('menu-open');
});