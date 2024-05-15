<?php


namespace Modules;


class MigrationsInProject
{
    static $path = __DIR__ . '/..' . '/Migrations';

    static function get(){
        $files = array();
        foreach(glob(self::$path . '/*') as $file) {
            $files[] = basename($file);
        }
        return $files;
    }
    static function createMigration($action, $tableName){
        $fullname =  date('y_m_d_hms') . "_" .$action . "_" . $tableName . '.php';
        $file = fopen(self::$path . '/' . $fullname, 'w');
        fwrite($file, Notice::createMigrations($tableName));
        var_dump($fullname);

        //TODO: Создать файл
        //TODO: Внести код в файл зависимости от $action
    }
}