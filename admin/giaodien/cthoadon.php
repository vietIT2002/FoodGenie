<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `cthoadon`,`sanpham` WHERE `id_sanpham`=`sanpham`.`id`  AND `id_hoadon`=" . $_GET['id'] . "");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $cthoadon = mysqli_query($con, "SELECT `id_hoadon`, `id_sanpham`, `cthoadon`.`so_luong`,`sanpham`.`id`,`ten_sp`,`don_gia`  FROM `cthoadon`,`sanpham` WHERE `id_sanpham`=`sanpham`.`id` AND `id_hoadon`=" . $_GET['id'] . " ORDER BY `cthoadon`.`id_hoadon` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($con);
    ?>
<button><a href="./admin.php?muc=1&tmuc=Hóa%20đơn">Quay lại
    </a></button>

<div class="flex justify-between items-center">
    <div class="flex  pt-10 p pl-8">
        <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">Chi tiết hóa đơn </p>

    </div>
</div>
<div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


    <div class='h-full w-full px-4 bg-base-100 divide-y divide-slate-200'>

        <div class="bg-white shadow-md rounded-lg overflow-hidden ">
            <table class=" min-w-full bg-white   ">
                <thead class="h-20 bg-gray-300 ">
                    <tr class="font-normal px-6 py-3">
                        <th class="font-normal px-6 py-3">Tên sản phẩm</th>
                        <th class="font-normal px-6 py-3">Số lượng</th>
                        <th class="font-normal px-6 py-3">Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($cthoadon)) {
                            ?>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4"><?= $row['ten_sp'] ?></td>
                        <td class="px-6 py-4"><?= $row['so_luong'] ?></td>
                        <td class="px-6 py-4"><?= $row['don_gia'] ?></td>
                        <div class="clear-both"></div>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        include './pagination2.php';
        ?>
    <div class="clear-both"></div>
</div>
<?php
}
?>