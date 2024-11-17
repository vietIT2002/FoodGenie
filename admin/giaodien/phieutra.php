<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>

    <!-- Thêm Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
    </style>
</head>

<body>
<?php
include_once("./connect_db.php");

if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;

    // Tính tổng số bản ghi
    $totalRecordsQuery = mysqli_query($con, "SELECT * FROM `phieunhap`, `nhanvien` WHERE `nhanvien`.`id` = `id_nv`");
    if (!$totalRecordsQuery) {
        die("Lỗi truy vấn tính tổng số bản ghi: " . mysqli_error($con));
    }

    $totalRecords = mysqli_num_rows($totalRecordsQuery);
    $totalPages = ceil($totalRecords / $item_per_page);

    // Lấy dữ liệu phiếu nhập
    $orderClause = "";
    // Bỏ phần sắp xếp ở đây

    // Truy vấn lấy dữ liệu phiếu nhập
    $phieunhapQuery = mysqli_query($con, "
        SELECT 
            `phieunhap`.`id` AS `idpn`, 
            `id_nv`, 
            COALESCE(SUM(`cttrahang`.`tien_hoan_tra`), 0) AS `tong_tien`, 
            `phieunhap`.`ngay_tao` AS `ntpn`, 
            `nguoi_nhan`, 
            `sdt`, 
            `diachi`,  
            `nhanvien`.`id`, 
            `ten_nv`
        FROM `phieunhap`
        JOIN `nhanvien` ON `nhanvien`.`id` = `phieunhap`.`id_nv`
        LEFT JOIN `cttrahang` ON `cttrahang`.`id_phieunhap` = `phieunhap`.`id`
        WHERE `cttrahang`.`id_phieunhap` IS NOT NULL
        GROUP BY `phieunhap`.`id`
        " . $orderClause . "
        LIMIT " . $item_per_page . " OFFSET " . $offset);

    // Kiểm tra nếu truy vấn thất bại
    if (!$phieunhapQuery) {
        die("Lỗi truy vấn phiếu nhập: " . mysqli_error($con));
    }

    mysqli_close($con);
?>

    <div class="flex justify-between items-center">
        <div class="flex  pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl"
                style="color: #0099cc !important;">
                Quản lý Phiếu trả
            </p>
        </div>
    </div>
    
    <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">
        <div class="w-full px-4 bg-base-100 divide-y divide-slate-200">
            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <div class="overflow-x-auto overflow-y-auto h-5/6">
                    <table class="min-w-full bg-white">
                        <thead class="h-20 bg-gray-300 sticky top-0 z-10">
                            <tr>
                                <th class="font-normal px-6 py-3">Mã Phiếu trả</th>
                                <th class="font-normal px-6 py-3">Chi nhánh</th>
                                <th class="font-normal px-6 py-3">Số điện thoại</th>
                                <th class="font-normal px-6 py-3">Địa chỉ</th>
                                <th class="font-normal px-6 py-3">Tiền hoàn</th>
                                <th class="font-normal px-6 py-3">Xem chi tiết</th>
                                <th class="font-normal px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($phieunhapQuery)) {
                                ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">PT<?= $row['idpn'] ?></td>
                                <td class="px-6 py-4"><?= $row['nguoi_nhan'] ?></td>
                                <td class="px-6 py-4"><?= $row['sdt'] ?></td>
                                <td class="px-6 py-4"><?= $row['diachi'] ?></td>
                                <td class="px-6 py-4"><?=$row['tong_tien']?></td>
                                <td class="px-6 py-4"><a href="./admin.php?act=ctphieutra&id=<?= $row['idpn'] ?>"><i class="fa-regular fa-file-lines fa-lg text-green-500"> </a></td>
                                <div class="clear-both"></div>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
            include './pagination.php';
        ?>
        <div class="clear-both"></div>
    </div>
<?php
}
?>
</body>

</html>








