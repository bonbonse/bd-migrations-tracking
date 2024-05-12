<?php


namespace Modules;

class Schema
{
    static $host = 'localhost';
    static $dbname = 'test';
    static $username = 'root';
    static $password = '';

    static function getConnection(){
        return new PDO("mysql:host=". self::$host. ";
        dbname=" . self::$dbname . ", " . self::$username . ", " . self::$password);
    }

    static function create($tableName, )
    {
        $connection = self::getConnection();
    }
}