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
            $table->id(id);
$table->varchar(50)(migration);
$table->timestamp(date);

            }
        );
    }
    public function down(){
        Schema::drop("migrations");
    }
};
        