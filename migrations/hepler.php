<?php
//include '../connect.php';

function select($options) {
    require '../connect.php';
    $sql = "select * from kinds";

    $answer = $pdo->query($sql)->fetchAll();

    if (!isset($answer))
        return null;

    foreach ($answer as $row) {
        echo "<div>$row[id_kind]</div>";
        echo "<div>$row[kind_name]</div>";
    }

    echo "Сделано";
}
function update() {

}
function delete() {

}
function insert() {

}
function createTable($options) {
    $sql = "CREATE DATABASE $options[0]";

    $answer = $pdo->query($sql)->fetchAll();

    if (!isset($answer))
        return null;
    echo "Сделано";
}

