<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ | My To-Do List</title>
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
            max-width: 400px;
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

        .btn-success {
            border-radius: 12px;
            padding: 10px 20px;
            background-color: #27ae60;
            border: none;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.2);
        }

        .btn-success:hover {
            background-color: #219150;
            transform: translateY(-2px);
            transition: all 0.3s;
        }

        ion-icon {
            font-size: 24px;
            color: #27ae60;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="text-center mb-4">
                <ion-icon name="log-in" style="font-size: 40px; margin-bottom: 10px;"></ion-icon>
                <h3>เข้าสู่ระบบ</h3>
                <p class="text-muted">เข้าถึงรายการงานของคุณ</p>
            </div>

            <form action="login_db.php" method="POST">
                <?php
                session_start();
                if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="username" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="ระบุชื่อผู้ใช้" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="ระบุรหัสผ่าน" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="login_btn" class="btn btn-success">เข้าสู่ระบบ</button>
                    <a href="register.php" class="btn btn-link text-center text-decoration-none">สมัครสมาชิกใหม่</a>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>