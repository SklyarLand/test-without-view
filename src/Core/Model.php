<?php


namespace App\Core;

use App\Config\Database;

class Model
{
    /**
     * @var \PDO|null
     */
    public $conn;

    /**
     * @var string
     */
    protected $table;

    function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Для вывода массива строк
     * @param $array
     * @return array
     */
    static function convertOutput ($array) : array
    {
        foreach ($array as $i => $str) {
            foreach ($str as $key => $value) {
                $str[$key] = htmlspecialchars($value);
            }
            $array[$i] = $str;
        }
        return $array;
    }
}