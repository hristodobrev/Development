<?php $this->title = "Chat"; ?>

<main>
    <h1><?= htmlspecialchars($this->title) ?></h1>
    <form method="POST" class="chat">
        <h2><?=htmlspecialchars($this->friend['full_name'] ? $this->friend['full_name'] : $this->friend['username'])?></h2>
        <ul>
            <?php foreach ($this->messages as $msg) : ?>
                <li <?php if ($msg['reciever_id'] == $_SESSION['user_id']) echo 'class="friend-message"' ?>>
                    <?php
                    $msgDate = new DateTime($msg['date']);
                    $today = new DateTime();
                    $hoursDate = $msgDate->format("H:i");
                    $daysDate = $msgDate->format("d.m");
                    $msgDate->setTime(0, 0, 0);
                    $today->setTime(0, 0, 0);

                    $diff = $today->diff($msgDate);
                    $diffDays = (integer)$diff->format( "%R%a" );

                    if ($diffDays == 0) {
                        // Today
                        echo "<small>" . $hoursDate . "</small>";
                    } else {
                        // Not Today
                        echo "<small>" . $daysDate . "</small>";
                    }
                    ?>
                    <?= htmlspecialchars($msg['message']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="form-row">
            <input type="text" id="message" name="message" autofocus/>
            <input type="submit" value="Send"/>
        </div>
    </form>
</main>