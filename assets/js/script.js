$(document).ready(() => {
    let createButton = document.querySelector('.create');

    let modalCreateWrapper = document.getElementById('modalCreateForm');
    let createForm = modalCreateWrapper.querySelector('form');

    let modalUpdateWrapper = document.getElementById('modalUpdateForm');
    let updateForm = modalUpdateWrapper.querySelector('form');

    /**
     * Подгрузка формы создания при клике
     */
    createButton.addEventListener('click', (e) => {
        $.ajax({
            method: 'GET',
            url: '/clients/create',
            success: function (request) {
                createForm.innerHTML = request;
                $(modalCreateWrapper).modal();
            }
        })
    })

    /**
     * Инициализация формы create
     */
    $(createForm).ajaxForm({
        method: 'POST',
        url: '/clients/',
        success: function (request) {
            successJsonHanlder(createForm, request);
        }
    })

    /**
     * Инициализация формы update
     */
    $(updateForm).ajaxForm({
        method: 'POST',
        url: '/clients/',
        beforeSubmit: function (arr, $form, options) {
            //добавляем в url номер клиента
            let id = 0;
            for(let input of arr)
            {
                if (input.name === 'id') {
                    id = input.value;
                    break;
                }
            }

            options.url += id;
        },
        success: function (request) {
            successJsonHanlder(updateForm, request);
        }
    })

    /**
     * Подгрузка формы редактироваиня при клике
     */
    $(document).on('click', '.edit', function (e) {
        let row = e.target.closest('[data-id]');
        let clientId = row.dataset.id;
        $.ajax({
            method: 'GET',
            url: `/clients/${clientId}/edit`,
            success: function (request) {
                updateForm.innerHTML = request;
                $(modalUpdateWrapper).modal();
            }
        })
    })

    /**
     * Удаление при клике
     */
    $(document).on('click', '.delete', function (e) {
        let row = e.target.closest('[data-id]');
        let clientId = row.dataset.id;
        $.ajax({
            method: 'POST',
            url: `/clients/${clientId}/delete`,
            success: function (request) {
                listUpdate();
            }
        })
    })


    listUpdate();
});

function getErrorMessage(message) {
    return `<div class="alert alert-warning" role="alert">
            ${message}
        </div>`
}

function getSuccessMessage(message) {
    return `<div class="alert alert-success" role="alert">
                ${message}
            </div>`
}

/**
 * Обновляет вывод таблицы
 */
function listUpdate() {
    function getRow(object)
    {
        return `
            <div class="row task-row" data-id="${object.id}">
                <div class="col-md-3 border">${object.fio}</div>
                <div class="col-md-3 border">${object.phone}</div>
                <div class="col-md-3 border">${object.desc}</div>
                <div class="col-md-3 border py-3" style='text-align: center;'>
                    <button class="edit">Редактировать</button>
                    <button class="delete">Удалить</button>
                </div>
            </div>
            `;
    }

    $.ajax({
        method: 'GET',
        url: `/clients/`,
        success: function (request) {
            let list = $(document.getElementById('list'));
            if (request.data) {
                list.empty();
                for (let client of request.data) {
                    let row = $(getRow(client));
                    list.append(row);
                }
            }
        }
    })
}

/**
 * Обработчик успешной отправки формы
 * @param element
 * @param request
 */
function successJsonHanlder(element, request)
{
    if (element) {
        let output = element.closest('.modal').querySelector('.output');
        if (request.data) {
            let message = $(getSuccessMessage(request.data));
            $(output).append(message);
            setTimeout(() => {message.remove()}, 3000);
        }
    }
    listUpdate();
}