> Aicha diab:
<?php
include 'config.php';
session_start();

// التحقق من وجود الجلسة (Session)
if(!isset($_SESSION['user_id'])){
   header('location:login.php');
   exit(); // إضافة exit مهمة جداً لضمان عدم تحميل بقية الصفحة
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>المواد الدراسية</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
   <div class="flex">
      <a href="home.php" class="logo">جامعتي 🎓</a>
      <nav class="navbar">
         <a href="home.php">الرئيسية</a>
         <a href="contact.php">تواصل معنا</a>
      </nav>
      <div class="user-info">
         <span>مرحباً، <?php echo $_SESSION['user_name']; ?></span>
         <a href="logout.php" class="delete-btn" onclick="return confirm('هل تريد تسجيل الخروج؟');">خروج</a>
      </div>
   </div>
</header>

<section class="products">
   <h1 class="title">المواد الدراسية المتوفرة</h1>

   <div class="box-container">
      <?php  
         // ملاحظة: إذا كنتِ غيرتِ اسم الجدول لـ courses، غيري الكلمة هنا أيضاً
         $select_products = mysqli_query($conn, "SELECT * FROM products") or die('Query Failed: ' . mysqli_error($conn));
         
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">المعامل (Credit): <span><?php echo $fetch_products['price']; ?></span></div>
      </div>
      <?php 
            } 
         } else { 
            echo '<p class="empty">لا توجد مواد دراسية مضافة حالياً!</p>'; 
         } 
      ?>
   </div>
</section>

</body>
</html>


