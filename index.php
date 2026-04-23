
<?php
// منع أي مخرجات قبل التوجيه لضمان عمل header() بنجاح
ob_start(); 
include 'config.php';
session_start();

// 1. التحقق من وجود الجلسة (هل سجل الدخول؟)
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
    exit();
}

// 2. التحقق من نوع المستخدم والتوجيه للصفحة المناسبة
if(isset($_SESSION['user_type'])) {
    if($_SESSION['user_type'] == 'admin'){
        header('location:admin_page.php');
        exit();
    } else {
        header('location:home.php');
        exit();
    }
} else {
    // في حال وجود جلسة ولكن نوع المستخدم غير معروف (للحماية)
    header('location:login.php');
    exit();
}

ob_end_flush();
?>

