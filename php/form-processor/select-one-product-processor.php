<?php
/**
* Processor for the selection of one product by id.
* Author: Steven Chavez
* Date: 7/25/2017
* Time: 10:27 PM
* Version: 1.0
*/

//Start session.
session_start();

// Obtain form post data.
$id = is_int($_POST['id']);

// Populate session with post data.
$_SESSION['id'] = $id;
