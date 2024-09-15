<script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin "anonymous"></script>
<link rel="stylesheet" href="./css/login.css">
<div class="row row1">
    <a href="index.php" class="login-link"><i class="fa-solid fa-house-user"></i></a>
    <form method="post" action="index.php?act=register">
		<h3 class="title1">Đăng ký</h3>
        <p class="content-title1">Trở thành thành viên của <span style="color: #c9184a; font-weight: 600;">FOODGENIE</span><br>để nhận nhiều chương trình ưu đãi hấp dẫn </p>

        <div class="form-group">
            <label for="username">Họ và Tên<span class="required1">*</span></label>
            <input class="input1" type="text" name="ten_kh" value="" required/>
        </div>

        <div class="form-group">
            <label for="email">Email<span class="required1">*</span></label>
            <input class="input1" type="email" name="email" value="" required autocomplete="off"/>
        </div>

        <div class="form-group">
            <label for="tel">Số điện thoại<span class="required1">*</span></label>
            <input class="input1" type="text" name="phone" value="" pattern="[0][0-9]{9}" id="phone..." required/>
        </div>

        <div class="form-group">
            <label for="user">Tên đăng nhập<span class="required1">*</span></label>
            <input class="input1" type="text" name="ten_dangnhap" value="" placeholder="Ít nhất 4 ký tự" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu<span class="required1">*</span></label>
            <input class="input1" id="myInput1" type="password" name="mat_khau" value="" required/>
            <input type="checkbox" onclick="myFunction()"> <label for="pass">Hiển thị mật khẩu</label>
            <div class="password_required">
                <ul>
                    <li class="lowercase"><span></span>&nbsp;Ít nhất 1 chữ cái thường</li>
                    <li class="capital"><span></span>&nbsp;Ít nhất 1 chữ cái hoa</li>
                    <li class="numberd"><span></span>&nbsp;Ít nhất 1 số</li>
                    <li class="special"><span></span>&nbsp;Ít nhất 1 ký tự đặc biệt</li>
                    <li class="eight_charater"><span></span>&nbsp;Ít nhất 8 ký tự</li>
                </ul>
            </div>
        </div>

        <div style=" justify-content: center;">
            <input class="btn btn-danger btn-long" type="submit" name="dangky" value="Đăng Ký"/>
            <?php require 'xulydangky.php';?>
        </div>
	</form>
</div>
<script src="./js/amination.js"></script>
