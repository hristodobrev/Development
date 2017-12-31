<?php $this->title = htmlspecialchars($this->user['username']) . "'s Profile"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <article>
        <h3><?= htmlspecialchars($this->user['username']) ?></h3>
        <p><?= htmlspecialchars($this->user['full_name']) ?></p>
        <p>Posts:
            <a href="<?= APP_ROOT ?>/posts/userPosts/<?= $this->user['id'] ?>">
                <?= htmlspecialchars(count($this->userPosts)) ?>
            </a>
        </p>
        <a href="<?= APP_ROOT ?>/messages/chat/<?= $this->user['id'] ?>">Send message</a>
    </article>
</main>
