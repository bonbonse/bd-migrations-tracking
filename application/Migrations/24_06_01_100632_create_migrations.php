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
            "migrations",
            function (Blueprint $table) { 
            $table->id();
$table->string("name", 50);
$table->timestamps("dateCreated");

            }
        );
    }
    public function down(){
        Schema::drop("migrations");
    }
};
        