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


<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
            Sản phẩm nhà cung cấp
        </p>
        <a href="./admin.php?tmuc=Nhà cung cấp">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>

    <div class="flex justify-end py-8 pr-6">
        <div>
            <a href="./admin.php?act=ncccarttralist&idncc">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6" width="30" height="30">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>

        </div>
    </div>
</div>
<div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


    <div class='h-full w-full px-4 bg-base-100 divide-y divide-slate-200'>

        <div class="bg-white shadow-md rounded-lg overflow-hidden ">
            <div class="overflow-x-auto">
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
                                </a>
                                <div class="clear-both"></div>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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