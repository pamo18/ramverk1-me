<?php if ($user) { ?>
    <h4 class="center">Welcome <?= $user->username ?>!</h4>
    <h6 class="center">Your access level is: <?= $user->level ?></h6>
    <figure class="center">
        <img style="border-radius: 5px;" src="<?= $gravatar ?>" alt="" />
        <figcaption><?= ($user->email ? $user->email: null) ?></figcaption>
    </figure>
    <form class="form" method="post">
        <p>
            <input class="button invert wide-button" type="submit" name="doLogout" value="Logout">
        </p>
        <p>
            <a class="button wide-button" href="../shop/admin">My admin page</a>
        </p>
    </form>
<?php } else { ?>
    <h4 class="center">Login</h4>
    <form class="form" method="post">
        <p>
            <label>Username:</label>
            <input type="text" placeholder="username" required name="user"/>
            <label>Password:</label>
            <input type="password" placeholder="password" required name="pass"/>
        </p>
        <p>
            <input class="button invert wide-button" type="submit" name="doLogin" value="Login">
        </p>
        <p>
            <a class="button wide-button" href="register">Register</a>
        </p>
    </form>
<?php } ?>
