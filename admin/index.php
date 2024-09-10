<?php
session_start();
if (isset($_GET['logout']))
    if ($_GET['logout'] == 'yes') {
        if (isset($_SESSION['nguoidung']))
            unset($_SESSION['nguoidung']);
        if (isset($_SESSION['cart']))
            unset($_SESSION['cart']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin "anonymous"></script>
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/design.css">
    <style>
        body {
            background-color: #e0e0e0;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['dn'])) {
        if ($_GET['dn'] == 'true') {
            echo '<style type="text/css">
            #dntb {
                display: none;
            }
            </style>';
        } else if ($_GET['dn'] == 'false') {
            echo '<style type="text/css">
            #dntb {
                display: inline;
            }
            </style>';
        }
        if ($_GET['dn'] == 'true') {
            echo '<style type="text/css">
            #dnbk {
                display: none;
            }
            </style>';
        } else if ($_GET['dn'] == 'khoa') {
            echo '<style type="text/css">
            #dnbk {
                display: inline;
            }
            </style>';
        }
    }
    ?>

    <div class="container mt-4">
        <div class="custom-frame">
            <div class="row row_admin">
                <div class="col-md-6 column bg-light comlum1">
                    <img src="./img/GENIE__1.png" alt="admin" weight="513px" height="493px">
                </div>

                <div class="col-md-6 column comlum2">
                    <div class="form-container">
                        <h2 class="text-title">Đăng Nhập</h2>
                        <p class="text-content">Chào mừng bạn đến với hệ thống quản lý của FOODGENIE</p>
                        <form action="xulydangnhap.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="ten_dangnhap" class="form-control" placeholder="Tên đăng nhập"
                                    autocomplete="off">
                                <i class="fa-regular fa-user" id="icon-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" name="mat_khau" id="password" class="form-control"
                                    placeholder="Mật khẩu" autocomplete="off">
                                <i class="fa-solid fa-lock" id="icon-user"></i>
                            </div>
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>