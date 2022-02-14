<?php

namespace App\Controllers;



use App\Models\Client;
use App\Core\Controller;

class ClientsController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model = new Client();
    }

    /**
     * Стартовая страница
     */
    public function index()
    {
        $this->view->generate('clients/index.php', 'base.php');
    }

    /**
     * Форма создания нового клиента
     */
    public function create()
    {
        $this->view->generate('clients/create.php');
    }

    /**
     * Форма редактирования клиента
     * @param int $id
     */
    public function edit(int $id)
    {
        $forRender = [ 'client' => $this->model->get($id) ];
        $this->view->generate('clients/edit.php', null, $forRender);
    }

    /**
     * Получить всех пользователей
     */
    public function all()
    {
        $clients = $clients = $this->model->all();
        $this->JsonResponse(200, $clients);
    }

    /**
     * Получить конкретного пользователя
     * @param int $id
     */
    public function get(int $id)
    {
        $client = $this->model->get($id);
        $this->JsonResponse(200, $client);
    }

    /**
     * Добавить пользователя
     */
    public function store()
    {
        $data = $_POST;
        try {
            $this->model->add($data);
        } catch (\Exception $e) {
            $this->JsonResponse(500, null, ['Ошибка при добавлении!']);
        }
        $this->JsonResponse(200, 'Добавлен новый клиент!');
    }

    /**
     * Обновить пользователя
     * @param int $id
     */
    public function update(int $id)
    {
        $data = $_POST;
        try {
            $this->model->update($id, $data);
        } catch (\Exception $e) {
            $this->JsonResponse(500, null, ['Ошибка при обновлении!']);
        }
        $this->JsonResponse(200, 'Клиент был обновлен!');
    }

    /**
     * Удалить пользователя
     * @param int $id
     */
    public function delete(int $id)
    {
        try {
            $this->model->remove($id);
        } catch (\Exception $e) {
            $this->JsonResponse(500, null, ['Ошибка при удалении!']);
        }
        $this->JsonResponse(200, 'Клиент был удален!');
    }
}