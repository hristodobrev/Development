<!doctype html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>Create Minion</title>
    <script>
        $(function(){
            $('.alert>.close').click(function(element){
                $(element.target).parent().fadeOut();
            });

            $('.confirm-minion-delete').click(function(evt){
                if (!confirm('Are you sure you want to delete this minion?')) {
                    evt.preventDefault();
                }
            });

            $('.confirm-database-delete').click(function(evt){
                if (!confirm('Are you sure you want to delete the whole database?')) {
                    evt.preventDefault();
                }
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
        <div class="col-md-5">
            <h2>Create New Minion</h2>
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="age" class="col-lg-2 control-label">Age</label>
                    <div class="col-lg-10">
                        <input type="number" name="age" class="form-control" id="age" placeholder="Enter Age" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="town" class="col-lg-2 control-label">Town</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="town" id="town">
                            <?php foreach ($towns as $town) : ?>
                                <option value="<?= $town['id']; ?>"><?= $town['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Clear</button>
                        <button type="submit" name="create_minion" class="btn btn-primary">Create Minion</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5 col-md-offset-2">
            <h2>Minions</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Town</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($minions as $minion) : ?>
                    <tr>
                        <td><?= $minion['name']; ?></td>
                        <td><?= $minion['age']; ?></td>
                        <td><?= $minion['town']; ?>
                            <form class="form-inline pull-right" method="post">
                                <input type="hidden" name="delete-minion-id" value="<?= $minion['id']; ?>">
                                <input type="submit" value="x" class="btn btn-xs btn-danger confirm-minion-delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <form method="post">
                <input type="submit" class="btn btn-danger confirm-database-delete" name="delete-db" value="DELETE DATABASE">
            </form>
        </div>
    </div>
</div>
</body>
</html>