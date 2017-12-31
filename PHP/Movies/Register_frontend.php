<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Movies.php">Movies</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="AddCategory.php">Add Category</a></li>
                <li><a href="AddGenre.php">Add Genre</a></li>
                <li><a href="AddDirector.php">Add Director</a></li>
                <li class="active"><a href="AddMovie.php">Add Movie</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="container">
    <?php if ($error != '') : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error! </strong> <?= $error; ?>
        </div>
        <?php
        $error = '';
    endif; ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend>Register</legend>
                    <div class="form-group">
                        <label for="username" class="col-lg-3 control-label">Username</label>
                        <div class="col-lg-9">
                            <input type="text" name="username" class="form-control" id="username"
                                   placeholder="Enter username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="copyright-year" class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Enter password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-lg-3 control-label">Confirm Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="confirm" class="form-control" id="confirm"
                                   placeholder="Repeat password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="reset" class="btn btn-default">Clear</button>
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</main>
</body>
</html>