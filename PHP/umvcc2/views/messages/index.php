<?php $this->title = "Select Friend ID"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <form method="POST">
        <div class="form-row">
            <label for="user-id">Select user:</label>
            <select name="user-id" id="user-id">
                <?php foreach ($this->users as $user) : ?>
                    <option value="<?=$user['id']?>"><?=htmlspecialchars($user['username'])?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-row">
            <input type="submit" value="Message" />
        </div>
    </form>
</main>
