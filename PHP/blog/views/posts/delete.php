<?php $this->title = 'Delete post'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <form method="post">
        <div class="form-row">
            <label for="title">Title:</label>
            <input id="title" type="text" name="title" class="field" disabled="disabled" value="<?=$this->post['title']?>">
        </div>
        <div class="form-row">
            <label for="content">Content:</label>
            <textarea id="content" type="text" name="content" class="field" disabled="disabled"><?=$this->post['content']?>
            </textarea>
        </div>
        <div class="form-row">
            <label for="date">Date:</label>
            <input id="date" type="text" name="date" class="field" disabled="disabled" value="<?=$this->post['date']?>">
        </div>
        <div class="form-row">
            <label for="author">Author:</label>
            <select name="author" disabled="disabled">
                <option selected="selected"><?=$this->post['full_name']?></option>
            </select>
        </div>
        <div class="form-row">
            <input type="submit" value="Delete" class="field">
            <a href="<?=APP_ROOT?>/posts">Cancel</a>
        </div>
    </form>
</main>