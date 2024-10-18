<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">



<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `nhanvien` WHERE `id` = " . $_GET['id']);
    $nhanvien = $result->fetch_assoc();

    $ngay_tao = new DateTime($nhanvien['ngay_tao']);
    $today = new DateTime();
    $interval = $ngay_tao->diff($today);
    $days_worked = $interval->days; 

    $chucvu_query = "SELECT * FROM `loainhanvien`";
    $chucvu_result = mysqli_query($con, $chucvu_query);
    $quyen_query = "SELECT * FROM `quyen`";
    $quyen_result = mysqli_query($con, $quyen_query);
    
    $quyen_id = $nhanvien['id_quyen'];
    $ten_quyen_query = "SELECT `ten_quyen` FROM `quyen` WHERE `id` = $quyen_id";
    $ten_quyen_result = mysqli_query($con, $ten_quyen_query);
    $ten_quyen = mysqli_fetch_assoc($ten_quyen_result)['ten_quyen'];
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

            <div class="col-sm-7">

                <div class="wrap-field form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-sm">ID Nhân viên: </label>
                    <div class="col-sm-8">
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-300"
                        type="text" name="id" value="<?= $_GET['id'] ?>" readonly />
                    </div>
                </div>
                <div class="wrap-field form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-sm">Tên Nhân viên: </label>
                    <div class="col-sm-8">
                        <input
                            class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="text" name="name" value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" />
                    </div>
                </div>

                <div class="wrap-field form-group row ">
                    <label class="col-sm-4 col-form-label col-form-label-sm">Email: </label>
                    <div class="col-sm-8">
                        <input
                            class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="email" name="email" value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>"
                            placeholder="VD: abc@gmail.com" />
                    </div>
                </div>
                <div class="wrap-field form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-sm">Số điện thoại </label>
                    <div class="col-sm-8">
                        <input
                            class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="tel" name="phone" value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>"
                            pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" />
                    </div>

                </div>
                <div class="wrap-field form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-sm">Mật khẩu</label>
                    <div class="col-sm-8">
                        <input
                            class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="text" name="mat_khau" required
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])\S{8,}$"
                            title="Mật khẩu phải có ít nhất 8 ký tự, không chứa khoảng trắng, ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa và ít nhất một ký tự đặc biệt."
                            value="<?= (!empty($nhanvien) ? $nhanvien['mat_khau'] : "") ?>">

                    </div>

                </div>



                <div class="wrap-field form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-sm">Tên đăng nhập </label>
                    <div class="col-sm-8">
                        <input
                            class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="text" name="tendangnhap"
                            value="<?= (!empty($nhanvien) ? $nhanvien['ten_dangnhap'] : "") ?>" />
                    </div>
                </div>

                <div class="wrap-field form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-sm">Chức vụ: </label>
                    <div class="col-sm-8">
                        <select
                            class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            name="id_loainv">

                            <?php while ($row = mysqli_fetch_array($chucvu_result)) { ?>
                            <option value=" <?= $row['id'] ?>"><?= $row['TenLoaiNV'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="wrap-field form-group row"> 
                    <label class="col-sm-4 col-form-label col-form-label-sm">Quyền: </label>
                    <div class="col-sm-8">
                        <?php if ($days_worked < 60): ?>
                            <input type="text" class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                value="<?= $ten_quyen ?>" readonly />
                            <small class="text-red-500">Phải làm việc ít nhất 60 ngày để thay đổi quyền.</small>
                        <?php else: ?>
                            <select class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" name="id_quyen">
                                <?php while ($row = mysqli_fetch_array($quyen_result)) { ?>
                                    <option value="<?= $row['id'] ?>" <?= ($row['id'] == $nhanvien['id_quyen']) ? 'selected' : '' ?>>
                                        <?= $row['ten_quyen'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="wrap-field form-group row"> 
                    <label class="col-sm-4 col-form-label col-form-label-sm">Thời gian làm việc: </label>
                    <div class="col-sm-8">
                        <input type="text" class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-300" 
                            value="<?= $days_worked ?> ngày" readonly />
                    </div>
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