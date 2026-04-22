> Aicha diab:
<?php
include 'config.php';
session_start();

if(isset($_POST['login'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   // التحقق من المستخدم في جدول users
   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_type'] = $row['user_type']; // هنا نفرق بين الأدمن والطالب

      if($row['user_type'] == 'admin'){
         header('location:admin_dashboard.php');
      }else{
         header('location:student_home.php');
      }
   }else{
      $message[] = 'إيميل أو كلمة سر خاطئة!';
   }
}
?>
