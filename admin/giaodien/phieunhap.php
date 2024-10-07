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
</head>

<body>
    <?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if (isset($_GET['sapxep'])) {
            if ($_GET['sapxep'] == 'idgiam')
                $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'idtang')
                $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tggiam')
                $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tgtang')
                $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`ngay_tao` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tiengiam')
                $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`tong_tien` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tientang')
                $phieunhap = mysqli_query($con, "SELECT `phieunhap`.`id` AS `idpn`,`id_nv`, `tong_tien`, `phieunhap`.`ngay_tao` AS `ntpn`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`,`nhanvien`.`id`, `ten_nv` FROM `phieunhap`,`nhanvien` WHERE `nhanvien`.`id`=`id_nv` ORDER BY `phieunhap`.`tong_tien` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        mysqli_close($con);
        ?>



    <div class="flex justify-between items-center">
        <div class="flex  pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">
                Quản lý Phiếu nhập
            </p>

        </div>




    </div>
    <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


        <div class=' w-full px-4 bg-base-100 divide-y divide-slate-200'>

            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <table class=" min-w-full bg-white   ">
                    <thead class="h-20 bg-gray-300 ">
                        <tr>
                            <th class="font-normal px-6 py-3">Mã Phiếu nhập<br> <a
                                    href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=idgiam"><i
                                        class="fa fa-arrow-down"></i></a><a
                                    href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=idtang"><i
                                        class="fa fa-arrow-up"></i></a></th>
                            <th class="font-normal px-6 py-3">Chi nhánh</th>
                            <th class="font-normal px-6 py-3">Nhân viên đảm nhiệm</th>
                            <th class="font-normal px-6 py-3">Thời gian<br><a
                                    href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tggiam"><i
                                        class="fa fa-arrow-down"></i></a><a
                                    href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tgtang"><i
                                        class="fa fa-arrow-up"></i></a></th>
                            <th class="font-normal px-6 py-3">SĐT</th>
                            <th class="font-normal px-6 py-3">Địa chỉ</th>
                            <th class="font-normal px-6 py-3">Ghi chú</th>
                            <th class="font-normal px-6 py-3">Tổng tiền<a
                                    href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tiengiam"><i
                                        class="fa fa-arrow-down"></i></a><a
                                    href="./admin.php?muc=6&tmuc=Phiếu%20nhập&sapxep=tientang"><i
                                        class="fa fa-arrow-up"></i></a></th>
                            <th class="font-normal px-6 py-3">Xem chi tiết</th>
                            <th class="font-normal px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($phieunhap)) {
                                ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">PN<?= $row['idpn'] ?></td>
                            <td class="px-6 py-4"><?= $row['nguoi_nhan'] ?></td>
                            <td class="px-6 py-4"><?= $row['ten_nv'] ?></td>
                            <td class="px-6 py-4"><?= date('d/m/Y H:i', strtotime($row['ntpn'] ))?></td>
                            <td class="px-6 py-4"><?= $row['sdt'] ?></td>
                            <td class="px-6 py-4"><?= $row['diachi'] ?></td>
                            <td class="px-6 py-4"><?= $row['ghichu'] ?></td>
                            <td class="px-6 py-4"><?= number_format($row['tong_tien'], 0, '', '.') ?></td>
                            <td class="px-6 py-4"><a class="text-green-500"
                                    href="./admin.php?act=ctphieunhap&id=<?= $row['idpn'] ?>"><i class="
                                        fa-regular fa-file-lines fa-lg text-green-500"> </a></td>
                            <td class=" px-6 py-4"><a class="text-red-600 hover:text-red-800"
                                    href="./admin.php?act=xoapn&id=<?= $row['idpn'] ?>"
                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                            <div class="clear-both"></div>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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