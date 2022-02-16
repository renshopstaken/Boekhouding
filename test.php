<!DOCTYPE html>
<html>

	<head>
	<link rel="stylesheet" href="pagina.css"/>
	</head>
	
<body>
<form method="post">

Naam: <input type="text" name="txtnaam"/></br>
Adres: <input type="text" name="txtadres"/></br>
<input type="submit" name="Okay">
</form>

<?php
	include("database.php");
	if(isset($_POST['Okay'])){
		
		$naam = $_POST['txtnaam'];
		$adres = $_POST['txtadres'];
		
		$query = "INSERT INTO gegevens(gid, naam, adres) VALUES (0,'$project','$datum','$projectcode')";
        $stm = $con->prepare($query);
        if($stm->execute()){
            echo "Project toegevoegd!!";
        }
        else{
            echo "Project niet toegevoegd!!";
        }

    }

?>