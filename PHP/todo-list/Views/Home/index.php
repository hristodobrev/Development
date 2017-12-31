<?php /** @var \Models\User $user */ $user = $viewData['user']; ?>

<p>Username: <?= $user->getUsername(); ?></p>
<p>Email: <?= $user->getEmail(); ?></p>
<p>Date Created: <?= $user->getDateCreated()->format('d-m-Y H:i:s'); ?></p>
<p>Last Updated: <?= $user->getLastUpdated()->format('d-m-Y H:i:s'); ?></p>