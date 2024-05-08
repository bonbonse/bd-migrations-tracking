<?php
namespace Models;

use Core\Model;

class Structure extends Model
{
    public function get_data()
    {
        $table = $_GET['table'];

        $fields = $this->connection->query("DESCRIBE $table;")->fetchAll();
        return $fields;


    }
}