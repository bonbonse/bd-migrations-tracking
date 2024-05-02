<?php
$table = $_GET['table'];

$fields = $pdo->query("DESCRIBE $table;")->fetchAll();

echo "<div class='structure'>";

if (count($fields) > 0) {
    echo '<table border="1">';
    echo '<tr><th>Field</th><th>Type</th><th>Comment</th></tr>';
    foreach ($fields as $field) {
        echo '<tr>';
        echo '<td>' . $field["Field"] . '</td>';
        echo '<td>' . $field['Type'] . '</td>';
        echo '<td>' . $field['Null'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No fields found in the table';
}

echo "</div>";

