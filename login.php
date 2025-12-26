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
            /* ใช้พื้นหลังสีเขียวอ่อนจางๆ ช่วยให้การ์ดสีขาวดูสะอาดเด่นขึ้น */
            background-color: #f0f7f4;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 24px;
            /* ความโค้งมนที่ดูทันสมัย */
            box-shadow: 0 10px 30px rgba(46, 204, 113, 0.1);
            /* เงาสีเขียวจางๆ */
            padding: 40px;
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header ion-icon {
            font-size: 50px;
            color: #2ecc71;
            /* สีเขียวหลัก */
            margin-bottom: 10px;
        }

        .login-title {
            font-weight: 500;
            color: #2d3436;
            font-size: 1.5rem;
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
            background-color: #f9fbfb;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #2ecc71;
            /* ขอบสีเขียวเมื่อคลิกพิมพ์ */
            box-shadow: 0 0 0 4px rgba(46, 204, 113, 0.1);
            background-color: #ffffff;
            outline: none;
        }

        .btn-login {
            border-radius: 12px;
            padding: 12px;
            background-color: #2ecc71;
            border: none;
            color: white;
            font-weight: 500;
            width: 100%;
            margin-top: 10px;
            box-shadow: 0 4px 12px rgba(46, 204, 113, 0.2);
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(46, 204, 113, 0.3);
            color: white;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #636e72;
        }

        .register-link a {
            color: #2ecc71;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
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