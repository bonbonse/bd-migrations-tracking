<?php
require 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой сайт</title>
    <link rel="stylesheet" href="index.css">
</head>
<body class="wrapper">
<?php
require 'header.php';
?>
<div class="wrapper-container">
    <?php
    require 'sidebar.php';
    require 'content.php';
    ?>
</div>

</body>
</html>