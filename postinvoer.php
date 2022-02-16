<!DOCTYPE html>
<html>

	<head>
	<script>

</script>

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
	SELECT{
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
	body{
		color:black;
		background-image: url(2.jpg);
		background-size: cover;
	}		
	</style>
	</head>
	
<body>
	<center>
	<h1> Post invoeren </h1>
		<form action="" method="POST">

		Post: <input type="text" name="txtpost" placeholder="Voer post in"/></br>
		Relatienummer: <input type="text" name="txtrelatienummer" placeholder="Voer relatienummer in"/></br>
		Bedrijf:
		<?php
		$mysqli = NEW MySQLi('localhost','root','','boekhouding');
		
		$resultSet = $mysqli->query("SELECT naam FROM gegevens");
		?>
		<SELECT name="bedrijf">
		<?php
		while($rows = $resultSet->fetch_assoc())
		{
		$naam = $rows['naam'];
		echo "<option value='$naam'>$naam</option>";
		}
		?>	
		</SELECT></br>
		Bedrag: <input type="text" name="txtbedrag" placeholder="Voer het bedrag in €"/></br>
		Betaling: <SELECT name="selbetaling">
		<OPTION value="incasso">Incasso </OPTION>
		<OPTION value="acceptgiro">Acceptgiro </OPTION>
		<OPTION value="email">Email </OPTION>
		</SELECT></br>
		Reservering: <SELECT name="selreservering">
		<OPTION value="week">Week </OPTION>
		<OPTION value="4week">4 Weeken </OPTION>
		<OPTION value="maand">Maand </OPTION>
		<OPTION value="3maanden">3 Maanden </OPTION>
		<OPTION value="4maanden">4 Maanden </OPTION>
		<OPTION value="halfjaar">Half jaar </OPTION>
		<OPTION value="jaar">Jaar </OPTION>
		</SELECT></br>
		<input type="button" onclick="window.location.href='http://localhost/boekhouding/homepagina.php';" value="Homepagina"/></br>
		<input type="submit" name="Okay" value="Okay">

		</form>
	</center>

<?php
	include("database.php");
	if(isset($_POST['Okay'])){
	if (empty($_POST['txtpost'])){
		echo "Post vergeten";
	}
	else if(empty($_POST['txtbedrijf'])){
		echo "Bedrijf vergeten";
		}
	else if(empty($_POST['txtrelatienummer'])){
		echo "Relatienummer vergeten";
		}
	else if(empty($_POST['txtbedrag'])){
		echo "Bedrag vergeten";
		}
	else if(empty($_POST['selbetaling'])){
		echo "Betaling vergeten";
		}
	else if(empty($_POST['selreservering'])){
		echo "Reservering vergeten";
		}
	else{
			$lijst = array();
			array_push($lijst,$_POST['txtpost']);
			array_push($lijst,$_POST['txtbedrijf']);
			array_push($lijst,$_POST['txtrelatienummer']);
			array_push($lijst,$_POST['txtbedrag']);
			array_push($lijst,$_POST['selbetaling']);
			array_push($lijst,$_POST['selreservering']);
		$post = $_POST['txtpost'];
		$bedrijf = $_POST['bedrijf'];
		$relatienummer = $_POST['txtrelatienummer'];
		$bedrag = $_POST['txtbedrag'];
		$betaling = $_POST['selbetaling'];
		$reservering = $_POST['selreservering'];
		
		$query = "INSERT INTO post(pid, post, relatienummer, bedrijf, bedrag, betaling, reservering) VALUES (0, '$post', '$relatienummer', '$bedrijf' ,'$bedrag', '$betaling', '$reservering')";
		$stm = $con->prepare($query);
		if($stm->execute()){
			echo "Toegevoegd!";
		}
		else{
			echo "Mislukt!";
		}
	}
	}
	
?>

</body>
</html>