<form method="get">
    <p>
        <label for="tag">Enter HTML Tag:</label>
    </p>
    <input type="text" name="tag" id="tag">
    <input type="submit" name="submit">
</form>

<?php if(isset($tag)): ?>
    <h1><?= $valid ? 'Valid' : 'Invalid'; ?> HTML tag!</h1>
    <h1>Score: <?= $_SESSION['score'] ?></h1>
<?php endif; ?>
