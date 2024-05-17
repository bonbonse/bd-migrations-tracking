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
            "catalog",
            function (Blueprint $table) { 
            $table->id();
$table->varchar(50)(name);
$table->int(price);
$table->text(discription);

            }
        );
    }
    public function down(){
        Schema::drop("catalog");
    }
};
        