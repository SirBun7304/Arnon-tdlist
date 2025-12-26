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
            background-color: #f4f7f9;
            color: #444;
            min-height: 100vh;
            padding-top: 40px;
        }

        .header-divider {
            border-bottom: 2px solid #e1e8ed;
            margin-bottom: 30px;
            padding-bottom: 20px;
        }

        .main-title {
            color: #2d3436;
            font-weight: 500;
        }


        .card {
            border: 1px solid #e1e8ed;
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
            background-color: #ffffff;
        }

        .card:hover {
            border-color: #4a90e2;
            transform: translateX(5px);
        }


        .card-completed {
            background-color: #f0fff4 !important;
            border: 1px solid #c6f6d5 !important;
        }

        .card-completed .task-text {
            color: #2f855a;
            text-decoration: line-through;
            opacity: 0.7;
        }


        .btn-add {
            border-radius: 10px;
            padding: 10px 24px;
            background-color: #4a90e2;
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            background-color: #357abd;
            box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
            color: white;
            transform: translateY(-2px);
        }

        .action-btns .btn {
            border-radius: 8px;
            margin-left: 4px;
            border: 1px solid #eee;
        }


        .btn-uncheck {
            background-color: #48bb78 !important;
            color: white !important;
            border: none;
        }

        .btn-uncheck:hover {
            background-color: #38a169 !important;
        }

        .status-icon {
            font-size: 24px;
            display: flex;
            align-items: center;
        }

        .icon-done {
            color: #48bb78 !important;

        }

        .icon-pending {
            color: #cbd5e0;
        }

        .card:hover .icon-pending {
            color: #a0aec0;
        }


        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3">

                <div class="d-flex justify-content-end mb-4">
                    <span class="me-3 align-self-center text-muted">
                        สวัสดีคุณ : <span style="color: #4a90e2;"><strong><?php echo $_SESSION['name']; ?></strong></span>
                    </span>
                    <button type="button" class="btn btn-sm btn-outline-secondary" style="border-radius: 20px;" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        ออกจากระบบ
                    </button>
                </div>

                <div class="header-divider text-center">
                    <h1 class="main-title">📝 My To Do List</h1>
                    <p class="text-muted small">บันทึกสิ่งที่ต้องทำและจัดการให้เสร็จสิ้น</p>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-dark fw-light mb-0">รายการงานของคุณ</h5>
                    <a href="frm_addtusk.php" class="btn btn-add d-flex align-items-center">
                        <ion-icon name="add-circle-outline" class="me-2" style="font-size: 22px;"></ion-icon>
                        เพิ่มรายการใหม่
                    </a>
                </div>

                <?php
                include("Data.php");
                mysqli_set_charset($Data, "utf8");

                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM list WHERE user_id = '$user_id' ORDER BY id DESC";
                $query = mysqli_query($Data, $sql) or die("query failed");

                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        $is_done = ($data['status'] == 1);
                        $card_class = $is_done ? 'card-completed' : '';
                ?>
                        <div class="card mb-3 <?php echo $card_class; ?>">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <div class="d-flex align-items-center">
                                            <span class="status-icon">
                                                <?php if ($is_done) { ?>
                                                    <ion-icon name="checkmark-circle" class="icon-done"></ion-icon>
                                                <?php } else { ?>
                                                    <ion-icon name="ellipse-outline" class="icon-pending"></ion-icon>
                                                <?php } ?>
                                            </span>
                                            <span class="task-text ms-3"><?php echo $data['task']; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-4 text-end action-btns">
                                        <?php if ($is_done) { ?>
                                            <a href="Uncheck.php?id=<?php echo $data['id']; ?>" class="btn btn-uncheck btn-sm" title="ติ๊กออก">
                                                <ion-icon name="checkmark-done-circle"></ion-icon>
                                            </a>
                                        <?php } else { ?>
                                            <a href="Check.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-success btn-sm" title="เสร็จสิ้น">
                                                <ion-icon name="checkmark-outline"></ion-icon>
                                            </a>
                                        <?php } ?>

                                        <!-- เพิ่ม $is_done เพื่อไม่ให้แก้ไขรายการที่เสร็จสิ้น -->
                                        <?php if (!$is_done) { ?>
                                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-warning btn-sm">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </a>
                                        <?php } ?>

                                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('ลบรายการนี้?')">
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="text-center py-5 border" style="border-radius: 15px; border-style: dashed !important; border-color: #ccc !important;">
                            <p class="text-muted">ยังไม่มีรายการงานในขณะนี้</p>
                          </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header justify-content-center pt-4">
                    <ion-icon name="log-out-outline" style="font-size: 60px; color: #dc3545;"></ion-icon>
                </div>
                <div class="modal-body text-center pb-4">
                    <h4 class="mb-2">ออกจากระบบ?</h4>
                    <p class="text-muted">คุณแน่ใจหรือไม่ว่าต้องการออกจากระบบในขณะนี้</p>
                </div>
                <div class="modal-footer justify-content-center pb-4">
                    <button type="button" class="btn btn-light px-4 me-2" data-bs-dismiss="modal" style="border-radius: 10px;">ยกเลิก</button>
                    <a href="logout.php" class="btn btn-danger px-4" style="border-radius: 10px;">ยืนยันออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>