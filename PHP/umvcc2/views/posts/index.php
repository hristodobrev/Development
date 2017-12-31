<?php $this->title = "My Posts"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <?php foreach ($this->posts as $post) : ?>
        <article>
            <?php if ($post['img_name']) : ?>
                <img src="<?= APP_ROOT ?>/content/images/<?= htmlspecialchars($post['img_name']) ?>"/>
            <?php endif; ?>
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p id="body"><?= $post['content'] ?></p>
            <p></p>
            <p id="info">
                <a href="<?=APP_ROOT?>/posts/edit/<?=$post['id']?>">Edit</a>
                <a href="<?=APP_ROOT?>/posts/delete/<?=$post['id']?>">Delete</a>
            </p>
        </article>
    <?php endforeach; ?>
</main>