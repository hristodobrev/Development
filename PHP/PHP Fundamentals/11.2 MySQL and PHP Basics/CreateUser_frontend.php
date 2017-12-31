<!doctype html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>Create Person</title>
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
            <h2 class="col-lg-9 col-lg-offset-3">Create New User</h2>
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username" class="col-lg-3 control-label">Username</label>
                    <div class="col-lg-9">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-9">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm-password" class="col-lg-3 control-label">Confirm Password</label>
                    <div class="col-lg-9">
                        <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="picture" class="col-lg-3 control-label">Picture</label>
                    <div class="col-lg-9">
                        <input type="file" name="picture" class="form-control" id="picture">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="reset" class="btn btn-default">Clear</button>
                        <button type="submit" name="create_user" class="btn btn-primary">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>