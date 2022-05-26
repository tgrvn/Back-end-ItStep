<div class="fruit-cards">
    <?php foreach ($fruits as $id => $fruit) {
        $fruit['price'] = $swichCurrencyValue($fruit['price']);
    ?>
        <div class="card">
            <h2><?= $fruit["name"] ?></h2>
            <p><?= $fruit["type"] ?></p>
            <p>Count: <?= $fruit["count"] ?></p>
            <p>Price: <?= $fruit["price"] ?> <?= $currencySign() ?></p>
            <div class="btns">
                <a href="index.php?page=edit&id=<?= $id ?>" class="btn">edit</a>
                <a href="delete.php?id=<?= $id ?>" class="btn">delete</a>
            </div>
        </div>
    <?php } ?>
</div>