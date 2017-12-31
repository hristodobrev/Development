<?php $this->title = 'Edit post'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <form method="post">
        <div class="form-row">
            <label for="title">Title:</label>
            <input id="title" type="text" name="title" class="field" value="<?=$this->post['title']?>">
        </div>
        <div class="form-row">
            <label for="content">Content:</label>
            <textarea id="content" type="text" name="content" class="field"><?=$this->post['content']?>
            </textarea>
        </div>
        <div class="form-row">
            <label for="date">Date:</label>
            <input id="date" type="text" name="date" class="field" value="<?=$this->post['date']?>">
        </div>
        <div class="form-row">
            <label for="user-id">Author:</label>
            <select name="user-id">
                <?php foreach ($this->users as $user) : ?>
                    <option value="<?=$user['id']?>"<?php if($_SESSION['username'] == $user['username']) {echo 'selected="selected"';} ?>><?=$user['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-row">
            <input type="submit" value="Edit" class="field">
            <a href="<?=APP_ROOT?>/posts">Cancel</a>
        </div>
    </form>
</main>