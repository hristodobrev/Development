<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>Add new Category</title>
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
                <li class="active"><a href="AddCategory.php">Add Category</a></li>
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
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend>Add new Category</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label">Category's Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="Enter Category's name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notes" class="col-lg-3 control-label">Notes</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="notes" rows="3" id="notes"></textarea>
                            <span class="help-block">Add some notes about the category.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="reset" class="btn btn-default">Clear</button>
                            <button type="submit" name="add-category" class="btn btn-primary">Add Category</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</main>
</body>
</html>