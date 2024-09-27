<?php
include_once("./connect_db.php");

if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;

    // Lấy tổng số thể loại
    $totalRecords = mysqli_query($con, "SELECT COUNT(*) as count FROM `theloai` WHERE `status` = 0");
    $totalRecords = mysqli_fetch_assoc($totalRecords)['count'];
    
    $totalPages = ceil($totalRecords / $item_per_page);
    
    // Lấy danh sách thể loại và tổng sản phẩm cho từng thể loại
    $theloai = mysqli_query($con, "
        SELECT t.*, 
               IFNULL(SUM(s.so_luong), 0) as total_products 
        FROM `theloai` t 
        LEFT JOIN `sanpham` s ON t.id = s.id_the_loai 
        WHERE t.`status` = 0 
        GROUP BY t.id 
        ORDER BY t.id ASC 
        LIMIT " . $item_per_page . " OFFSET " . $offset
    );

    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Thêm Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <div class="flex justify-between items-center">
        <div class="flex  pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">
                Quản lý Thể loại
            </p>

        </div>


        <div class="flex py-8 pr-6">
            <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                class="w-52 h-24 p-2 rounded-[15px] bg-red-600 hover:bg-rose-400 text-white text-3xl rounded-full "
                type="button">
                Thêm thể loại
            </button>
            <!-- <div class="buttons">
                <a href="admin.php?act=addtl">Thêm thể loại</a>
            </div> -->
        </div>
    </div>


    <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


        <div class='h-11/12 w-full px-4 bg-base-100 divide-y divide-slate-200'>

            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <table class=" min-w-full bg-white   ">
                    <thead class="h-20 bg-gray-300 ">
                        <tr class="font-normal px-6 py-3">
                            <th class="font-normal px-6 py-3">Mã thể loại</th>
                            <th class="font-normal px-6 py-3">Tên thể loại</th>
                            <th class="font-normal px-6 py-3">Tổng sản phẩm</th>
                            <th class="font-normal px-6 py-3">Chỉnh sửa</th>
                            <th class="font-normal px-6 py-3">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($theloai)) {
                                ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4"><?= $row['id'] ?></td>
                            <td class="px-6 py-4"><?= $row['ten_tl'] ?></td>
                            <td class="px-6 py-4"><?= $row['total_products'] ?></td>
                            <td class="px-6 py-4">
                                <a class="btn btn-outline-success" href="admin.php?act=suatl&id=<?= $row['id'] ?>">
                                    <i class="fa fa-pencil-square-o text-green-600 hover:text-green-800"
                                        aria-hidden="true"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a class="btn btn-outline-danger" href="admin.php?act=xoatl&id=<?= $row['id'] ?>"
                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fa fa-trash-o text-red-600" aria-hidden="true"></i>
                                </a>



                            </td>
                            <div class="clear-both"></div>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
            include './pagination.php';
            ?>
        </div>

        <div class="clear-both"></div>
    </div>
    <?php
}
?>
    <?php

    include 'theloai_adding.php';

    ?>
</body>

</html>