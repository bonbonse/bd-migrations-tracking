<?php


namespace Modules;

use PDO;
use PDOException;

class Schema
{
    static $host = 'localhost';
    static $dbname = 'test';
    static $username = 'root';
    static $password = '';

    static function getConnection()
    {
//        return new PDO("mysql:host=". self::$host. ";
//        dbname=" . self::$dbname . ", " . self::$username . ", " . self::$password);
    }

    static function create($tableName, $callback)
    {
        //$connection = self::getConnection();
        $table = new Blueprint();
        $callback($table);
        $columns = $table->getColumns();

        $sql = "CREATE TABLE $tableName("; // TODO: Стоит ли формировать sql строку здесь?
        foreach ($columns as $column){
            foreach ($column as $attribute){
                $sql .= $attribute . " "; //TODO: Как-то надо включить параметры
            }
            $sql .= ", "; //TODO: Запятую убрать в конце
        }
        $sql .= ");";
        var_dump($sql);
        // TODO: Отправляем запрос
    }
}