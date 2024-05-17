<?php
namespace Models;

use Core\Model;
use PDO;

class Table extends Model
{
    public function getData()
    {
        //
    }
    public function getTable($name){
        $this->result = $this->query("DESCRIBE $name");
        return $this->result;
    }
}