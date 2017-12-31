<?php if(isset($_SESSION['messages'])) : ?>
<ul id="messages">
<?php foreach ($_SESSION['messages'] as $message) : ?>
    <li class="<?=htmlspecialchars($message['type'])?>"><?=htmlspecialchars($message['message'])?></li>
<?php endforeach; unset($_SESSION['messages']);
?>
</ul>
<?php endif; ?>