<?php
namespace Core;

use DB\DB;
use PDO;

class Model extends DB
{
	// метод выборки данных
	public function get_data()
	{
        $this->tables = $this->query("SHOW TABLES", PDO::FETCH_COLUMN);
    }
}