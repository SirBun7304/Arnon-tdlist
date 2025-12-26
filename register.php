<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สมัครสมาชิก | My To-Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            /* ใช้พื้นหลังสีฟ้าสว่างจางๆ ดูสะอาดตา */
            background-color: #f0f7ff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .card {
            border: 1px solid rgba(0, 0, 0, 0.02);
            border-radius: 24px;
            /* เงาสีฟ้าอ่อนแบบละมุน */
            box-shadow: 0 10px 40px rgba(74, 144, 226, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            background-color: #ffffff;
        }

        .register-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .register-header ion-icon {
            font-size: 55px;
            color: #4a90e2;
            /* สีฟ้าอ่อนหลัก */
            margin-bottom: 10px;
        }

        .register-title {
            font-weight: 500;
            color: #2d3436;
            font-size: 1.6rem;
            letter-spacing: 0.5px;
        }

        .form-label {
            font-weight: 400;
            color: #636e72;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e1e8ed;
            background-color: #fcfdfe;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4a90e2;
            /* ขอบสีฟ้าเมื่อโฟกัส */
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
            background-color: #ffffff;
            outline: none;
        }

        .btn-register {
            border-radius: 12px;
            padding: 12px;
            background-color: #4a90e2;
            border: none;
            color: white;
            font-weight: 500;
            width: 100%;
            margin-top: 15px;
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.2);
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: #357abd;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(74, 144, 226, 0.3);
            color: white;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 0.9rem;
            color: #636e72;
        }

        .login-link a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* ตกแต่งช่อง Input เมื่อมี Icon (ถ้าต้องการ) */
        .input-group-text {
            background-color: transparent;
            border: none;
            color: #4a90e2;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="text-center mb-4">
                <ion-icon name="person-add" style="font-size: 40px; margin-bottom: 10px;"></ion-icon>
                <h3>สมัครสมาชิก</h3>
                <p class="text-muted">สร้างบัญชีผู้ใช้ใหม่</p>
            </div>

            <form action="register_db.php" method="POST">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo htmlspecialchars($_GET['success']); ?>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อ - นามสกุล</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="ระบุชื่อของคุณ" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">ชื่อผู้ใช้ (Username)</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="ระบุชื่อผู้ใช้" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="ตั้งรหัสผ่าน" required>
                </div>

                <div class="mb-4">
                    <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="ยืนยันรหัสผ่านอีกครั้ง" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="register_btn" class="btn btn-primary">สมัครสมาชิก</button>
                    <a href="login.php" class="btn btn-link text-center text-decoration-none">มีบัญชีคลิกที่นี่เพื่อเข้าสู่ระบบ</a>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>