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

    static function createFileMigration($action, $tableName, $fields, bool $roll = false){
        $fullName =  date('y_m_d_hms') . "_" .$action . "_" . $tableName . '.php';
        $file = fopen(self::$path . '/' . $fullName, 'w');
        fwrite($file, Notice::createMigrations($tableName, $fields));
        $roll & self::upMigration($fullName);
        var_dump("Success");
    }
    static function getAnonymousClass($fileName){
        return (require self::$path . '/' . $fileName);
    }
    static function upMigration($fullname){
        self::getAnonymousClass($fullname)->up();
    }
}