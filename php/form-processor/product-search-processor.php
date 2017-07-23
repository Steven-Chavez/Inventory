<?php
/**
 * Processes search input for product name
 * 
 * Author: Steven Chavez
 * Date: 7/18/17
 * Time: 2:17PM 
 * Version: 1.0
 */

// Require appropriate files.
require_once("../../../../database.php");
require_once("../classes/product.php");

// Start session
session_start();

// Connect to DB and get PDO object.
$pdo = new DatabaseConnect();
$pdo = $pdo->getPDO();

// Initialize variables with $POST values.
$search = $_POST['search'];

// Search for product and get results.
$results = Product::searchProduct($pdo, $search);

// Place $results into session
$_SESSION['$search'] = $results;

// Go to select-search-product.php 
header("Location: ../../select-search-product.php");