let form = document.querySelector('.auth-block__auth-form');
let inputBlocks = form.querySelectorAll('.auth-form__auth-inputs');

inputBlocks.forEach(inputBlock => {
    let input = inputBlock.querySelector('.auth-inputs__input');
    input.addEventListener('input', () => {
        input.classList.remove('invalid-input');
        let label = inputBlock.querySelector('.auth-inputs__warning-text');
        label.textContent = '';
        label.style.opacity = '0';
    });
});
