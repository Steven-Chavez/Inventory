<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Product Type</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">E-C Inventory</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
        <h3>Add Product Type</h3><br>
        <form  action="php/form-processor/product-add-processor.php" method="post">
            Product Type: <br>
            <input class="form-control" type="text" name="add"><br>
            <input type="submit" value="Submit">
        </form>
        <br>
        <h3>Delete Product Type</h3><br>
        <form  action="php/form-processor/product-add-processor.php" method="post">
            Product Type: <br>
            <select class="form-control" name="delete">
                <?php
                ?>
            </select><br>
            <input type="submit" value="Submit">
        </form>
        <br>
        <h3>Edit Product Type</h3><br>
        <form  action="php/form-processor/product-add-processor.php" method="post">
            Select Product Type To Edit: <br>
            <select class="form-control" name="edit">
                <?php
                ?>
            </select><br>
            Input Change:
            <input class="form-control" type="text" name="editChange"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>