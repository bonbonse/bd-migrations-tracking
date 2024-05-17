<?php
namespace Core;

use DB\DB;
use PDO;

class Model extends DB
{
    public $tables;
    public $migrations;
    public $result;
	// метод выборки данных
	public function getData()
	{
        $this->tables = $this->query("SHOW TABLES", PDO::FETCH_COLUMN);
        $this->migrations = $this->query("SELECT * FROM migrations", PDO::FETCH_COLUMN);
    }

}