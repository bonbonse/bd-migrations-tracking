<?php

namespace Modules;

use function Sodium\add;

class Blueprint
{
    protected $table;
    protected $columns;

    function id($name = 'id') {
        $this->addColumn($name, 'INT PRIMARY KEY');
    }

    function string($column, $length = null) {
        $type = 'varchar(50)';
        if (isset($length))
            $type = 'varchar(' . $length . ')';


        $this->addColumn($column, $type);
    }
    function int($name) {
        $this->addColumn($name, 'INT');
    }
    function timestamps() {
        //TODO:
    }

    function addColumn($name, $type, $param = null){
        $this->columns[] =  [$name, $type];
    }
    public function getColumns(){
        return $this->columns;
    }
}