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
if(isset($_POST["add"]))
{
    echo "add";
}

if(isset($_POST["delete"]))
{
    echo "delete";
}

if(isset($_POST["editChange"]))
{
    echo "edit";
}