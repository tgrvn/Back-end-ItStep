<?php

$hotel = array_filter($hotels, function ($item) {
    return $item["id"] == $_GET["id"];
});

$currentHotel = $hotel[0];

$images = getImagesArray($travels, $_GET["id"]);
$comments = $travels->getComments($_GET["id"]) ?? [];
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
    <?php if (isset($_SESSION["userLogin"]) && isset($_SESSION["role"])) { ?>
        <form method="POST" action="./vendor/comment.php?page=<?= $_GET["page"] ?? 1 ?>&id=<?= $_GET["id"] ?? "" ?>">
            <textarea name="comm" cols="30" rows="10" maxlength="200" placeholder="your comment..." required><?= $_POST["comm"] ?? "" ?></textarea>
            <input type="hidden" name="id_hotel" value="<?= $_GET["id"] ?>">
            <input type="hidden" name="id_user" value="<?= $_SESSION["userId"] ?>">
            <button type="submit" class="btn-primary" name="comment">send</button>
        </form>
    <?php } ?>
    <div class="hotel__comments">
        <h4>What the guests says:</h4>
        <?php if (count($comments) > 0) { ?>
            <?php foreach ($comments as $value) { ?>
                <div class="hotel__comments__single">
                    <h5><?= $value["login"] ?></h5>
                    <p><?= $value["comment"] ?></p>
                    <?php if ($value["id_user"] == $_SESSION["userId"]) {
                        echo "<a href='./vendor/del-comment.php?page=" . $_GET["page"] . "&id=" . $_GET["id"] . "&idComment=" . $value[0] . "' class='del' >X</a>";
                    } ?>
                </div>
            <?php } ?>

        <?php } else { ?>
            <span>no comments yet...</span>
        <?php } ?>
    </div>
</section>