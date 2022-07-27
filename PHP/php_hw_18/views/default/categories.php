<nav>
    <?php foreach ($categories as $category) { ?>
        <a href="<?= getUrl("default", "products", ["category" => $category["name"]]) ?>" class="button"><?= $category["name"] ?></a>
    <?php } ?>

    <a href="<?= getUrl("default", "index") ?>" class="button back">home</a>
</nav>