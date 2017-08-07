<?php
/**
 * This web page allows you to select from multiple search
 * products. If there is only one search result this web page
 * is skipped. 
 *
 * Author: Steven Chavez
 * Date: 7/23/2017
 * Time: 4:19AM
 * Version: 1.0
 */

    // Require appropriate files.
    require_once("../../database.php");
    require_once("php/classes/location.php");

    // connect to database and obtain PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();

    session_start();

    $search = $_SESSION['$search'];
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Select Product</title>

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
                <a class="navbar-brand" href="index.php">E-C Inventory</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div style="padding-left: 2em; padding-right: 2em" class="row">
        <header class="col-md-6 col-md-offset-3"> 
        <?php
            $total = count($search);
            
            if($total > 1 && !isset($_SESSION['id']))
            {
                echo '<h1>There are multiple search results!</h1>
                  <p>
                    Please select the exact product you are looking for. 
                  </p>';

                echo '<form action="php/form-processor/select-one-product-processor.php" method="post">';
                    foreach($search as $value)
                    {
                        echo '<input type="radio" name="id" value="' . 
                             $value->ProductId . 
                             '"> '.
                             $value->ProductName . 
                             '<br>';
                    }
                echo '<input type="submit" value="Submit">
                </form>';
            }
        ?>
        </header>
        <!--Display HTML results of product search if session id is set-->
        <?php
            if(isset($_SESSION['id']) || count($search)== 1)
            {
                // Choose appropriate productId.
                if(isset($_SESSION['id']))
                {
                    $productId = $_SESSION['id'];
                }
                else
                {
                   $productId = $search[0]->ProductId; 
                }
                
                // Obtain all locations with the productId in their inventory.
                $locations = Location::readLocationsWithProduct($pdo, $productId);
                
                var_dump($locations);
                
                // Obtain base values for data filtering.
                $total = count($locations);
                $city = $locations[0]->City;
                $state = $locations[0]->State;
                $date = $locations[0]->Date;
                
            }
        ?>
    </div>        
</body>
</html>