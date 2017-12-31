<?php $this->title = 'Delete Post'; ?>

<h1><?= htmlspecialchars($this->title); ?></h1>

<form method="post">
    <div>Title:</div>
    <input type="text" value="<?= htmlspecialchars($this->post['title']) ?>" disabled/>
    <div>Content:</div>
    <textarea rows="10" disabled/><?= htmlspecialchars($this->post['content']) ?></textarea>
    <div>Date:</div>
    <input type="text" value="<?= htmlspecialchars($this->post['date']) ?>" disabled/>
    <div>Author ID:</div>
    <select name="user_id" disabled>
        <?php foreach($this->users as $user) : ?>
            <option value="<?=$user['id']?>" <?php if($user['id'] == $this->post['user_id']) echo "selected" ?>><?=htmlspecialchars($user['full_name'])?></option>
        <?php endforeach; ?>
    </select>
    <div>
        <input type="submit" value="Delete"/>
        <a href="<?= APP_ROOT ?>/posts">[Cancel]</a>
    </div>
</form>