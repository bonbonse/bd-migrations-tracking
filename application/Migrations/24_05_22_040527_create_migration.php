<?php

namespace Migrations;

use Core\Migration;
use Modules\Blueprint;
use Modules\Schema;

return new class extends Migration //Класс пустой
{
    public function up() 
    {
        Schema::create(
            "migration",
            function (Blueprint $table) { 
            $table->id(id);
$table->varchar(50)(name);
$table->date(dateCreated);

            }
        );
    }
    public function down(){
        Schema::drop("migration");
    }
};
        