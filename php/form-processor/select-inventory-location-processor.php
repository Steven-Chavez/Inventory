<?php
/**
 * Form processor for location selection
 * Author: Steven
 * Date: 7/11/2017
 * Time: 3:43 PM
 * Version: 1.0
 */

if(!isset($_POST["locationId"]))
{
    header("Location: ../../index.php");
}
else
{
    session_start();
    $_SESSION["locationId"] = $_POST["locationId"];
    header("Location: ../../location-inventory.php");
}