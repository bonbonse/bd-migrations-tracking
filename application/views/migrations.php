
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
        <span><button>откатить</button></span>
    </div>";
    }
    echo "<div>ненакатанные миграции</div>";
    //ненакатанные миграции
    foreach ($data['migrations']['down'] as $m) {
        echo  "<div>
        <span>" . $m . "</span>
        <span><button>накатить</button></span>
    </div>";
    }

    echo "<div>нет миграции</div>";
    //нету миграции
    foreach ($data['migrations']['none'] as $m) {
        echo  "<div>
        <span>" . $m . "</span>
        <span><button id='showmore-button'>создать</button></span>
    </div>";
    }
}
?>


<script>
    $(function(){
        $('#showmore-button').click(function (){
            console.log($(this))
            var $target = $(this);
            var page = $target.attr('data-page');
            page++;

            $.ajax({
                url: '/ajax.php?page=' + page,
                dataType: 'html',
                success: function(data){
                    $('#showmore-list .prod-list').append(data);
                }
            });

            $target.attr('data-page', page);
            if (page ==  $target.attr('data-max')) {
                $target.hide();
            }

            return false;
        });
    });
</script>



