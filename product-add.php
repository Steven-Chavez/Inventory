<?php
    require_once("../../database.php");
    require_once("php/classes/product-type.php");

    $pdo = new DatabaseConnect();
    $pdo = $pdo->getPDO();

    $productType = ProductType::readTypeNames($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Insert</title>
</head>
<body>
    <form>
        Product Name: <br>
        <input type="text" name="ProductName"><br>
        Product Number: <br>
        <input type="text" name="ProductNumber"><br>
        Color: <br>
        <input type="text" name="Color"><br>
        Number Per Case: <br>
        <input type="number" name="NumberPerCase"><br>
        Type: <br>
        <select name="TypeId">
            <?php
                //Populate drop down box with values from db
                foreach ($productType as $value)
                {
                    echo"<option value=\"". $value . "\">"
                        . $value . "</option>";
                }
            ?>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>