<?php
session_start();

$error = $_SESSION["error"] ?? "";

session_destroy();
?>

<form class="create-form" action="services/create-card.php" enctype="multipart/form-data" method="POST">
    <input type="file" name="image[]" multiple required>
    <input type="text" name="author_name" placeholder="Enter author name" required>
    <textarea name="descr" cols="30" rows="10" placeholder="Description" required></textarea>
    <?php if (!empty($error)) { ?>
        <p><?= $error ?></p>
    <?php } ?>
    <input type="submit" value="UPLOAD">
</form>