<div class="fruit-cards">
    <?php foreach ($fruits as $fruit) {
        $fruit['price'] = $swichCurrencyValue($fruit['price']);
    ?>
        <div class="card">
            <h2><?= $fruit["name"] ?></h2>
            <p><?= $fruit["type"] ?></p>
            <p>Count: <?= $fruit["count"] ?></p>
            <p>Price: <?= $fruit["price"] ?> <?= $currencySign() ?></p>
        </div>
    <?php } ?>
</div>