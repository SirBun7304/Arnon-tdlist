<?php
include("Data.php");

$id = $_GET['id'];

// ใช้คำสั่ง SQL เพื่อสลับค่า (ถ้า 1 กลายเป็น 0, ถ้า 0 กลายเป็น 1)
$sql = "UPDATE list SET status = 1 - status WHERE id = $id";

mysqli_query($Data, $sql) or die("query failed");

header("Location: index.php");
exit();
