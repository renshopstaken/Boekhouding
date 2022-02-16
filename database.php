<?php
	$host = 'localhost';
	$database = 'boekhouding';
	$username = 'root';
	$password = '';

	try{
		$con = new PDO ("mysql:host=$host;dbname=$database","$username","$password");
	} catch(PDOExepion $ex){
		
		echo "verbinding mislukt: $ex";
	}


?>