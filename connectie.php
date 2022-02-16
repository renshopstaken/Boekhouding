<?php

$host = "localhost";
$dbname = "boekhouding";
$username = "root";
$password = "";

$con = new PDO("mysql:host=$host;dbname=$dbname","$username","$password") or die("verbinding mislukt!");
?>