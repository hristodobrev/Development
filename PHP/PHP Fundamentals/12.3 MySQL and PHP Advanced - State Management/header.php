<?php /** @var $userLifecycle UserLifecycle */ ?>
<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <?php if ($userLifecycle->isLogged()): ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="profile_edit.php">Edit Profile</a></li>
                        <li><a href="users.php">All Users</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>