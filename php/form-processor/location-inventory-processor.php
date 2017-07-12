<?php
/**
 * Form processor for location inventory selection
 * Author: Steven
 * Date: 7/11/2017
 * Time: 3:43 PM
 * Version: 1.0
 */

session_start();

if(!isset($_POST["iLocationId"]))
{
    header("Location: ../../index.php");
}
else
{
    $_SESSION["iLocationId"] = $_POST["iLocationId"];
    header("Location: ../../location-inventory.php");
}
