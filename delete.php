<?php include_once 'connectie.php';
 // get id value
 $gid = $_GET['id'];

// sql to delete a record
$quaryDelete = "DELETE FROM gegevens WHERE gid='$gid'";
$stmt = $con->prepare($quaryDelete);
$stmt->execute();
// print_r($sql);

if ($stmt->execute() === true){
   echo "Record deleted successfully";
} 
else {
    echo "Error deleting record: " ;
}

 //redirect here
include 'insertGegevens.php';

?>