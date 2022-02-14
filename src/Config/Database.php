<?php

namespace App\Config;

use PDO;
use PDOException;

/**
 * Класс для получения коннекшена
 * Class Database
 * @package App\Config
 */
class Database
{
    private $host = "localhost";
    private $db_name = "test-app";
    private $username = "root";
    private $password = "";
    public $conn;


    public function getConnection()
    {
        $this->conn = null;

        try {
            $dsn = 'mysql:dbname=' . $this->db_name .';host=' . $this->host;
            $this->conn = new PDO($dsn, $this->username, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}