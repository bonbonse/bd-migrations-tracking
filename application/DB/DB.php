<?php

namespace DB;

use PDO;
use PDOException;

class DB
{
    public $tables = [];
    public $connection;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'test';
        $username = 'root';
        $password = '';

        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        $this->tables = $this->connection->query("SHOW TABLES")->fetchAll();//TODO: Убрать это в отдельный метод
    }
    public function query($sql){
        $this->connection->query($sql)->fetchAll();
    }

}