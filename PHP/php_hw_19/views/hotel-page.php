<?php

$hotel = array_filter($hotels, function ($item) {
    return $item["id"] == $_GET["id"];
});

$currentHotel = $hotel[0];

$images = getImagesArray($travels, $_GET["id"]);

?>

<section class="hotel">
    <div class="hotel__single-item">
        <?php foreach ($images as $value) { ?>
            <div>
                <img src="<?= $value ?>" alt="">
            </div>
        <?php } ?>
    </div>
    <div class="hotel__info">
        <p><?= $travels->getCountryById($_GET["id"])[0] ?>, <?= $travels->getCityById($_GET["id"])[0] ?></p>
        <span><?= $currentHotel["cost"] ?>$</span>
    </div>
    <div class="hotel__stars">
        <p><?= $currentHotel['stars'] ?>/5</p>
        <?php for ($i = 0; $i < $currentHotel['stars']; $i++) { ?>
            <img src="./assets/svg/star.svg" alt="">
        <?php } ?>
    </div>
    <h2><?= $currentHotel["hotel"] ?></h2>
    <div class="hotel__description">
        <p><?= $currentHotel["info"] ?></p>
    </div>
    <div class="hotel__comments">
        <h4>What the guests says:</h4>
        <div class="coments__single">
            
        </div>
    </div>
</section>