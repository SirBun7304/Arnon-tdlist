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
    <title>เพิ่มรายการใหม่ | My To-Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* จัดให้อยู่กึ่งกลางแนวตั้ง */
        }

        .container {
            max-width: 500px;
            /* จำกัดความกว้างของฟอร์ม */
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-label {
            font-weight: 500;
            color: #4b4b4b;
            margin-bottom: 10px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 2px solid #eee;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: none;
            background-color: #f8f9ff;
        }

        .btn {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 400;
            transition: all 0.3s;
        }

        .btn-success {
            background-color: #27ae60;
            border: none;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.2);
        }

        .btn-success:hover {
            background-color: #219150;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #ecf0f1;
            color: #7f8c8d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #bdc3c7;
            color: #fff;
        }

        ion-icon {
            font-size: 24px;
            color: #0d6efd;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <ion-icon name="add-circle"></ion-icon>
                <h3 class="mb-4">แก้ไขรายการ</h3>

                <form action="edit_data.php" method="POST" class="text-start">
                    <div class="mb-4">
                        <label for="taskInput" class="form-label">สิ่งที่คุณต้องทำ</label>
                        <input type="text" name="add" id="taskInput" class="form-control" value="<?php echo $data['task']; ?>"
                            placeholder="เช่น ซื้อของ, อาบน้ำ..." required autofocus>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
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