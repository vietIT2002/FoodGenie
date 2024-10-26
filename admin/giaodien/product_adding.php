<?php
$con = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}
$theloai = mysqli_query($con, "SELECT * FROM `theloai`");
$nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`");
?>
</style>

<body>

    <div id="extralarge-modal" tabindex="-1"
        class="fixed top-0 right-0 z-50 hidden h-full md:w-1/4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative h-full max-h-full w-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 h-full">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <div class="divider mt-1"></div>
                    <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
                        Thông tin sản phẩm
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

                <form name="product-formadd" id="form" method="POST" action="./xulythem.php" enctype="multipart/form-data"
                    class="p-4 md:p-5">
                    <div class="flex flex-wrap gap-4">
                        <div class="w-full md:w-1/2">
                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="name_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Tên sản phẩm:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                    id="product-name" name="name" value="">
                            </div>
                            
                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="price_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Giá sản phẩm:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="number"
                                    id="product-price" name="price" value="">
                            </div>

                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="original_price_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Giá gốc:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="number"
                                    id="product-original-price" name="gia_goc" value="">
                            </div>

                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="image_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Ảnh đại diện:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="file"
                                    id="product-image" name="image">
                            </div>

                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="photo_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Thư viện ảnh:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="file"
                                    id="photo_library" name="gallery[]" multiple>
                            </div>

                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Thể loại:</label>
                                <select class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" name="idtl">
                                    <?php while ($row = mysqli_fetch_array($theloai)) { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_tl'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Nhà cung
                                    cấp:</label>
                                <select class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" name="idncc">
                                    <?php while ($row = mysqli_fetch_array($nhacungcap)) { ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['id'] ?> - <?= $row['ten_ncc'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="content_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Nội dung:</label>
                                <textarea class="w-2/3 text-2xl pl-4 focus:outline-none"
                                    id="product-content" name="content" id="product-content"></textarea>
                            </div>
                            
                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="quantity_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Số lượng:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="number"
                                    id="product-quantity" name="so_luong">
                            </div>

                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="weight_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Khối lượng:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                    id ="product-weight" name="khoi_luong" value="">
                            </div>

                            <span style="color: red; font-size: 0.75em; margin-left: 135px;" id="origin_error"></span>
                            <div class="mb-4 flex items-center">
                                <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Xuất xứ:</label>
                                <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                    id="product-origin" name="xuat_xu"  value="">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button
                            class="btn btn-danger w-44 pl-2 h-16 text-2xl bg-red-500 text-white px-4 py-2 rounded-md shadow-sm mr-2"
                            name="btnadd" type="submit" title="Lưu sản phẩm" value="Lưu">Lưu</button>
                        <button
                            class="btn btn-primary w-44 pl-2 h-16 text-2xl bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm"
                            type="reset" value="Hủy">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="./js/binding_product.js"></script>
    </div>
</body>

</html>