<?php
namespace App\Models;
use App\DB\DB;

class Tables extends DB{
    public function getTables() {
        $tables = parent::query("SHOW TABLES");

        foreach ($tables as $table) {
            echo "<div><a onclick='window.location=`index.php?table=${table}`'>" . $table . "<a></div>";
        }
    }
}

