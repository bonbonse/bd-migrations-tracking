<?php


class MigrationManager
{
    protected $connection;
    protected function connect(){
        require '../connect.php';
        require '../query.php';
        $this->connection = $pdo;
    }

    protected function select($options) {
        $this->connect();

        $sql = "select $options[0] from $options[1]";

        $answer = query($sql);

        if (!isset($answer))
            return null;

        foreach ($answer as $row) {
            echo "<div>$row[id_kind]</div>";
            echo "<div>$row[kind_name]</div>";
        }

        echo "Сделано";
    }
}