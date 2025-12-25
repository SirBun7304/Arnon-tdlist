<?php
session_start();
include('Data.php');

if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($Data, $_POST['username']);
    $password = mysqli_real_escape_string($Data, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($Data, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $password_hash = $row['password'];

        if (password_verify($password, $password_hash)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            header("location: index.php");
            exit();
        } else {
            header("location: login.php?error=รหัสผ่านไม่ถูกต้อง");
            exit();
        }
    } else {
        header("location: login.php?error=ไม่พบชื่อผู้ใช้นี้");
        exit();
    }
} else {
    header("location: login.php");
    exit();
}
