<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý </title>

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
        // $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        // $offset = ($current_page - 1) * $item_per_page;

        // Tính tổng số hóa đơn và tổng doanh thu
        $totalRevenueQuery = "SELECT COUNT(id) AS total_orders, SUM(tong_tien) AS total_revenue FROM hoadon WHERE trang_thai = 1";
        $totalRevenueResult = mysqli_query($con, $totalRevenueQuery);
        // Kiểm tra kết quả truy vấn
        if ($totalRevenueResult) {
            $totalRevenueData = mysqli_fetch_assoc($totalRevenueResult);
            $totalOrders = $totalRevenueData['total_orders'];
            $totalRevenue = $totalRevenueData['total_revenue'];
        } else {
            // Xử lý lỗi truy vấn
            echo "Lỗi truy vấn: " . mysqli_error($con);
        }

        // Đảm bảo rằng tổng doanh thu không phải là NULL
        $totalRevenue = $totalRevenue !== NULL ? $totalRevenue : 0;

        // Tính tổng số trang
        // $totalPages = ceil($totalOrders / $item_per_page);

        // Lọc theo ngày
        if (isset($_POST['timebd']) && isset($_POST['timekt'])) {
            $query = "SELECT `hoadon`.`id` AS `idhoadon`, 
                                                            `id_khachhang`, 
                                                            `tong_tien`, 
                                                            `hoadon`.`ngay_tao`, 
                                                            `id_nhanvien`, 
                                                            `hoadon`.`trang_thai`, 
                                                            `ten_nv`,  
                                                            `hoadon`.`trang_thai_hien_thi`,
                                                            `nhanvien`.`id`
                                                        FROM (hoadon LEFT JOIN nhanvien ON `id_nhanvien`=`nhanvien`.`id`) ";
            if ($_POST['timebd'] && $_POST['timekt']) {
                $query .= "WHERE `hoadon`.`ngay_tao` BETWEEN '" . $_POST['timebd'] . "' AND DATE_ADD('" . $_POST['timekt'] . "', INTERVAL 1 DAY) ";
            } elseif ($_POST['timebd']) {
                $query .= "WHERE `hoadon`.`ngay_tao` >= '" . $_POST['timebd'] . "' ";
            } elseif ($_POST['timekt']) {
                $query .= "WHERE `hoadon`.`ngay_tao` <= DATE_ADD('" . $_POST['timekt'] . "', INTERVAL 1 DAY) ";
            }
            $query .= "ORDER BY `hoadon`.`ngay_tao`";
            $hoadon = mysqli_query($con, $query);
        } else {
            
            $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, 
                                                            `id_khachhang`, 
                                                            `tong_tien`, 
                                                            `hoadon`.`ngay_tao`, 
                                                            `id_nhanvien`, 
                                                            `hoadon`.`trang_thai`, 
                                                            `ten_nv`,  
                                                            `hoadon`.`trang_thai_hien_thi`,
                                                            `nhanvien`.`id`
                                                        FROM `hoadon`
                                                        LEFT JOIN `nhanvien` ON `id_nhanvien` = `nhanvien`.`id`
                                                        WHERE `hoadon`.`trang_thai` = 1 
                                                        AND `hoadon`.`trang_thai_hien_thi` = 0 
                                                        AND `hoadon`.`id` != 1
                                                        ORDER BY `hoadon`.`ngay_tao`  " );
        }
    ?>

    <div class="flex justify-between items-center">
        <div class="flex pt-10 pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl"
                style="color: #0099cc !important;">Quản lý Hóa đơn </p>
        </div>
        <div class="flex py-8 pr-6"></div>
    </div>
    <div class="flex flex-wrap justify-center w-full -mb-px  h-24 ">
        <a href="./admin.php?act=hdcxn"
            class="p-6 text-3xl font-medium text-gray-900  border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
            Hóa đơn chưa xác nhận
        </a>
        <a href="./admin.php?act=hd" aria-current="page"
            class="p-6 text-3xl font-medium text-blue-700 border-b-2 border-blue-600 rounded-e-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
            Hóa đơn đã xác nhận
        </a>
    </div>
    <div class="flex justify-between items-center">
        <div class="flex  pl-8">
            <p class=" pt-0 text-gray-900 text-3xl font-bold dark:text-white text-5xl"> Hóa đơn đã xác nhận</p>
        </div>

    </div>
    <form action="./admin.php?muc=1&tmuc=Hóa%20đơn" method="POST">
        <!-- <input type="date" name="timebd">
        <input type="date" name="timekt">
        <input type="submit" value="Lọc"> -->


        <div class="flex justify-end space-x-4 pb-2 pr-4">
            <input type="date" name="timebd" class="border p-2 rounded">
            <input type="date" name="timekt" class="border p-2 rounded">
            <input type="submit" value="Lọc" class="bg-blue-500 text-white p-2 rounded cursor-pointer">
        </div>

        <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl">
            <div class=' w-full px-4 bg-base-100 divide-y divide-slate-200'>
                <div class="flex justify-between mt-4 bg-gray-100 p-4 rounded-lg shadow-lg">
                    <div class="font-bold text-3xl text-blue-700">Tổng hóa đơn: <?= $totalOrders ?></div>
                    <div class="font-bold text-3xl text-red-700">Doanh thu:
                        <?= number_format($totalRevenue, 0, '', '.') ?> VNĐ
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                    <div class="overflow-x-auto overflow-y-auto h-4/6">
                        <table class="min-w-full bg-white">
                            <thead class="h-20 bg-gray-300 sticky top-0 z-10">
                                <tr>
                                    <th class="font-normal px-6 py-3">Mã Hóa đơn</th>
                                    <th class="font-normal px-6 py-3">Mã khách hàng</th>
                                    <th class="font-normal px-6 py-3">Tổng tiền(VNĐ)</th>
                                    <th class="font-normal px-6 py-3">Ngày tạo</th>
                                    <th class="font-normal px-6 py-3">Nhân viên xác nhận</th>
                                    <th class="font-normal px-6 py-3">Trạng thái</th>
                                    <th class="font-normal px-6 py-3">Xem chi tiết</th>
                                    <th class="font-normal px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($hoadon)) { ?>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">HĐ<?= $row['idhoadon'] ?></td>
                                    <td class="px-6 py-4">
                                        <?= strtoupper(substr(md5($row["id_khachhang"]), 0, 3)) . $row["id_khachhang"] ?>
                                    </td>
                                    <td class="px-6 py-4"><?= number_format($row['tong_tien'], 0, '', '.') ?></td>
                                    <td class="px-6 py-4"><?= date('d/m/Y H:i', strtotime($row['ngay_tao'])) ?></td>
                                    <td class="px-6 py-4"><?= $row['ten_nv'] ?></td>
                                    <td class="px-6 py-4">
                                        <?= $row['trang_thai'] == "1" ? "Đã xác nhận" : "Chưa xác nhận" ?>
                                    </td>
                                    <td class="px-6 py-4"><a
                                            href="./admin.php?act=cthoadon&id=<?= $row['idhoadon'] ?>"><i class="
                                        fa-regular fa-file-lines fa-lg text-green-500"></a></td>
                                    <!-- <td class="px-6 py-4"><a
                                            href="./xulythem.php?act=xnhd&id=<?= $row['idhoadon'] ?>&cuser=<?= $row['ten_nv'] ?>&iduser=<?= $_SESSION['idnhanvien'] ?>">Xác
                                            nhận</a></td> -->
                                    <!-- <td class="px-6 py-4">
                                        <?php if ($row['trang_thai'] != "1"): ?>
                                        <a
                                            href="./xulythem.php?act=xnhd&id=<?= $row['idhoadon'] ?>&cuser=<?= $row['ten_nv'] ?>&iduser=<?= $_SESSION['idnhanvien'] ?>">Xác
                                            nhận</a>
                                        <?php endif; ?>
                                    </td> -->

                                    <td class="px-6 py-4">
                                        <?php if ($row['trang_thai'] == "0") { ?>
                                        <a href="./admin.php?act=xoahdcxn&id=<?= $row['idhoadon'] ?>"
                                            onclick="return confirm('Bạn có muốn xóa hóa đơn này không?');">
                                            <i class="fa fa-trash-o text-red-600 hover:text-red-800"
                                                aria-hidden="true"></i>
                                        </a>
                                        <?php } else if ($row['trang_thai'] == "1") { ?>
                                        <a href="./admin.php?act=xoahd&id=<?= $row['idhoadon'] ?>"
                                            onclick="return confirm('Bạn có muốn xóa hóa đơn này không?');">
                                            <i class="fa fa-trash-o text-red-600 hover:text-red-800"
                                                aria-hidden="true"></i>
                                        </a>
                                        <?php } ?>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </form>

    <?php
    }
    ?>
</body>

</html>