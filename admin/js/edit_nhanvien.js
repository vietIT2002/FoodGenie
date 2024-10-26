const EditNV = document.getElementById('edit_nhanvien');
const phoneInput = document.getElementById('phone');
const passwordInput = document.getElementById('new-password-Admin');
const emailnv = document.getElementById('nhanvien-email');
const tendnh = document.getElementById('tendn-nhanvien');
const tenNV = document.getElementById('nhanvien-tennv');

const phoneError = document.getElementById('phone-error');
const passwordError = document.getElementById('password-error');
const EmailError = document.getElementById('email-error');
const TendnError = document.getElementById('tendn-error');
const tenNVError = document.getElementById('tennv-error');

// Kiểm tra khi người dùng nhấn submit
EditNV.addEventListener('submit', (e) => {
    let valid = true;

    // Kiểm tra Tên Nhân viên
    if (!tenNV.value.trim()) {
        tenNVError.innerHTML = "Vui lòng nhập họ và tên";
        valid = false;
    } else {
        tenNVError.innerHTML = "";
    }

    // Kiểm tra Số điện thoại
    const phoneValue = phoneInput.value.trim();
    if (!phoneValue) {
        phoneError.innerHTML = "Vui lòng nhập số điện thoại.";
        valid = false;
    } else if (!/^0\d{9}$/.test(phoneValue)) {
        phoneError.innerHTML = "Số điện thoại phải bắt đầu bằng 0 và gồm 10 số.";
        valid = false;
    } else {
        phoneError.innerHTML = "";
    }

    // Kiểm tra Mật khẩu
    const passwordValue = passwordInput.value.trim();
    if (!passwordValue) {
        passwordError.innerHTML = "Vui lòng nhập mật khẩu";
        valid = false;
    } else {
        passwordError.innerHTML = "";
        
        const passwordConditions = [
            { test: /.{8,}/, message: "Ít nhất 8 ký tự." },
            { test: /^[^\s]+$/, message: "Không chứa khoảng trắng." },
            { test: /[a-z]/, message: "Ít nhất một chữ cái viết thường." },
            { test: /[A-Z]/, message: "Ít nhất một chữ cái viết hoa." },
            { test: /\d/, message: "Ít nhất một chữ số." },
            { test: /[!@#$%^&+=]/, message: "Ít nhất một ký tự đặc biệt." },
        ];

        passwordConditions.forEach(({ test, message }) => {
            if (!test.test(passwordValue)) {
                passwordError.innerHTML += `${message} <br>`;
                valid = false;
            }
        });
    }

    // Kiểm tra Tên đăng nhập
    if (!tendnh.value.trim()) {
        TendnError.innerHTML = "Vui lòng nhập tên đăng nhập";
        valid = false;
    } else if (tendnh.value.length < 5) {
        TendnError.innerHTML = "Phải có ít nhất 5 ký tự";
        valid = false;
    } else if (/\s/.test(tendnh.value)) {
        TendnError.innerHTML = "Không được chứa khoảng trắng";
        valid = false;
    } else {
        TendnError.innerHTML = "";
    }

    // Kiểm tra Email
    if (!emailnv.value.trim()) {
        EmailError.innerHTML = "Vui lòng nhập email";
        valid = false;
    } else if (!/^.+@gmail\.com$/.test(emailnv.value)) {
        EmailError.innerHTML = "Email phải có định dạng xxxx@gmail.com";
        valid = false;
    } else {
        EmailError.innerHTML = "";
    }

    // Ngăn chặn gửi form nếu không hợp lệ
    if (!valid) {
        e.preventDefault();
    }
});

// Xóa thông báo lỗi khi người dùng nhập thông tin
[phoneInput, passwordInput, emailnv, tendnh, tenNV].forEach((field, index) => {
    field.addEventListener('input', () => {
        [phoneError, passwordError, EmailError, TendnError, tenNVError][index].innerHTML = '';
    });
});
