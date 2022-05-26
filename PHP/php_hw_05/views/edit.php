<div class="form">
    <form method="post">
        <input type="text" name="fruitName" placeholder="Fruit name" value="<?= $fruits[$fruitId]['name'] ?>">
        <input type="text" name="fruitType" placeholder="Fruit type" value="<?= $fruits[$fruitId]['type'] ?>">
        <input type=" number" name="fruitCount" placeholder="Fruit count" value="<?= $fruits[$fruitId]['count'] ?>">
        <input type=" number" name="fruitPrice" placeholder="Fruit price" value="<?= $fruits[$fruitId]['price'] ?>">

        <input type="submit" class="btn" name="fruitEdit" value="edit fruit">
    </form>
</div>