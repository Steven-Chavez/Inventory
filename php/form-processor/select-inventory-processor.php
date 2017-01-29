<?php
/**
 * Select inventory processor determines the location
 * and type of product being used for
 */
//initialize local variable with $_POST data
$locationId = $_POST["locationId"];
$typeId = $_POST["typeId"];

//start session and populate id's
session_start();
$_SESSION["LocationId"] = $locationId;
$_SESSION["TypeId"] = $typeId;

header("Location: ../../inventory.php");