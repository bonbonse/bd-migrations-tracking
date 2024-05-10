<?php
namespace Models;

use Core\Model;

class Tables extends Model
{
    public function get_data()
    {
        $this->tables = $this->query("SHOW TABLES");
    }
}