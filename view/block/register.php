<h4 class="center">Register</h4>
<form class="form" method="post">
    <p>
        <label>Username: <span class="red"><?= ($invalid ? "Username " . $invalid . "!" : null) ?></span></label>
        <input type="text" placeholder="username" required name="user"/>
        <label>Password:</label>
        <input type="password" placeholder="password" required name="pass"/>
        <label>Email:</label>
        <input type="email" placeholder="user@email.com" required name="email"/>
    </p>
    <p>
        <input class="button invert wide-button" type="submit" name="doRegister" value="Register">
    </p>
    <p>
        <a class="button wide-button" href="login">Login</a>
    </p>
</form>
