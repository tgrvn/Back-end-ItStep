<?php
include_once "./vendor/json.php";

const AUTHORS_JSON = "./json/authors.json";

$authors = getJSON(AUTHORS_JSON) ?? [];
?>

<section class="cards">
    <?php if (count($authors) > 0) { ?>
        <?php foreach ($authors as $card) { ?>
            <div class="card">
                <div class="single-item">
                    <?php foreach ($card["img"] as $key => $src) { ?>
                        <img src=<?= $src["img_$key"] ?>>
                    <?php } ?>
                </div>
                <h3><?= $card["autor_name"] ?></h3>
                <p><?= $card["descr"] ?></p>
            </div>
        <?php } ?>
    <?php } else { ?>
        <h4>Posts are empty...</h4>
    <?php } ?>

</section>