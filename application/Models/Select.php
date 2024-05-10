<?php

namespace Models;

use Core\Model;

class Select extends Model
{
    public function get_data()
    {
        $table = $_GET['table'];

        $this->result = $this->query("SELECT * FROM $table;");
        parent::get_data();
    }
}