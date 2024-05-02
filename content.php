<?php

?>

<div class="content">
<?php
require 'navbar.php';
if (isset($_GET['table']))
    require 'structure.php';
else if (isset($_GET['select']))
    require 'choose.php';
else if (isset($_GET['create']))
    echo "Пусто";
else if (isset($_GET['edit']))
    echo "Пусто";
?>
</div>