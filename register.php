
<?php
include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $user_type = $_POST['user_type'];

   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'المستخدم موجود مسبقاً!';
   }else{
      mysqli_query($conn, "INSERT INTO users(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')") or die('query failed');
      header('location:login.php');
   }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>أنشئ حساباً الآن</h3>
      <input type="text" name="name" placeholder="أدخل اسمك" required class="box">
      <input type="email" name="email" placeholder="أدخل إيميلك" required class="box">
      <input type="password" name="password" placeholder="أدخل كلمة السر" required class="box">
      <select name="user_type" class="box">
         <option value="user">طالب</option>
         <option value="admin">أدمن</option>
      </select>
      <input type="submit" name="submit" value="سجل الآن" class="btn">
      <p>عندك حساب؟ <a href="login.php">دخول</a></p>
   </form>
</div>
</body>
</html>
