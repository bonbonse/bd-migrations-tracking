
<?php

if (!isset($data['migrations'])){
    echo '<a href="createmigrations">
                    <button type="button" class="btn btn-light" >Создать таблицу миграций
                    </button>
                    </a>';
}
else {
    echo "<div>накатанные миграции</div>";
    //накатанные миграции
    foreach ($data['migrations']['up'] as $m) {
        echo  "<div>
        <span>" . $m . "</span>
    </div>";
    }
    echo "<div>ненакатанные миграции</div>";
    //ненакатанные миграции
    foreach ($data['migrations']['down'] as $m) {
        echo  "<div>
        <span>" . $m . "</span>
    </div>";
    }

    echo "<div>нет миграции</div>";
    //нету миграции
    foreach ($data['migrations']['none'] as $m) {
        echo  "<div>
        <span>" . $m . "</span>
    </div>";
    }
    
}
?>


