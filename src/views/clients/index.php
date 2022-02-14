<div class="container">
    <h1>Список клиентов</h1>
    <div id="table" class='container'>
        <div class="row bg-dark text-light table-header">
            <div class="col-md-3">
                ФИО
            </div>
            <div class="col-md-3">
                Телефон
            </div>
            <div class="col-md-3">
                Кем приходится
            </div>
            <div class="col-md-3">
                Кнопки действий
            </div>
        </div>
        <div id="list"></div>
    </div>

    <div class="row container mt-5 d-flex justify-content-between">
        <div>
            <button type="button" class="btn btn-primary create">Добавить Клиента</button>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modalCreateForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-body" method="POST">

            </form>
            <div class="output container"></div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalUpdateForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-body" method="POST">
            </form>
            <div class="output container"></div>
        </div>
    </div>
</div>