<?php
    /**
     * index allows for view of inventory data
     * Author: Steven Chavez
     * Date: 1/28/2017
     * Time: 8:21 PM
     * Version: 1.0
     */
    require_once("../../database.php");
    require_once("php/classes/inventory-locations.php");
    require_once("php/classes/inventory.php");
    require_once("php/classes/location.php");

    // connect to database and obtain PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();
    
    session_start();
    
    // Assign location's id choosen in index.php to variable.
    $locationId = $_SESSION["locationId"];
    
    // Obtain all inventory locations at choosen location.
    $inventoryLocations = InventoryLocation::readInventoryLocationBylocation($pdo, $locationId);
    echo "<p>Inventory Locations</p>";
    
    // Handle inventory location id session 
    if(!isset($_SESSION["iLocationId"]))
    {
        //set default location
        $_SESSION["iLocationId"] = 0;
    }
    
    $iLocationId = $_SESSION["iLocationId"];
    echo "<p>iLocationId</p>";
    
    $inventory = Inventory::readInventoryByLocationAndDateSort($pdo, $iLocationId+1);
   
    $locationName = Location::readCityStateById($pdo, $locationId);    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Location Inventories</title>

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
    <div class='row'>
        <div style="padding-left: 2em" class="col-lg-4 col-lg-offset-4 col-md-8">
            <?php 
                echo "<h1>{$locationName[0]->City}, {$locationName[0]->LocationState}</h1>";
                echo "<h4>Inventory Location: {$inventoryLocations[$iLocationId]->Name}</h4>"
            ?>
        </div>
    </div>
    <div class="row">
        <aside  style="padding-left: 2em" class="col-md-2">
            <!-- Select Inventory Location -->
            <form action="php/form-processor/location-inventory-processor.php" method="post">
                Select Inventory Location:
                <select class="form-control" name="iLocationId">
                    <?php
                        $index = 0;
                        foreach($inventoryLocations as $value)
                        {
                            echo "<option value=\"{$index}\">{$value->Name}</option>";
                            $index++;
                        }
                    ?>
                </select>
                <br>
                <input type="submit" value="Submit">
                <br>
            </form>
        </aside>
        <main style="padding-left: 2em" class="col-md-8">
            <div class="table-responsive">
                    <?php
                        $date = $inventory[0]->Date;
                        $header = false;
                        
                        $total = count($inventory);
                        
                        foreach($inventory as $table)
                        {
                            echo "<br>";
                            if($date == $table->Date && $header == false)
                            {
                                echo "<h3>{$table->Date}</h3>";
                                echo '  
                                    <table class="table table-bordered">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>EQI</th>
                                        <th>Color</th>
                                        <th>Qty</th>
                                    </tr>
                                ';
                                
                                echo "
                                    <tr>
                                        <td>{$table->ProductName}</td>
                                        <td>{$table->ProductNumber}</td>
                                        <td>{$table->Color}</td>
                                        <td>{$table->Quantity}</tb>
                                    </tr> 
                                ";
                                $header = true;
                            }
                            else if($date != $table->Date) 
                            {
                                $header = false;
                                $date = $table->Date;
                            }
                            else
                            {
                                echo "
                                    <tr>
                                        <td>{$table->ProductName}</td>
                                        <td>{$table->ProductNumber}</td>
                                        <td>{$table->Color}</td>
                                        <td>{$table->Quantity}</tb>
                                    </tr> 
                                ";
                            }
                        }
                    ?>
                </table>
            </div>
        </main>
    </div>
</body>
</html>