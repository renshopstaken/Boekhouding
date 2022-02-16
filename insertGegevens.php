<!DOCTYPE html>
<html>
<head>
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
    td{
        width: 40%;
        height: 5%;
        border: 1px;
        border-radius: 05px;
        padding: 8px 15px 8px 15px;
        margin: 10px 0px 15px 0px;
        box-shadow: 1px 1px 2px 1px grey;
        }
	input{
		position: absolute;
		top: 10px;
		right: 10px;
		}
	p {
		position: absolute;
		top: 10px;
		left: 10px;
		}
    </style>
    </head>
</head>
<body>
 <input type="button" onclick="window.location.href='http://localhost/boekhouding/homepagina.php'" value="Hoofdmenu"/></br>
    <center>
        <h1>Lijst met gegevens</h1>
    </center>
<table border="3">
  <tr>
    <td>ID</td>
    <td>Bedrijf</td>
    <td>Adres</td>
    <td>Postcode</td>
    <td>Woonplaats</td>
    <td>Telefoonnummer</td>
    <td>Email</td>
    <td>Website</td>
    <td>Login</td>
    <td>Password</td>
    <td>Opmerking</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>

<?php

include "connectie.php"; // Using database connection file here

$query = "SELECT * FROM gegevens";
$stm = $con->prepare($query);

if($stm->execute()){
	$result = $stm->fetchALL(PDO::FETCH_OBJ);
	foreach($result as $pers)
	{
				
?>
  <tr>
    <td><?php echo $pers->gid?></td>
    <td><?php echo $pers->naam ?></td>
    <td><?php echo $pers->adres ?></td> 
    <td><?php echo $pers->postcode ?></td>
    <td><?php echo $pers->woonplaats ?></td>
    <td><?php echo $pers->telefoonnummer ?></td>
    <td><?php echo $pers->email ?></td>
    <td><?php echo $pers->website ?></td>
    <td><?php echo $pers->inlog ?></td>
    <td><?php echo $pers->password ?></td> 
    <td><?php echo $pers->opmerking ?></td>
    <td><a href="updategegevens.php?id=<?php echo $pers->gid ?>">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $pers->gid ?>">Delete</a></td>
  </tr>
 
<?php
	}
}
?>
</table>

</body>
</html>