<?php $this->title = 'Create New Post'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form method="post">
    <div><label for="post_title">Username:</label></div>
    <input id="post_title" type="text" name="post_title" placeholder="Enter title..."/>
    <div><label for="post_content">Password:</label></div>
    <textarea id="post_content" name="post_content" placeholder="Type some content here..."></textarea>
    <div>
        <input type="submit" value="Create"/>
        <a href="<?=APP_ROOT?>/posts">[Cancel]</a>
    </div>
</form>