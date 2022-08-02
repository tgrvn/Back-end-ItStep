<?php

// $_SERVER["HTTP_HOST"];
// $_SERVER["REQUEST_URI"];
if (isset($_POST["reg"])) {
    header("location:" . $_SERVER['REQUEST_URI']);
}


?>

<section class="reg">
    <h2>registration</h2>
    <form method="post" name="reg">
        <input class="primary-txt-input" type="text" name="login" placeholder="login" required>
        <input class="primary-txt-input" type="email" name="email" placeholder="email" required>
        <input class="primary-txt-input" type="password" name="pass" placeholder="password" required>
        <input class="primary-txt-input" type="password" name="repass" placeholder="repeat password" required>
        <span class="error"></span>
        <button class="btn-primary" name="reg" type="submit">register</button>
    </form>
</section>

<script>
    const form = document.forms.reg;
    const error = document.querySelector(".error");
    console.log(error);

    form.addEventListener('submit', (e) => {
        error.textContent = "";
        const pass = form.pass;
        const rePass = form.repass;

        if (pass.value != rePass.value) {
            error.textContent = "*passwords not same";
            e.preventDefault();
        }
    });
</script>