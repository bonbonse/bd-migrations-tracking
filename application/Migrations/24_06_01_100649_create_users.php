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
$table->string("name", 50);
$table->string("surname", 50);
$table->int("age");

            }
        );
    }
    public function down(){
        Schema::drop("users");
    }
};
        