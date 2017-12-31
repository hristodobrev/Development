<?php $this->title = 'All posts'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <a href="<?=APP_ROOT?>/posts/create">[Create New]</a>
    <table>
        <tr class="row">
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($this->posts as $post) : ?>
            <tr>
                <td><?=$post['id']?></td>
                <td><?=htmlspecialchars($post['title'])?></td>
                <td><?=cutLongText(htmlspecialchars($post['content']))?></td>
                <td><?=(new DateTime($post['date']))->format('d-m-Y')?></td>
                <td><?=htmlspecialchars($post['full_name'])?></td>
                <td>
                    <a href="<?=APP_ROOT?>/posts/edit/<?=$post['id']?>">[Edit]</a>
                    <a href="<?=APP_ROOT?>/posts/delete/<?=$post['id']?>">[Delete]</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>