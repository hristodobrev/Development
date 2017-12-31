<?php $this->title = 'Login'; ?>

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
            <input type="submit" value="Login" class="field">
        </div>
    </form>
</main>