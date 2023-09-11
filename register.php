
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register |انشاء حساب</title>
   <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<?php
require('database/config.php');

if(isset($_POST['submit'])){

    
    $name= filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
    //$name= strip_tags($_POST['name']);//remove all html tags
    $email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password= strip_tags($_POST['password']);
    $cpassword= strip_tags($_POST['cpassword']);

    $errors=[];

    //validate name
    if(empty($name)){
      $errors[] = "يجب كتابة اسم المستخدم";
    }elseif(strlen($name)>100){
      $errors[] = "يجب ألا يكون الاسم اكبر من 100 حرف";
    }
    
    //validate email
    if(empty($email)){
      $errors[] = "يجب كتابة البريد الالكتروني";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors[] = "البريد الالكتروني غير صالح";
    }
   
    //validate password
    if(empty($password) || empty($cpassword)){
      $errors[] ="يجب كتابة كلمة السر";
    }elseif($password != $cpassword){
      $errors[] ="كلمتا السر غي متطابقه";
    }elseif(strlen($password)<8 ||strlen($password)>20){
      $errors="يجب ان تكون كلمة السر اكبر من 8 احرف واقل من 16 حرف";

    }else{
      $hasUppercase = 0;
      $hasLowercase = 0;
      $hasNumber = 0;
      for($i=0 ;$i <strlen($password);$i++){
         $char=$password[$i];
         if(ctype_upper($char)){
            $hasUppercase++;
         }elseif(ctype_lower($char)){
            $hasLowercase++;
         }elseif(is_numeric($char)){
            $hasNumber++;
         }
      }
      if(!$hasLowercase){
         $errors[] ='يجب كتابة حرف علي الاقل اسمول';
      }elseif(!$hasUppercase){
         $errors[] ='يجب كتابة حرف علي الاقل كبتل';
      }
      elseif(!$hasNumber){
         $errors[] ='يجب كتابة رقم علي الاقل';
      }
    }

    //insert or errors
    if(empty($errors)){
      $messages=[];
      $emailCheck =mysqli_query($conn,"SELECT * FROM users WHERE ( email = '$email')");
      if(mysqli_num_rows($emailCheck)>0){
         $messages[] ="البريد الالكتروني مسجل مسبقاا";
      }else{
         $password=password_hash($password,PASSWORD_DEFAULT);
         $addUser ="INSERT INTO users (name ,email ,password ,created_at) VALUES ('$name' ,'$email' ,'$password' ,now())";
         mysqli_query($conn,$addUser);
         $messages[] ="تم التسجيل بنجاح";
         //if return in same page you will remove old value
         $_POST['name']='';
         $_POST['email']='';
      }
      var_dump($messages);
      header("location: index.php");
    }else{
      if(isset($errors)){
         if(!empty($errors)){
            foreach($errors as $error){
               echo "<div class=\"alert alert-danger\" role=\"alert\">
               $error
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
         <h3>انشاء حساب جديد</h3>
         <input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" placeholder="اسم المستخدم" class="box">
         <br>
         <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" placeholder="البريد الالكتروني" class="box">
         <br>
         <input type="password" name="password"  placeholder="كلمة المرور" class="box">
         <br>
         <input type="password" name="cpassword"  placeholder="تأكيد كلمة المرور" class="box">
         <br>
         <input type="submit" name="submit" class="btn" value="تسجيل حساب">
         <br>
         <p>هل لديك حساب؟ <a href="index.php"> تسجيل دخول</a></p>
         <br><br>
      </form> 
   </div>
</center>

</body>
</html>