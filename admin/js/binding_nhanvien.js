const formnv = document.getElementById('form-nhanvien');
const EditNV = document.getElementById('edit_nhanvien');
const nvinmage = document.getElementById('nhanvien_images');
const manv = document.getElementById('nhanvien-manv');
const phoneInput = document.getElementById('phone');
const passwordInput = document.getElementById('new-password-Admin');
const ChuvuInput = document.getElementById('chucvu-select'); 
const QuyenInput = document.getElementById('quyen-select');
const emailnv = document.getElementById('nhanvien-email');
const tendnh = document.getElementById('tendn-nhanvien');
const tenNV = document.getElementById('nhanvien-tennv');

const hinhah_error = document.getElementById('imagenv_error');
const mavn_error = document.getElementById('manv_error');
const phoneError = document.getElementById('phone-error');
const passwordError = document.getElementById('password-error');
const ChuvuError = document.getElementById('chucvu-error');
const QuyenError = document.getElementById('quyen-error');
const EmailError = document.getElementById('email-error');
const TendnError = document.getElementById('tendn-error');
const tenNVError = document.getElementById('tennv-error');


// Kiểm tra khi người dùng nhấn submit
formnv.addEventListener('submit', (e) => {
    let valid = true; // Biến để theo dõi trạng thái hợp lệ

    // Ảnh đại diện
    if (!nvinmage.value) { 
        hinhah_error.innerHTML = "Vui lòng chọn ảnh đại diện"; 
        valid = false;
    }

    // Mã nhân viên
    if (!manv.value) { 
        mavn_error.innerHTML = "Vui lòng nhập mã nhân viên"; 
        valid = false;
    } else if (manv.value <= 0) { 
        mavn_error.innerHTML = "Mã nhân viên phải lớn hơn 0";
        valid = false;
    }

    // Tên nhân viên
    if (!tenNV.value) { 
        tenNVError.innerHTML = "Vui lòng nhập họ và tên"; 
        valid = false;
    }


    // Kiểm tra Số điện thoại
    const phoneValue = phoneInput.value.trim();
    if (!phoneValue) {
        valid = false;
        phoneError.innerHTML = "Vui lòng nhập số điện thoại.";
    } else if (!/^0\d{9}$/.test(phoneValue)) {
        valid = false;
        phoneError.innerHTML = "Số điện thoại phải bắt đầu bằng 0 và gồm 10 số.";
    } else {
        phoneError.innerHTML = ""; // Xóa lỗi nếu số điện thoại hợp lệ
    }

    // Kiểm tra mật khẩu
    const passwordValue = passwordInput.value.trim(); // Cần lấy giá trị mật khẩu mỗi lần khi submit
    if (passwordValue === '') {
        valid = false; 
        passwordError.innerHTML = "Vui lòng nhập mật khẩu"; 
    } else {
        passwordError.innerHTML = ''; // Xóa thông báo lỗi trước đó nếu có

        // Kiểm tra các điều kiện mật khẩu
        if (passwordValue.length < 8) {
            valid = false;
            passwordError.innerHTML += "Ít nhất 8 ký tự. ";
        }
        if (/\s/.test(passwordValue)) {
            valid = false;
            passwordError.innerHTML += "Không chứa khoảng trắng. ";
        }
        if (!/[a-z]/.test(passwordValue)) {
            valid = false;
            passwordError.innerHTML += "Ít nhất một chữ cái viết thường. ";
        }
        if (!/[A-Z]/.test(passwordValue)) {
            valid = false;
            passwordError.innerHTML += "Ít nhất một chữ cái viết hoa. ";
        }
        if (!/\d/.test(passwordValue)) {
            valid = false;
            passwordError.innerHTML += "Ít nhất một chữ số. ";
        }
        if (!/[!@#$%^&+=]/.test(passwordValue)) {
            valid = false;
            passwordError.innerHTML += "Ít nhất một ký tự đặc biệt. ";
        }
    }

    // Kiểm tra tên đăng nhập
    if (!tendnh.value) { 
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

    // Chức vụ
    if (!ChuvuInput.value) { 
        ChuvuError.innerHTML = "Vui lòng chọn chức vụ"; 
        valid = false;
    } else {
        ChuvuError.innerHTML = ""; 
    }

    // Quyền
    if (!QuyenInput.value) { 
        QuyenError.innerHTML = "Vui lòng chọn Quyền cho nhân viên"; 
        valid = false;
    } else {
        QuyenError.innerHTML = ""; 
    }

    // Ngăn chặn gửi form nếu không hợp lệ
    if (!valid) {
        e.preventDefault();
    }

    // Kiểm tra email
    if (!emailnv.value) { 
        EmailError.innerHTML = "Vui lòng nhập mail"; 
        valid = false;
    } else if (!/^.+@gmail\.com$/.test(emailnv.value)) { // Kiểm tra định dạng email
        EmailError.innerHTML = "Email phải có định dạng xxxx@gmail.com";
        valid = false;
    } else {
        EmailError.innerHTML = ""; // Xóa lỗi nếu email hợp lệ
    }
});

// Xóa thông báo lỗi khi người dùng nhập thông tin
[nvinmage, manv, phoneInput, passwordInput, ChuvuInput, QuyenInput, emailnv, tendnh, tenNV].forEach((field, index) => {
    field.addEventListener('input', () => {
        [hinhah_error, mavn_error, phoneError, passwordError, ChuvuError, QuyenError, EmailError, TendnError, tenNVError][index].innerHTML = ''; 
    });
});
