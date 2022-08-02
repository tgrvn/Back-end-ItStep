<section class="tours">
    <h2>tours</h2>
    <div class="filters">
        <form method="POST">
            <select name="country">
                <?php foreach ($countries as $item) { ?>
                    <option value="<?= $item["country"] ?>" <?= $item["country"] == $country ? "selected" : "" ?>><?= $item["country"] ?></option>
                <?php } ?>
            </select>
            <button class="btn-primary" type="submit">select</button>
        </form>
    </div>
    <div class="hotels">
        <?php foreach ($hotels as $item) { ?>
            <a href="?page=4&id=<?= $item[0] ?>" class="hotels__card">
                <h3><?= $item["hotel"] ?></h3>
                <?php if (!$travels->getImgById($item[0])) { ?>
                    <img src=".//assets//img//hotels//No_image_available.svg" alt="no image">
                <?php } else { ?>
                    <img src="<?= getImagesArray($travels, $item['id'])[1] ?>" alt="">
                <?php } ?>
                <div class="hotels__card__descr">
                    <p class="hotels__card__descr__city"><?= $travels->getCityById($item["id_city"])["city"] ?></p>
                    <div class="hotels__card__descr__stars">
                        <span><?= $item['stars'] ?>/5</span>
                        <?php for ($i = 0; $i < $item['stars']; $i++) { ?>
                            <img src="./assets/svg/star.svg" alt="star">
                        <?php } ?>
                    </div>
                </div>
            </a>
        <?php } ?>
        <?php if (!count($hotels)) { ?>
            <span class="empty">empty...</span>
        <?php } ?>
    </div>
</section>