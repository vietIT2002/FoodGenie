<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .btnLuu {
        margin-top: 20px;
        width: 90%;
        padding: 10px 20px;
    }

    .wrap-field {
        margin-top: 10px;
        width: 100%;

    }

    img {
        max-width: 300px;
        max-height: 300px;
        margin-top: 10px;
    }
    </style>

</head>

<body>
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



    <div>
        <center>
            <br> <br>
            <h2>Sửa Nhân Viên</h2>
        </center>
    </div>
    <div class="box-contentt">

        <form name="nhanvien-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>"
            enctype="multipart/form-data">
            <div class="wrap-field form-group">
                <div class="row">
                    <div class="col-sm-5">

                        <div class="col-sm-12">

                            <?php if (!empty($nhanvien['hinh_anh'])) { ?>
                            <img style="width: 300px;height: 300px;" id="imageDisplay"
                                src="../img/<?= $nhanvien['hinh_anh'] ?>" alt="Ảnh đại diện" /><br />
                            <?php } ?>
                            <input class="form-control" type="file" name="image" id="fileInput" accept="image/*"
                                value="<?= $nhanvien['hinh_anh'] ?>" />

                        </div>

                    </div>
                    <div class="col-sm-7">

                        <div class="wrap-field form-group row">
                            <label class="col-sm-4 col-form-label col-form-label-sm">ID Nhân viên: </label>
                            <div class="col-sm-8">
                                <input class="form-control form-control-sm" type="text" name="id"
                                    value="<?= $_GET['id'] ?>" />
                            </div>
                        </div>
                        <div class="wrap-field form-group row">
                            <label class="col-sm-4 col-form-label col-form-label-sm">Tên Nhân viên: </label>
                            <div class="col-sm-8">
                                <input class="form-control form-control-sm" type="text" name="name"
                                    value="<?= (!empty($nhanvien) ? $nhanvien['ten_nv'] : "") ?>" />
                            </div>
                        </div>

                        <div class="wrap-field form-group row ">
                            <label class="col-sm-4 col-form-label col-form-label-sm">Email: </label>
                            <div class="col-sm-8">
                                <input class="form-control form-control-sm" type="email" name="email"
                                    value="<?= (!empty($nhanvien) ? $nhanvien['email'] : "") ?>"
                                    placeholder="VD: abc@gmail.com" />
                            </div>
                        </div>
                        <div class="wrap-field form-group row">
                            <label class="col-sm-4 col-form-label col-form-label-sm">Số điện thoại </label>
                            <div class="col-sm-8">
                                <input class="form-control form-control-sm" type="tel" name="phone"
                                    value="<?= (!empty($nhanvien) ? $nhanvien['phone'] : "") ?>"
                                    pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789" />
                            </div>

                        </div>
                        <div class="wrap-field form-group row">
                            <label class="col-sm-4 col-form-label col-form-label-sm">Mật khẩu</label>
                            <div class="col-sm-8">
                                <input class="form-control form-control-sm" type="text" name="mat_khau" required
                                    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!])\S{8,}$"
                                    title="Mật khẩu phải có ít nhất 8 ký tự, không chứa khoảng trắng, ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa và ít nhất một ký tự đặc biệt."
                                    value="<?= (!empty($nhanvien) ? $nhanvien['mat_khau'] : "") ?>">

                            </div>

                        </div>
                        <div class="wrap-field form-group row">
                            <label class="col-sm-4 col-form-label col-form-label-sm">Tên đăng nhập </label>
                            <div class="col-sm-8">
                                <input class="form-control form-control-sm" type="text" name="tendangnhap"
                                    value="<?= (!empty($nhanvien) ? $nhanvien['ten_dangnhap'] : "") ?>" />
                            </div>
                        </div>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Chức vụ:</label>
                            <select class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" name="id_loainv"
                                required>

                                <?php while ($row = mysqli_fetch_array($chucvu_result)) { ?>
                                <option value=" <?= $row['id'] ?>"><?= $row['TenLoaiNV'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Quyền:</label>
                            <select class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" name="id_quyen"
                                required>

                                <?php while ($row = mysqli_fetch_array($quyen_result)) { ?>
                                <option value="<?= $row['id'] ?>"><?= $row['ten_quyen'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>



                    <center>
                        <button class="btn btn-danger btnLuu" name="btnnvsua" type="submit" title="Lưu nhân viên"
                            value="Cập nhật">Cập nhật</button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>

                    </center>


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
</body>

</html>