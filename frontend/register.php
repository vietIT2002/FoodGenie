<script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin "anonymous"></script>
<link rel="stylesheet" href="./css/login.css">
<div class="row row1">
    <a href="index.php" class="login-link"><i class="fa-solid fa-house-user"></i></a>
    <form id="update-form" method="post" action="index.php?act=register">
        <h3 class="title1">Đăng ký</h3>
        <p class="content-title1">Trở thành thành viên của <span style="color: #c9184a; font-weight: 600;">FOODGENIE</span><br>để nhận nhiều chương trình ưu đãi hấp dẫn </p>

        <div class="form-group">
            <label for="username">Họ và Tên<span class="required1">*</span></label>
            <input id="kh_ten" class="input1" type="text" name="ten_kh" value="" />
            <span id="name-error" style="color: red; display: none;">Không được bỏ trống họ và tên</span>
        </div>

        <div class="form-group">
            <label for="email">Email<span class="required1">*</span></label>
            <input id="email" class="input1" type="text" name="email" value="" autocomplete="off"/>
            <span id="email-error" style="color: red; display: none;">Không được bỏ trống email</span>
        </div>

        <div class="form-group">
            <label for="tel">Số điện thoại<span class="required1">*</span></label>
            <input class="input1" type="text" name="phone" value="" id="phone"/>
            <span id="phone-error" style="color: red; display: none;"></span>
        </div>

        <div class="form-group">
            <label for="user">Tên đăng nhập<span class="required1">*</span></label>
            <input class="input1" type="text" name="ten_dangnhap" value="" placeholder="Ít nhất 4 ký tự"/>
            <span id="username-error" style="color: red; display: none;">Tên đăng nhập không được bỏ trống!</span> 
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu<span class="required1">*</span></label>
            <input class="input1" id="myInput1" type="password" name="mat_khau" value=""/>
            <input type="checkbox" onclick="myFunction()"> <label for="pass">Hiển thị mật khẩu</label>
            <div class="password_required">
                <ul>
                    <li class="lowercase"><span></span>&nbsp;Ít nhất 1 chữ cái thường</li>
                    <li class="capital"><span></span>&nbsp;Ít nhất 1 chữ cái hoa</li>
                    <li class="numberd"><span></span>&nbsp;Ít nhất 1 số</li>
                    <li class="special"><span></span>&nbsp;Ít nhất 1 ký tự đặc biệt</li>
                    <li class="eight_charater"><span></span>&nbsp;Ít nhất 8 ký tự</li>
                </ul>
            </div><br>
            <span id="password-error" style="color: red; display: none;">Mật khẩu không được bỏ trống!</span>
        </div>

        <div style=" justify-content: center;">
            <input class="btn btn-danger btn-long" onclick="return validateForm()" type="submit" name="dangky" value="Đăng Ký"/>
            <?php require 'xulydangky.php';?>
        </div>
    </form>
</div>

<script src="./js/amination.js"></script>
<script>
    const form = document.getElementById('update-form');
const nameInput = document.getElementById('kh_ten');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');
const usernameInput = document.getElementsByName("ten_dangnhap")[0];
const passwordInput = document.getElementById("myInput1");

const nameError = document.getElementById('name-error');
const emailError = document.getElementById('email-error');
const phoneError = document.getElementById('phone-error');
const usernameError = document.getElementById('username-error');
const passwordError = document.getElementById('password-error');

form.addEventListener('submit', (e) => {
    let valid = true;

    // Ẩn tất cả các thông báo lỗi
    nameError.style.display = 'none';
    emailError.style.display = 'none';
    phoneError.style.display = 'none';
    usernameError.style.display = 'none';
    passwordError.style.display = 'none';

    // Kiểm tra họ và tên
    if (!nameInput.value.trim()) {
        valid = false;
        nameError.style.display = 'inline';
        nameError.innerHTML = "Không được bỏ trống họ và tên.";
    }

    // Lấy giá trị email và kiểm tra nếu email trống
    const emailValue = emailInput.value.trim();
    if (!emailValue) {
        valid = false;
        emailError.style.display = 'inline';
        emailError.innerHTML = "Không được bỏ trống email.";
    }
    // Kiểm tra nếu email không đúng định dạng
    else if (!/^[a-zA-Z0-9._-]+@gmail\.com$/.test(emailValue)) {
        valid = false;
        emailError.style.display = 'inline';
        emailError.innerHTML = "Email theo định dạng xxx@gmail.com";
    }


    // Kiểm tra số điện thoại
    const phoneValue = phoneInput.value.trim();
    if (!phoneValue) {
        valid = false;
        phoneError.style.display = 'inline';
        phoneError.innerHTML = "Số điện thoại không được bỏ trống.";
    } if (!/^[0]/.test(phoneValue)) {
    valid = false;
    phoneError.style.display = 'inline';
    phoneError.innerHTML = "Số điện thoại phải bắt đầu bằng số 0.";
    } 
    // Kiểm tra nếu số điện thoại có đúng 10 chữ số
    else if (!/^[0-9]{10}$/.test(phoneValue)) {
        valid = false;
        phoneError.style.display = 'inline';
        phoneError.innerHTML = "Số điện thoại chỉ chứa số và 10 số.";
    }

    // Kiểm tra tên đăng nhập
    const usernameValue = usernameInput.value.trim();
    if (!usernameValue) {
        valid = false;
        usernameError.style.display = 'inline';
        usernameError.innerHTML = "Tên đăng nhập không được bỏ trống ";
    }

    // Kiểm tra mật khẩu
    const passwordValue = passwordInput.value.trim();
    if (!passwordValue) {
        valid = false;
        passwordError.style.display = 'inline';
        passwordError.innerHTML = "Mật khẩu không được bỏ trống.";
    }

    // Nếu có lỗi, ngừng gửi form
    if (!valid) {
        e.preventDefault(); 
    }
});

// Ẩn thông báo lỗi khi người dùng bắt đầu nhập
nameInput.addEventListener('input', () => {
    nameError.style.display = 'none';
});

emailInput.addEventListener('input', () => {
    emailError.style.display = 'none';
});

phoneInput.addEventListener('input', () => {
    phoneError.style.display = 'none';
});

usernameInput.addEventListener('input', () => {
    usernameError.style.display = 'none';
});

passwordInput.addEventListener('input', () => {
    passwordError.style.display = 'none';
});

</script>
