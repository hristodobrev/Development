<?php $this->title = "Change Password"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <form method="POST">
        <div class="form-row">
            <label for="current-password">Current password:</label>
            <input type="password" id="current-password" name="current-password" autofocus />
        </div>
        <div class="form-row">
            <label for="password">New password:</label>
            <input type="password" id="password" name="password" />
        </div>
        <div class="form-row">
            <label for="confirm-password">Confirm new password:</label>
            <input type="password" id="confirm-password" name="confirm-password" />
        </div>
        <div class="form-row">
            <input type="submit" value="Change Password" />
        </div>
    </form>
</main>