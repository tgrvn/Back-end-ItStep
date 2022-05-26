<?php
include "./partials/_currency.php";
?>

<div class="statistic-cards">
    <div class="stat">
        <h3>summary all categories price</h3>
        <p><?= $getSummaryCount('price') ?></p>
    </div>
    <div class="stat">
        <h3>summary all categories count</h3>
        <p><?= $getSummaryCount('count') ?></p>
    </div>
    <?php foreach ($getFruitStat() as $value) { ?>
        <div class="stat">
            <h3><?= $value['type'] ?> summary count</h3>
            <p><?= $value['summary-count'] ?></p>
        </div>
    <?php } ?>
    <?php foreach ($getFruitStat() as $value) { ?>
        <div class="stat">
            <h3><?= $value['type'] ?> summary category price</h3>
            <p><?= $swichCurrencyValue($value['all-price']) ?> <?= $currencySign() ?></p>
        </div>
    <?php } ?>
</div>