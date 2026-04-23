
<?php
include 'config.php';
session_start();

if(isset($_POST['login'])){

   // تنظيف المدخلات لمنع SQL Injection
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   // استعلام البحث عن المستخدم
   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('Query Failed');

   if(mysqli_num_rows($select) > 0){

      $row = mysqli_fetch_assoc($select);

      // تخزين بيانات المستخدم في الجلسة (Session)
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['user_type'] = $row['user_type'];

      // التوجيه حسب الرتبة
      if($row['user_type'] == 'admin'){
         header('location:admin_page.php'); // تأكدي أن هذا هو اسم ملف الأدمن عندك
         exit();
      }else{
         header('location:home.php'); // تأكدي أن هذا هو اسم ملف الطالب عندك
         exit();
      }

   }else{
      $message[] = 'الإيميل أو كلمة السر غير صحيحة!';
   }
}
?>

