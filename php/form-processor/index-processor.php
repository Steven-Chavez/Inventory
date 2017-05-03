<?php
$index = $_POST["date"];

session_start();

$_SESSION["inventoryDateIndex"] = $index;

header("Location: ../../index.php");

