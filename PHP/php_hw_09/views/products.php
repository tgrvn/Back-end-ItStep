<?php
$products = JSON::getJSON();
?>
<div class="products">
    <?php if (!empty($products)) { ?>
        <?php foreach ($products as $product) { ?>
            <div class="product">
                <h3><?= $product["name"] ?></h3>
                <h3><?= $product["price"] ?>$</h3>
            </div>
        <?php } ?>
    <?php } ?>
</div>