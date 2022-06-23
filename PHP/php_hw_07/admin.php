<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./styles/main-styles.css" />
    <title>Fruits HW</title>
</head>

<body>

    <body>
        <div class="wrapper">
            <header>
                <div class="container">
                    <nav>
                        <ul>
                            <li>
                                <a href="#all">all fruits</a>
                            </li>
                            <li>
                                <a href="#randomize">randomize fruits</a>
                            </li>
                            <li><a href="#create-fruit">create fruit</a></li>
                        </ul>

                        <ul>
                            <li><a href="#create-user">create user</a></li>
                            <!-- <li><a href="#login">login</a></li> -->
                            <li><a href="#">log out</a></li>
                        </ul>
                    </nav>
                </div>
            </header>

            <main>
                <section id="all">
                    <div class="container">
                        <h2>all fruits</h2>
                        <div class="all-fruits"></div>
                    </div>
                </section>

                <section id="randomize">
                    <div class="container">
                        <h2>randomized fruits</h2>
                        <form method="post" name="random" enctype='multipart/form-data'>
                            <input class="input" name="random" type="number" placeholder="randomize fruits amount" />
                            <p class="random-error">*max amount 30</p>
                            <input class="button" type="submit" value="Randomize" />
                        </form>
                        <div class="all-fruits"></div>
                    </div>
                </section>
            </main>
        </div>

        <?php
        include_once "views/create-user-form.php";
        include_once "views/create-fruit-from.php";
        ?>

        <script src="./scripts/navigation.js"></script>
        <script src="./scripts/api.js"></script>
        <script src="./scripts/card.js"></script>
        <script src="./scripts/all-fruits.js"></script>
        <script src="./scripts/randomize.js"></script>
    </body>

</html>
</body>

</html>