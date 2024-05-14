<?php

if (!isset($data['migrations'])){
    echo '<a href="createmigrations">
                    <button type="button" class="btn btn-light" >Создать таблицу миграций
                    </button></a>';
}
else {
    var_dump($data['migrations']);
}