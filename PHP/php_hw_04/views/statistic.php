<?php
include "partials/_currency.php";
?>

<div class="statistic-cards">
    <?php foreach ($statCard as $value) { ?>
        <div class="stat">
            <h3><?= $value['head'] ?></h3>
            <p><?= $value['value'] ?></p>
        </div>
    <?php } ?>
</div>