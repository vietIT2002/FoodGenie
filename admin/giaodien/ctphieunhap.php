<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `ctphieunhap`,`sanpham` WHERE `id_sp`=`sanpham`.`id` AND `id_phieunhap`=" .$_GET['id']. "");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $ctphieunhap = mysqli_query($con, "SELECT `id_phieunhap`, `id_sp`, `ctphieunhap`.`so_luong`,`sanpham`.`id`,`ten_sp`,`don_gia`  FROM `ctphieunhap`,`sanpham` WHERE `id_sp`=`sanpham`.`id` AND `id_phieunhap`=" .$_GET['id']. " ORDER BY `ctphieunhap`.`id_phieunhap` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        mysqli_close($con);
    ?>
<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white" style="color: #0099cc">
            Phiếu nhập sản phẩm
        </p>
        <a href="./admin.php?tmuc=Phiếu nhập">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>


    <div class=' w-full px-4 bg-base-100 divide-y divide-slate-200'>

        <div class="bg-white shadow-md rounded-lg overflow-hidden ">
            <div class="overflow-x-auto">
                <table class=" min-w-full bg-white   ">
                    <thead class="h-20 bg-gray-300 ">
                        <tr>
                            <th class="font-normal px-6 py-3">Tên sản phẩm</th>
                            <th class="font-normal px-6 py-3">Số lượng</th>
                            <th class="font-normal px-6 py-3">Đơn giá(VNĐ)</th>
                            <th class="font-normal px-6 py-3">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($ctphieunhap)) {
                            ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="pl-8 "><?= $row['ten_sp'] ?></td>
                            <td class="px-6 py-4"><?= $row['so_luong'] ?></td>
                            <td class="px-6 py-4"><?= number_format($row['don_gia'], 0, '', '.') ?></td>
                            <td class="px-6 py-4"><?= number_format($row['so_luong'] * $row['don_gia'], 0, '', '.') ?>
                            </td>
                            <div class="clear-both"></div>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
        include './pagination2.php';
        ?>


</div>


<?php
    }
    ?>