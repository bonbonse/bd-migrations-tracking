<?php

namespace Migrations;

use Core\Migration;
use Modules\Blueprint;
use Modules\Schema;

class create_users extends Migration //Класс пустой
{
    public function up() 
    {
        Schema::create(
            'test',
            function (Blueprint $table) { // id, int, string
                $table->id();
                $table->string('name');
                $table->string('description');
            }
        );
    }
    public function down(){
        echo "Я даун";
    }
};