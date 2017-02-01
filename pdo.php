<?php
	require_once("../../database.php");
	$handler = new DatabaseConnect();
	$handler = $handler->getPDO();

	$query = $handler->query('SELECT * FROM Product');

	while($row = $query->fetch()){
		echo $row['Type'] . "<br>";
	}


?> 