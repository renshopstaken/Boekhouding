<!DOCTYPE html>
<html>

	<head>
	<link rel="stylesheet" href="pagina.css"/>
	<style>
	input{
		width: 40%;
		height: 5%;
		border: 1px;
		border-radius: 05px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
		box-shadow: 1px 1px 2px 1px grey;
		}	
	textarea{
		width: 40%;
		height: 5%;
		border: 1px;
		border-radius: 05px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
		box-shadow: 1px 1px 2px 1px grey;
		}	
	select{
		width: 40%;
		height: 5%;
		border: 1px;
		border-radius: 05px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
		box-shadow: 1px 1px 2px 1px grey;
		}
	</style>
	</head>
	
<body>
	<center>
	<h1> Boekhouding </h1>
		<form action="" method="POST">

		Bedrijf: <input type="text" name="txtnaam" placeholder="Voer naam in"/>
		<?php
		$mysqli = NEW MySQLi('localhost','root','','boekhouding');
		
		$resultSet = $mysqli->query("SELECT naam FROM gegevens");
		?>

		<select name="naam">
		<?php
		while($rows = $resultSet->fetch_assoc())
		{
		$naam = $rows['naam'];
		echo "<option value='$naam'>$naam</option>";
		}
		?>	
		</select></br>
		Adres: <input type="text" name="txtadres" placeholder="Voer adres in"/></br>
		Postcode: <input type="text" name="txtpostcode" placeholder="Voer postcode in"/></br>
		Woonplaats: <input type="text" name="txtwoonplaats" placeholder="Voer woonplaats in"/></br>
		Telefoonnummer: <input type="text" name="txttelefoonnummer" placeholder="Voer telefoonnummer in"/></br>
		Email: <input type="text" name="txtemail" placeholder="Voer email in"/></br>
		Website: <input type="text" name="txtwebsite" placeholder="Voer website in"/></br>
		Login: <input type="text" name="txtlogin" placeholder="Voer de login in"/></br>
		Password <input type="text" name="txtpassword" placeholder="Voer het password in"/></br>
		Opmerking: <input type="text" name="txtopmerking" placeholder="Voer opmerking in"/></br>
		<input type="button" onclick="window.location.href='http://localhost/boekhouding/homepagina.php';" value="Homepagina"/></br>
		<input type="submit" name="Okay" value="Okay">
		<input type="button" onclick="window.location.href='http://localhost/boekhouding/insertGegevens.php';" value="Bijwerken"/></br>
		</form>
	</center>

<?php
	include("database.php");
	if(isset($_POST['Okay'])){
	if (empty($_POST['txtnaam'])){
		echo "Bedrijf vergeten";
	}
	else if(empty($_POST['txtadres'])){
		echo "Adres vergeten";
		}
	else if(empty($_POST['txtpostcode'])){
		echo "Postcode vergeten vergeten";
		}	
	else if(empty($_POST['txtwoonplaats'])){
		echo "Woonplaats vergeten";
		}
	else if(empty($_POST['txttelefoonnummer'])){
		echo "Telefoonnummer vergeten";
		}
	else if(empty($_POST['txtemail'])){
		echo "Email vergeten";
		}
	else if(empty($_POST['txtwebsite'])){
		echo "Website vergeten";
		}	
	else if(empty($_POST['txtlogin'])){
		echo "Login vergeten";
		}
	else if(empty($_POST['txtpassword'])){
		echo "Password vergeten";
		}
	else if(empty($_POST['txtopmerking'])){
		echo "Opmerking vergeten";
		}
		else{
			$lijst = array();
			array_push($lijst,$_POST['txtnaam']);
			array_push($lijst,$_POST['txtadres']);
			array_push($lijst,$_POST['txtpostcode']);
			array_push($lijst,$_POST['txtwoonplaats']);
			array_push($lijst,$_POST['txttelefoonnummer']);
			array_push($lijst,$_POST['txtemail']);
			array_push($lijst,$_POST['txtwebsite']);
			array_push($lijst,$_POST['txtlogin']);
			array_push($lijst,$_POST['txtpassword']);
			array_push($lijst,$_POST['txtopmerking']);
			
		$naam = $_POST['txtnaam'];
		$adres = $_POST['txtadres'];
		$postcode = $_POST['txtpostcode'];
		$woonplaats = $_POST['txtwoonplaats'];
		$telefoonnummer = $_POST['txttelefoonnummer'];
		$email = $_POST['txtemail'];
		$website = $_POST ['txtwebsite'];
		$login = $_POST ['txtlogin'];
		$password = $_POST ['txtpassword'];
		$opmerking = $_POST ['txtopmerking'];
		
		$query = "INSERT INTO gegevens(gid, naam, adres, postcode, woonplaats, telefoonnummer, email, website, inlog, password, opmerking) VALUES (0, '$naam', '$adres', '$postcode', '$woonplaats', '$telefoonnummer', '$email', '$website', '$login', '$password', '$opmerking')";
		$stm = $con->prepare($query);
		if($stm->execute()){
			echo "Toegevoegd!";
			header("Location: insertGegevens.php");
		}
		else{
			echo "Mislukt!";
		}
		}
	}
	
?>
</body>
</html>