<?php


namespace Modules;


class Notice
{
    static function createMigrations($tableName, $fields){
        $fieldsText = self::fieldsToText($fields);
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
            ' . $fieldsText . '
            }
        );
    }
    public function down(){
        Schema::drop("' . $tableName . '");
    }
};
        ';
    }

    // TODO: обработка text, varchar(50) и т.д.
    static function fieldsToText($fields){
        $res = '';
        foreach ($fields as $field){
            $res .= '$table->';
            if ($field['Key'] === 'PRI'){
                $res .=  'id';
                $res .= $field['Field'] === 'id' ? '(' . $field['Field'] . ');' : '();';
            }
            else {
                $res .= $field['Type']. '(' . $field['Field'] . ');';
            }
            $res .= PHP_EOL;
        }
        return $res;
    }
}