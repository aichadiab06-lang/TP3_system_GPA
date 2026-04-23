
<?php
include 'config.php';
session_start();

// التأكد من أن المستخدم مسجل دخول كـ "أدمن"
// إذا لم يكن مسجلاً، يرجعه لصفحة login
if(!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin'){
   header('location:login.php');
   exit(); // ضروري نوقف التنفيذ هنا
}

$admin_id = $_SESSION['user_id'];

// كود إضافة المادة عند الضغط على زر "إضافة"
if(isset($_POST['add_course'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $credits = $_POST['credits'];

   // هنا نتحقق إذا كانت المادة موجودة من قبل
   $select_course = mysqli_query($conn, "SELECT name FROM courses WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_course) > 0){
      $message[] = 'هذه المادة موجودة مسبقاً!';
   }else{
      // إضافة المادة لجدول اسمه courses (تأكدي أنك صنعتِ هذا الجدول)
      mysqli_query($conn, "INSERT INTO courses(name, credits) VALUES('$name', '$credits')") or die('query failed');
      $message[] = 'تمت إضافة المادة بنجاح!';
   }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <title>لوحة التحكم - الأدمن</title>
   <link rel="stylesheet" href="style.css">
   <style>
      /* شوية ستايل سريع باش تبان الخدمة منظمة */
      .message {
         background-color: #f8d7da;
         padding: 10px;
         margin: 10px 0;
         border-radius: 5px;
         text-align: center;
      }
   </style>
</head>
<body>

<?php
// إظهار رسائل النجاح أو الخطأ
if(isset($message)){
   foreach($message as $msg){
      echo '<div class="message">'.$msg.'</div>';
   }
}
?>

   <section class="dashboard">
      <h1 class="title">إدارة الجامعة - مرحباً بك يا عائشة</h1>
      
      <div class="box-container">
         <div class="box">
            <h3>إضافة مادة جديدة</h3>
            <form action="" method="post">
               <input type="text" name="name" placeholder="اسم المادة (مثلاً: Arch de l'ordinateur)" class="box" required>
               <input type="number" name="credits" placeholder="المعامل (Crédit)" class="box" required>
               <input type="submit" value="إضافة المادة" name="add_course" class="btn">
            </form>
         </div>
      </div>

      <div style="text-align: center; margin-top: 20px;">
         <a href="logout.php" class="delete-btn">تسجيل الخروج</a>
      </div>
   </section>

</body>
</html>

