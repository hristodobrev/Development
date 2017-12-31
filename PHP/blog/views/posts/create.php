<?php $this->title = 'Create new post'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <form method="post">
        <div class="form-row">
            <label for="title">Title:</label>
            <input id="title" type="text" name="title" class="field">
        </div>
        <div class="form-row">
            <label for="content">Content:</label>
            <textarea id="content" name="content" class="field"></textarea>
        </div>
        <div class="form-row">
            <input type="submit" value="Create" class="field">
        </div>
    </form>
</main>