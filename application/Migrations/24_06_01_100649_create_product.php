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
            "product",
            function (Blueprint $table) { 
            $table->int("id");
$table->string("name", 50);
$table->string("price", 50);

            }
        );
    }
    public function down(){
        Schema::drop("product");
    }
};
        