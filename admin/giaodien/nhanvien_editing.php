<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<?php
    if (!empty($_GET['id'])) {
        $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `id` = " . $_GET['id']);
        $nhanvien = $result->fetch_assoc();
        $chucvu_query = "SELECT * FROM `loainhanvien`";
        $chucvu_result = mysqli_query($con, $chucvu_query);
        $quyen_query = "SELECT * FROM `quyen`";
        $quyen_result = mysqli_query($con, $quyen_query);
    }
    ?>

<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
            Cập nhật nhân viên
        </p>
        <a href="./admin.php?tmuc=Nhân viên">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>

    <form name="nhanvien-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>"
        enctype="multipart/form-data">
        <div class="flex gap-6">
            <div class="w-1/3 flex flex-col items-center">
                <?php if (!empty($nhanvien['hinh_anh'])) { ?>
                <img class="w-96 h-96 object-cover rounded" id="imageDisplay" src="../img/<?= $nhanvien['hinh_anh'] ?>"
                    alt="Avatar" />
                <input class="w-96 h-96 object-cover rounded" type="hidden" name="image"
                    value="<?= $nhanvien['hinh_anh'] ?>" />
                <?php } ?>
                <input class="mt-4" id="fileInput" type="file" name="image" />
            </div>

            <div class="w-3/5 ">
                <div class="mb-4">
                    <label class="block text-gray-700 text-2xl ">ID Nhân viên:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="text" name="id" value="<?= $_GET['id'] ?>" disabled />
                </div>

                <div class="mb-4">
                    <label class="block  text-2xl text-gray-700">Tên Nhân viên:</label>
                    <input
                        class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="text" name="name" value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" />
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Email:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="email" name="email" value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>"
                        placeholder="VD: abc@gmail.com" />
                </div>

                <div class="mb-4">
                    <label class="block text-2xl text-gray-700">Số điện thoại:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="tel" name="phone" value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>"
                        pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" />
                </div>

                <div class="mb-4">
                    <label class="block text-2xl text-gray-700">Mật khẩu:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="text" name="mat_khau" required
                        pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])\S{8,}$"
                        title="Mật khẩu phải có ít nhất 8 ký tự, không chứa khoảng trắng, ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa và ít nhất một ký tự đặc biệt."
                        value="<?= (!empty($nhanvien) ? $nhanvien['mat_khau'] : "") ?>" />
                </div>

                <div class="mb-4">
                    <label class="block  text-2xl text-gray-700">Tên đăng nhập:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="text" name="tendangnhap"
                        value="<?= (!empty($nhanvien) ? $nhanvien['ten_dangnhap'] : "") ?>" />
                </div>

                <div class="mb-4">
                    <label class="block text-2xl text-gray-700">Chức vụ:</label>
                    <select
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        name="id_loainv" required>
                        <?php while ($row = mysqli_fetch_array($chucvu_result)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['TenLoaiNV'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block  text-2xl text-gray-700">Quyền:</label>
                    <select
                        class="w-full px-4 py-2 border  text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        name="id_quyen" required>
                        <?php while ($row = mysqli_fetch_array($quyen_result)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['ten_quyen'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <button class="px-6 py-2 bg-red-600 text-3xl text-white rounded-lg hover:bg-red-700" name="btnnvsua"
                type="submit">Cập nhật</button>
            <button class="ml-4 px-6 py-2 bg-gray-400  text-3xl text-white rounded-lg hover:bg-gray-500"
                type="reset">Hủy</button>
        </div>
    </form>
</div>

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