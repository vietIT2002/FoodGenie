const category = document.getElementById ("category_product");
const form = document.getElementById ("form");
const category_error = document.getElementById('category_error');

form.addEventListener('submit', (e) => {
    let valid = true;

    // Kiểm tra tên sản phẩm
    if (!category.value) {
        e.preventDefault();
        category_error.innerHTML = "Vui lòng nhập tên thể loại";
        valid = false;
    }
    if (valid) {
    }
});

// Xóa thông báo lỗi khi người dùng nhập thông tin
const fields = [category]; 
const errorFields = [category_error]; 

fields.forEach((field, index) => {
    field.addEventListener('input', () => {
        if (field.value) {
            errorFields[index].innerHTML = ''; 
        }
    });
});