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

    static function createFileMigration($action, $tableName){
        $fullname =  date('y_m_d_hms') . "_" .$action . "_" . $tableName . '.php';
        $file = fopen(self::$path . '/' . $fullname, 'w');
        fwrite($file, Notice::createMigrations($tableName));
    }
    static function getAnonymousClass($fileName){
        return (require self::$path . '/' . $fileName);
    }
}