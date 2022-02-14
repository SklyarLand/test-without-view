<?php


namespace App\Core;


/**
 * Трэит - в теории ответ может давать не только сущность Контроллер
 * можно добавить middleware, например для проверки пользователя
 * Trait JsonResponser
 * @package App\Core
 */
trait JsonResponser
{
    /**
     * Базовый метод JSON ответа
     * @param int $status
     * @param array $data
     * @param array $errors
     */
    protected function JsonResponse(int $status = 200, $data = [], $errors = [])
    {
        header('Content-Type: application/json; charset=utf-8');
        $json = ['status' => $status];
        if ($data) $json['data'] = $data;
        if ($errors) $json['errors'] = $errors;
        die(json_encode($json));
    }
}