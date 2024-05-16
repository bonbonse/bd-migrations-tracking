<!DOCTYPE html>

<?php
$table = $_GET['table']; ?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <title>r</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<div class="container text-center">
    <div class="row">
        <div class="col">
            <?php include 'header.php'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php
            include 'sidebar.php';
            ?>
        </div>
        <div class="col">
            <table class="table">
                <?php
                include $content_view ?>
            </table>
        </div>
        <div class="col">
            <?php
            include 'migrations.php';
            ?>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
</script>
</body>
</html>