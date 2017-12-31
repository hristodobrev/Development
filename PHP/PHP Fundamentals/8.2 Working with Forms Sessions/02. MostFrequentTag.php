<form method="get">
    <p>
        <label for="tags">Enter Tags:</label>
    </p>
    <input type="text" name="tags" id="tags">
    <input type="submit" name="submit">
    <input type="submit" name="reset" value="Clear">
</form>

<?php if(isset($tags) && count($tags) > 0) : ?>
    <ul>
        <?php foreach($tags as $tag => $count) : ?>
            <li><?= $tag ?> : <?= $count ?></li>
        <?php endforeach; ?>
    </ul>
    <p>Most frequent tag: <?= $_SESSION['most_frequent_tag'] ?></p>
<?php endif; ?>
