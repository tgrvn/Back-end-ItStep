<?php
include_once "./vendor/json.php";

const AUTHORS_JSON = "./json/authors.json";

$authors = getJSON(AUTHORS_JSON);
?>

<section class="cards">
    <?php foreach ($authors as $card) { ?>

        <div class="card">
            <?php foreach ($card["img"] as $key => $src) { ?>
                <img src=<?= $src["img_0"] ?>>
            <?php } ?>

            <h3><?= $card["autor_name"] ?></h3>
            <p><?= $card["descr"] ?></p>
        </div>

    <?php } ?>


</section>