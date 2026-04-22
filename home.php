> Aicha diab:
<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){ header('location:login.php'); }
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<header class="header">
   <div class="flex">
      <a href="home.php" class="logo">جامعتي</a>
      <nav class="navbar"><a href="home.php">الرئيسية</a></nav>
      <a href="logout.php" class="delete-btn">خروج</a>
   </div>
</header>
<section class="products">
   <h1 class="title">المواد المتوفرة</h1>
   <div class="box-container">
      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM products") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">المعامل: <?php echo $fetch_products['price']; ?></div>
      </div>
      <?php } }else{ echo '<p>لا توجد مواد!</p>'; } ?>
   </div>
</section>
</body>
</html>
