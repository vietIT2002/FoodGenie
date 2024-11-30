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
    class="fixed top-0 right-0 z-50 hidden h-full md:w-1/4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
    <div class="relative h-full max-h-full w-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-x-hidden overflow-y-auto h-full">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div class="divider mt-1"></div>
                <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
                    Thông tin nhân viên
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

            <form id="form-nhanvien" name="nhanvien-formadd" method="POST" action="./xulythem.php"
                enctype="multipart/form-data" class="p-4 md:p-5 ">
                <div class="flex flex-wrap gap-4">
                    <span style="color: red; font-size: 0.75em; margin-left: 160px;" id="imagenv_error"></span>
                    <div class="w-full md:w-1/4 flex flex-col items-center">
                        <img style="width: 150px; height: 150px;" id="imageDisplay" src="#" alt="Ảnh đại diện"
                            class="mb-4">
                        <input class="form-control file-input border-gray-300 rounded-md shadow-sm" type="file"
                            id="nhanvien_images" name="image" id="fileInput" accept="image/*">
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
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                id="nhanvien-tennv" name="name" value="">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="email-error"></span>
                        <div class="mb-4 flex items-center ">
                            <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Email:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="email"
                                id="nhanvien-email" name="email" value="" placeholder="">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="phone-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Số điện thoại:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="number"
                                id="phone" name="phone" value="" placeholder="">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="password-error"></span>
                        <div class="mb-4 flex items-center ">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Mật khẩu:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                id="new-password-Admin" name="mat_khau">
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="tendn-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Tên đăng nhập:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                id="tendn-nhanvien" name="tendangnhap" value="">
                        </div>

                        <!-- Dropdown Chức vụ -->
                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="chucvu-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Chức vụ:</label>
                            <select id="chucvu-select" class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none"
                                name="id_loainv">
                                <option value="">Chọn chức vụ</option>
                                <?php while ($row = mysqli_fetch_array($chucvu_result)) { ?>
                                <option value="<?= $row['id'] ?>"><?= $row['TenLoaiNV'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <span style="color: red; font-size: 0.75em; margin-left: 170px;" id="quyen-error"></span>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Quyền:</label>
                            <select id="quyen-select" class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none"
                                name="id_quyen">
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
            <script src="./js/binding_nhanvien.js"></script>
        </div>
    </div>
</div>
<script>
const fileInput = document.getElementById('nhanvien_images');
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