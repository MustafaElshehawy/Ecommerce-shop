<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G2 Store |إضافة منتجات</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require('../database/config.php');

    $categ="SELECT * FROM categories";
    $result=mysqli_query($conn,$categ);
    
    ?>
    <center>
        <div class="main">
            <form action="../database/insertProduct.php" method="post" enctype="multipart/form-data">
                <h2>أضف منتجاتك الأن</h2>
                <img src="../assets/imgs/adminPhoto.jpg" alt="logo" width="440px" height="150px" style="border-radius: 32px;" >
             
                <select class="form-control" name="category" style="width:200px">
                    <option value="">اختر قسم المنتج ..</option>
                    <?php
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?= $row['id']?>"><?= $row['name'];?></option>

                    <?php } ?>
                    
                </select>
                <br>
                <input type="text" name="name" require placeholder="اكتب اسم المنتج">
                <br>
                <input type="text" name="price" require placeholder="اكتب سعر المنتج" >
                <br>
                <textarea name="descrption" placeholder="اكتب وصف المنتج" style=" border: 1px solid grey; background-color: #fafafa; font-family: 'Cairo', sans-serif;font-weight: bold; font-size: 16px; padding: 10px; margin: 10px 0;border-radius: 8px;width: 60%;text-align: center;"></textarea>
                <br>
                <input type="file" name="image" id="file" style="display:none;" >
                <label for="file">اختيار صورة للمنتج</label>
                <button name="upload">رفع المنتج</button>
                <br><br>
                <a href="products.php">عرض كل المنتجات</a>
            </form>
        </div>
        <p>Developer By Mustafa Elshehawy</p>
    </center>
</body>
</html>
<!DOCTYPE html>