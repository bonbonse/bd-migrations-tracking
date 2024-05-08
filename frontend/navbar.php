<?php
?>

<div class="navbar">

    <?php
    if (isset($_GET['table']))
        $table = $_GET['table'];
    else if (isset($_GET['select']))
        $table = $_GET['select'];
    else if (isset($_GET['create']))
        $table = $_GET['create'];
    else if (isset($_GET['edit']))
        $table = $_GET['edit'];
    else echo "ошибка";
    echo "<div onclick='window.location=`index.php?select=$table`'>Выбрать</div>";
    echo "<div onclick='window.location=`index.php?table=$table`'>Структура</div>";
    echo "<div onclick='window.location=`index.php?create=$table`'>Изменить</div>";
    echo "<div onclick='window.location=`index.php?edit=$table`'>Добавить запись</div>";
    ?>
</div>
