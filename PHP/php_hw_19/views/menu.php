<nav>
    <div class="navlinks">
        <a class="navlinks__navlink <?= $page == 1 ? "active" : "" ?>" href="index.php?page=1">main</a>
        <a class="navlinks__navlink <?= $page == 2 ? "active" : "" ?>" href="index.php?page=2">tours</a>
        <a class="navlinks__navlink <?= $page == 3 ? "active" : "" ?>" href="index.php?page=3">registration</a>
    </div>

    <div class="auth">
        <form method="post">
            <input class="primary-txt-input" type="text" name="login" placeholder="login">
            <input class="primary-txt-input" type="password" name="pass" placeholder="password">

            <button class="btn-primary" type="submit">login</button>
        </form>
    </div>
</nav>