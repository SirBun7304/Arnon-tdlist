<?php
include("Data.php");

// 1. ตรวจสอบว่ามีการส่งค่า id มาทาง URL หรือไม่
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($Data, $_GET['id']);

    // 2. เขียนคำสั่ง SQL สำหรับลบข้อมูล
    $sql = "DELETE FROM list WHERE id = '$id'";

    if (mysqli_query($Data, $sql)) {
        // 3. เมื่อลบสำเร็จ ให้เด้งกลับไปหน้าหลัก (index.php)
        header("Location: index.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการลบ: " . mysqli_error($Data);
    }
} else {
    // หากไม่มีการส่ง id มา ให้กลับหน้าหลัก
    header("Location: index.php");
}
?>