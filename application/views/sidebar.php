<ul class="nav flex-column">

    <?php
    if (empty($data['tables'])){
        echo "<div>В вашей базе данных нет таблиц</div>";
    }
    else{
        $new_url = '/' . $data['url']['controllerName'] . '/' .
            $data['url']['action'] . '?table=';

        foreach ($data['tables'] as $table_name) {
        $new_url_with_table = $new_url . $table_name;
        echo
            '
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="' . $new_url_with_table . '">' . $table_name . '</a>
        </li>
        ';
    }
    }
    ?>

</ul>
