> Aicha diab:
<?php
include 'config.php';
session_start();
$admin_id = $_SESSION['user_id'];

if(!isset($admin_id)){
   header('location:login.php');
};
?>

<!DOCTYPE html>
<html>
<head>
   <title>لوحة التحكم - الأدمن</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <section class="dashboard">
      <h1 class="title">إدارة الجامعة</h1>
      <div class="box-container">
         <div class="box">
            <h3>إضافة مادة جديدة</h3>
            <form action="" method="post">
               <input type="text" name="name" placeholder="اسم المادة" class="box" required>
               <input type="number" name="credits" placeholder="المعامل" class="box" required>
               <input type="submit" value="إضافة" name="add_course" class="btn">
            </form>
         </div>
      </div>
   </section>
</body>
</html>
