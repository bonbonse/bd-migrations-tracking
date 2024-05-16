<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/main/select?table=<?php
        echo (isset($table)) ? $table : 'users'; ?>">Select</a>
        <a class="navbar-brand" href="/main/structure?table=<?php
        echo (isset($table)) ? $table : 'users'; ?>">Structure</a>
        <a class="navbar-brand" href="main/add">Add</a>
    </div>
</nav>

