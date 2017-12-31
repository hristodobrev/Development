<!doctype html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>Document</title>
    <script>
        $(function(){
            $('.alert>.close').click(function(element){
                $(element.target).parent().fadeOut();
            });
        });
    </script>
</head>
<body>
<div class="container">
    <?php if($error != '') : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error! </strong> <?= $error; ?>
        </div>
        <?php
        $error = '';
    endif; ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="col-lg-10 col-lg-offset-2">Login</h2>
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="username" class="col-lg-2 control-label">Userame</label>
                    <div class="col-lg-10">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Clear</button>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
            <p class="col-lg-10 col-lg-offset-2">Don't have a profile? You can register from <a href="createuser.php">here</a>.</p>
        </div>
    </div>
</div>
</body>
</html>