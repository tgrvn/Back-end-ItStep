<form class="create-form" action="services/create-card.php" enctype="multipart/form-data" method="POST">
    <input type="file" name="image[]" multiple>
    <input type="text" name="author_name" placeholder="Enter author name">
    <textarea name="descr" cols="30" rows="10" placeholder="Description"></textarea>
    <input type="submit" value="UPLOAD">
</form>