<?php 
require('config.php');

$NAME = $_POST['name'];
$PRICE = $_POST['price'];
$DESCRIPTION = $_POST['descrption'];
$CATEGORIES =$_POST['category'];

$from = $_FILES['image']['tmp_name'];
$to = 'assets/images/'.uniqid().$_FILES['image']['name'];
move_uploaded_file($from, '../'.$to);

$prodInsert="INSERT INTO products (name ,price ,description ,photo ,created_at,category_id ) VALUES ('$NAME','$PRICE','$DESCRIPTION','http://localhost/ecommerce-shop/$to' ,now(),'$CATEGORIES')";

$result= mysqli_query($conn,$prodInsert);
if($result){
    header("location: ../success.php");
}
else{
    echo "Error: fail uploaded or an upload error occurred.";
}
