<?php
$category = substr($_SERVER["REQUEST_URI"], strrpos($_SERVER["REQUEST_URI"], "category=") + 9);
?>

<a href="<?= getUrl("default", "index") ?>" class="button back">back</a>
<div class="filter">
    <div class="filter__sort">
        <p class="filter__sort__title">sort by name:</p>
        <a href="<?= getUrl("default", "products", ["category" => $category], true, "name", "asc") ?>">asc</a>
        <p>/</p>
        <a href="<?= getUrl("default", "products", ["category" => $category], true, "name", "desc") ?>">desc</a>
    </div>
    <div class="filter__sort">
        <p class="filter__sort__title">sort by price:</p>
        <a href="<?= getUrl("default", "products", ["category" => $category], true, "price", "asc") ?>">asc</a>
        <p>/</p>
        <a href="<?= getUrl("default", "products", ["category" => $category], true, "price", "desc") ?>">desc</a>
    </div>
</div>
<form name="filters" method="get">
    <div class="filter">
        <div class="filter__price_min_max">
            <input type="number" name="min" min="0" max="9999" placeholder="min price">
            <input type="number" name="max" min="0" max="9999" placeholder="max price">
        </div>
    </div>
    <input type="submit" value="Apply filters" class="button">
</form>
<div class="filter">
    <div class="filter__make">
        <?php foreach (array_unique(array_column($products, 'make')) as $make) { ?>
            <div class="filter__make__item">
                <input type="checkbox" name="make=<?= $make ?>" id="<?= $make ?>">
                <label for="<?= $make ?>"><?= $make ?></label>
            </div>
        <?php } ?>
    </div>
</div>
<div class="filter">
    <div class="filter__country">
        <?php foreach (array_unique(array_column($products, 'country')) as $country) { ?>
            <div class="filter__country__item">
                <input type="checkbox" name="country=<?= $country ?>" id="<?= $country ?>">
                <label for="<?= $country ?>"><?= $country ?></label>
            </div>
        <?php } ?>
    </div>
</div>
<div class="products">
    <?php foreach ($products as $product) { ?>
        <div class="products__card">
            <h3><?= $product["name"] ?></h3>
            <h5><?= $product["model"] ?></h5>
            <p><?= $product["price"] ?>$</p>
        </div>
    <?php } ?>
</div>

<script src="./js/filters.js"></script>