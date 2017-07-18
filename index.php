<?php
    /**
     * index allows for view of inventory data
     * Author: Steven Chavez
     * Date: 1/28/2017
     * Time: 8:21 PM
     * Version: 1.0
     */
    require_once("../../database.php");
    require_once("php/classes/location.php");

    // connect to database and obtain PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();
    
    session_start();
    session_unset();
    session_destroy();
    
    // Get list of locations to choose from.
    $location = Location::readLocationCityAndState($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inventory Summary</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/inventoryStyle.css">
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
    <div style="padding-left: 2em; padding-right: 2em" class="row">
        <header class="col-md-6 col-md-offset-3">
            <h1>Welcome To E-C Inventory!</h1>
            <p>
                E-C Inventory is an inventory control system for equipment and cardboard.
                Please select the location to see current and past inventories. Further
                filtering of inventory information can be accomplished with the controls
                on the side after selecting your location. 
            </p>
        </header>
    </div>
    <div style="padding-left: 2em; padding-right: 2em"class="row">
        <main class="col-md-6 col-md-offset-3">
            <form  action="php/form-processor/select-inventory-location-processor.php" method="post">
                <h3>Select Location:</h3> <br>
                <select class="form-control" name="locationId">
                    <?php
                    //Populate drop down box with values from db
                    foreach ($location as $value)
                    {
                        echo"<option value=\"{$value->LocationId}\">{$value->City}, 
                                {$value->LocationState}</option>";
                    }
                    ?>
                </select><br>
                <input type="submit" value="Submit">
            </form>
            <form action="php/form-processor/product-search-processor.php" method="post"><br>
                <h3>Search For Product</h3> <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="Submit">Search</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </form>
        </main>
    </div>
</body>
</html>