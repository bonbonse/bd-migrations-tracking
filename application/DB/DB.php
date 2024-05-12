<?php

namespace DB;

use PDO;
use PDOException;

class DB
{
    public $tables;
    public $result;
    public $connection;


    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'test';
        $username = 'root';
        $password = '';

        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }
    public function query($sql, $mode = PDO::FETCH_DEFAULT){
        return $this->connection->query($sql)->fetchAll($mode);
    }
}