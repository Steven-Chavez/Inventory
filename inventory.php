<?php
    require_once("../../database.php");
    require_once("php/classes/product.php");

    // connect to database and obtain PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();

    session_start();

    //initialize local variables from $_SESSION
    $typeId = $_SESSION["typeId"];
    $locationId = $_SESSION["locationId"];

    //obtain array of product objects
    $productArray = Product::readProductsByTypeId($pdo, 1);

    //handle productId so that we do not inventor repeated products from array
    if(!isset($_SESSION['productId']))
    {
        $_SESSION['productId'] = 0;
    }
    else
    {
        $_SESSION['productId']++;
    }

    //Once array is done destroy session and redirect
    if(sizeof($productArray) == $_SESSION['productId'])
    {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }

    $productId = $_SESSION['productId'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory</title>

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
        <?php
            echo "<h2>{$productArray[$productId]->ProductName}</h2>"
        ?>
        <form  action="php/form-processor/product-add-processor.php" method="post">
            <h3>Quantity:</h3> <br>
            <input class="form-control" type="number" name="qty"><br><br>
            <h3>Local Location:</h3> <br>
            <input class="form-control" type="text" name="local"><br><br>
            <br><br>
            <input class="btn-lg" type="submit" value="Submit">
            <input class="btn-lg" type="reset">
        </form>
    </div>
</body>
</html>
</body>
</html>