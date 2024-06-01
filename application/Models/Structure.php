<?php
namespace Models;

use Core\Model;

class Structure extends Model
{
    public function getData()
    {
        $table = '';
        if (isset($_GET['table']))
            $table = $_GET['table'];

        if ($table !== '' && isset($table)){
            $this->result = $this->query("DESCRIBE $table");
        }

        parent::getData();
    }
}