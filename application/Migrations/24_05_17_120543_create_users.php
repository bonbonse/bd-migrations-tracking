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
            "users",
            function (Blueprint $table) { 
            $table->id();
$table->varchar(50)(name);
$table->varchar(50)(surname);
$table->int(age);

            }
        );
    }
    public function down(){
        Schema::drop("users");
    }
};
        