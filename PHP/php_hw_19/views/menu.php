<nav>
    <div class="navlinks">
        <a class="navlinks__navlink <?= $page == 1 ? "active" : "" ?>" href="index.php?page=1">main</a>
        <a class="navlinks__navlink <?= $page == 2 ? "active" : "" ?>" href="index.php?page=2">tours</a>
        <a class="navlinks__navlink <?= $page == 3 ? "active" : "" ?>" href="index.php?page=3">registration</a>
    </div>

    <?php if (isset($_SESSION["userLogin"]) && isset($_SESSION["role"])) { ?>
        <div class="authorized">
            <span>Welcome, <?= $_SESSION["userLogin"] ?></span>
            <div class="authorized__img"></div>
            <a class="btn-primary" href="./vendor/logout.php">logout</a>
        </div>
    <?php } else { ?>
        <div class="auth">
            <form method="post" action="./vendor/login.php">
                <input class="primary-txt-input" type="text" name="login" placeholder="login">
                <input class="primary-txt-input" type="password" name="pass" placeholder="password">

                <button class="btn-primary" type="submit" name="log">login</button>
            </form>
        </div>
    <?php } ?>
</nav>