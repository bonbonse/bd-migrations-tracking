<?php
$url_str = explode('?table=', $_SERVER['REQUEST_URI']);
$table = '';
if (isset($url_str[1])){
    $table = $url_str[1];
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/main/select?table=<?php
        echo $table; ?>">Select</a>
        <a class="navbar-brand" href="/main/structure?table=<?php
        echo $table; ?>">Structure</a>
        <a class="navbar-brand" href="main/add">Изменить</a>
        <a class="navbar-brand" href="main/add">SQL</a>
    </div>
</nav>

