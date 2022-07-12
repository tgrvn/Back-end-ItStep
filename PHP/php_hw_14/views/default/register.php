<h3>register</h3>
<form method="POST">
    <input type="text" name="log" placeholder="login" required>
    <input type="email" name="email" placeholder="email" required>
    <input type="text" name="phone" placeholder="phone" required>
    <input type="password" name="pass" placeholder="password" required>
    <input type="password" name="re-pass" placeholder="repeat password" required>

    <?php if (isset($_SESSION["error"])) { ?>
        <span class="error"><?= $_SESSION["error"] ?></span>
    <?php } ?>

    <input type="submit" value="register" name="register-from">
</form>