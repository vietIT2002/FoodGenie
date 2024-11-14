<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<?php
if (!empty($_GET['id'])) {
    // $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `sanpham`.`id`=".$_GET['id']."");
    $result = mysqli_query($con, "SELECT `sanpham`.`id`, `ten_sp`, `don_gia`, `gia_goc`, `hinh_anh`, `noi_dung`, `id_the_loai`, `id_nha_cc`, `so_luong`,`xuat_xu`,`khoi_luong`, `sl_da_ban`, `sanpham`.`ngay_tao`, `sanpham`.`ngay_sua`, `trangthai`,`theloai`.`id`,`theloai`.`ten_tl`,`nhacungcap`.`id`,`nhacungcap`.`ten_ncc` FROM `sanpham`,`theloai`,`nhacungcap` WHERE `sanpham`.`id`=" . $_GET['id'] . " AND `sanpham`.`id_the_loai`=`theloai`.`id` AND `sanpham`.`id_nha_cc`=`nhacungcap`.`id`");
    $product = $result->fetch_assoc();
    $gallery = mysqli_query($con, "SELECT * FROM `hinhanhsp` WHERE `id_sp` = " . $_GET['id']);
    if (!empty($gallery) && !empty($gallery->num_rows)) {
        while ($row = mysqli_fetch_array($gallery)) {
            $product['gallery'][] = array(
                'id' => $row['id'],
                'path' => $row['hinh_anh']
            );
        }
    }
}

$theloai = mysqli_query($con, "SELECT * FROM `theloai`");
$nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`");
?>
<div class="max-w-full  mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
            Cập nhật sản phẩm
        </p>
        <a href="./admin.php?tmuc=Sản phẩm">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>

    <form id="form" name="product-formsua" method="POST" action="./xulythem.php?act=sua&id=<?= $_GET['id'] ?>"
        enctype="multipart/form-data">
        <div class="mx-10 overflow-y-auto h-5/6 ">

            <div class=" w-full  grid grid-cols-3 gap-6  ">

                <div class="mb-4">
                    <label class="block  text-2xl text-gray-700">Tên sản phẩm:</label>
                    <input
                        class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        id="product-name" type="text" name="name"
                        value="<?= (!empty($product) ? $product['ten_sp'] : "") ?>" />
                    <span style="color: red; font-size: 0.75em; margin-left: 5px;" id="name_error"></span>
                </div>



                <div class="mb-4">

                    <label class="block text-2xl text-gray-700">Thể loại:</label>
                    <select
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        name="idtl">
                        <option value="<?= $product['id_the_loai'] ?>">
                            <?= $product['ten_tl'] ?></option><?php while ($row = mysqli_fetch_array($theloai)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_tl'] ?></option><?php } ?>
                    </select>


                </div>

                <div class="mb-4">

                    <label class="block text-2xl text-gray-700">Nhà cung cấp: </label>
                    <select class="form-control" name="idncc">
                        <option
                            class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            value="<?= $product['id_nha_cc'] ?>">
                            <?= $product['ten_ncc'] ?></option><?php while ($row = mysqli_fetch_array($nhacungcap)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_ncc'] ?></option><?php } ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Giá sản phẩm:</label>

                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        id="product-price" type="number" name="price"
                        value="<?= !empty($product) ? $product['don_gia'] : '' ?>" />
                    <span style="color: red; font-size: 0.75em; margin-left: 5px;" id="price_error"></span>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Giá gốc:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        id="product-original-price" type="number" name="gia_goc"
                        value="<?= !empty($product) ? $product['gia_goc'] : '' ?>" />
                    <span style="color: red; font-size: 0.75em; margin-left: 5px;" id="original_price_error"></span>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Xuất xứ:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required oninvalid="this.setCustomValidity('Vui lòng nhập xuất xứ')"
                        oninput="this.setCustomValidity('')" type="text" name="xuat_xu"
                        value="<?= (!empty($product) ? $product['xuat_xu'] : "") ?>">
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700">Khối lượng:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required oninvalid="this.setCustomValidity('Vui lòng nhập khối lượng')"
                        oninput="this.setCustomValidity('')" type="text" name="khoi_luong"
                        value="<?= (!empty($product) ? $product['khoi_luong'] : "") ?>" />
                </div>
            </div>

            <div class="flex gap-6 mt-6">
                <!-- Avatar Section -->
                <div class="w-1/3">
                    <label class="block text-gray-700">Ảnh đại diện: </label>
                    <div class="wrap-field">
                        <?php if (!empty($product['hinh_anh'])) { ?>
                        <img class="w-96 h-96 object-cover rounded" id="imageDisplay"
                            src="../img/<?= $product['hinh_anh'] ?>" alt="Ảnh đại diện" />
                        <input type="hidden" id="imageDisplay" name="image" value="<?= $product['hinh_anh'] ?>" />
                        <?php } ?>
                        <input class="mt-4 file:border file:border-gray-300 file:rounded file:px-3 file:py-2"
                            id="fileInput" type="file" name="image" />
                    </div>
                </div>

                <!-- Image Gallery Section -->
                <div class="w-2/3">
                    <label class="block text-gray-700">Thư viện ảnh: </label>
                    <div class="flex flex-wrap space-x-4 ">
                        <?php if (!empty($product['gallery'])) { ?>
                        <ul class="flex space-x-4">
                            <?php foreach ($product['gallery'] as $image) {
                    if ($image['path'] != '') { ?>
                            <li class="flex flex-col items-center">
                                <img class="w-96 h-80 object-cover rounded" id="imageDisplay"
                                    src="../img/<?= $image['path'] ?>" />
                                <a class="mt-2 h-16 text-red-500 hover:text-red-700"
                                    href="./admin.php?act=gallery_delete&id=<?= $image['id'] ?>">Xóa</a>
                            </li>
                            <?php }
                } ?>
                        </ul>
                        <?php } ?>

                        <?php if (isset($_GET['task']) && !empty($product['gallery'])) { ?>
                        <?php foreach ($product['gallery'] as $image) { ?>
                        <input class="hidden" type="hidden" name="gallery_image[]" value="<?= $image['path'] ?>" />
                        <?php } ?>
                        <?php } ?>
                    </div>

                    <input class="mt-4 file:border file:border-gray-300 file:rounded file:px-3 file:py-2" multiple
                        type="file" name="gallery[]" />
                </div>
            </div>

            <div class=" flex gap-6 mt-6  ">
                <div class="mb-4 w-11/12 h-80">
                    <label>Nội dung: </label>
                    <textarea
                        class="w-full px-4 py-2 border text-2xl h-72 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 overflow-auto resize-vertical"
                        name="content" required oninvalid="this.setCustomValidity('Vui lòng nhập nội dung')"
                        oninput="this.setCustomValidity('')"><?php if (!empty($product)) { echo htmlspecialchars($product['noi_dung']); } ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-2xl text-gray-700">Trạng thái: </label>
                    <input type="checkbox" name="trangthai" value="<?= $product['trangthai'] ?>"
                        <?php if ($product['trangthai'] == '0') echo "checked" ?> />
                </div>
            </div>

            <div class="flex justify-center mt-8">
                <button class="px-6 py-2 bg-red-600 h-24 text-3xl text-white rounded-lg hover:bg-red-700" name="btnsua"
                    type="submit">Cập nhật</button>
                <button id="cancelButton"
                    class="ml-4 px-6 py-2 bg-gray-400  text-3xl text-white rounded-lg hover:bg-gray-500"
                    type="reset">Hủy</button>
            </div>
        </div>
    </form>
    <script src="./js/binding_product.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script>
    let initialEditorContent = "";

    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#product-content'))
            .then(editor => {
                initialEditorContent = editor.getData();


                const cancelButton = document.getElementById('cancelButton');
                cancelButton.addEventListener('click', function() {
                    editor.setData(initialEditorContent);

                    const form = document.getElementById('form');
                    const initialData = new FormData(form);
                    for (const [key, value] of initialData.entries()) {
                        const input = form.elements.namedItem(key);
                        if (input && input.type !== 'textarea') {
                            input.value = value;
                        }
                    }
                });
            })
            .catch(error => {
                console.error(error);
            });
    });
    </script>
</div>