<?php $this->title = 'Register New User'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<main>
    <form method="post">
        <div class="form-row">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" class="field">
        </div>
        <div class="form-row">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" class="field">
        </div class="form-row">
        <div class="form-row">
            <label for="confirm-password">Confirm Password:</label>
            <input id="confirm-password" type="password" name="confirm-password" class="field">
        </div class="form-row">
        <div class="form-row">
            <label for="full-name">Full Name:</label>
            <input id="full-name" type="text" name="full-name" class="field">
        </div class="form-row">
        <div class="form-row">
            <input type="submit" value="Register" class="field">
        </div>
    </form>
</main>