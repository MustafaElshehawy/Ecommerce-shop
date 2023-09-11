
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login |تسجيل الدخول</title>
   <link rel="stylesheet" href="assets/css/login.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
</head>
<body>
<?php
require('database/config.php');

if(isset($_POST['submit'])){
    $email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password= strip_tags($_POST['password']);

    $errors=[];
    //validate email
    if(empty($email)){
      $errors[]= "يجب كتابة البريد الالكتروني";
    }

    //validate password
    if(empty($password)){
      $errors[]="يجب كتابة كلمة السر";
    }
    
    //insert or errors
    if(empty($errors)){
      
      $select =mysqli_query($conn,"SELECT * FROM users WHERE ( email = '$email' )");
      if($select){
         $row=mysqli_fetch_array($select);
         if(password_verify($password,$row['password'])){
            if($row['usersType'] == 'customer'){
               header("location: shop.php");
            }elseif($row['usersType'] == 'admin'){
               header("location: admin/products.php");
            }
         }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">
            خطأ في البريد أو كلمة السر<a href=\"index.php\" class=\"alert-link\">االرجوع والمحاولة مرة اخري</a>. أضغط للرجوع والمحاولة مره اخري.
          </div>"; 
         }
         
      }
    }else{
      if(isset($errors)){
         if(!empty($errors)){
            foreach($errors as $error){
               echo "<div class=\"alert alert-danger\" role=\"alert\">
               $error .
             </div>";
            }
         }
      }
    }


}

?>

<center>
   <div class="form-container">
      <form action="" method="post">
         <h3>تسجيل الدخول</h3>
         <input type="email" name="email" required placeholder="البريد الالكتروني" class="box">
         <br>
         <input type="password" name="password" required placeholder="كلمة المرور" class="box">
         <br>
         <input type="submit" name="submit" class="btn" value="تسجيل الدخول">
         <br>
         <p>ليس لديك حساب؟ <a href="register.php"> إنشاء حساب جديد</a></p>
         <br><br>
      </form>
   </div>
</center>  
</body>
</html>