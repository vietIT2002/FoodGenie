<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;

    $totalRecords = mysqli_query($con, "SELECT * FROM `cthoadon`,`sanpham` WHERE `id_sanpham`=`sanpham`.`id` AND `id_hoadon`=" . $_GET['id']);
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);

    $cthoadon = mysqli_query($con, "SELECT `id_hoadon`, `id_sanpham`, `cthoadon`.`so_luong`, `sanpham`.`id`, `ten_sp`, `don_gia` FROM `cthoadon`, `sanpham` WHERE `id_sanpham`=`sanpham`.`id` AND `id_hoadon`=" . $_GET['id'] . " ORDER BY `cthoadon`.`id_hoadon` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
    
    $total_so_luong = 0;
    $total_don_gia = 0;
    $total_tien = 0;
    ?>



<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white" style="color: #0099cc">
            Chi tiết hóa đơn
        </p>
        <a href="./admin.php?tmuc=Hóa%20đơn">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>




    <div class="card w-full m-10px  overflow-hidden divide-slate-200 bg-base-100 shadow-xl">

        <div class="flex pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 font-bold dark:text-white text-4xl"> Hóa đơn: </p>
            <?php if ($row = mysqli_fetch_assoc($cthoadon)) { ?>
            <p class="pb-4 pt-0 text-red-500  font-bold dark:text-red text-4xl pl-5">
                <?= $row['id_hoadon'] ?>
            </p>
            <?php } ?>
        </div>


        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="h-20 bg-gray-300">
                    <tr class="font-normal px-6 py-3">
                        <th class="font-normal px-6 py-3">Tên sản phẩm</th>
                        <th class="font-normal px-6 py-3">Số lượng</th>
                        <th class="font-normal px-6 py-3">Đơn giá</th>
                        <th class="font-normal px-6 py-3 ">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        mysqli_data_seek($cthoadon, 0); 
                        while ($row = mysqli_fetch_assoc($cthoadon)) {
                            $total_so_luong += $row['so_luong'];
                            $total_don_gia += $row['don_gia'];
                            $total_tien += $row['don_gia'] * $row['so_luong'];
                        ?>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4"><?= $row['ten_sp'] ?></td>
                        <td class="px-6 py-4"><?= $row['so_luong'] ?></td>
                        <td class="px-6 py-4"><?= number_format($row['don_gia'], 0, ',', '.') ?></td>
                        <td class="px-6 py-4"><?= number_format($row['don_gia'] * $row['so_luong'], 0, ',', '.') ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr class="font-bold bg-gray-200">
                        <td class="px-6 py-4 text-red-600">Tổng cộng</td>
                        <td class="px-6 py-4 text-red-600"><?= $total_so_luong ?></td>
                        <td class="px-6 py-4 text-red-600"><?= number_format($total_don_gia, 0, ',', '.') ?></td>
                        <td class="px-6 py-4 text-red-600"><?= number_format($total_tien, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php include './pagination2.php'; ?>



    </div>
</div>
<?php
    mysqli_close($con); 
}
?>