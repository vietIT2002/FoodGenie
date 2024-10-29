<?php

require_once("./connect_db.php");
// $sanpham = mysqli_query($con, "SELECT * FROM `sanpham`");
// $row = mysqli_fetch_array($sanpham);
//$cart=[];
if (isset($_SESSION['cart'])) {
	if (isset($_GET['xoa'])) {
		if (isset($_GET['id'])) {
			unset($_SESSION['cart'][$_GET['id']]);
		}
	}
	if (isset($_POST['update_click'])) {
		if(isset($_POST['qty'])){
			foreach ($_POST['qty'] as $key => $val1) {
			$_SESSION['cart'][$key]['qty'] = $val1;
			if ($_SESSION['cart'][$key]['qty'] <= 0) {
			unset($_SESSION['cart'][$key]);
		}
		}
		
		
		}
		
	}

	//echo '<pre>';
	//var_dump($_SESSION['cart']);
?>
<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
            Phiếu trả sản phẩm
        </p>
        <a href="./admin.php?tmuc=Nhà cung cấp">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>
    <form action="./admin.php?act=ncccarttralist" method="POST">
        <div class="table-responsive-sm ">

            <div class="">
                <div class=" w-full  grid grid-cols-2 gap-6 ">
                    <div class="mb-4">
                        <label class="block  text-2xl text-gray-700">Tên cơ sở: </label>
                        <input
                            class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="text" name="namenv" value="" />

                    </div>
                    <div class="mb-4">
                        <label class="block  text-2xl text-gray-700">Địa chỉ: </label>
                        <input
                            class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="text" name="diachi" value="" />

                    </div>
                    <div class="mb-4">
                        <label class="block  text-2xl text-gray-700">Số điện thoại: </label>
                        <input
                            class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="tel" name="sdt" pattern="[0]{1}[0-9]{9}" value="" placeholder="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="mb-4">
                        <label class="block  text-2xl text-gray-700">Ghi chú: </label>
                        <input
                            class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="text" name="ghichu" value="" />

                    </div>

                </div>
            </div>
            <table class=" min-w-full bg-white ">
                <thead class="h-20 bg-gray-300 ">
                    <tr class="font-normal px-6 py-3">
                        <th class="font-normal px-6 py-3">STT</th>
                        <th class="font-normal px-6 py-3">Mã sản phẩm</th>
                        <th class="font-normal px-6 py-3">Hình ảnh</th>
                        <th class="font-normal px-6 py-3">Đơn giá</th>
                        <th class="font-normal px-6 py-3">Số lượng</th>
                        <th class="font-normal px-6 py-3">Thành tiền </th>
                        <th class="font-normal px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
				$stt = 0;
				$total = 0;
				$orderProducts = array();
				foreach ($_SESSION['cart'] as $key => $val) {
					$orderProducts[] = $_SESSION['cart'];
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
				?>

                    <td><?php echo $key ?></td>
                    <td><img style="width: 100px;height: 100px " src="../img/<?= $val['Pic'] ?>"></td>
                    <td><?php echo number_format($val['price'], 0, '', '.') ?></td>
                    <td><input type="number" name="qty[<?= $key ?>]" value="<?php echo $val['qty'] ?>"></td>
                    <td><?= number_format($val['qty'] * $val['price'], 0, '', '.') ?></td>
                    <td><a href="./admin.php?act=ncccarttralist&xoa=y&id=<?= $key ?>">Xóa</a></td>
                    </tr>
                    <?php
					$total += $val['qty'] * $val['price'];
				}
				?>

            </table>
            <div class="relative flex justify-between items-center">
                <!-- Label bên trái -->
                <label class="text-4xl py-5 font-medium text-red-800 dark:text-white">
                    Tổng tiền là: <?= $total ?>
                </label>
                
                <!-- Nhóm các nút bên phải -->
                <div class="flex items-center space-x-4">
                    <button
                        class="w-44 h-16 p-2 bg-red-600 hover:bg-rose-400 text-white text-2xl rounded-xl"
                        type="submit" name="order_click">
                        Hoàn trả
                    </button>
                    <input
                        class="w-44 h-16 p-2 bg-blue-600 hover:bg-blue-400 text-white text-2xl rounded-xl"
                        type="submit" name="update_click" value="Hủy">
                </div>
            </div>

        </div>
    </form>
</div>
<?php
	if (isset($_POST['order_click'])) {
		if (isset($_POST['namenv']) && $_POST['namenv'] != '') {
			if (isset($_POST['diachi']) && $_POST['diachi'] != '') {
				if (isset($_POST['sdt']) && $_POST['sdt'] != '') {
					$products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id` IN (" . implode(",", array_keys($_POST['qty'])) . ")");
					$total = 0;
					$orderProducts = array();
					while ($row = mysqli_fetch_array($products)) {
						$orderProducts[] = $row;
						$total += $row['don_gia'] * $_POST['qty'][$row['id']];
					}
					$result1 = mysqli_query($con, "INSERT INTO `phieutra`(`id_nhanvien`, `tong_tien`, `nguoi_nhan`, `sdt`, `dia_chi`, `ghi_chu`) VALUES ('" . $_SESSION['idnhanvien'] . "'," . $total . ",'" . $_POST['namenv'] . "','" . $_POST['sdt'] . "','" . $_POST['diachi'] . "','" . $_POST['ghichu'] . "')");
					$id_phieutra = mysqli_insert_id($con);
					$insertString = "";
					foreach ($orderProducts as $key => $product) {
						$insertString .= "('" . $id_phieutra . "', '" . $product['id'] . "', '" . $_POST['qty'][$product['id']] . "')";
						if ($key != count($orderProducts) - 1) {
							$insertString .= ",";
						}
						// Giảm số lượng sản phẩm trong kho
						$result2 = mysqli_query($con, "UPDATE `sanpham` SET `so_luong`=`so_luong`-" . $_POST['qty'][$product['id']] . " WHERE `id`=" . $product['id']);
					}
					$insertOrder = mysqli_query($con, "INSERT INTO `ctphieutra` (`id_phieutra`, `id_sp`, `so_luong`) VALUES " . $insertString);
					if ($insertOrder) {
						$listcate = executeResult('SELECT * FROM `theloai` WHERE 1');
						// foreach ($listcate as $item) {
						// 	$tongsanphamtheoloai = executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai=' . $item['id'])['sl'];
						// 	execute('UPDATE theloai SET tong_sp="' . $tongsanphamtheoloai . '" WHERE id=' . $item['id']);
						// }
						unset($_SESSION['cart']);
						echo ('<a href="./admin.php?muc=6&tmuc=Phiếu%20trả">Nhấp vào đây để xem phiếu trả thành công</a>');
					}
				} else echo "Vui lòng nhập số điện thoại!";
			} else echo "Vui lòng nhập địa chỉ!";
		} else echo "Vui lòng nhập tên cơ sở!";
	}
} else { ?>
<div id="toast-error"
    class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-3xl font-normal">Chưa có sản phẩm trong giỏ hàng</div>
    <!-- <a href="./admin.php?tmuc=Nhà cung cấp" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại
        danh sách thể loại</a> -->
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#toast-error" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
<script>
// Hiển thị thông báo thất bại
function showErrorToast() {
    const toast = document.getElementById("toast-error");
    toast.style.display = "flex"; // Hiển thị thông báo

    // Tự động chuyển hướng sau 1 giây
    setTimeout(function() {
        window.location.href = "admin.php?tmuc=Nhà cung cấp";
    }, 1000);
}

// Gọi hàm để hiển thị toast khi thất bại
showErrorToast();
</script>
<?php }
?>