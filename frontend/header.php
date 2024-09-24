<script src="https://kit.fontawesome.com/c9f5871d83.js" crossorigin "anonymous"></script>
<!-- TOP HEADER -->
<?php
	$servername = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$database = "foodgennie"; 
	
	
	$conn = new mysqli($servername, $username, $password, $database);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Kiểm tra xem khóa 'tong_tien_muahang' có tồn tại trong mảng $info hay không
	if (isset($info['tong_tien_muahang'])) {
		$tongtien = $info['tong_tien_muahang']; 
	} else {
		$tongtien = 0; 
	}

	// Truy vấn tổng số đơn hàng
	$sql = "SELECT COUNT(*) AS total_orders FROM hoadon WHERE id_khachhang = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $id_khachhang);
	$stmt->execute();
	$stmt->bind_result($total_orders);
	$stmt->fetch();
	$stmt->close();

	// Kiểm tra xem khóa 'tong_tien_muahang' có tồn tại trong mảng $info hay không
	if (isset($info['tong_tien_muahang'])) {
		$tongtien = $info['tong_tien_muahang']; 
	} else {
		$tongtien = 0; 
	}

	// Xác định cấp độ thành viên dựa trên tongtien
	if ($tongtien >= 15000000) {
		$thanhvien = "Kim cương";
    	$badge = "diamond_member.png";
		$so_tien_de_len_hang = 0;
		$hang_tiep_theo ="";
	} elseif ($tongtien >= 5000000) {
		$thanhvien = "Thành viên bạch kim";
    	$badge = "platinum_member.png";
		$so_tien_de_len_hang = 15000000 - $tongtien;
		$hang_tiep_theo ="Kim cương";
	} elseif ($tongtien >= 3000000) {
		$thanhvien = "Thành viên Vàng";
   		$badge = "gold_member.png"; 
		$so_tien_de_len_hang = 5000000 - $tongtien;
		$hang_tiep_theo ="bạch kim";
	} elseif ($tongtien >= 500000) {
		$thanhvien = "Thành viên bạc";
    	$badge = "silver_member.png";
		$so_tien_de_len_hang = 3000000 - $tongtien; 
		$hang_tiep_theo ="Vàng";
	} else {
		$thanhvien = "Thành viên mới";
    	$badge = "new_member.png";
		$so_tien_de_len_hang = 500000 - $tongtien;
		$hang_tiep_theo ="Bạc";
	}
?>
<div id="top-header">
		<header>	
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 0358881703</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> vietqv2002@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> TP Hồ Chí Minh</a></li>
					</ul>
					<!-- <ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VNĐ</a></li>
						<?php 
							if(isset($_SESSION['ten_dangnhap'])){
								 $ten_dangnhap=$_SESSION['ten_dangnhap'];
								 echo '<li><a href="?act=my_account"><i class="fa fa-user-o"></i> Xin chào, '.$ten_dangnhap.'!</a></li>';
							}
								else echo '<li><a href="index.php?act=register"><i class="fa fa-user-o"></i> Tạo tài khoản</a></li>';
						?>
					</ul> -->
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VNĐ</a></li>
						<?php 
							if(isset($_SESSION['ten_dangnhap'])){
								$ten_dangnhap = $_SESSION['ten_dangnhap'];

								// Kiểm tra và lấy thông tin quy hiệu thành viên
								if (isset($badge)) {
									// Hiển thị quy hiệu thay thế icon tài khoản
									echo '<li><a href="?act=my_account"><img src="./img/img_logo/'.$badge.'" alt="Thành viên '.$thanhvien.'" width="20" height="20"> Xin chào, '.$ten_dangnhap.'!</a></li>';
								} else {
									// Nếu không có quy hiệu, dùng icon tài khoản mặc định
									echo '<li><a href="?act=my_account"><i class="fa fa-user-o"></i> Xin chào, '.$ten_dangnhap.'!</a></li>';
								}
							}
							else {
								// Hiển thị tùy chọn tạo tài khoản khi chưa đăng nhập
								echo '<li><a href="index.php?act=register"><i class="fa fa-user-o"></i> Tạo tài khoản</a></li>';
							}
						?>
					</ul>

				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/banner/foodgenie.png" alt="" width= 170px height=100pxs>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="get">
									<input class="input" name="search" placeholder="Nhập tên sản phẩm cần tìm..." required>
									<button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								

								<!-- Cart -->
								<?php
									$qty=0;
									if(isset($_SESSION['cart'])){
										$cart=$_SESSION['cart'];
										foreach($cart as $value){
											$qty += $value['qty'];
										}
									}
								?>
								<div class="">
									<a href="?act=cart">
										<i class="fa fa-shopping-cart" style="font-size: 18px"></i>
										<span style="font-size: 16px">Giỏ Hàng</span>
										<div class="qty" id="qtyPro"><?=$qty?></div>
									</a>
								</div>
								
								<!-- /Cart -->

								<!-- Cài đặt -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa-solid fa-user" style="font-size: 20px"></i>
										<span style="font-size: 16px">Tài Khoản</span>
										
									</a>
									<div class="cart-dropdown">
										<?php
											if(isset($_SESSION['ten_dangnhap'])){
												echo '<div class="cart">
														<div class="product-widget">
														<a href="index.php?act=my_account">Quản Lý Tài Khoản</a>
														</div>
														<div class="product-widget">
														<a href="index.php?act=my_bill">Quản Lý Đơn Hàng</a>											
														</div>
														<div class="product-widget">
				 										<a href="change_password.php"> Đổi mật khẩu </a></div>
														</div>'
													;
											}
										?>
										
										<div class="cart-btns">
											<a href="index.php?act=login">Đăng Nhập</a>
											<?php
												if(isset($_SESSION['ten_dangnhap'])){
													echo '<a href="frontend/logout.php">Đăng Xuất</a>';
												}else echo '<a href="index.php?act=register">Đăng Ký</a>';
											?>
											
										</div>
									</div>
								</div>
								<!-- /Cài đặt -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<?php

							if($act=='' && !(isset($_GET['id']))) {
								echo '<li class="active" style="font-size: 16px;"><a href="index.php">TRANG CHỦ</a></li>';
							} else {
								echo '<li style="font-size: 16px;"><a href="index.php">TRANG CHỦ</a></li>';
							}
	
							if($act=='hot'){
								echo '<li class="active"><a href="index.php?act=category">SẢN PHẨM</a></li>';
							} else {
								echo '<li><a href="?act=category">SẢN PHẨM</a></li>';
							}

							echo '<li class="dropdown">';
							echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">DANH MỤC <span class="caret"></span></a>';
							echo '<ul class="dropdown-menu">';

							if(isset($_GET['id'])) $id=$_GET['id'];
							if($act=='product'){
								$sql='select id_the_loai from sanpham where id='.$id;
								$id=executeSingleResult($sql)['id_the_loai'];
							}
							$sql='select id, ten_tl from theloai';
							$list=executeResult($sql);

							foreach($list as $item){
								if($item['id']==$id){
									echo '<li class="active"><a href="?act=category&id='.$item['id'].'">'.$item['ten_tl'].'</a></li>';
								} else {
									echo '<li><a href="?act=category&id='.$item['id'].'">'.$item['ten_tl'].'</a></li>';
								}
							}

							echo '</ul>';
							echo '</li>';

							echo '<li><a href="thuonghieu.php">THƯƠNG HIỆU</a></li>';

							echo '<li><a href="baiblog.php">BÀI BLOG</a></li>';

							echo '<li><a href="lienhe.php">LIÊN HỆ</a></li>';
						?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->