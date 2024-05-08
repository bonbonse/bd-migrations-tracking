<?php

namespace App\DB;

class Migration
{
    const ERROR = 0;
    const SUCCESS = 1;

    protected function up()
    {
        $db = new DB();
        dd("Query in db - " . $db);
        $db->select('kinds', ['select' => 'id']);

        return self::SUCCESS;
    }

    protected function down()
    {
        return self::SUCCESS;
    }
}
