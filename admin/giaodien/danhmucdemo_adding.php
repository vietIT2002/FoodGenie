<!-- Thêm Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $danhmuc1 = mysqli_query($con, "SELECT * FROM `danhmuc`");
    // $row = mysqli_fetch_array($danhmuc);
    $quyendanhmuc1 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=1  ORDER BY `id` ASC ");
    $row1 = mysqli_fetch_all($quyendanhmuc1, MYSQLI_ASSOC);
    $quyendanhmuc1List = array();
    if (!empty($row1)) {
        foreach ($row1 as $rowl1) {
            $quyendanhmuc1List[] = $rowl1['id_danhmuc'];
        }
    }
    mysqli_close($con);
    ?>


<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
            Thêm quyền - danh mục
        </p>
        <a href="./admin.php?tmuc=Danh mục">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>
    <form id="danhmuc_add" action="./xulythem.php" method="POST">
        <!-- <input type="text" name="tendanhmuc" value="">
        <input type="submit" name="btndmadd" value="Thêm "> -->
        <div class="relative">
            <label>Tên quyền: </label>
            <input type="search" name="tendanhmuc" value=""
                id = "tendanhmuc" class="text-4xl py-5 font-medium text-red-800 dark:text-white rounded-lg mb-8" />
                <span style="color: red; font-size: 0.75em; margin-left: 10px;" id="danhmuc_error"></span>
                <button type="submit"
                class="text-white text-3xl w-44 h-16 absolute end-2.5 bottom-2.5 bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg  px-4 py-2 dark:bg-blue-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                name="btndmadd">Cập nhật</button>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden ">
            <table class=" min-w-full bg-white ">
                <thead class="h-20 bg-gray-300 ">
                    <tr>
                        <th class=" pl-8  font-normal ">Tên danh muc</th>
                        <th class=" pl-8  font-normal ">Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                            while ($row = mysqli_fetch_array($danhmuc1)) {
                                ?>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td id="tendanhmuc" class="px-6 py-4"><?= $row['ten_danhmuc'] ?></td>
                        <td class="px-6 py-4"><input type="checkbox" class="category-checkbox" value="<?= $row['id'] ?>" name="row[]"></td>
                        <div class="clear-both"></div>
    </form>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <span style="color: red; font-size: 0.80em;" id="checkbox_error"></span>
</div>
<script src="./js/binding_dmdemo.js"></script>
</div>
<div class="clear-both"></div>
<?php
}
?>