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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 450px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 2px solid #eee;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: none;
            background-color: #f8f9ff;
        }

        .btn-primary {
            border-radius: 12px;
            padding: 10px 20px;
            background-color: #0d6efd;
            border: none;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            transition: all 0.3s;
        }

        ion-icon {
            font-size: 24px;
            color: #0d6efd;
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