<?php

if (isset($data['result'])) {
    echo "<div class='structure'>
<div>Комментарий: Таблица - Контент структура</div>
";
    echo '<table class="table">';
    echo '<tr><th>Field</th><th>Type</th><th>Key</th></tr>';
    foreach ($data['result'] as $field) {
        echo '<tr>';
        echo '<td>' . $field["Field"] . '</td>';
        echo '<td>' . $field['Type'] . '</td>';
        echo '<td>' . $field['Key'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo "<div>";
} else {
    echo 'Выберите таблицу из списка таблиц';
}


echo "<div>
<button type='button' class='btn btn-secondary'>Изменить структуру</button>
</div>";


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