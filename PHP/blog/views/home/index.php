<?php $this->title = 'Welcome to My Blog'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<aside>
    <h2>Recent Posts</h2>
    <?php foreach ($this->sidebarPosts as $post) : ?>
        <a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>">
            <?=htmlspecialchars($post['title'])?>
        </a>
    <?php endforeach; ?>
</aside>

<main id="posts">
    <?php foreach ($this->posts as $post) : ?>
        <article>
            <h2 class="title"><?=htmlspecialchars($post['title'])?></h2>
            <div class="date">
                <i>Posted on </i><?=(new DateTime($post['date']))->format('d-m-Y')?>
                by <i><?=htmlspecialchars($post['full_name'])?></i>
            </div>
            <p class="content"><?=$post['content']?></p>
        </article>
    <?php endforeach; ?>
</main>