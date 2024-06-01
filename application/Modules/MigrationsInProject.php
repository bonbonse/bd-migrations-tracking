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
        if ($roll)
            self::upMigration($fullName);
        return $fullName;
    }
    static function getAnonymousClass($fileName){
        var_dump(self::$path . '/' . $fileName);
        return (require self::$path . '/' . $fileName);
    }
    static function upMigration($fullName){
        var_dump("UpMiGRARRRRRRRRRRR");
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

    //TODO Сравнить миграции в папке с миграциями из бд
    static function getDownMigrations($migrations){
        $files = self::get();
        $tables = [];
        foreach ($files as $file){
            $fname = explode('.', $file);
            $f = explode('_', $fname[0]);
            array_push($tables, $f[5]);
        }
        //var_dump($tables);
        //var_dump($migrations);
        //var_dump(array_intersect($tables, $migrations));

        return array_intersect($tables, $migrations);
    }
    //TODO сравнить миграции в папке с существующими таблицами бд
    static function getNoneMigrations($tables){
        $files = self::get();
        $migrations = [];
        foreach ($files as $file){
            $fname = explode('.', $file);
            $f = explode('_', $fname[0]);
            array_push($migrations, $f[5]);
        }
        var_dump($tables);
        var_dump($migrations);
        var_dump(array_diff($tables, $migrations));

        return array_diff($tables, $migrations);
    }

}