<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/api-test/public/css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<header>
	<nav>
		<ul>
			<?php if ($this->isLogged) : ?>
				<li><a href="/api-test/home/index">Home</a></li>
				<li><a href="/api-test/home/upload">Upload</a></li>
				<li><a href="/api-test/home/files">My Files</a></li>
				<li><a href="/api-test/admin/logout">Logout</a></li>
			<?php else : ?>
				<li><a href="/api-test/home/login">Login</a></li>
			<?php endif; ?>
		</ul>
	</nav>
</header>