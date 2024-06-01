<?php

if (isset($data['result']) && count($data['result']) > 0) {
    echo "<div class='structure'>
";
    echo '<table class="table">';

    $keys = array_keys($data['result'][0]);
    echo '<tr>';
    foreach ($keys as $key) {
        echo '<th>' . $key . '</th>>';
    }
    echo '</tr>';

    foreach ($data['result'] as $field) {
        echo '<tr>';
        foreach ($keys as $key) {
            echo '<td>' . $field["$key"] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo "<div>
<div>Индексы</div>";
} else {
    echo 'Выберите таблицу';
}





//$fields = $pdo->query("
//SELECT index_name, index_type
//FROM INFORMATION_SCHEMA.STATISTICS
//WHERE table_schema = '$dbname' AND table_name = '$table';
//")->fetchAll();

//if (count($fields) > 0) {
//    echo '<table border="1">';
//    echo '<tr><th>IndexName</th><th>IndexType</th></tr>';
//    foreach ($fields as $field) {
//        echo '<tr>';
//        echo '<td>' . $field["index_name"] . '</td>';
//        echo '<td>' . $field['index_type'] . '</td>';
//        echo '</tr>';
//    }
//    echo '</table>';
//} else {
//    echo 'No fields found in the table';
//} // TODO: Индексы непонятно отображаются - исправить

echo "</div>";

//TODO: Внешние ключи и триггеры

echo "</div>";