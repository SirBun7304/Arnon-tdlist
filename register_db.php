<?php
session_start(); // เริ่มต้น Session เพื่อใช้เก็บข้อความแจ้งเตือน (Success Message)
include('Data.php'); // เชื่อมต่อไฟล์ฐานข้อมูล (ตัวแปรเชื่อมต่อคือ $Data)

// ตรวจสอบว่ามีการกดปุ่มสมัครสมาชิก (register_btn) หรือไม่
if (isset($_POST['register_btn'])) {

    // --- 1. รับค่าและกรองข้อมูลเบื้องต้น ---
    // trim() ใช้ตัดช่องว่างหน้า-หลัง ออกเพื่อป้องกันความผิดพลาด
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // --- 2. ตรวจสอบความถูกต้องของข้อมูล (Validation) ---
    // เช็คว่ารหัสผ่านทั้งสองช่องตรงกันหรือไม่
    if ($password !== $confirm_password) {
        header("location: register.php?error=" . urlencode("รหัสผ่านไม่ตรงกัน"));
        exit();
    }

    // --- 3. ตรวจสอบว่ามีชื่อผู้ใช้นี้ในระบบแล้วหรือยัง (ใช้ Prepared Statement) ---
    // 
    $check_stmt = $Data->prepare("SELECT id FROM users WHERE username = ?");
    $check_stmt->bind_param("s", $username); // "s" หมายถึงส่งค่าแบบ String
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // ถ้าเจอข้อมูลในระบบแล้ว ให้ส่งกลับหน้าสมัครสมาชิกพร้อมข้อความ error
        header("location: register.php?error=" . urlencode("ชื่อผู้ใช้นี้ถูกใช้งานแล้ว"));
        exit();
    } else {

        // --- 4. การเข้ารหัสผ่าน (Password Hashing) ---
        // ใช้ PASSWORD_DEFAULT ซึ่งเป็นอัลกอริทึมมาตรฐานที่ปลอดภัยที่สุดในปัจจุบัน
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        // --- 5. บันทึกข้อมูลลงฐานข้อมูล (Insert Data) ---
        $sql = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";
        $insert_stmt = $Data->prepare($sql);
        $insert_stmt->bind_param("sss", $name, $username, $password_hashed);

        if ($insert_stmt->execute()) {
            // ถ้าบันทึกสำเร็จ เก็บข้อความแจ้งเตือนลง Session และไปหน้า login
            $_SESSION['success'] = "สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบ";
            header("location: login.php");
            exit();
        } else {
            // ถ้าเกิดข้อผิดพลาดในการรัน SQL
            header("location: register.php?error=" . urlencode("เกิดข้อผิดพลาดในการสมัครสมาชิก"));
            exit();
        }
    }
} else {
    // ถ้าไม่มีการกดปุ่ม (เช่น เข้าผ่าน URL ตรงๆ) ให้ดีดกลับไปหน้าสมัครสมาชิก
    header("location: register.php");
    exit();
}
