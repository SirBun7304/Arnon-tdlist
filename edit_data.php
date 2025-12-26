<?php
include("Data.php");

if (isset($_POST['submit_btn'])) {
    $id = $_POST['id'];
    $task = $_POST['add'];  

    // คำสั่ง SQL สำหรับแก้ไขข้อมูล
    $sql = "UPDATE list SET task = '$task' WHERE id = $id";

    if (mysqli_query($Data, $sql)) {
        header("location: index.php"); // แก้ไขสำเร็จกลับหน้าหลัก
    } else {
        echo "Error updating record: " . mysqli_error($Data);
    }
}
