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
        var_dump("2 is success");

        $roll & self::upMigration($fullName);


        var_dump("Success");
    }
    static function getAnonymousClass($fileName){
        var_dump(self::$path . '/' . $fileName);
        return (require self::$path . '/' . $fileName);
    }
    static function upMigration($fullName){
        try {
            self::getAnonymousClass($fullName)->up();
        }
        catch (\Exception $e){
            echo "$e" . " - ошибка в upMigration";
        }
        var_dump("Применили!");

    }
    static function downMigration($fullname){
        self::getAnonymousClass($fullname)->down();
    }
}