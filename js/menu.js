document.querySelector('.menuBurger').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('menu-visible');
    menu.classList.toggle('menu-hidden');
});