<?php
    /**
     * index allows for view of inventory data
     * Author: Steven Chavez
     * Date: 1/28/2017
     * Time: 8:21 PM
     * Version: 1.0
     */
    require_once("../../database.php");
    require_once("php/classes/inventory.php");


    // connect to database and obtain PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();

    session_start();
    
    if(!isset($_SESSION["locationId"]))
    {
        //set default inventory date index
        $_SESSION["locationId"] = 1;
    }
    
    
    //$dates = Inventory::readInventoryDates($pdo);
    //$types = ProductType::readType($pdo);
    $joinByType = Inventory::readInventoryByLocation($pdo, $_SESSION["locationId"]);
    
    // format current date for better presentation
    $dateStr = $joinByType[0]->InventoryDate;
    $CardboardInvCurrentDate= date("F j, Y", strtotime($dateStr));
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
    <div class="row">
        <aside  style="padding-left: 2em" class="col-md-2">
            
        </aside>
        <main class="col-md-8">
            <div class="table-responsive">
                <h4>
                    Most Current Cardboard Inventory: 
                    <?php echo $CardboardInvCurrentDate; ?> 
                </h4>
                
                    <?php
                    
                    $total = count($joinByType);
                    $index = 1;
                    $header = false;
                    
                    for($i = 0; $i < $total; $i++)
                    {
                        if($joinByType[$i]->InventoryLocationId == $index && $header == false)
                        {
                            echo '  <table class="table table-bordered">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>EQI</th>
                                        <th>Color</th>
                                        <th>Qty</th>
                                    </tr>';
                            $header = true;
                        }
                        else if($joinByType[$i]->InventoryLocationId != $index)
                        {
                            $header = false;
                            $index++;
                        }
                        
                        echo "
                                <tr>
                                    <td>{$joinByType[$i]->ProductName}</td>
                                    <td>{$joinByType[$i]->ProductNumber}</td>
                                    <td>{$joinByType[$i]->Color}</td>
                                    <td>{$joinByType[$i]->Quantity}</tb>
                                </tr> 
                            ";
                            
                    }
                        session_unset();
                        session_destroy();
                    ?>
                </table>
            </div>
        </main>
    </div>
</body>
</html>