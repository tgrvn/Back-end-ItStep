<?php

include_once "./vendor/currency-functions.php";
include_once "./vendor/fruits-functions.php";
include_once "./vendor/statistic-functions.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Lesson-3</title>
</head>

<body>
    <header>
        <nav>
            <a href="?" class="btn">Main</a>
            <a href="?page=statistic" class="btn">Statistic</a>
            <a href="?page=create-fruit" class="btn">Create fruit</a>
            <a href="?page=edit" hidden></a>
        </nav>
    </header>

    <div class="container">
        <?php
        $page = $_GET["page"] ?? "main";

        $file = "views\\$page.php";

        if (!file_exists($file)) {
            $file = "views\\404.php";
        }

        include_once $file;
        ?>
    </div>
</body>

</html>