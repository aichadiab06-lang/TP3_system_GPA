
<?php
// نبدأ السيسيون أولاً لنتمكن من تدميرها
session_start();

// 1. مسح كل القيم المخزنة في السيسيون
$_SESSION = array();

// 2. إذا كنتِ تستخدمين ملفات تعريف الارتباط (Cookies) للسيسيون، يفضل مسحها أيضاً
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. تدمير السيسيون نهائياً من السيرفر
session_destroy();

// 4. توجيه المستخدم لصفحة تسجيل الدخول
header('location:login.php');
exit();
?>
