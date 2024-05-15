<?php


namespace Modules;


class MigrationsInProject
{
    static function get(){
        $dir = __DIR__ . '/..' . '/Migrations';
        $files = array();
        foreach(glob($dir . '/*') as $file) {
            $files[] = basename($file);
        }
        return $files;
    }
}