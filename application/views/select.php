<?php

echo "<div class='structure'>
<div>Комментарий: Таблица - Контент структура</div>
";


if (count($data['result']) > 0) {
    echo '<table class="table">';
    echo '<tr><th>name</th><th>surname</th><th>age</th></tr>';
    foreach ($data['result'] as $field) {
        echo '<tr>';
        echo '<td>' . $field["name"] . '</td>';
        echo '<td>' . $field['surname'] . '</td>';
        echo '<td>' . $field['age'] . '</td>'; // TODO: Поля у каждой таблицы разные - заменить
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No fields found in the table';
}



echo "<div>
<div>Индексы</div>";

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