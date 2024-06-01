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
$table->int("product_id");

            }
        );
    }
    public function down(){
        Schema::drop("catalog");
    }
};
        