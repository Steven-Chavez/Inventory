<?php
    /**
     * Processes inventory data and inserts data into DB
     * Author: Steven Chavez
     * Date: 1/28/2017
     * Time: 6:42 PM
     * Version: 1.0
     */
    require_once("../../../../database.php");
    require_once("../classes/inventory.php");

    // connect to database and obtain PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();

    session_start();

    //initialize local variables from $_SESSION
    $locationId = $_SESSION["locationId"];
    $productId = $_SESSION["productId"];

    //initialize local variables from $_POST
    $quantity = $_POST["qty"];
    $localLocation = $_POST["local"];

    $inventory = new Inventory(null, $productId, $locationId, null, $quantity, $localLocation);
    $inventory->insert($pdo);

    header("Location: ../../inventory.php");