<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربتي |منتجاتي</title>
    <link rel="stylesheet" href="assets/css/cardd.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>

<?php

require("database/config.php");
//include('navbar.php');
?>
<center>
    <h3>عرية التسوق</h3>
</center>
<?php

$cardInfo="SELECT * FROM card ";
$resultcard=mysqli_query($conn,$cardInfo);
?>
<?php 
while($rawcard=mysqli_fetch_array($resultcard))
{
    $ID=$rawcard['product_id'];
    $productsInfo="SELECT * FROM products WHERE id='$ID'";
    $resultproduct=mysqli_query($conn,$productsInfo);
    while($rawproduct=mysqli_fetch_array($resultproduct)){
        
        ?>
<center>
<main>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>صورة المنتج</th>
                <th scope='col'>اسم المنتج</th>
                <th scope='col'>سعر المنتج</th>
                <th scope='col'>حذف المنتج</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="<?= $rawproduct['photo'] ?>" alt="image product" width="75px"></td>
                <td><?= $rawproduct['name']?></td>
                <td><?= $rawproduct['price']?></td>
                <td><a href='database/deleteCard.php?id=<?= $rawproduct['id']?>' class='btn btn-danger'>إزالة</a></td>
            </tr>
        </tbody>
    </table>
</main>
</center>
<?php
    }
}
?>


<center>
    <a href="shop.php">الرجوع لصفحة المنتجات</a>
</center>
    
</body>
</html>
<!DOCTYPE html>
