<?php if (isset($_SESSION["finded"]) && is_array($_SESSION["finded"])) { ?>
    <div class="product">
        <h3><?= $_SESSION["finded"]["name"] ?></h3>
        <h3><?= $_SESSION["finded"]["price"] ?>$</h3>
    </div>
<?php } else if (isset($_SESSION["finded"]) && $_SESSION["finded"] === "404") { ?>
    <p>not found...</p>
<?php } else if (!isset($_SESSION["finded"])) { ?>
    <p>search...</p>
<?php } ?>