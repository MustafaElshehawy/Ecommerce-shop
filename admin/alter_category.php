<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G2 Store |إضافة نوع منتج</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require('../database/config.php');
    $ID=$_GET['id'];
    $showOldCategory="SELECT * FROM categories WHERE id=$ID";
    $result=mysqli_query($conn,$showOldCategory);
    $row=mysqli_fetch_array($result);
    ?>
    <center>
        <div class="main">
            <form action="../database/updateCategory.php" method="post" enctype="multipart/form-data">
                <h2>عدل قسم منتجاتك الأن</h2>
                <img src="../assets/imgs/adminPhoto.jpg" alt="logo" width="450px" height="150px" >
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="text" name="name" value="<?=$row['name']?>"require placeholder="اكتب قسم المنتج">
                <br>
                <button name="upload">تحديث قسم المنتج</button>
                <br><br>
                <a href="categories.php">عرض كل الاقسام</a>
            </form>
        </div>
        <p>Developer By Mustafa Elshehawy</p>
    </center>
</body>
</html>
<!DOCTYPE html>