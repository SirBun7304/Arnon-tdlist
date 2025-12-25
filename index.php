<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My To-Do List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding-top: 50px;
        }

        .main-title {
            color: #2d3436;
            font-weight: 500;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .task-text {
            font-size: 1.1rem;
            color: #4b4b4b;
        }

        .btn-add {
            border-radius: 10px;
            padding: 10px 20px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .action-btns .btn {
            border-radius: 8px;
            margin-left: 5px;
        }

        ion-icon {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3">

                    <div class="d-flex justify-content-end mb-2">
                        <span class="me-3 align-self-center text-muted">สวัสดี, <strong><?php echo $_SESSION['name']; ?></strong></span>
                        <a href="logout.php" class="btn btn-sm btn-outline-secondary">ออกจากระบบ</a>
                    </div>

                    <h1 class="text-center main-title">📝 My To Do List</h1>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-muted mb-0">รายการงานของคุณ</h5>
                        <a href="frm_addtusk.php" class="btn btn-primary btn-add d-flex align-items-center">
                            <ion-icon name="add-circle-outline" class="me-2" style="font-size: 20px;"></ion-icon>
                            เพิ่มรายการใหม่
                        </a>
                    </div>

                    <?php
                    include("Data.php");
                    // ตั้งค่าภาษาไทยให้รองรับ (ถ้ามีปัญหาภาษาไทย)
                    mysqli_set_charset($Data, "utf8");

                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM list WHERE user_id = '$user_id' order by id desc";
                    $query = mysqli_query($Data, $sql) or die("query failed");

                    // ตรวจสอบว่ามีข้อมูลไหม
                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                            <div class="card mb-3">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-8 col-md-9">
                                            <div class="d-flex align-items-center">
                                                <?php if ($data['status'] == 0) { ?>
                                                    ❌
                                                <?php } else { ?>
                                                    ✅
                                                <?php } ?>

                                                <span class="task-text ms-2"><?php echo $data['task']; ?></span>
                                            </div>
                                        </div>

                                        <div class="col-4 col-md-3 text-end action-btns">
                                            <a href="Check.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-success btn-sm" title="เสร็จสิ้น">
                                                <ion-icon name="checkmark-outline"></ion-icon>
                                            </a>
                                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-warning btn-sm" title="แก้ไข">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </a>
                                            <a href="delete.php?id=<?php echo $data['id']; ?>"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบรายการนี้?')" title="ลบ">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        // ถ้าไม่มีข้อมูลเลย
                        echo '<div class="text-center py-5">
                                <ion-icon name="document-text-outline" style="font-size: 50px; color: #ccc;"></ion-icon>
                                <p class="text-muted mt-2">ยังไม่มีรายการงานในขณะนี้</p>
                              </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>