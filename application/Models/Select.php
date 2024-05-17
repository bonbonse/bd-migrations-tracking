<?php

namespace Models;

use Core\Model;

class Select extends Model
{
    public function getData()
    {
        $table = $_GET['table'];

        $this->result = $this->query("SELECT * FROM $table;");
        parent::getData();
    }
}