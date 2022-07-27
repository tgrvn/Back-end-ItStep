<?php
$test = false;

if ($test == true) {
    $test = false;
    header("refresh: 0");
}
?>
<nav>
    <?php foreach ($sectors as $sector) { ?>
        <a href="<?= getUrl("default", "categories", ["sector" => $sector["name"]]) ?>" class="button"><?= $sector["name"] ?></a>
    <?php } ?>
</nav>