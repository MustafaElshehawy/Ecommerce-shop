<?php
require('config.php');
$ID=$_GET['id'];
$cardDelelte="DELETE FROM card WHERE product_id='$ID'";
mysqli_query($conn,$cardDelelte);
header("location: ../card.php");
?>