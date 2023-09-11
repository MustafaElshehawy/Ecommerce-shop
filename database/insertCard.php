<?php
require('config.php');

$ID=$_GET['id'];
$cardInsert="INSERT INTO card (product_id) VALUES ('$ID')";
$result=mysqli_query($conn,$cardInsert);
if($result){
    header("location: ../success5.php");
}
else{
    echo "Error: fail addcard or an upload error occurred.";
}

?>