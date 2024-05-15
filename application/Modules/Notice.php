<?php


namespace Modules;


class Notice
{
    static function createMigrations($tableName){
        return ' <?php

namespace Migrations;

use Core\Migration;
use Modules\Blueprint;
use Modules\Schema;

return new class extends Migration //Класс пустой
{
    static function up() //TODO: Нужна ли static?
    {
        Schema::create(
            "' . $tableName . '",
            function (Blueprint $table) { 
            
            }
        );
    }
    //TODO: down
}
        ';
    }
}