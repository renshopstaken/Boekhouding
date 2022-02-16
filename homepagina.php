<!DOCTYPE html>
<html>

	<head>
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
	
	body{
		color:black;
		background-image: url(1.jpg);
		background-size: cover;
	}	
	</style>
	</head>
	
<body>
	<center>
	<h1> Homepagina </h1>
		<input type="button" onclick="window.location.href='http://localhost/boekhouding/boekhouding.php';" value="Bedrijf invoer"/></br>
		<input type="button" onclick="window.location.href='http://localhost/boekhouding/postinvoer.php';" value="Post invoeren"/></br>
		<input type="button" onclick="window.location.href='http://localhost/boekhouding/insertGegevens.php';" value="Gegevens"/></br>
	</center>


</body>
</html>