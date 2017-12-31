<?php $this->title = "Delete Post"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <article>
        <?php if ($this->post['img_name']) : ?>
            <img src="<?= APP_ROOT ?>/content/images/<?= htmlspecialchars($this->post['img_name']) ?>"/>
        <?php endif; ?>
        <h3><?= htmlspecialchars($this->post['title']) ?></h3>
        <p id="body"><?= $this->post['content'] ?></p>
        <p id="info">
        <form method="POST">
            <input type="submit" value="Delete">
        </form>
        </p>
    </article>
</main>