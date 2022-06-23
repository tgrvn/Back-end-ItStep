<section id="create-fruit">
    <div class="container">
        <h2>create fruit</h2>
        <form method="post" name="createFruit" enctype='multipart/form-data'>
            <input class="input" type="text" placeholder="Fruit name" name="fruitName" required />
            <input class="input" type="text" placeholder="Fruit type" name="fruitType" required />
            <input class="input" type="number" placeholder="Fruit amount" name="fruitAmount" required />
            <input class="input" type="number" placeholder="Fruit price" name="fruitPrice" required />
            <input class="button" type="submit" value="Create fruit" />
        </form>
    </div>
</section>
<script src="./scripts/create-fruits.js"></script>