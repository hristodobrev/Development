<!doctype html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>Add new Movie</title>
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
                    <legend>Add new Movie</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-3 control-label">Title</label>
                        <div class="col-lg-9">
                            <input type="text" name="title" class="form-control" id="title"
                                   placeholder="Enter title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="copyright-year" class="col-lg-3 control-label">Copyright Year</label>
                        <div class="col-lg-9">
                            <input type="number" name="copyright-year" class="form-control" id="copyright-year"
                                   placeholder="Enter Copyright Year" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-lg-3 control-label">Length</label>
                        <div class="col-lg-9">
                            <input type="number" step="0.01" name="length" class="form-control" id="length"
                                   placeholder="Enter Length" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rating" class="col-lg-3 control-label">Rating</label>
                        <div class="col-lg-9">
                            <input type="number" name="rating" class="form-control" id="rating"
                                   placeholder="Enter Rating" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="director" class="col-lg-3 control-label">Director</label>
                        <div class="col-lg-9">
                            <select name="director" class="form-control" id="director">
                                <?php foreach ($directors as $director) : ?>
                                    <option value="<?= $director['id']; ?>"><?= $director['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="genre" class="col-lg-3 control-label">Genre</label>
                        <div class="col-lg-9">
                            <select name="genre" class="form-control" id="genre">
                                <?php foreach ($genres as $genre) : ?>
                                    <option value="<?= $genre['id']; ?>"><?= $genre['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-lg-3 control-label">Category</label>
                        <div class="col-lg-9">
                            <select name="category" class="form-control" id="category">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="notes" class="col-lg-3 control-label">Notes</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="notes" rows="3" id="notes"></textarea>
                            <span class="help-block">Add some notes about the movie.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="reset" class="btn btn-default">Clear</button>
                            <button type="submit" name="add-movie" class="btn btn-primary">Add Movie</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</main>
</body>
</html>