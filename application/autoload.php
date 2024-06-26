<?php

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $path = __DIR__ . '/' . $class . '.php';

    if (file_exists($path)) {
        require $path;
    }
});

// Поддержка .env
(new Core\DotEnvEnvironment)->load(__DIR__ . '/../');
