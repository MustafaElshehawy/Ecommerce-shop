<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products |المنتجات</title>
    <link rel="stylesheet" href="assets/css/products.css"/>
    <link rel="stylesheet" href="assets/css/shop.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>

    
    <center>
        <h3>المنتجات المتوفرة</h3>
    </center>
    <?php
   
    require('database/config.php');
    include('navbar.php');
    
    

    $productInfo="SELECT * FROM products";

    //show product with category selected
    if(isset($_GET['cid']) && ($_GET['cid']!=1)){
        $productInfo .=" WHERE category_id='{$_GET['cid']}'";
    }
    //show product when search with keyword
    if(isset($_GET['searchBTN'])){
        $productInfo .=" WHERE name like '%{$_GET['keyword']}%' OR description like '%{$_GET['keyword']}%'";
        //show product when search with keyword and category selected
        if(isset($_GET['cid']) && ($_GET['cid']!=1)){
            $productInfo .=" AND category_id='{$_GET['cid']}'";
        }
    }
    $result =mysqli_query($conn,$productInfo);
  

    while($row =mysqli_fetch_array($result)){
    ?>
    <center>
            <div class='card' style="width: 13rem;">
                <img src="<?= $row['photo']?>" class="card-img-top">
                <div class='card-body'>
                    <h5 class='card-title'><?= $row['name'] ?></h5>
                    <p class='card-text'><?= substr($row['description'],0,20) ?>...</p>
                    <p class='card-text' style="color: red;"><?= $row['price']?>$</p>
                    <a href='database/insertCard.php?id=<?= $row['id']?>' class='btn btn-success' role="button"> أضف للعربة</a>
                    <a href='details.php?id=<?= $row['id']?>' class='btn btn-secondary' role="button">عرض</a>
                </div>
            </div>
    </center>


    <?php 
    
    } 
    
    ?>
    
</body>
</html>
<!DOCTYPE html>