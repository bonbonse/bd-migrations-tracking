<?php

namespace DB;

use PDO;

class DB
{
    public $connection;

    public function __construct()
    {
        $host = $_ENV['MYSQL_HOST'];
        $db = $_ENV['MYSQL_DATABASE'];
        $user = $_ENV['MYSQL_USER'];
        $password = $_ENV['MYSQL_PASSWORD'];

        $this->connection = new PDO(
            "mysql:host=$host;dbname=$db",
            $user,
            $password);
    }

    public function select($table, $fields = '*', $options = null)
    {
        $sql = "SELECT $fields FROM $table ";
        if ($options !== null) {
            $sql . "WHERE $options";
        }

        return $this->query($sql);
    }

    public function query($sql, $mode = PDO::FETCH_DEFAULT): array
    {
        $query = $this
            ->connection
            ->query($sql);
        if ($query === false) {
            throw new \Exception($this->connection->errorInfo()[2]);
        }

        return $query->fetchAll($mode);
    }

    public function update($table, $columns, $values, $condition)
    {
        $sql = "UPDATE $table SET ";
        foreach ($columns as $column) {
            foreach ($values as $value) {
                //TODO:
            }
        }
        $sql .= "WHERE " . $condition;

        return $this->query($sql);
    }

    public function delete($options)
    {
        $sql = "";

        return $this->query($sql);
    }

    public function insert($table, $values, $columns = null)
    {
        $sql = "INSERT INTO $table ";
        if ($columns !== null) {
            $sql = "(";
            foreach ($columns as $column) {
                $sql .= $column . ", "; //TODO запятую в конце убрать
            }
            $sql .= ") ";
        }

        $sql .= "VALUES ";
        foreach ($values as $value) {
            $sql .= $value . ", "; //TODO запятую в конце убрать
        }
        $sql .= ");";
        $this->query($sql);
    }
}