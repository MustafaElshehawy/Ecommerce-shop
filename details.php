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

    <?php
    require('database/config.php');
    include('navbar.php');
    ?>

    
    </div>
    <center>
        <h3>تفاصيل المنتج</h3>
    </center>
    <?php 
    $ID=$_GET['id'];
    $productInfo="SELECT * FROM products WHERE id=$ID";
    $result= mysqli_query($conn,$productInfo);
    $row=mysqli_fetch_array($result);
    
    ?>

    <div class="row single-product-area">
        <div class="col-lg-7 col-md-6">
            <div>
                <div style="text-align: right;">
                    <h2><?= $row['name']?></h2>
                    <br>
                    <div>
                        <span style="font-style: bold;color:Green ;font-size:large"><?= $row['price']?></span>
                    </div>
                    <div>
                        <p>
                            <span><?= $row['description']?></span>
                        </p>
                    </div>
                    
                    <div>
                        
                            <label><b>أضف الكمية</b></label>
                            <br>
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                            </div>             
                            <br>
                            
                            <a href='database/insertCard.php?id=<?= $row['id']?>' class='btn btn-success' role="button"> أضف إلي العربة</a>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div> 
        <div class="col-lg-3 col-md-6">                  
            <a class="rounded float-end" href="<?= $row['photo']?>" >
                <img src="<?= $row['photo']?>" alt="product image" style="max-width: 255px;max-height: 255px">
            </a>                           
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>