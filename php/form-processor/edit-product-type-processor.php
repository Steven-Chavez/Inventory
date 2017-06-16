<?php
    /**
     * Form processor that handles creating,
     * deleting, and editing of product types
     * in the database.
     * 
     * Author: Steven Chavez
     * Date: 5/11/2017
     * Time: 4:26PM
     * Version: 1.0
     * File: edit-product-type-processor.php
     */
    require_once("../../../../database.php");
    require_once("../classes/product-type.php");

    // connect to database and obtain PDO object
    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();

    if(isset($_POST["add"]))
    {
        $add = $_POST["add"];
        $type = new ProductType(NULL, $add);
        $type->insert($pdo);
    }

    if(isset($_POST["delete"]))
    {
        $delete = $_POST["delete"];
        ProductType::delete($pdo, $delete);
    }

    if(isset($_POST["editChange"]))
    {
        echo "edit";
    }
    
    header("Location: ../../edit-product-type.php");