
<?php
include 'config.php';

if(isset($_POST['submit'])){
   // تنظيف البيانات المدخلة
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

   // التحقق مما إذا كان الإيميل مستخدماً من قبل
   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('Query Failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'هذا الإيميل مستخدم مسبقاً، جرب إيميلاً آخر!';
   }else{
      // إدخال المستخدم الجديد
      $insert = mysqli_query($conn, "INSERT INTO users(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')") or die('Query Failed');
      
      if($insert){
         // رسالة نجاح اختيارية أو توجه مباشر
         header('location:login.php');
         exit();
      }
   }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <title>إنشاء حساب جديد</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// إظهار رسائل التنبيه للمستخدم (مثل: المستخدم موجود مسبقاً)
if(isset($message)){
   foreach($message as $msg){
      echo '
      <div class="message" onclick="this.remove();">
         <span>'.$msg.'</span>
         <i class="fas fa-times"></i>
      </div>
      ';
   }
}
?>

<div class="form-container">
   <form action="" method="post">
      <h3>أنشئ حساباً جديداً 🎓</h3>
      <input type="text" name="name" placeholder="أدخل اسمك الكامل" required class="box">
      <input type="email" name="email" placeholder="أدخل البريد الإلكتروني" required class="box">
      <input type="password" name="password" placeholder="أدخل كلمة السر" required class="box">
      
      <select name="user_type" class="box">
         <option value="user">طالب (Student)</option>
         <option value="admin">مسؤول (Admin)</option>
      </select>
      
      <input type="submit" name="submit" value="سجل الآن" class="btn">
      <p>هل تملك حساباً بالفعل؟ <a href="login.php">سجل دخولك من هنا</a></p>
   </form>
</div>

</body>
</html>




