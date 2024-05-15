<?php
use Core\Route;

require_once('helpers.php');

// подключаем файлы ядра

try {
    Route::start(); // запускаем маршрутизатор
} catch (Exception $e) {
    dump($e->getMessage());
    dump($e->getTrace());
    die();
}
