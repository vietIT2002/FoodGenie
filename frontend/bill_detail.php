<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Chi tiết đơn hàng</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<!-- ĐƠN HÀNG CỦA TÔI -->
<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="row">
                <p>Tài khoản của<p>
                <strong><?=$_SESSION['ten_dangnhap']?></strong>
            </div>
            <div>
                
                <ul class="footer-links">
									<li><a href="?act=my_account"><i class="fa fa-user-o" style="color:black;"></i>&nbsp;Tài Khoản Của Tôi</a></li>
									<li ><a href="?act=my_bill" ><i class="fa fa-bars" style="color:black;"></i>&nbsp;Đơn Hàng Của Tôi</a></li>
									
								</ul>
            </div>
        </div>
        <div class="col col-lg-9 col-sm-12">
        <?php
            if(isset($_GET['id'])){
                $id_HD=$_GET['id'];
            }
            

        ?>
                            <div class="section-title text-center" >
								<h3 class="title">Chi tiết đơn hàng #HĐ<?=$id_HD?></h3>
							</div>
                        <div class="border-shopping">
                            <table width=100%>
                                <tr height=50px>
                                    <td class="receive-cart"><i class="fa-solid fa-truck-fast"></i>&nbsp;&nbsp;ĐỊA CHỈ NGƯỜI NHẬN</td>
                                    <td></td>
                                </tr>
                                <tr style="background-color: #fbfbfb;">
                                    <td>
                                        <p>Họ và tên: <strong><?=$info['ten_kh']?></strong></p>
                                        <p>Địa chỉ: <strong><?=$info['dia_chi']?></strong></p>
                                        <p>Điện thoại: <strong><?=$info['phone']?></strong></p>
                                    </td>
                                    <td align=right>Ngày đặt hàng: <strong><?=executeSingleResult("SELECT DATE_FORMAT(ngay_tao, '%d-%m-%Y') AS ngay_tao FROM hoadon WHERE id=".$id_HD)['ngay_tao']?></strong></td>
                                </tr>
                                <tr height=50px>
                                    <td class="receive-cart"><i class="fa-solid fa-bag-shopping"></i>&nbsp;&nbsp;Thông tin đơn hàng</td>
                                    <td></td>
                                </tr>
                            </table>
                            <table width=100% class="table">
                                <tr>
                                    <th></th>
                                    <th width=50%>Sản phẩm</th>
                                    <th>Giá(VNĐ)</th>
                                    <th width=10% style="text-align:center;">Số lượng</th>
                                    <th width=15% style="text-align:right;">Thành tiền</th>
                                </tr>
                                <?php
                                    $tongtien = 0;
                                    $discount = 0; 
                                    $subtotal = 0; 
                                    $sql = 'SELECT * FROM cthoadon WHERE id_hoadon=' . $id_HD;
                                    $listDetailBill = executeResult($sql);

                                    foreach ($listDetailBill as $chitietHD) {
                                        $detailPro = executeSingleResult('SELECT hinh_anh, ten_sp, don_gia FROM sanpham WHERE id=' . $chitietHD['id_sanpham']);
                                        $subtotal = $chitietHD['so_luong'] * $detailPro['don_gia'];

                                        // Áp dụng giảm giá nếu tổng tiền vượt quá 1000000
                                        $discount = ($tongtien > 1000000) ? 0 : 15000;

                                        echo '<tr height=100px class="content-shopping">
                                                <td width=100px><img src="./img/' . $detailPro['hinh_anh'] . '" width="100%"></td>
                                                <td>' . $detailPro['ten_sp'] . '</td>
                                                <td>' . currency_format($detailPro['don_gia']) . '</td>
                                                <td style="text-align:center;">' . $chitietHD['so_luong'] . '</td>
                                                <td align=right>' . currency_format($subtotal) . '</td>
                                            </tr>';

                                        // Cập nhật tổng tiền
                                        $tongtien += $subtotal;
                                    }
                                ?>
                                </table>
                                <table width=100% style="background-color:#f2f1f194; font-size:18px">
                                    <tr height=50px>
                                        <td class="receive-cart"><i class="fa-solid fa-money-bill"></i>&nbsp;&nbsp;Thanh toán </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td align=right><strong>Tạm tính</strong></td>
                                        <td width=15% align=right><?= currency_format($tongtien) ?></td>
                                    </tr>
                                    <tr>
                                        <td align=right><strong>Phí vận chuyển</strong></td>
                                        <td align=right><?= currency_format($discount) ?></td>
                                    </tr>
                                    <tr>
                                        <td align=right><strong>Tổng cộng</strong></td>
                                        <td align=right style="color:red;"><strong><?= currency_format($tongtien + $discount) ?></strong></td>
                                    </tr>
                                </table>
                        </div>                
        </div>
    </div>
</div><br><br>
<!-- /ĐƠN HÀNG CỦA TÔI -->