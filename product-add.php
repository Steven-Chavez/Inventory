<?php
    require_once("../../database.php");
    require_once("php/classes/product-type.php");

    $pdo = new DatabaseConnect();

    $pdo = $pdo->getPDO();

    $productType = ProductType::readTypeNames($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Insert</title>
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
                <a class="navbar-brand" href="#">E-C Inventory</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
        <form  action="php/form-processor/product-add-processor.php" method="post">
            Product Name: <br>
            <input class="form-control" type="text" name="ProductName"><br><br>
            Product Number: <br>
            <input class="form-control" type="text" name="ProductNumber"><br><br>
            Color: <br>
            <input class="form-control" type="text" name="Color"><br><br>
            Number Per Case: <br>
            <input class="form-control" type="number" name="NumberPerCase"><br><br>
            Type: <br>
            <select class="form-control" name="TypeId">
                <?php
                //Populate drop down box with values from db
                $i = 1;
                foreach ($productType as $value)
                {
                    echo"<option value=\"{$i}\">{$value}</option>";
                    $i++;
                }
                ?>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>