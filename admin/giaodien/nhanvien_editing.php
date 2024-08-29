<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Thêm Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <?php
    if (!empty($_GET['id'])) {
        $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `id` = " . $_GET['id']);
        $nhanvien = $result->fetch_assoc();
        $tk = mysqli_query($con, "SELECT `username` FROM `taikhoang` WHERE `taikhoang`.`trang_thai`=0 AND NOT EXISTS (SELECT `ten_dangnhap`FROM `nhanvien` WHERE `taikhoang`.`username`= `nhanvien`.`ten_dangnhap`)");

    }
    ?>
    <div id="edit-modal" tabindex="-1"
        class="fixed top-0 right-0 z-50 hidden h-full md:w-1/3 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <!-- Modal content here -->
        <div class="relative  h-full max-h-full ">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 h-full">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <div class="divider mt-1"></div>
                    <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
                        Thông tin nhân viên
                    </p>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-700 rounded-lg text-lg w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="edit-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form name="nhanvien-formadd" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>"
                    enctype="multipart/form-data" class="p-4 md:p-5 ">
                    <div class="flex flex-wrap gap-4">
                        <div class="w-full md:w-1/4 flex flex-col items-center">
                            <img style="width: 200px; height: 200px;" id="imageDisplay" src="#" alt="Ảnh đại diện"
                                class="mb-4">
                            <input class="form-control file-input border-gray-300 rounded-md shadow-sm" type="file"
                                name="image" id="fileInput" accept="image/*">
                        </div>
                        <div class="w-full md:w-1/2 ">
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">ID Nhân viên:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                    name="id" value="<?= $_GET['id'] ?>">
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Tên Nhân viên:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                    name="name" value="">
                            </div>
                            <div class="mb-4 flex items-center ">
                                <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Email:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="email"
                                    name="email" value="" placeholder="VD: abc@gmail.com">
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Số điện thoại:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="tel"
                                    name="phone" value="" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789">
                            </div>
                            <div class="mb-4 flex items-center ">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Mật khẩu:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                    name="mat_khau" required
                                    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])\S{8,}$"
                                    title="Mật khẩu phải có ít nhất 8 ký tự, không chứa khoảng trắng, ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa và ít nhất một ký tự đặc biệt.">
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Tên đăng nhập:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                    name="tendangnhap" value="">
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

                <!-- <form name="nhanvien-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>"
                    enctype="multipart/form-data">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full md:w-1/2 px-4">
                            <div class="mb-4">
                                <?php if (!empty($nhanvien['hinh_anh'])) { ?>
                                <img class="w-72 h-72 object-cover mb-4" id="imageDisplay"
                                    src="../img/<?= $nhanvien['hinh_anh'] ?>" alt="Ảnh đại diện" />
                                <?php } ?>
                                <input class="form-control file-input border-gray-300 rounded-md shadow-sm" type="file"
                                    name="image" id="fileInput" accept="image/*" value="<?= $nhanvien['hinh_anh'] ?>" />
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-4">
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 text-xl text-gray-700 dark:text-white">ID Nhân viên:</label>
                                <input class="w-2/3 text-xl border border-gray-300 rounded-md p-2 focus:outline-none"
                                    type="text" name="id" value="<?= $_GET['id'] ?>" />
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 text-xl text-gray-700 dark:text-white">Tên Nhân viên:</label>
                                <input class="w-2/3 text-xl border border-gray-300 rounded-md p-2 focus:outline-none"
                                    type="text" name="name"
                                    value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" />
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 text-xl text-gray-700 dark:text-white">Email:</label>
                                <input class="w-2/3 text-xl border border-gray-300 rounded-md p-2 focus:outline-none"
                                    type="email" name="email"
                                    value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>"
                                    placeholder="VD: abc@gmail.com" />
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 text-xl text-gray-700 dark:text-white">Số điện thoại:</label>
                                <input class="w-2/3 text-xl border border-gray-300 rounded-md p-2 focus:outline-none"
                                    type="tel" name="phone" value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>"
                                    pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" />
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 text-xl text-gray-700 dark:text-white">Mật khẩu:</label>
                                <input class="w-2/3 text-xl border border-gray-300 rounded-md p-2 focus:outline-none"
                                    type="text" name="mat_khau" required
                                    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])\S{8,}$"
                                    title="Mật khẩu phải có ít nhất 8 ký tự, không chứa khoảng trắng, ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa và ít nhất một ký tự đặc biệt."
                                    value="<?= (!empty($nhanvien) ? $nhanvien['mat_khau'] : "") ?>" />
                            </div>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 text-xl text-gray-700 dark:text-white">Tên đăng nhập:</label>
                                <input class="w-2/3 text-xl border border-gray-300 rounded-md p-2 focus:outline-none"
                                    type="text" name="tendangnhap"
                                    value="<?= (!empty($nhanvien) ? $nhanvien['ten_dangnhap'] : "") ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button class="bg-red-500 text-white text-xl px-6 py-3 rounded-md shadow-sm mr-2"
                            name="btnnvsua" type="submit" title="Lưu nhân viên" value="Cập nhật">Cập nhật</button>
                        <button class="bg-blue-500 text-white text-xl px-6 py-3 rounded-md shadow-sm" type="reset"
                            value="Hủy">Hủy</button>
                    </div>
                </form> -->


            </div>
        </div>
    </div>
    <script>
        const fileInput = document.getElementById('fileInput');
        const imageDisplay = document.getElementById('imageDisplay');

        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                imageDisplay.src = e.target.result;
            }

            reader.readAsDataURL(file);
        });
    </script>
</body>

</html>