<?php
namespace Core;

use DB\DB;

class Model extends DB
{
	// метод выборки данных
	public function get_data()
	{
        $this->tables = $this->query("SHOW TABLES");
    }
}