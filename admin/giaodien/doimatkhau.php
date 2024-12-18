<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm </title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" type="text/css" href="css/style_listProduct.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
    .btnLuu {
        margin-top: 20px;
        width: 100%;
        padding: 10px 20px;
    }

    .wrap-field {
        margin-top: 10px;
        width: 100%;

    }
    </style>
</head>

<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "foodgennie");
    $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `ten_dangnhap` = '" . $_SESSION['user'] . "'");

    ?>



    </form>
    <div>
        <center>
            <br> <br>
            <h2>Đổi mật khẩu</h2> <br>
        </center>
    </div>
    <div class="box-contentt">

        <form id="form" name="doimk-formsua" method="POST" action="./xulythem.php?user=<?= $_SESSION['user'] ?>"
            enctype="multipart/form-data">

            <div class="clear-both"> <br>
            </div>


            <div class="wrap-field form-group">
                <label>Mật khẩu mới:</label><br>
                <input id="new-password-Admin" class="form-control" type="text" name="matkhaumoi" value="" />
                <div class="error-message" id="password-error" style="color: red; font-size: 0.80em; margin-left: 4px;">
                </div>
                <!-- <input type="text" name="matkhaumoi" value=""/> -->
            </div>
            <!-- <div class="wrap-field form-group">
                <label>mk cu</label>
                <input class="form-control" type="email" name="email" value="" placeholder="VD: yen823@gmail.com"/>
                <div class="clear-both"></div>
            </div> -->

            <center>

                <button class="btn btn-danger btnLuu" name="btntkmk" type="submit" title="Lưu mật khẩu" value="Lưu">LƯU
                </button>
                <button class="btn btn-primary btnLuu" type="reset" value="Hủy">HỦY</button>
            </center>
    </div>


    </form>
    <div class="clear-both"></div>
    <script>
    const passwordInput = document.getElementById('new-password-Admin');
    const passwordError = document.getElementById('password-error');
    const form = document.getElementById('form');

    form.addEventListener('submit', (e) => {
        let valid = true;
        passwordError.innerHTML = '';

        const passwordValue = passwordInput.value.trim();
        if (passwordValue === '') {
            valid = false;
            passwordError.innerHTML = "Vui lòng nhập mật khẩu";
        } else {
            passwordError.innerHTML = ''; // Clear any previous error message

            // Define error flags
            let hasMinLength = passwordValue.length >= 8;
            let hasUpperCase = /[A-Z]/.test(passwordValue);
            let hasSpecialChar = /[!@#$%^&+=]/.test(passwordValue);

            if (!hasMinLength || !hasUpperCase || !hasSpecialChar) {
                valid = false;
                passwordError.innerHTML =
                    "Mật khẩu phải có ít nhất 8 ký tự, một chữ cái viết hoa và một ký tự đặc biệt.";
            }
        }
        if (!valid) {
            e.preventDefault();
        }
    });

    passwordInput.addEventListener('input', () => {
        passwordError.innerHTML = '';
    });
    </script>

</body>

</html>