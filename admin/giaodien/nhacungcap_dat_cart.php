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

?>
<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
            Phiếu nhập sản phẩm
        </p>
        <a href="./admin.php?tmuc=Nhà cung cấp">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>

    <form action="./admin.php?act=ncccartlist" method="POST">
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
                        <label class="block  text-2xl text-gray-700">SĐT: </label>
                        <input
                            class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            type="tel" name="sdt" pattern="[0]{1}[0-9]{9}" value="" placeholder="VD: 0123456789" />
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
            <div class="bg-white shadow-md rounded-lg overflow-hidden overflow-x-auto overflow-y-auto h-2/4">
                <table class=" min-w-full bg-white ">
                    <thead class="h-20 bg-gray-300  sticky top-0 z-10 ">
                        <tr class="font-normal px-6 py-3">
                            <th class="font-normal px-6 py-3">STT</th>
                            <th class="font-normal px-6 py-3">Mã sản phẩm</th>
                            <th class="font-normal px-6 py-3">Hình ảnh</th>
                            <th class="font-normal px-6 py-3">Đơn giá</th>
                            <th class="font-normal px-6 py-3">Số lượng</th>
                            <th class="font-normal px-6 py-3">Thành tiền </th>
                            <th class="font-normal px-6 py-3">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <?php
				$stt = 0;
				$total = 0;
				$orderProducts = array();
				foreach ($_SESSION['cart'] as $key => $val) {
					$orderProducts[] = $_SESSION['cart'];
					$stt++;
					echo "<tr  class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>";
					echo "<td class='px-6 py-4'>$stt</td>";
				?>

                            <td class="px-6 py-4"><?php echo $key ?></td>
                            <td class="px-6 py-4"><img style=" width: 100px;height: 100px "
                                    src=" ../img/<?= $val['Pic'] ?>">
                            </td>
                            <td class="px-6 py-4"><?php echo $val['price'] ?></td>
                            <td class="px-6 py-4"><input type="number" name="qty[<?= $key ?>]"
                                    value="<?php echo $val['qty'] ?>"></td>
                            <td class="px-6 py-4"><?= $val['qty'] * $val['price'] ?></td>
                            <td class="px-6 py-4"><a href="./admin.php?act=ncccartlist&xoa=y&id=<?= $key ?>"><i
                                        class="fa fa-trash-o text-red-600" aria-hidden="true"></i></a></td>
                        </tr>

                        <?php
					$total += $val['qty'] * $val['price'];
					
				}
				?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between items-center space-x-4">
                <!-- Label bên trái -->
                <label class="text-4xl py-5 font-medium text-red-800 dark:text-white">
                    Tổng tiền là: <?= $total ?>
                </label>

                <!-- Nhóm các nút bên phải -->
                <div class="flex space-x-4">
                    <button class="w-44 h-16 p-2 bg-red-600 hover:bg-rose-400 text-white text-2xl rounded-xl"
                        type="submit" name="order_click">
                        Đặt hàng
                    </button>
                    <button class="w-44 h-16 p-2 bg-blue-600 hover:bg-blue-400 text-white text-2xl rounded-xl"
                        type="submit" name="update_click">
                        Hủy
                    </button>
                </div>
            </div>

            <!-- <button type="button" name="order_click" value="Đặt hàng">Đặt hàng</button> -->
        </div>
    </form>
</div>
<?php
   if (isset($_POST['order_click'])) {
        if (!empty($_POST['namenv']) && !empty($_POST['diachi']) && !empty($_POST['sdt'])) {
            $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id` IN (" . implode(",", array_keys($_POST['qty'])) . ")");
            $total = 0;
            $orderProducts = array();
            while ($row = mysqli_fetch_array($products)) {
                $orderProducts[] = $row;
                $total += $row['don_gia'] * $_POST['qty'][$row['id']];
            }

            // Insert into phieunhap table
            $result1 = mysqli_query($con, "INSERT INTO `phieunhap`(`id_nv`, `tong_tien`,`nguoi_nhan`, `sdt`, `diachi`, `ghichu`) VALUES ('" . $_SESSION['idnhanvien'] . "'," . $total . ",'" . $_POST['namenv'] . "','" . $_POST['sdt'] . "','" . $_POST['diachi'] . "','" . $_POST['ghichu'] . "')");
            $id_phieunhap = mysqli_insert_id($con);

            // Insert into ctphieunhap table and update sanpham quantities
            $insertString = "";
            foreach ($orderProducts as $key => $product) {
                $insertString .= "('" . $id_phieunhap . "', '" . $product['id'] . "', '" . $_POST['qty'][$product['id']] . "')";
                if ($key != count($orderProducts) - 1) {
                    $insertString .= ",";
                }
                $result2 = mysqli_query($con, "UPDATE `sanpham` SET `so_luong`=`so_luong`+" . $_POST['qty'][$product['id']] . " WHERE `id`=" . $product['id'] . "");
            }
            $insertOrder = mysqli_query($con, "INSERT INTO `ctphieunhap` (`id_phieunhap`, `id_sp`, `so_luong`) VALUES " . $insertString . "");

            // Update theloai table
            if ($insertOrder) {
                // $listcate = executeResult('SELECT * FROM `theloai` WHERE 1');
                // foreach ($listcate as $item) {
                //     $tongsanphamtheoloai = executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai=' . $item['id'])['sl'];
                //     execute('UPDATE theloai SET tong_sp="' . $tongsanphamtheoloai . '" WHERE id=' . $item['id']);
                // }
                // Unset the cart after placing the order
                unset($_SESSION['cart']);

                // Redirect to the success page or reload the current page
                echo "<script>window.location.href='./admin.php?muc=6&tmuc=Phiếu%20nhập';</script>";
                exit;
            } else {
                echo "Order placement failed!";
            }
        } else {
            echo "Vui lòng nhập đủ thông tin!";
        }
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
</script>');
<?php } ?>
</div>