<?php $this->title = 'Search articles' ?>

    <h1><?= htmlspecialchars($this->title); ?></h1>

    <form method="post">
        <input type="text" name="pattern" placeholder="Type article title...">
    </form>

<main id="posts">
    <article>
        <?php if($this->posts != null) {
            foreach ($this->posts as $post) { ?>
                <h2 class="title"><?= htmlentities($post['title']) ?></h2>
                <div class="date"><i>Posted on</i>
                    <?= (new DateTime($post['date']))->format('d-M-Y') ?>
                    <i>by</i> <?= htmlentities($post['full_name']) ?>
                </div>
                <p class="content"><?= $post['content'] ?></p>
            <?php } } ?>
    </article>
</main>