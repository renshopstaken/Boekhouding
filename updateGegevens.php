

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

<?php

include "connectie.php"; // Using database connection file here

$gid = $_GET['id']; // get id through query string

$query = "SELECT * FROM gegevens where gid='$gid'";
$stm = $con->prepare($query);
if($stm->execute()){
	$result = $stm->fetchALL(PDO::FETCH_OBJ);
	foreach($result as $pers)
	{
		?>
		<form method="POST">
			<center>
			<h1>Bewerk</h1>
			<input type="text" name="txtnaam" value="<?php echo $pers->naam ?>" placeholder="Vul naam in" Required></br>
			<input type="text" name="txtadres" value="<?php echo $pers->adres ?>" placeholder="Vul adres in" Required></br>
			<input type="text" name="txtpostcode" value="<?php echo $pers->postcode ?>" placeholder="Vul postcode in" Required></br>
			<input type="text" name="txtwoonplaats" value="<?php echo $pers->woonplaats ?>" placeholder="Vul woonplaats in" Required></br>
			<input type="text" name="txttelefoonnummer" value="<?php echo $pers->telefoonnummer ?>" placeholder="Vul telefoonnummer in" Required></br>
			<input type="text" name="txtemail" value="<?php echo $pers->email ?>" placeholder="Vul email in" Required></br>
			<input type="text" name="txtwebsite" value="<?php echo $pers->website ?>" placeholder="Vul website in" Required></br>
			<input type="text" name="txtlogin" value="<?php echo $pers->inlog ?>" placeholder="Vul login in" Required></br>
			<input type="text" name="txtpassword" value="<?php echo $pers->password ?>" placeholder="Vul password in" Required></br>
			<input type="text" name="txtopmerking" value="<?php echo $pers->opmerking ?>" placeholder="Vul opmerking in" Required></br>
			<input type="submit" name="update" value="Update">
			<input type="button" onclick="window.location.href='http://localhost/boekhouding/insertGegevens.php';" value="Lijst"/></br>
			</center>
		</form>
		<?php
	}
}

if(isset($_POST['update'])) // when click on Update button
{
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
	
	$queryEdit = "Update gegevens set naam='$naam', adres='$adres', postcode='$postcode', woonplaats='$woonplaats', telefoonnummer='$telefoonnummer', email='$email', website='$website', inlog='$login', password='$password', opmerking='$opmerking' where gid='$gid'";
	$stmt = $con->prepare($queryEdit);
	$stmt->execute();
	
	if($stmt->execute() === true){
		echo "Record updated successfully";
		header("Location: insertGegevens.php");
	}
	else{
		echo $queryEdit;
		echo "Record not updated";
	}

}
?>


