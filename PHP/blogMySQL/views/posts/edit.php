<?php $this->title = 'Edit Existing Post'; ?>

<h1><?= htmlspecialchars($this->title); ?></h1>

<form method="post">
    <div>Title:</div>
    <input type="text" name="post_title" value="<?= htmlspecialchars($this->post['title']) ?>" />
    <div>Content:</div>
    <textarea rows="10" name="post_content" /><?= htmlspecialchars($this->post['content']) ?></textarea>
    <div>Date:</div>
    <input type="text" name="post_date" value="<?= htmlspecialchars($this->post['date']) ?>" />
    <div>Author ID:</div>
    <select name="user_id">
        <?php foreach($this->users as $user) : ?>
            <option value="<?=$user['id']?>" <?php if($user['id'] == $this->post['user_id']) echo "selected" ?>><?=htmlspecialchars($user['full_name'])?></option>
        <?php endforeach; ?>
    </select>
    <div>
        <input type="submit" value="Edit"/>
        <a href="<?= APP_ROOT ?>/posts">[Cancel]</a>
    </div>
</form>