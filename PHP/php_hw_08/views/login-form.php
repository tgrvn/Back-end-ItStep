<div class="auth">
    <form action="services/login.php" method="post">
        <input type="text" name="log" placeholder="login" required>
        <input type="password" name="pass" placeholder="password" required>
        <input type="submit" value="Log In">
    </form>
</div>
<?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] == 0) { ?>
    <span>*wrong login or password</span>
<?php } ?>