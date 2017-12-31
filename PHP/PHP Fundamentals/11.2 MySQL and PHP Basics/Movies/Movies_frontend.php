<!doctype html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>Movies</title>
    <script>
        $(function () {
            $('.alert>.close').click(function (element) {
                $(element.target).parent().fadeOut();
            });
        });
    </script>
    <style>
        .user-pic {
            height: 1.5em;
        }
    </style>
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
                <li><a href="AddMovie.php">Add Movie</a></li>
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
    <?php foreach ($movies as $movie) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><?= $movie['title']; ?></h2>
            </div>
            <div class="panel-body">
                <p>Director: <?= $movie['director']; ?></p>
                <p>Genre: <?= $movie['genre']; ?></p>
                <p>Category: <?= $movie['category']; ?></p>
                <p>Notes: <?= $movie['notes']; ?></p>
                <p>Length: <?= $movie['length'] ?> <span class="pull-right">Rating: <?= $movie['rating'] ?></span></p>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">Copyright &copy; <?= $movie['copyright_year']; ?></div>
                    <div class="col-md-6">
                        <form method="post" class="form-inline pull-right">
                            <input type="hidden" name="id" value="<?= $movie['id']; ?>">
                            <input type="submit" class="btn btn-xs btn-danger" name="delete-movie" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</main>
</body>
</html>