<?php

include_once "./vendor/functions.php";

$fruits = [
    ["name" => "lemon", "type" => "citrus", "price" => 50, "count" => 15],
    ["name" => "orange", "type" => "citrus", "price" => 60, "count" => 17],
    ["name" => "lime", "type" => "citrus", "price" => 60, "count" => 5],
    ["name" => "apple", "type" => "fetus", "price" => 15, "count" => 100],
    ["name" => "pineapple", "type" => "grass", "price" => 120, "count" => 5],
    ["name" => "melon", "type" => "fetus", "price" => 30, "count" => 8],
    ["name" => "watermelon", "type" => "fetus", "price" => 20, "count" => 4],
    ["name" => "strawberry", "type" => "berry", "price" => 70, "count" => 50],
    ["name" => "blackberry", "type" => "berry", "price" => 90, "count" => 100],
];

$types = ["all" => "all"];
$sorts = [];

foreach ($fruits as $fruit) {
    $types[$fruit["type"]] = $fruit["type"];
    $sorts = array_keys($fruit);
};

$counts = array_unique(array_column($filterFruits($fruits), "count"));

usort($fruits, $sortOrder === "asc" ? $sortAscFunction : $sortDescFunction);

$links = [
    ["name" => "google", "link" => "https://www.google.com/", "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/800px-Google_%22G%22_Logo.svg.png", "alt" => "google logo"],

    ["name" => "youtube", "link" => "https://www.youtube.com/", "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/2560px-YouTube_full-color_icon_%282017%29.svg.png", "alt" => "youtube logo"],

    ["name" => "facebook", "link" => "https://www.facebook.com/", "image" => "https://www.facebook.com/images/fb_icon_325x325.png", "alt" => "facebook logo"],

    ["name" => "gmail", "link" => "https://www.google.com/", "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Gmail_icon_%282020%29.svg/512px-Gmail_icon_%282020%29.svg.png", "alt" => "gmail logo"],
];

$countries = [
    ["name" => "ukraine", "value" => "ukr"],
    ["name" => "usa", "value" => "us"],
    ["name" => "poland", "value" => "pl"],
    ["name" => "turkey", "value" => "tr"],
    ["name" => "africa", "value" => "afc"],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practic</title>
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <form method="get" action="index.php">
                <select name="filteredFruits">
                    <?php foreach ($types as $type) { ?>
                        <option value="<?= $type ?>" <?= $isSelect($type) ? 'selected' : '' ?>><?= $type ?></option>
                    <?php } ?>
                </select>

                <input type="search" name="byName" placeholder="Search by name" value="<?= $fruitName ?>">

                <div class="by-price">
                    <input type="number" name="priceFrom" min="0" placeholder="Search by price from" value="<?= $priceFrom ?>">

                    <input type="number" name="priceTo" min="0" placeholder="Search by price to" value="<?= $priceTo ?>">
                </div>

                <div class="by-count">
                    <?php foreach ($counts as $count) { ?>
                        <div class="radio">
                            <input type="radio" name="count" value="<?= $count ?>">
                            <p><?= $count ?></p>
                        </div>
                    <?php } ?>
                </div>

                <input type="submit" value="Search">
            </form>
        </div>

        <div class="sort">

            <?php foreach ($sorts as $value) { ?>
                <a href="?sortType=<?= $value ?>&filteredFruits=<?= $category ?>&sortOrder=<?= setOrder($sortOrder) ?>&byName=<?= $fruitName ?>&priceFrom=<?= $priceFrom ?>&priceTo=<?= $priceTo ?>&count=<?= $count ?>">Sort by <?= $value ?></a>
            <?php } ?>
        </div>

        <div class="fruits">
            <?php foreach ($filterFruits($fruits) as $fruit) { ?>
                <div class='fruit-card'>
                    <h2><?= $fruit["name"] ?></h2>
                    <p><?= $fruit["type"] ?></p>
                    <p>Count: <?= $fruit["count"] ?></p>
                    <p>Price: <?= $fruit["price"] ?> UAH</p>
                </div>
            <?php } ?>
        </div>

        <div class="links">
            <?php
            foreach ($links as $value) { ?>
                <a href="<?= $value['link'] ?>" class='link'>
                    <img src="<?= $value['image'] ?>" alt="<?= $value['alt'] ?>">
                    <h2><?= $value['name'] ?></h2>
                </a>
            <?php } ?>
        </div>

        <select name="countries" class="countries">
            <option value="null">select county...</option>
            <?php foreach ($countries as $value) { ?>
                <option value="<?= $value['value'] ?>"><?= $value['name'] ?></option>
            <?php } ?>
        </select>
    </div>
</body>

</html>