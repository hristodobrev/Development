<?php $this->title = "Register"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <form method="POST">
        <div class="form-row">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" autofocus />
        </div>
        <div class="form-row">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" />
        </div>
        <div class="form-row">
            <label for="password-confirm">Confirm Password:</label>
            <input type="password" id="password-confirm" name="password-confirm" />
        </div>
        <div class="form-row">
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" />
        </div>
        <div class="form-row">
            <input type="submit" value="Register" />
        </div>
    </form>
</main>