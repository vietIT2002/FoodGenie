<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin "anonymous"></script>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="row row1">
        <a href="index.php" class="login-link"><i class="fa-solid fa-house-user"></i></a>
        <form action='index.php?act=login'  class="login-form" method='POST'> 
            <h3 class="title1">Đăng nhập</h3>
            <div class="form-group">
                <label for="user">Tên Đăng nhập<span class="required1">*</span></label>
                <input class="input1" type='text' name='username'/>
            </div>
            <div class="form-group">
            <div class="password-input-container">
                <label for="pass">Mật khẩu<span class="required1">*</span></label>
                <input class="input1" id="myInput1" type='password' name='password'/>
                <input type="checkbox" onclick="myFunction()"> <label for="pass">Hiển thị mật khẩu</label>
            </div><br>
            <div style=" justify-content: center;">
                <input class="login-button btn btn-long" type='submit' name="dangnhap" value='Đăng nhập' />
            </div><br>
            <div class="login-text">
                <span style="font-size: 14px; font-style: italic;">Sai mật khẩu 5 lần tài khoản bị khóa!</span><br>
                <span>Bạn chưa có tài khoản?</span> <a href='index.php?act=register' class="register1" value='Đăng nhập'>Đăng ký</a>
            </div>
            <?php require 'xulydangnhap.php';?>
        </form>
    </div>
    <script src="./js/amination.js"></script>
</body>
</html>
