const name_pro = document.getElementById('product-name');
const price = document.getElementById('product-price');
const originalPrice = document.getElementById('product-original-price');
const image = document.getElementById('product-image');
const photo = document.getElementById('photo_library');
const content = document.getElementById('product-content');
const quantity = document.getElementById('product-quantity');
const weight = document.getElementById('product-weight');
const origin = document.getElementById('product-origin');
const form = document.getElementById('form');

const name_error = document.getElementById('name_error');
const price_error = document.getElementById('price_error');
const original_price_error = document.getElementById('original_price_error');
const image_error = document.getElementById('image_error');
const photo_error = document.getElementById('photo_error');
const content_error = document.getElementById('content_error');
const quantity_error = document.getElementById('quantity_error');
const weight_error = document.getElementById('weight_error');
const origin_error = document.getElementById('origin_error');

// Kiểm tra khi người dùng nhấn submit
form.addEventListener('submit', (e) => {
    let valid = true; // Biến để theo dõi trạng thái hợp lệ

    // Kiểm tra tên sản phẩm
    if (!name_pro.value) {
        e.preventDefault();
        name_error.innerHTML = "Vui lòng nhập tên sản phẩm";
        valid = false;
    }

    // Kiểm tra đơn giá
    if (!price.value) {
        e.preventDefault();
        price_error.innerHTML = "Vui lòng nhập đơn giá";
        valid = false;
    } else if (price.value <= 0) { 
        e.preventDefault();
        price_error.innerHTML = "Đơn giá phải lớn hơn 0";
        valid = false;
    }

    // Kiểm tra giá gốc
    if (!originalPrice.value) {
        e.preventDefault();
        original_price_error.innerHTML = "Vui lòng nhập giá gốc"; 
        valid = false;
    } else if (originalPrice.value <= 0) { 
        e.preventDefault();
        original_price_error.innerHTML = "Giá gốc phải lớn hơn 0";
        valid = false;
    } else if (parseFloat(price.value) >= parseFloat(originalPrice.value)) {
        e.preventDefault();
        original_price_error.innerHTML = "Giá gốc phải lớn hơn đơn giá";
        valid = false;
    }

    // Ảnh đại diện
    if (!image.value) {
        e.preventDefault();
        image_error.innerHTML = "Vui lòng chọn ảnh đại diện";
        valid = false;
    }

    // Ảnh sản phẩm
    if (!photo.value) {
        e.preventDefault();
        photo_error.innerHTML = "Vui lòng chọn ảnh sản phẩm";
        valid = false;
    }

    // Kiểm tra nội dung
    if (!content.value) {
        e.preventDefault();
        content_error.innerHTML = "Vui lòng nhập nội dung"; // Changed from image_error to content_error
        valid = false;
    }

    // Kiểm tra khối lượng
    if (!weight.value) {
        e.preventDefault();
        weight_error.innerHTML = "Vui lòng nhập khối lượng";
        valid = false;
    }

    // Kiểm tra số lượng
    if (!quantity.value) {
        e.preventDefault();
        quantity_error.innerHTML = "Vui lòng nhập số lượng";
        valid = false;
    } else if (quantity.value <= 0) { 
        e.preventDefault();
        quantity_error.innerHTML = "Số lượng sản phẩm phải lớn hơn 0";
        valid = false;
    }

    // Kiểm tra xuất xứ
    if (!origin.value) {
        e.preventDefault();
        origin_error.innerHTML = "Vui lòng nhập xuất xứ";
        valid = false;
    }

    // Nếu tất cả đều hợp lệ, có thể thực hiện hành động submit
    if (valid) {
        // Xử lý gửi form nếu cần
    }
});

// Xóa thông báo lỗi khi người dùng nhập thông tin
const fields = [name_pro, price, originalPrice, image, photo, content, weight, quantity, origin]; // Added missing commas
const errorFields = [name_error, price_error, original_price_error, image_error, photo_error, content_error, weight_error, quantity_error, origin_error]; // Added missing commas

fields.forEach((field, index) => {
    field.addEventListener('input', () => {
        if (field.value) {
            errorFields[index].innerHTML = ''; 
        }
    });
});
