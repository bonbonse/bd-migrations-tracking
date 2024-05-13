<?php

namespace Modules;

use function Sodium\add;

class Blueprint
{
    protected $table;
    protected $columns;

    function id($column = 'id', $type = 'INT PRIMARY KEY') {
        $this->addColumn($column, $type);
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
    function timestamps($column = 'date') {
        $this->addColumn($column, 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
    }

    function addColumn($name, $type, $param = null){
        $this->columns[] =  [$name, $type];
    }
    public function getColumns(){
        return $this->columns;
    }
}