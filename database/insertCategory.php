<?php
require('config.php');
$NAME=$_POST['name'];
$categInsert="INSERT INTO categories (name) VALUES ('$NAME')";
$result=mysqli_query($conn,$categInsert);
if($result){
    header("location: ../success3.php");
}
else{
    echo "Error: fail uploaded or an upload error occurred.";
}
?>