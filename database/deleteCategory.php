<?php

require('config.php');

$ID =$_GET['id'];
$categDelete="DELETE FROM categories WHERE id='$ID'";
mysqli_query($conn,$categDelete);
header("location: ../admin/categories.php");
