window.onload = () => {
    const btn = document.querySelector('#toggle-menu'),
        menu = document.querySelector('.header-menu_wrapper');

    btn.addEventListener('click', () => {
        console.log(menu)
        menu.classList.toggle('open')
    })
}