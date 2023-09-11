<?php

require("config.php");

$ID=$_GET['id'];
$prodDelete ="DELETE FROM products WHERE id='$ID'";
mysqli_query($conn,$prodDelete);

header('location: ../admin/products.php');