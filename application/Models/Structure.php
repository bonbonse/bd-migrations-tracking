<?php
namespace Models;

use Core\Model;

class Structure extends Model
{
    public function get_data()
    {
        $table = $_GET['table'];

        $this->result = $this->query("DESCRIBE $table");
        parent::get_data();
    }
}