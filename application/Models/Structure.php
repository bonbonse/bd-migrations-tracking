<?php
namespace Models;

use Core\Model;

class Structure extends Model
{
    public function getData()
    {
        $table = $_GET['table'];

        $this->result = $this->query("DESCRIBE $table");
        parent::getData();
    }
}