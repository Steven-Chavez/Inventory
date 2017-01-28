<?php
/**
 *
 * Author: Steven
 * Date: 1/26/2017
 * Time: 8:31 PM
 * Version: 1.0
 */

    require_once("../../../../database.php");
    require_once("../classes/product.php");

    //connect to DB and get PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();

    //initialize variables with $POST values
    $name = $_POST['ProductName'];
    $number = $_POST['ProductNumber'];
    $color = $_POST['Color'];
    $numPerCase = $_POST['NumberPerCase'];
    $typeId = $_POST['TypeId'];

    $product = new Product(null, $name, $number, $color, $numPerCase, $typeId);
    $product->insert($pdo);













