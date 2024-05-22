<?php
namespace Core;

use DB\DB;
use Exception;
use PDO;

class Model extends DB
{
    public $tables;
    public $migrations;
    public $result;
	// метод выборки данных
	public function getData()
	{
	    try{
            $this->tables = $this->query("SHOW TABLES", PDO::FETCH_COLUMN);
            $this->migrations = $this->query("SELECT * FROM migrations", PDO::FETCH_COLUMN);
        }
        catch (Exception $e){
	        var_dump($e->getMessage());

        }

    }

}