<form method="get">
    <p>
        <label for="tags">Enter Tags:</label>
    </p>
    <input type="text" name="tags" id="tags">
    <input type="submit" name="submit">
</form>

<?php if(isset($tags) && count($tags) > 0) : ?>
    <ol start="0">
        <?php foreach($tags as $tag) : ?>
            <li><?= $tag ?></li>
        <?php endforeach; ?>
    </ol>
<?php endif; ?>
