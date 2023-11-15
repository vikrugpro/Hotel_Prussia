"use strict"

document.addEventListener('DOMContentLoaded', function () {
    // переменную формы по id
    const form = document.getElementById('form');
    form.addEventListener('submit', formSend);
// функция отправки
    async function formSend(e) {
        e.preventDefault();
        // проверка на заполненность
        let error = formValidate(form); 

        // сбор данных
        let formData = new FormData(form);

        // отправка
        if (error === 0) {
            form.classList.add('_sending');
            let response = await fetch('sendmail.php', {
                method: 'POST',alert(ok);
                body: formData
            });
            // все в порядке
            if (response.ok) {
                let result = await response.json();
                alert(result.message);
                formPreview.innerHTML = '';
                form.reset();
                form.classList.remove('_sending');
            } else {
                // сбой
                alert('Ошибка!');
                form.classList.remove('_sending');
            }


        } else {
            alert('Заполните поля формы!');
        }
    }
// функция проверки
    function formValidate(form) {
        let error = 0;
        // сбор обязательных полей по стилю
        let formReq = document.querySelectorAll('._req');
        // цикл получения объекта и проверки его
        for (let index = 0; index < formReq.length; index++) {
            const input = formReq[index];
            formRemoveError(input);

            if (input.classList.contains('_email')) {
                if (emailTest(input)) {
                    formAddError(input);
                    error++;

                }
                // проверка заполненности
            } else if (input.value === '') {
                formAddError(input);
                error++;
            }
        }
        return error;
    }
    // добавление объекту класса и удаление
    function formAddError(input) {
        input.parentElement.classList.add('_error');
        input.classList.add('_error');
    }
    function formRemoveError(input) {
        input.parentElement.classList.remove('_error');
        input.classList.remove('_error');
    }
    // проверка почты
    function emailTest(input) {
        return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
    }
});