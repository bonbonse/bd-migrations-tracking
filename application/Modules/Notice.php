<?php


namespace Modules;


class Notice
{
    static function createMigrations($tableName, $fields): string
    {
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
    static function fieldsToText($fields): string
    {
        $res = '';
        foreach ($fields as $field){
            $res .= '$table->';
            if ($field['Key'] === 'PRI'){
                $res .=  'id';
                $res .= $field['Field'] === 'id' ? '();' : '(' . $field['Field'] . ');';
            }
            else {
                if (strncmp($field['Type'], 'varchar', 7) === 0){
                    $type = explode('(', $field['Type']);
                    $res .= 'string' . '(' . '"' . $field['Field'] . '"' . ', ' .$type[1] . ';';
                }
                else if (strncmp($field['Type'], 'date', 4) === 0){
                    $res .= $field['Field'] === 'date' ?
                        'timestamps' . '()' . ';' :
                        'timestamps' . '(' . '"' . $field['Field'] . '"' . ')'  . ';';
                    }
                else {
                    $res .= $field['Type']. '(' . '"' . $field['Field'] . '"' . ');';
                }
            }
            $res .= PHP_EOL;
        }
        return $res;
    }
}