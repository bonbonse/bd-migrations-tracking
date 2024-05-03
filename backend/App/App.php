<?php

namespace App;

include 'helpers.php';

class App
{
    public static function run()
    {
        $header = require $_SERVER['DOCUMENT_ROOT'] . '/frontend/header.php';
        $sidebar = require $_SERVER['DOCUMENT_ROOT'] . '/frontend/sidebar.php';
        $content = require $_SERVER['DOCUMENT_ROOT'] . '/frontend/content.php';

        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Мой сайт</title>
            <link rel='stylesheet' href='/frontend/index.css'>
        </head>
        <body class='wrapper'>
        $header
        <div class='wrapper-container'>
            $sidebar
            $content
        </div>
        
        </body>
        </html>";
    }

    public static function generateBlock()
    {
    }
}


