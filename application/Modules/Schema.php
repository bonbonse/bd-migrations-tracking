<?php


namespace Modules;

use DB\DB;
use PDO;
use PDOException;

class Schema
{
    static $host = 'localhost';
    static $dbname = 'test';
    static $username = 'root';
    static $password = '';

    static function connection()
    {
        return new PDO("mysql:host=". self::$host. ";
        dbname=" . self::$dbname . ", " . self::$username . ", " . self::$password);
    }

    static function create($tableName, $callback)
    {
        //$connection = self::getConnection();
        $table = new Blueprint();
        $callback($table);
        $columns = $table->getColumns();
        var_dump($columns);

        $sql = "CREATE TABLE $tableName("; // TODO: Стоит ли формировать sql строку здесь?
        foreach ($columns as $column){
            foreach ($column as $attribute){
                $sql .= $attribute . " "; //TODO: Как-то надо включить параметры
            }
            $sql .= ", "; //TODO: Запятую убрать в конце
        }
        $sql = substr($sql, 0, -3);
        $sql .= ");";
        var_dump($sql);

        self::query($sql);
    }

    static function drop($tableName){
        $sql = "DROP TABLE $tableName";
        self::query($sql);
    }

    static function query($sql, $mode = PDO::FETCH_DEFAULT){
        $db = new DB();
        $db->query($sql);
    }

}