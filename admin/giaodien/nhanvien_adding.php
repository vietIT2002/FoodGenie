<?php
$con = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}
$chucvu_query = "SELECT * FROM `loainhanvien`";
$chucvu_result = mysqli_query($con, $chucvu_query);
$quyen_query = "SELECT * FROM `quyen`";
$quyen_result = mysqli_query($con, $quyen_query);
?>

<div id="extralarge-modal" tabindex="-1"
    class="fixed top-0 right-0 z-50 hidden h-auto md:w-1/3  overflow-x-hidden overflow-y-auto justify-content: end h-[calc(100%-1rem)] max-h-full ">
    <div class="relative  h-auto max-h-full ">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 h-full">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div class="divider mt-1"></div>
                <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
                    Thông tin nhân vien
                </p>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-700 rounded-lg text-lg w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="extralarge-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form id="form-nhanvien" name="nhanvien-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data"
                class="p-4 md:p-5 ">
                <div class="flex flex-wrap gap-4">
                    <span style="color: red; font-size: 0.75em; margin-left: 160px;" id="imagenv_error"></span>
                    <div class="w-full md:w-1/4 flex flex-col items-center">
                        <img style="width: 200px; height: 200px;" id="imageDisplay" src="#" alt="Ảnh đại diện"
                            class="mb-4">
                        <input class="form-control file-input border-gray-300 rounded-md shadow-sm" type="file"
                            id="nhanvien-image" name="image" id="fileInput" accept="image/*">                   
                    </div>

                    <div class="w-full md:w-1/2 md:w-2/3 ">
                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="manv_error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Mã Nhân viên:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="number"
                                id="nhanvien-manv" name="id" value="">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="tennv-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Tên Nhân viên:</label>
                            <input id="nhanvien-tennv" class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                name="name" value="">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="email-error"></span>
                        <div class="mb-4 flex items-center ">
                            <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Email:</label>
                            <input  class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                            id="nhanvien-email" name="email" value="" placeholder="">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="phone-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Số điện thoại:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="tel"
                                id="phone" name="phone" value="" placeholder="">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="password-error"></span>
                        <div class="mb-4 flex items-center ">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Mật khẩu:</label>
                            <input  id="new-password-Admin" class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="tendn-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Tên đăng nhập:</label>
                            <input id="tendn-nhanvien" class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                name="tendangnhap" value="">
                        </div>

                        <!-- Dropdown Chức vụ -->
                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="chucvu-error"></span>
                        <div class="mb-4 flex items-center">
                            <label  class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Chức vụ:</label>
                            <select id="chucvu-select" class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" name="id_loainv"
                               >
                                <option value="">Chọn chức vụ</option>
                                <?php while ($row = mysqli_fetch_array($chucvu_result)) { ?>
                                <option value="<?= $row['id'] ?>"><?= $row['TenLoaiNV'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="quyen-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Quyền:</label>
                            <select id="quyen-select" class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" name="id_quyen"
                               >
                                <option value="">Chọn quyền</option>
                                <?php while ($row = mysqli_fetch_array($quyen_result)) { ?>
                                <option value="<?= $row['id'] ?>"><?= $row['ten_quyen'] ?></option>
                                <?php } ?>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button
                        class="btn btn-danger w-44 pl-2 h-16 text-2xl bg-red-500 text-white px-4 py-2 rounded-md shadow-sm mr-2"
                        name="btnnvadd" type="submit" title="Lưu nhân viên" value="Thêm">Thêm</button>
                    <button
                        class="btn btn-primary w-44 pl-2 h-16 text-2xl bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm"
                        type="reset" value="Hủy">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const formnv = document.getElementById('form-nhanvien');
    const nvinmage = document.getElementById('nhanvien-image');
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
</script>

<script>
const fileInput = document.getElementById('fileInput');
const imageDisplay = document.getElementById('imageDisplay');

fileInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        imageDisplay.src = e.target.result;
    }

    reader.readAsDataURL(file);
});
</script>