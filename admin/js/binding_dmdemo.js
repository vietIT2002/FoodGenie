const form = document.getElementById("danhmuc_add");
const categoryError = document.getElementById('danhmuc_error');
const checkboxError = document.getElementById('checkbox_error');
const quyent = document.getElementById("tendanhmuc");
const checkboxes = document.querySelectorAll('.category-checkbox');

form.addEventListener('submit', (e) => {
    let valid = true;

    // Kiểm tra tên thể loại
    if (!quyent.value.trim()) {
        categoryError.textContent = "Vui lòng nhập tên quyền";
        valid = false;
    } else {
        categoryError.textContent = '';
    }

    // Kiểm tra checkbox
    if (![...checkboxes].some(checkbox => checkbox.checked)) {
        checkboxError.textContent = "Vui lòng tích chọn danh mục";
        valid = false;
    } else {
        checkboxError.textContent = '';
    }

    // Ngăn chặn gửi biểu mẫu nếu không hợp lệ
    if (!valid) e.preventDefault();
});

// Xóa thông báo lỗi khi người dùng nhập lại thông tin
quyent.addEventListener('input', () => {
    if (quyent.value.trim()) categoryError.textContent = '';
});

// Thêm sự kiện 'change' cho các checkbox để ẩn thông báo lỗi
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        if ([...checkboxes].some(checkbox => checkbox.checked)) {
            checkboxError.textContent = ''; // Ẩn thông báo lỗi khi checkbox được chọn
        }
    });
});