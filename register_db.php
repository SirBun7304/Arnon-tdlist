<?php
session_start();
include('Data.php');

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($Data, $_POST['name']);
    $username = mysqli_real_escape_string($Data, $_POST['username']);
    $password = mysqli_real_escape_string($Data, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($Data, $_POST['confirm_password']);

    if ($password != $confirm_password) {
        header("location: register.php?error=รหัสผ่านไม่ตรงกัน");
        exit();
    }

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($Data, $check_query);

    if (mysqli_num_rows($result) > 0) {
        header("location: register.php?error=ชื่อผู้ใช้นี้ถูกใช้งานแล้ว");
        exit();
    } else {
        // Hash password
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password_hashed')";

        if (mysqli_query($Data, $sql)) {
            $_SESSION['success'] = "สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบ";
            header("location: login.php");
            exit();
        } else {
            header("location: register.php?error=เกิดข้อผิดพลาดในการสมัครสมาชิก");
            exit();
        }
    }
} else {
    header("location: register.php");
    exit();
}
