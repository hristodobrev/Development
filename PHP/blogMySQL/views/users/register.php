<?php $this->title = 'Register New User'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form method="post">
    <div><label for="username">Username:</label></div>
    <input id="username" type="text" name="username" placeholder="Enter username"/>
    <div><label for="password">Password:</label></div>
    <input id="password" type="password" name="password" placeholder="Enter password"/>
    <div><label for="confirm_password">Confirm Password:</label></div>
    <input id="confirm_password" type="password" name="confirm_password" placeholder="Repeat password"/>
    <div><label for="full_name">Full Name:</label></div>
    <input id="full_name" type="text" name="full_name" placeholder="Enter full name"/>
    <div>
        <input type="submit" value="Register"/>
        <a href="<?=APP_ROOT?>/users/login">[Go to Login]</a>
    </div>
</form>