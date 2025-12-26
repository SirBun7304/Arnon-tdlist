<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เพิ่มรายการใหม่ | My To-Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            /* ใช้สีพื้นหลังเดียวกับหน้าหลักเพื่อให้ดูเป็นแอปเดียวกัน */
            background-color: #fcfcfc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 450px;
            /* กระชับพื้นที่ให้ดู Minimal */
        }

        .card {
            border: 1px solid #eee;
            /* เส้นขอบบางๆ แบบหน้าหลัก */
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            padding: 30px;
            background-color: #ffffff;
        }

        .form-label {
            font-weight: 400;
            color: #7f8c8d;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 18px;
            border: 1px solid #eee;
            background-color: #f8f9fa;
            transition: all 0.3s;
            font-weight: 300;
        }

        .form-control:focus {
            border-color: #4a90e2;
            /* สี Seafoam Green เมื่อกดพิมพ์ */
            box-shadow: 0 0 0 4px rgba(72, 180, 166, 0.1);
            background-color: #fff;
            outline: none;
        }

        .btn {
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        /* ปุ่มบันทึก (ใช้สีเดียวกับหน้าหลัก) */
        .btn-success {
            background-color: #4a90e2;
            border: none;
            box-shadow: 0 4px 12px rgba(58, 173, 158, 0.2);
            color: white;
        }

        .btn-success:hover {
            background-color: #1a62b5ff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(72, 180, 166, 0.3);
            color: white;
        }


        .btn-secondary {
            background-color: #fff;
            color: #95a5a6;
            border: 1px solid #eee;
        }

        .btn-secondary:hover {
            background-color: #f8f9fa;
            color: #7f8c8d;
            border-color: #ddd;
        }


        .form-icon {
            font-size: 40px;
            color: #48b4a6;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        .form-title {
            font-weight: 500;
            color: #2d3436;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body text-center">

                <h3 class="mb-4">เพิ่มรายการใหม่</h3>

                <form action="ad_data.php" method="POST" class="text-start">
                    <div class="mb-4">
                        <label for="taskInput" class="form-label">สิ่งที่คุณต้องทำ</label>
                        <input type="text" name="add" id="taskInput" class="form-control"
                            placeholder="เช่น ซื้อนม, ล้างรถ..." required autofocus>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="submit_btn" class="btn btn-success">
                            บันทึกข้อมูล
                        </button>
                        <a href="index.php" class="btn btn-secondary text-center">
                            ยกเลิก
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>