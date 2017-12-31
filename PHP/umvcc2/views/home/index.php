<?php $this->title = "Index"; ?>
<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <?php foreach ($this->posts as $post) : ?>
        <article>
            <?php if ($post['img_name']) : ?>
                <img src="<?= APP_ROOT ?>/content/images/<?= htmlspecialchars($post['img_name']) ?>"/>
            <?php endif; ?>
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p id="body"><?= $post['content'] ?></p>
            <p id="info">Created at <span><?= (new DateTime($post['date']))->format('d-m-Y') ?></span>
                <span> by <a href="<?=APP_ROOT?>/users/profile/<?=$post['id']?>"><?= $post['author'] ?></a></span>
            </p>
        </article>
    <?php endforeach; ?>
</main>