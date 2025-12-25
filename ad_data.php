<?php
session_start();
include("Data.php");

if (isset($_POST['submit_btn'])) {
    $add = mysqli_real_escape_string($Data, $_POST['add']);

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $status = 0;

    $sql = "INSERT INTO list(task, user_id, status) VALUES('$add', '$user_id', '$status')";

    if (mysqli_query($Data, $sql)) {
        // บันทึกเสร็จแล้วให้กลับไปหน้าแรก (index.php)
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($Data);
    }
}
