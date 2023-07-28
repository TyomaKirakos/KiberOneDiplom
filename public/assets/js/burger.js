const burgerOpenBtn = document.querySelector('.header__burger-btn');
const burgerMenu = document.querySelector('.burger-bg');
const modalCloseBtn = burgerMenu.querySelector('.burger__close-btn');



burgerOpenBtn.addEventListener('click', openModal);

modalCloseBtn.addEventListener('click', closeModal)

/* Закрытие меню в случае нажатия на затемнение */
window.addEventListener('click', (e) => {
    if (e.target == burgerMenu) {
        closeModal();
    }
})

/* Фун-ия открытия меню */
function openModal() {
    burgerMenu.style.display = 'block';
}

/* Фун-ия закрытия меню */
function closeModal() {
    burgerMenu.style.display = 'none';
}
