
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
        <span><button onclick='downMigration(\"$m\")'>откатить</button></span>
    </div>";
    }
    echo "<div>ненакатанные миграции</div>";
    //ненакатанные миграции
    foreach ($data['migrations']['down'] as $m) {
        echo  "<div>
        <span>" . $m . "</span>
        <span><button onclick='upMigration(\"$m\")'>откатить</button></span>
    </div>";
    }

    echo "<div>нет миграции</div>";
    //нету миграции
    foreach ($data['migrations']['none'] as $m) {
        echo  "<div>
        <span>" . $m . "</span>
        <span><button onclick='createMigration(\"$m\")'>создать</button></span>
    </div>";
    }
}
?>


<script>
    function upMigration(migration) {

        $.ajax({
            url: '/api/upMigration',
            type: 'POST',
            data: {
                migration: migration
            },
            success: function(response) {
                console.log(response)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    function downMigration(migration) {

        $.ajax({
            url: '/api/downMigration',
            type: 'POST',
            data: {
                migration: migration
            },
            success: function(response) {
                console.log(response)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    function createMigration(migration) {

        $.ajax({
            url: '/api/createMigration',
            type: 'POST',
            data: {
                migration: migration
            },
            success: function(response) {
                console.log(response)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>



