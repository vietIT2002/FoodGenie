<style>
	/* Center the button */
.primary-btn.order-submit {
    display: block;
    margin: 0 auto;
}
</style>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">GIỎ hÀNG</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Giỏ hàng</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row " style="padding-right:5%; padding-left:5%">
					<!-- Order Details -->
					<div class="col col-lg-12 order-details" style="margin-top:20px" >
						<div class="section-title text-center">
							<h3 class="title">Giỏ Hàng</h3>
						</div>
						<div class="order-summary">
							<div class="order-products">
								<?php
								echo '<table class="row table" style="width:100%;vertical-align:middle;">
								<tr class="title-shopping">
									<td></td>
									<td class="text-center"><strong>SẢN PHẨM</strong></td>
									<td><strong>GIÁ(VNĐ)</strong></td>
									<td  align=center ><strong>SỐ LƯỢNG</strong></td>
									<td></td>
								</tr>';
								$total = 0; // Khởi tạo tổng tiền
								$shippingFee = 15000; // Phí giao hàng
								
								if (isset($_SESSION['cart'])) {
									$cart = $_SESSION['cart'];
									foreach ($cart as $key => $value) {
										$soLuongTonKho = executeSingleResult('SELECT so_luong FROM sanpham WHERE id=' . $key)['so_luong'];
										$totalPrice = $value['price'] * $value['qty']; // Tính tiền cho sản phẩm
										$total += $totalPrice; // Cộng vào tổng tiền
								
										echo '
											<tr class="content-shopping">
												<td width="150px">
													<img src="./img/' . $value['img'] . '" width="100%">
												</td>
												<td width="40%">' . $value['name'] . '</td>
												<td>' . currency_format($value['price']) . '</td>
												<td align="center" style="width:140px">
													<div class="row" style="display: inline-block;">
														<input type="button" value="-" onclick="addCart(' . $key . ', 0); location.reload();">
														<input style="width:40px;" type="number" id="soLuong' . $key . '" value="' . $value['qty'] . '" min="1" readonly onchange="kiemTraSoLuong1(' . $soLuongTonKho . ',' . $key . ');">
														<input type="button" value="+" onclick="addCart(' . $key . ', 1); kiemTraSoLuong1(' . $soLuongTonKho . ',' . $key . '); location.reload();">
													</div>
													<p id="tbQty' . $key . '" style="color:red"></p>
												</td>
												<td width="10%" align="right">
													<button class="deleted" onclick="addCart(' . $key . ',-1); location.reload();"><i class="fa-solid fa-trash"></i></button>
												</td>
											</tr>';
									}
								
									// Xử lý phí giao hàng sau khi tính tổng giá trị sản phẩm
									if ($total <= 1000000) {
										$total += $shippingFee; // Chỉ cộng phí giao hàng nếu tổng giá trị <= 1.000.000 VNĐ
									}
								}
								
								echo '</table>';
								?>								
							</div>
							<div class="order-col">
								<div>PHÍ GIAO HÀNG</div>
								<?php
								if ($total > 1000000) {
									echo '<div><strong>Miễn phí</strong></div>';
								} else {
									echo '<div><strong>' . currency_format($shippingFee) . '</strong></div>';
								}
								?>
							</div>
							<div class="order-col">
								<div><h4>TỔNG TIỀN</h4></div>
								<div><strong class="order-total"><?= currency_format($total) ?></strong></div>
							</div>
						</div>
						
						
						<button id="btnThanhToanThanhCong"style="width:100% ;display:none;" class="btn-success btn order-submit" >ĐẶT HÀNG THÀNH CÔNG</button>
						<?php 
						if(isset($_SESSION['cart']) && !empty($_SESSION['cart']) ){
							if(isset($_SESSION['ten_dangnhap']) && !empty($_SESSION['ten_dangnhap']))
								echo '<button style="width:40%" onclick="thanhtoan(\''.$_SESSION['ten_dangnhap'].'\'); thanhToanThanhCong();" class="primary-btn order-submit" >Đặt hàng</button>';
							else echo '<button style="width:70%" class="primary-btn order-submit" >Vui Lòng đăng nhập để Tiến Hành THanh Toán</button>';
						}
						?>

						
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->