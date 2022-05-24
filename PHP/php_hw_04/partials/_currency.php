<div class="couese-switch">
    <form method="post">
        <select name="currentCourse">
            <?php foreach ($currency as $value) { ?>
                <option value="<?= $value['name'] ?>" <?= $isSelect($value['name']) ? 'selected' : '' ?> ><?= $value['name'] ?></option>
            <?php } ?>
        </select>

        <button class="btn" value="course">swich</button>
    </form>
</div>