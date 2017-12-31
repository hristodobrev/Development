<?php $this->title = "Post Title" ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<article>
    <h2 class="title"><?=htmlspecialchars($this->post['title'])?></h2>
    <div class="date">
        <i>Posted on </i><?=(new DateTime($this->post['date']))->format('d-m-Y')?>
        by <i><?=htmlspecialchars($this->post['full_name'])?></i>
    </div>
    <p class="content"><?=$this->post['content']?></p>
</article>
