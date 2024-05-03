<?php

function query($sql_str){
    require 'connect.php';

    return $pdo->query($sql_str)->fetchAll();
}