<?php


namespace Modules;


class Notice
{
    static function createMigrations($tableName){
        return '<?php

namespace Migrations;

use Core\Migration;
use Modules\Blueprint;
use Modules\Schema;

return new class extends Migration //Класс пустой
{
    public function up() 
    {
        Schema::create(
            "' . $tableName . '",
            function (Blueprint $table) { 
            
            }
        );
    }
    public function down(){
        echo "даун";
    }
};
        ';
    }
}