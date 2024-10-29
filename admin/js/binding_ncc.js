const form = document.getElementById("form");
const name_ncc = document.getElementById('name_ncc');
const email_ncc = document.getElementById('email_ncc');
const website_ncc = document.getElementById('website_ncc');
const phone_ncc = document.getElementById('phone_ncc');

const name_error = document.getElementById('name_error');
const email_error = document.getElementById('email_error');
const website_error = document.getElementById('website_error'); 
const phone_error = document.getElementById('phone_error'); 

form.addEventListener('submit', (e) => {
    let valid = true;

    // Kiểm tra tên nhà cung cấp
    if (!name_ncc.value.trim()) { 
        e.preventDefault();
        name_error.innerHTML = "Vui lòng nhập tên nhà cung cấp";
        valid = false;
    } else {
        name_error.innerHTML = ''; 
    }

    // Kiểm tra Email
    const emailValue = email_ncc.value.trim();
    if (!emailValue) { 
        e.preventDefault();
        email_error.innerHTML = "Vui lòng nhập email"; 
        valid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) { 
        e.preventDefault();
        email_error.innerHTML = "Email không hợp lệ"; 
        valid = false;
    } else {
        email_error.innerHTML = ""; 
    }

    // Kiểm tra URL website
    const websiteValue = website_ncc.value.trim();
    if (!websiteValue) {
        e.preventDefault(); // Ngăn chặn gửi biểu mẫu
        website_error.innerHTML = "Vui lòng nhập URL website";
        valid = false;
    } else if (!/^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})(\/\S*)?$/.test(websiteValue)) { 
        // Biểu thức chính quy kiểm tra URL
        e.preventDefault(); // Ngăn chặn gửi biểu mẫu
        website_error.innerHTML = "URL phải hợp lệ";
        valid = false;
    } else {
        website_error.innerHTML = ""; 
    }

   // Kiểm tra số điện thoại
    const phoneValue = phone_ncc.value.trim();
    if (!phoneValue) {
        valid = false;
        phone_error.innerHTML = "Vui lòng nhập số điện thoại.";
    } else if (phoneValue.includes('-')) { // Ngăn chặn số âm
        valid = false;
        phone_error.innerHTML = "Số điện thoại không được chứa dấu âm.";
    } else if (!/^\+?\d+$/.test(phoneValue)) { 
        valid = false;
        phone_error.innerHTML = "Số điện thoại chỉ có thể chứa số ";
    } else if (phoneValue.startsWith('+') && phoneValue.length < 2) { 
        valid = false;
        phone_error.innerHTML = " ";
    } else {
        phone_error.innerHTML = "";
    }

    // Gửi biểu mẫu nếu hợp lệ
    if (valid) {
        form.submit(); 
    }
});

// Xóa thông báo lỗi khi người dùng nhập lại thông tin
const fields = [name_ncc, email_ncc, website_ncc, phone_ncc]; // Thêm phone_ncc vào mảng
const errorFields = [name_error, email_error, website_error, phone_error]; // Thêm phone_error vào mảng

fields.forEach((field, index) => {
    field.addEventListener('input', () => {
        if (field.value.trim()) { 
            errorFields[index].innerHTML = '';
        }
    });
});