<?php

namespace Models;

use Core\Model;
use PDO;

class Select extends Model
{
    public function getData()
    {
        $table = '';
        if (isset($_GET['table']))
            $table = $_GET['table'];

        if ($table !== '' && isset($table)){
            $this->result = $this->query("SELECT * FROM $table;", PDO::FETCH_ASSOC);
        }

        parent::getData();
    }
}