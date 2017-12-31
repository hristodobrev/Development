<?php $this->title = "Login"; ?>

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
            <input type="submit" value="Login" />
        </div>
    </form>
</main>