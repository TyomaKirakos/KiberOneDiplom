const form = document.querySelector('.enroll-block__enroll-form');
const submitBtn = form.querySelector('.enroll-form__submit-btn');

const fioInput = form.querySelector('.enroll__fio-input');
const phoneInput = form.querySelector('.enroll__phone-input');

const fioWarningText = form.querySelector('.enroll__fio-warning-text');
const phoneWarningText = form.querySelector('.enroll__phone-warning-text');

const fioPattern = /^[А-Яа-яÀ-ÿЁё\s]+$/;
const phonePattern = /\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}/;

let isValid = true;

submitBtn.addEventListener('click', (e) => {
    isValid = true;

    fioWarningText.textContent = '';
    fioWarningText.style.opacity = '0';

    phoneWarningText.textContent = '';
    phoneWarningText.style.opacity = '0';


    if (fioInput.value == ''){
        fioWarningText.textContent = 'Введите ФИО';
        fioWarningText.style.opacity = '1';
        isValid = false;
    } else if (fioInput.value < 5){
        fioWarningText.textContent = 'ФИО должно включать минимум 5 символов';
        fioWarningText.style.opacity = '1';
        isValid = false;
    } else if (!fioPattern.test(fioInput.value)){
        fioWarningText.textContent = 'Введите ФИО корректно';
        fioWarningText.style.opacity = '1';
        isValid = false;
    }

    if (phoneInput.value == ''){
        phoneWarningText.textContent = 'Введите ваш номер телефона';
        phoneWarningText.style.opacity = '1';
        isValid = false;
    } else if (!phonePattern.test(phoneInput.value)){
        phoneWarningText.textContent = 'Введите номер телефона корректно';
        phoneWarningText.style.opacity = '1';
        isValid = false;
    }

    if (!isValid){
        e.preventDefault()
    } else {
        e.target.submit();
    }
})
