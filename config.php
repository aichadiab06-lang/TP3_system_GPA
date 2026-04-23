
<?php
// إعدادات قاعدة البيانات
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "university_db"; 

// إنشاء الاتصال
$conn = mysqli_connect($host, $user, $pass, $db_name);

// التحقق من الاتصال وإظهار الخطأ بوضوح إذا وجد
if (!$conn) {
    die("خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// ضبط الترميز لدعم اللغة العربية بشكل صحيح
mysqli_set_charset($conn, "utf8mb4");

// ملاحظة: لا نغلق وسم الـ PHP إذا كان الملف يحتوي على كود PHP فقط لتجنب الشاشة البيضاء
