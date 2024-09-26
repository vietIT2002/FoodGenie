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
	<form action="./admin.php?act=ncccarttralist" method="POST">
		<div class="table-responsive-sm ">
			<div class="buttons" style="float: left;"><a href="./admin.php?muc=9&tmuc=Nhà%20cung%20cấp">Thoát</a></div>
			<div class="buttons">
				<input type="submit" name="update_click" value="Cập nhật">
			</div>
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<th>STT</th>
					<th>Mã sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Giá(VNĐ)</th>
					<th>Số lượng</th>
					<th>Thành tiền </th>
					<th>Xóa</th>
				</tr>
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
				<label>Tổng tiền là:<?= $total ?></label>
			</table>
			<div style="border: 1px solid #ccc; padding: 10px;">
				<div class="wrap-field">
					<label>Tên cơ sở: </label>
					<input type="text" name="namenv" value="" />
					<div class="clear-both"></div>
				</div>
				<div class="wrap-field">
					<label>Địa chỉ: </label>
					<input type="text" name="diachi" value="" />
					<div class="clear-both"></div>
				</div>
				<div class="wrap-field">
					<label>SĐT: </label>
					<input type="tel" name="sdt" pattern="[0]{1}[0-9]{9}" value=""  placeholder="VD: 0123456789" />
					<div class="clear-both"></div>
				</div>
				<div class="wrap-field">
					<label>Ghi chú: </label>
					<input type="text" name="ghichu" value="" />
					<div class="clear-both"></div>
				</div>

				<input type="submit" name="order_click" value="Hoàn Trả">
			</div>
		</div>
	</form>
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
	<div id="error-notify" class="box-content">
		<h2>Không có sản phẩm nào trong giỏ hàng để trả</h2>
		<a href="./admin.php?muc=9&tmuc=Nhà%20cung%20cấp">Danh sách nhà cung cấp</a>
	</div>
<?php }
?>

