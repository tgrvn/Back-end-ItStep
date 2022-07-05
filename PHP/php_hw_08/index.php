<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./slick/slick.css">
    <link rel="stylesheet" href="./slick/slick-theme.css" />
    <link rel="stylesheet" href="./css/main.css">
    <title>authors</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="container">
                <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] == 1) { ?>
                    <a href="./gallery.php">create card</a>
                    <a href="./services/logout.php" class="logout">logout</a>
                <?php } else { ?>
                    <?php include_once "./views/login-form.php" ?>
                <?php } ?>
            </div>
        </header>

        <div class="container">
            <main>
                <?php include_once "./views/card.php" ?>
            </main>
        </div>
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="./slick/slick.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.single-item').slick({
                dots: true
            });
        });
    </script>
</body>

</html>