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
    
    var_dump($inventoryLocations);
    
    // Handle inventory location id session 
    if(!isset($_SESSION["iLocationId"]))
    {
        //set default location
        $_SESSION["iLocationId"] = $inventoryLocations[0]->Id;
    }
    
    $iLocationId = $_SESSION["iLocationId"];
    
    var_dump($iLocationId);
    
    $inventory = Inventory::readInventoryByLocationAndDateSort($pdo, $iLocationId, $locationId);
    
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
                $name = InventoryLocation::readInventoryLocationsById($pdo, $iLocationId);
                echo "<h1>{$locationName[0]->City}, {$locationName[0]->LocationState}</h1>";
                echo '<h3>Location: <span style="color: #990000">' . 
                 $name->Name . '</span></h3><br>';
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
                        foreach($inventoryLocations as $value)
                        {
                            echo "<option value=\"{$value->Id}\">{$value->Name}</option>";
                        }
                    ?>
                </select>
                <br>
                <input type="submit" value="Submit">
                <br>
                <br>
            </form>
        </aside>
        <main style="padding-left: 2em" class="col-md-8">
            <div class="table-responsive">
                    <?php
                        $total = count($inventory);
                        $date = $inventory[0]->Date;
                        $differentDate = true;
                        
                        for($i = 0; $i < $total; $i++)
                        {
                            //Start table header 
                            if($date == $inventory[$i]->Date)
                            {
                                // If Date is different display table header.
                                if($differentDate == true)
                                {
                                    // format current date for better presentation
                                    $formattedDate = date("F j, Y", strtotime($date));
                                    
                                    // Start table header and display inventory date.
                                    echo '  
                                        <table class="table table-bordered">
                                        <h4>'. $formattedDate . ' Inventory</h4>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Product Name</th>
                                            <th>EQI #</th>
                                            <th>Color</th>
                                        </tr>
                                    ';
                                    
                                    // Date is no longer different.
                                    $differentDate = false;
                                }
                                
                                // Display row of table data.
                                echo "
                                    <tr>
                                        <td>{$inventory[$i]->Quantity}</tb>
                                        <td>{$inventory[$i]->Name}</td>
                                        <td>{$inventory[$i]->Number}</td>
                                        <td>{$inventory[$i]->Color}</td>
                                    </tr> 
                                ";
                                
                                // Before loop ends close table.
                                if($i == $total-1)
                                {
                                    echo "</table><br>";
                                }
                            }
                            // If date is different reset values to display new table.
                            else if($date != $inventory[$i]->Date)
                            {
                                $differentDate = true;
                                $date = $inventory[$i]->Date;
                                $i--;
                            }
                        }
                    ?>
                </table>
            </div>
        </main>
    </div>
</body>
</html>