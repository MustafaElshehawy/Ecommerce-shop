<?php
require('config.php');
$ID=$_POST['id'];
$NAME=$_POST['name'];

$update="UPDATE categories SET name='$NAME' WHERE id='$ID'";
$result=mysqli_query($conn,$update);
if($result){
    header("location: ../success4.php");
}else{
    echo "Error: fail uploaded or an upload error occurred.";
}

