<?php

include_once "./models/travels.php";
include_once "./vendor/functions.php";

$page = $_GET["page"] ?? 1;
$country = $_GET["country"] ?? "";

if (isset($_POST["country"]) && !empty($_POST["country"])) {
    header("location: " . "index.php?page=" . $page . "&country=" . $_POST['country']);
}

$travels = new Travels();
$countries = $travels->getAllCountries($country);
$hotels = $travels->getHotels($country);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <?php include_once "./views/menu.php" ?>
        </header>
        <main>
            <?php
            switch ($page) {
                case '2':
                    include_once "./views/tours.php";
                    break;
                case '3':
                    include_once "./views/registration.php";
                    break;
                case '4':
                    include_once "./views/hotel-page.php";
                    break;
                default:
                    break;
            }
            ?>
        </main>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.hotel__single-item').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
            });
        });
    </script>
</body>

</html>