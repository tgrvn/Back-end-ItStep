<section id="create-user">
    <div class="container">
        <h2>create user</h2>
        <form method="post" name="createUser" enctype='multipart/form-data'>
            <input class="input" name="login" type="text" placeholder="Login" required />
            <input class="input" name="password" type="password" placeholder="Password" required />
            <input class="input" name="rePassword" type="password" placeholder="Repeat password" required />
            <span class="error-active"></span>
            <input class="button" type="submit" value="Create user" />
        </form>
    </div>
</section>
<script src="./scripts/create-user.js"></script>