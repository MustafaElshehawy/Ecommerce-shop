<?php
require('config.php');

$ID=$_POST['id'];
$NAME = $_POST['name'];
$PRICE = $_POST['price'];
$DESCRIPTION = $_POST['description'];
$CATEGORIES =$_POST['category'];

if(!isset($_FILES['image'])){
    $from = $_FILES['image']['tmp_name'];
    $to = '../assets/images/'.uniqid().$_FILES['image']['name'];
    move_uploaded_file($from, $to);
    $prodInsert="UPDATE products SET 
                name= '$NAME' ,
                price= '$PRICE' ,
                description= '$DESCRIPTION' ,
                photo= '$to',
                category_id='$CATEGORIES',
                updated_at= now() WHERE id=$ID";

}else{
    $prodInsert="UPDATE products SET 
                name= '$NAME' ,
                price= '$PRICE' ,
                description= '$DESCRIPTION' ,
                category_id='$CATEGORIES',
                updated_at= now() WHERE id=$ID";
}


$result= mysqli_query($conn,$prodInsert);

if($result){
    header("location: ../success2.php");
}
else{
    echo "Error: fail uploaded or an upload error occurred.";
}
