<?php
session_start(); // เริ่มต้นการใช้งาน Session เพื่อจดจำสถานะการล็อกอิน
include('Data.php'); // นำเข้าไฟล์เชื่อมต่อฐานข้อมูล ($Data)

// ตรวจสอบว่ามีการกดปุ่ม login_btn มาจริงหรือไม่
if (isset($_POST['login_btn'])) {

    // --- 1. รับค่าและทำความสะอาดข้อมูล ---
    // trim() ช่วยตัดช่องว่างที่ผู้ใช้อาจเผลอพิมพ์เกินมา
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // --- 2. เตรียมคำสั่ง SQL ด้วย Prepared Statement ---
    // วิธีนี้ปลอดภัยกว่าการใส่ตัวแปรลงในสตริงโดยตรง (ป้องกัน SQL Injection)
    $stmt = $Data->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); // "s" หมายถึงข้อมูลประเภท string
    $stmt->execute();
    $result = $stmt->get_result();

    // --- 3. ตรวจสอบว่าพบชื่อผู้ใช้ในระบบหรือไม่ ---
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc(); // ดึงข้อมูลผู้ใช้ออกมาในรูปแบบ Array
        $password_hash = $row['password']; // รหัสผ่านที่เข้ารหัสไว้ใน DB

        // --- 4. ตรวจสอบรหัสผ่าน (Password Verification) ---
        // ฟังก์ชันนี้จะนำ password ที่พิมพ์มา ไปเทียบกับค่า hash ในฐานข้อมูล
        if (password_verify($password, $password_hash)) {

            // หากรหัสผ่านถูกต้อง: เก็บข้อมูลที่จำเป็นลง Session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];

            // ส่งผู้ใช้ไปที่หน้าแรกของระบบ
            header("location: index.php");
            exit();
        } else {
            // หากรหัสผ่านไม่ถูกต้อง
            header("location: login.php?error=" . urlencode("รหัสผ่านไม่ถูกต้อง"));
            exit();
        }
    } else {
        // หากไม่พบชื่อผู้ใช้นี้ในฐานข้อมูล
        header("location: login.php?error=" . urlencode("ไม่พบชื่อผู้ใช้นี้"));
        exit();
    }
} else {
    // หากเข้าหน้านี้โดยไม่ได้กดปุ่มล็อกอิน ให้ส่งกลับไปหน้า login
    header("location: login.php");
    exit();
}
