<?php

namespace App\DB;

use PDO;
use PDOException;

class DB
{
    protected PDO $connection;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'atelier';
        $username = 'root';
        $password = '';

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }

    public function select(string $table, array $options)
    {
        $select = ['*'];

        if (!empty($options['select'])) {
            $select = is_array($options['select'])
                ? implode(', ', $options['select'])
                : $options['select'];
        }

        $sql = "select $select from $table";

        $answer = $this->query($sql);

        if (!isset($answer)) {
            return;
        }

        foreach ($answer as $row) {
            echo "<div>$row[id_kind]</div>";
            echo "<div>$row[kind_name]</div>";
        }

        echo "Сделано";
    }

    public function query($sql): bool | array
    {
        return $this
            ->connection
            ->query($sql)
            ->fetchAll();
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function insert()
    {
    }

    public function createTable($options)
    {
        $sql = "CREATE DATABASE $options[0]";

        $answer = $this
            ->connection
            ->query($sql)
            ->fetchAll();

        if (!isset($answer)) {
            return null;
        }
        echo "Сделано";
    }
}