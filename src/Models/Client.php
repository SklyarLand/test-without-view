<?php

namespace App\Models;

use \App\Core\Model;
use PDO;

class Client extends Model
{
    protected $table = 'clients';

    /**
     * Получить строку по id
     * @param int $id
     * @return array
     */
    public function get(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        return $client;
    }

    /**
     * Получить все строки
     * @param int $limit
     * @return array
     */
    public function all(int $limit = 20)
    {
        $query = "SELECT * FROM {$this->table} WHERE is_deleted = 0 LIMIT {$limit}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $clients = self::convertOutput($clients);
        return $clients;
    }

    /**
     * Добавить строку
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        $insert = "INSERT {$this->table} (`fio`, `phone`, `desc`) VALUES (:fio, :phone, :desc)";
        $stmt = $this->conn->prepare($insert);
        $stmt->bindParam(':fio', $data['fio']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':desc', $data['desc']);
        return $stmt->execute();
    }

    /**
     * Обновить строку
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data)
    {
        $update = "UPDATE {$this->table} SET `fio` = :fio, `phone` = :phone, `desc` = :desc WHERE id = :id";
        $stmt = $this->conn->prepare($update);
        $stmt->bindParam(':fio', $data['fio']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':desc', $data['desc']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * Отметить строку как удаленную
     * @param int $id
     * @return bool
     */
    public function remove(int $id)
    {
        $update = "UPDATE {$this->table} SET `is_deleted` = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($update);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}