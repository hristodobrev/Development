<?php $this->title = "Edit Post"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <article>
        <?php if ($this->post['img_name']) : ?>
            <img src="<?= APP_ROOT ?>/content/images/<?= htmlspecialchars($this->post['img_name']) ?>"/>
        <?php endif; ?>
        <p id="body">
        <form method="POST">
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($this->post['title']) ?>"/>
            <div class="form-row">
                <textarea type="text" id="content"
                          name="content"><?= htmlspecialchars($this->post['content']) ?></textarea>
            </div>
            <div class="form-row">
                <input type="submit" value="Edit"/>
            </div>
        </form>
        </p>
    </article>
</main>

