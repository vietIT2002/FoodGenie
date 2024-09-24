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

        // Tính tổng số hóa đơn và tổng doanh thu
        $totalRevenueQuery = "SELECT COUNT(id) AS total_orders, SUM(tong_tien) AS total_revenue FROM hoadon";
        $totalRevenueResult = mysqli_query($con, $totalRevenueQuery);
        $totalRevenueData = mysqli_fetch_assoc($totalRevenueResult);
        $totalOrders = $totalRevenueData['total_orders'];
        $totalRevenue = $totalRevenueData['total_revenue'];

        // Tính tổng số trang
        $totalPages = ceil($totalOrders / $item_per_page);

        // Lọc theo ngày
        if (isset($_POST['timebd']) && isset($_POST['timekt'])) {
            $query = "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, 
                      `id_nhanvien`, `trang_thai`, `ten_nv`, `nhanvien`.`id` 
                      FROM (hoadon LEFT JOIN nhanvien ON `id_nhanvien`=`nhanvien`.`id`) ";
            if ($_POST['timebd'] && $_POST['timekt']) {
                $query .= "WHERE `hoadon`.`ngay_tao` BETWEEN '" . $_POST['timebd'] . "' AND DATE_ADD('" . $_POST['timekt'] . "', INTERVAL 1 DAY) ";
            } elseif ($_POST['timebd']) {
                $query .= "WHERE `hoadon`.`ngay_tao` >= '" . $_POST['timebd'] . "' ";
            } elseif ($_POST['timekt']) {
                $query .= "WHERE `hoadon`.`ngay_tao` <= DATE_ADD('" . $_POST['timekt'] . "', INTERVAL 1 DAY) ";
            }
            $query .= "ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset;
            $hoadon = mysqli_query($con, $query);
        } else {
            $hoadon = mysqli_query($con, "SELECT `hoadon`.`id` AS `idhoadon`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, 
                                          `id_nhanvien`, `trang_thai`, `ten_nv`, `nhanvien`.`id` 
                                          FROM (hoadon LEFT JOIN nhanvien ON `id_nhanvien`=`nhanvien`.`id`) 
                                          ORDER BY `hoadon`.`ngay_tao` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
    ?>

    <div class="flex justify-between items-center">
        <div class="flex pt-10 pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">Quản lý Hóa đơn</p>
        </div>
        <div class="flex py-8 pr-6"></div>
    </div>

    <form action="./admin.php?muc=1&tmuc=Hóa%20đơn" method="POST">
        <input type="date" name="timebd">
        <input type="date" name="timekt">
        <input type="submit" value="Lọc">

        <div class="flex justify-between mt-4 bg-gray-100 p-4 rounded-lg shadow-lg">
            <div class="font-bold text-3xl text-blue-700">Tổng hóa đơn: <?= $totalOrders ?></div> 
            <div class="font-bold text-3xl text-green-700">Doanh thu: <?= number_format($totalRevenue, 0, '', '.') ?> VNĐ</div> 
        </div>


        <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl">
            <div class='h-full w-full px-4 bg-base-100 divide-y divide-slate-200'>
                <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                    <table class="min-w-full bg-white">
                        <thead class="h-20 bg-gray-300">
                            <tr>
                                <th class="font-normal px-6 py-3">Mã Hóa đơn</th>
                                <th class="font-normal px-6 py-3">Mã khách hàng</th>
                                <th class="font-normal px-6 py-3">Tổng tiền(VNĐ)</th>
                                <th class="font-normal px-6 py-3">Ngày tạo</th>
                                <th class="font-normal px-6 py-3">Nhân viên xác nhận</th>
                                <th class="font-normal px-6 py-3">Trạng thái</th>
                                <th class="font-normal px-6 py-3">Xem chi tiết</th>
                                <th class="font-normal px-6 py-3">Xác nhận</th>
                                <th class="font-normal px-6 py-3">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($hoadon)) { ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4"><?= $row['idhoadon'] ?></td>
                                    <td class="px-6 py-4"><?= strtoupper(substr(md5($row["id_khachhang"]), 0, 3)) . $row["id_khachhang"] ?></td>
                                    <td class="px-6 py-4"><?= number_format($row['tong_tien'], 0, '', '.') ?></td>
                                    <td class="px-6 py-4"><?= date('d/m/Y', strtotime($row['ngay_tao'])) ?></td>
                                    <td class="px-6 py-4"><?= $row['ten_nv'] ?></td>
                                    <td class="px-6 py-4"><?= $row['trang_thai'] == "1" ? "Đã xác nhận" : "Chưa xác nhận" ?></td>
                                    <td class="px-6 py-4"><a href="./admin.php?act=cthoadon&id=<?= $row['idhoadon'] ?>">Xem chi tiết</a></td>
                                    <td class="px-6 py-4"><a href="./xulythem.php?act=xnhd&id=<?= $row['idhoadon'] ?>&cuser=<?= $row['ten_nv'] ?>&iduser=<?= $_SESSION['idnhanvien'] ?>">Xác nhận</a></td>
                                    <td class="px-6 py-4"><?php if ($row['trang_thai'] == "0") { ?><a href="./admin.php?act=xoahd&id=<?= $row['idhoadon'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Xóa</a><?php } ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php include './pagination.php'; ?>
                </div>
            </div>
        </div>
    </form>

    <?php
    }
    ?>
</body>
</html>
