<?php $this->title = "Login";

if (!$this->isLoggedIn) { ?>

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

<?php } else {
    $this->addErrorMessage("You are already logged in.");
    $this->redirect('home');
} ?>