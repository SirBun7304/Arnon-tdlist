<?php
include("Data.php");

$id = $_GET['id'];

$sql = "SELECT * FROM list WHERE id = $id";
$query = mysqli_query($Data, $sql) or die("query failed");
$data = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขรายการ | My To-Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            /* ปรับพื้นหลังเป็นสีฟ้าเทาอ่อนเหมือนหน้าหลัก */
            background-color: #f4f7f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .container {
            max-width: 450px;
        }

        .card {
            border: 1px solid #e1e8ed;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(74, 144, 226, 0.05);
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
            border: 1px solid #e1e8ed;
            background-color: #f8f9fa;
            transition: all 0.3s;
            font-weight: 300;
        }

        .form-control:focus {
            border-color: #4a90e2;
            /* สีฟ้าเมื่อกดพิมพ์ */
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
            background-color: #fff;
            outline: none;
        }

        .btn {
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        /* ปุ่มบันทึกข้อมูล (โทนสีฟ้า) */
        .btn-success {
            background-color: #4a90e2;
            border: none;
            box-shadow: 0 4px 12px rgba(74, 144, 226, 0.2);
            color: white;
        }

        .btn-success:hover {
            background-color: #357abd;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(74, 144, 226, 0.3);
            color: white;
        }

        /* ปุ่มยกเลิก */
        .btn-secondary {
            background-color: #fff;
            color: #95a5a6;
            border: 1px solid #e1e8ed;
        }

        .btn-secondary:hover {
            background-color: #f8f9fa;
            color: #7f8c8d;
            border-color: #cbd5e0;
        }

        /* ไอคอนสีฟ้า */
        .form-icon {
            font-size: 45px;
            color: #4a90e2;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        h3 {
            font-weight: 500;
            color: #2d3436;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body text-center p-0">
                <ion-icon name="create-outline" class="form-icon"></ion-icon>
                <h3 class="mb-4">แก้ไขรายการ</h3>

                <form action="edit_data.php" method="POST" class="text-start">
                    <div class="mb-4">
                        <label for="taskInput" class="form-label">สิ่งที่คุณต้องการปรับเปลี่ยน</label>
                        <input type="text" name="add" id="taskInput" class="form-control"
                            value="<?php echo $data['task']; ?>"
                            placeholder="ระบุรายการงานของคุณ..." required autofocus>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="submit_btn" class="btn btn-success">
                            บันทึกการเปลี่ยนแปลง
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