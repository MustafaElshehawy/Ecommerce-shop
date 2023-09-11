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
    require("../database/config.php");
    $ID = $_GET['id'];
    $showOldProduct ="SELECT * FROM products WHERE id=$ID";
    $result = mysqli_query($conn,$showOldProduct);
    $row=mysqli_fetch_array($result);

    //returns categories to use in select
    $categ="SELECT * FROM categories";
    $result2=mysqli_query($conn,$categ);
    
    ?>
    <center>
        <div class="main">
            <form action="../database/updateProduct.php" method="post" enctype="multipart/form-data">
                <h2>أضف منتجاتك الأن</h2>
                <img src="<?= $row['photo'] ?>" alt="logo" width="440px" height="150px" style="border-radius: 32px;" >
                <select class="form-control" name="category" style="width:200px">
                    <?php
                    while($row1=mysqli_fetch_assoc($result2)){
                        if($row['category_id']==$row1['id']){
                        ?>
                            <option selected value="<?= $row1['id']?>"><?= $row1['name'];?></option>
                        <?php
                        }else{
                        ?>
                          <option value="<?= $row1['id']?>"><?= $row1['name'];?></option>

                    <?php }} ?>
                    
                </select>
                <br>
                <input type="hidden" name="id"value="<?= $row['id']?>">
                <input type="text" name="name" require  value="<?= $row['name'] ?>">
                <br>
                <input type="text" name="price" require  value="<?= $row['price'] ?>">
                <br>
                <textarea name="description"  style=" border: 1px solid grey; background-color: #fafafa; font-family: 'Cairo', sans-serif;font-weight: bold; font-size: 16px; padding: 10px; margin: 10px 0;border-radius: 8px;width: 60%;text-align: center;">
                <?= $row['description']?>
                </textarea>
                <br>
                <input type="file" name="image" id="file" style="display:none;" >
                <label for="file">تغير صورة للمنتج</label>
                <button name="upload">تحديث</button>
                <br><br>
                <a href="products.php">عرض كل المنتجات</a>
            </form>
        </div>
        <p>Developer By Mustafa Elshehawy</p>
    </center>
</body>
</html>
<!DOCTYPE html>