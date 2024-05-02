<?php

?>

<div class="sidebar">
    <?php
    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

    foreach ($tables as $table) {
        echo "<div><a onclick='window.location=`index.php?table=${table}`'>" . $table . "<a></div>";
    }
    ?>
</div>