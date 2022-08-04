<?php

$errors = $_SESSION["errors"] ?? [];
$regStatus = $_SESSION["regStatus"] ?? "";

?>
<section class="reg">
    <h2>
        <?php
        if (!empty($regStatus)) {
            echo $regStatus;
            session_destroy();
        } else {
            echo "registration";
        }
        ?>
    </h2>
    <form method="post" name="reg" action="./vendor/registration.php">
        <input class="primary-txt-input" type="text" name="login" placeholder="login" value="<?= $_POST["login"] ?? "" ?>" required>
        <input class="primary-txt-input" type="email" name="email" placeholder="email" value="<?= $_POST["email"] ?? "" ?>" required>
        <input class="primary-txt-input" type="password" name="pass" placeholder="password" required>
        <input class="primary-txt-input" type="password" name="repass" placeholder="repeat password" required>
        <span class="error">
            <?php
            if (count($errors) > 0) {
                echo "*" . join(", ", $errors);
                session_destroy();
            }
            ?>
        </span>
        <button class="btn-primary" name="reg" type="submit">register</button>
    </form>
</section>