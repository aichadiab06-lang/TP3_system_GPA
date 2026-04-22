
<?php
session_start();
include 'config.php';

// إذا لم يسجل الدخول يروح لصفحة الـ Login
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    exit();
}

// التوجيه حسب نوع المستخدم (Admin أو User)
if($_SESSION['user_type'] == 'admin'){
    header('location:admin_page.php');
} else {
    header('location:home.php');
}
?>
