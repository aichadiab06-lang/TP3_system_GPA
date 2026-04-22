> Aicha diab:
<?php
// إعدادات قاعدة البيانات بناءً على الصور
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_db"; // هذا الاسم اللي ظهر في الجداول عندك

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
