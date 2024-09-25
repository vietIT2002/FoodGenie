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
    $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id_nha_cc` = " . $_GET['id'] . "");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $sanpham = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id_nha_cc` = " . $_GET['id'] . " ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "");
    mysqli_close($con);
    ?>
    <div class="flex justify-between items-center">
        <div class="flex  pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">Nhà cung cấp</p>
        </div>
        <div class="flex py-8 pr-6">
            <div class="buttons">
                <form name="nhacungcap-formdat" method="POST" action="./admin.php?act=ncccarttralist&idncc=<?= $_GET['id'] ?>"
                    enctype="multipart/form-data">
                    <input name="btnncctra" type="submit" title="Lưu nhà cung cấp" value="Giỏ hoàn trả" /></a>
            </div>
        </div>
    </div>
    <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


        <div class='h-full w-full px-4 bg-base-100 divide-y divide-slate-200'>

            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <table class=" min-w-full bg-white   ">
                    <thead class="h-20 bg-gray-300 ">
                        <tr class="font-normal px-6 py-3">
                        <tr class="font-normal px-6 py-3">
                            <th class="font-normal px-6 py-3">Hình ảnh</th>
                            <th class="font-normal px-6 py-3">Tên sản phẩm</th>
                            <th class="font-normal px-6 py-3">Giá (VĐ)</th>
                            <th class="font-normal px-6 py-3">Số lượng tồn</th>
                            <th class="font-normal px-6 py-3">Trả hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($sanpham)) {
                            ?>
                            <tr class="  bg-white  dark:bg-gray-800 dark:border-gray-700">
                                <td><img class="h-36 w-36 rounded-full" src=".././img/<?= $row['hinh_anh'] ?>">
                                </td>
                                <td class="px-6 py-4"><?= $row['ten_sp'] ?></td>
                                <td class="px-6 py-4"><?= number_format($row['don_gia'], 0, '', '.') ?></td>
                                <td class="px-6 py-4"><?= $row['so_luong'] ?></td>
                                <td class="px-6 py-4">
                                    <a href="./admin.php?act=ncccarttra&id=<?= $row['id'] ?>&idncc=<?= $_GET['id'] ?>">Thêm
                                        vào
                                        giỏ</a>
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
    <div class="clear-both"></div>
    </div>
    <?php
}
?>