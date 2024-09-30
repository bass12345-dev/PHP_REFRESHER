<?php include('connection/connection.php') ?>
<?php include('query_data/queries.php') ?>
<?php include('query_data/func.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main">
        <?php include('includes/header.php') ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col1">
                        <?php include('main/table.php') ?>
                    </div>
                    <div class="col2">
                        <?php include('main/form.php') ?>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>