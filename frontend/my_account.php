<?php
	$servername = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$database = "foodgennie"; 
	
	
	$conn = new mysqli($servername, $username, $password, $database);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$name=$tel=$email=$address=$passwordOld=$passwordNew=$passwordNew2='';
	if(!empty($_POST)){
		if(isset($_POST['name'])){
			$name=$_POST['name'];
		}
		if(isset($_POST['tel'])){
			$tel=$_POST['tel'];
		}
		if(isset($_POST['email'])){
			$email=$_POST['email'];
		}
		if(isset($_POST['address'])){
			$address=$_POST['address'];
		}
		if(isset($_POST['passwordOld'])){
			$passwordOld=$_POST['passwordOld'];
		}
		if(isset($_POST['passwordNew'])){
			$passwordNew=$_POST['passwordNew'];
		}
		if(isset($_POST['passwordNew2'])){
			$passwordNew2=$_POST['passwordNew2'];
		}
		$ngay_sua=date('Y/m/d H:s:i');
		if($passwordNew2!='')
		$sql='update khachhang set ten_kh="'.$name.'", mat_khau="'.$passwordNew2.'", phone="'.$tel.'", email="'.$email.'", dia_chi="'.$address.'", ngay_sua="'.$ngay_sua.'" where id='.$info['id'];
		else $sql='update khachhang set ten_kh="'.$name.'", phone="'.$tel.'", email="'.$email.'", dia_chi="'.$address.'", ngay_sua="'.$ngay_sua.'" where id='.$info['id'];
		execute($sql);
		echo '<script>alert("Cập nhật thành công.")</script>';
	}
	if(isset($_SESSION['ten_dangnhap'])){
		$ten_dangnhap=$_SESSION['ten_dangnhap'];
		$sql='select * from khachhang where ten_dangnhap="'.$ten_dangnhap.'"';
		$info=executeSingleResult($sql);
	}
	// Kiểm tra xem khóa 'tong_tien_muahang' có tồn tại trong mảng $info hay không
	if (isset($info['tong_tien_muahang'])) {
		$tongtien = $info['tong_tien_muahang']; 
	} else {
		$tongtien = 0; 
	}

	$id_khachhang = $info['id']; 

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

	

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Tài khoản của tôi</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<!-- ĐƠN HÀNG CỦA TÔI -->
<link rel="stylesheet" href="./css/login.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="row">
                <p>Tài khoản của<p>
                <strong><?=$ten_dangnhap?></strong>
            </div>
            <div>
                
                <ul class="footer-links">
					<li><a href="?act=my_account" style="color:#D10024;"><i class="fa fa-user-o" style="color:black;"></i>&nbsp;Tài Khoản Của Tôi</a></li>
					<li ><a href="?act=my_bill" ><i class="fa fa-bars" style="color:black;"></i>&nbsp;Đơn Hàng Của Tôi</a></li>			
				</ul>
            </div>
        </div>
       
		<div class="col col-lg-5 col-sm-12">
            <!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title text-center">
								<h3 class="title">Thông tin cá nhân</h3>
							</div>

							<form method="post">
								<div class="form-group">
									<label class="title-info" for="ten">Họ và Tên<span class="required1">*</span></label>
									<input class="input input-custom" type="text" name="name" placeholder="Nhập họ tên" value="<?=$info['ten_kh']?>">
								</div><br>

                                <div class="form-group">
									<label class="title-info" for="sdt">Số điện thoại<span class="required1">*</span></label>
                                    <input class="input input-custom" type="tel" id="sdt" name="tel" placeholder="Nhập số điện thoại" value="<?=$info['phone']?>" onchange="checkPhone();">
									<div style="color:red;" id="thongbaoloisdt"></div>
								</div><br>
                                
                                <div class="form-group">
									<label class="title-info" for="email">Email</label>
									<input class="input input-custom" type="email" name="email" placeholder="Nhập Email" value="<?=$info['email']?>" readonly style="background-color: #f0eded">
								</div><br>

                                <div class="form-group">
									<label class="title-info" for="diachi">Địa chỉ<span class="required1">*</span></label><br>
									<textarea name="address" placeholder="Nhập địa chỉ" rows="4" cols="52"><?=$info['dia_chi']?></textarea>
								</div><br>

                                <div class="form-group">
                                    <button class="button-info" >Cập nhật</button>
								</div>
                            </form>
							
						</div>
						<!-- /Billing Details -->
        </div>

		<div class="col col-lg-4 col-sm-12">
			<div class="billing-details" style="background-color: #eff0f6">
				<p class="title-ttv">Thẻ thành viên</p>
				<div style="text-align:center">
					<h4 class="name-ttv"><?=$info['ten_kh']?><h4>
					<p class="ten-qh"><?=$thanhvien?></p>
					<p class="qh-qh">QUY HIỆU</p>
					<img src="./img/img_logo/<?=$badge?>" alt="<?=$thanhvien?> badge" width="150" height="150">
				</div>

				<div class="row text-center"> 
					<div class="col-lg-6 col-sm-12"> 
						<p style="color:#133292;">Chi tiêu<br>
							<span class="chi-tieu"><?= number_format($info['tong_tien_muahang'], 0, ',', '.'); ?>
							<i class="fa-solid fa-money-bill"></i></span>
						</p>
					</div> 
					<div class="col-lg-6 col-sm-12"> 
						<p style="color:#133292;">
							Đơn hàng<br> 
							<span class="don-hang"><?php echo $total_orders; ?><span>
							<i class="fa-brands fa-shopify"></i>
						</p> 
					</div> 
				</div>

				<div class="row title-ended"> 
					<?php if ($so_tien_de_len_hang > 0): ?> 
					<p>Mua thêm <?= number_format($so_tien_de_len_hang, 0, ',', '.'); ?>đ để lên hạng <?= $hang_tiep_theo ?></p> 
					<?php else: ?> <p>Bạn đã đạt cấp cao nhất rồi!</p> <?php endif; ?> 
				</div>
			</div>

			<div class="membership-details">
				<h2 class="membership-title"><i class="fa fa-users"></i> Thông tin thành viên</h2>
				<p class="membership-intro">
					<i class="fa fa-gift"></i> Đăng ký để nhận ngay <strong class="highlight">ưu đãi đặc biệt</strong> tại <strong class="highlight store-name">FoodGennie</strong>!
				</p>

				<!-- Các cấp bậc thành viên -->
				<div class="membership-tier" onclick="toggleDetails('new-member')">
					<h4><i class="fa fa-user-plus"></i> Thành viên Mới</h4>
					<p id="new-member" class="details">Chỉ cần đăng ký tài khoản và hoàn thành bất kỳ đơn hàng nào, bạn sẽ ngay lập tức trở thành thành viên mới của FoodGennie.</p>
				</div>

				<div class="membership-tier" onclick="toggleDetails('silver-member')">
					<h4><i class="fa fa-medal"></i> Thành viên Bạc</h4>
					<p id="silver-member" class="details">Khi bạn đạt mức chi tiêu từ 500.000 VNĐ trở lên, bạn sẽ được nâng cấp lên thành viên Bạc và tận hưởng giảm giá 10% cho tất cả các đơn hàng.</p>
				</div>

				<div class="membership-tier" onclick="toggleDetails('gold-member')">
					<h4><i class="fa fa-crown"></i> Thành viên Vàng</h4>
					<p id="gold-member" class="details">Với tổng chi tiêu từ 3.000.000 VNĐ, bạn sẽ được thăng cấp lên thành viên Vàng với quyền lợi giảm giá 15% cho mỗi đơn hàng.</p>
				</div>

				<div class="membership-tier" onclick="toggleDetails('platinum-member')">
					<h4><i class="fa fa-gem"></i> Thành viên Bạch Kim</h4>
					<p id="platinum-member" class="details">Chi tiêu từ 5.000.000 VNĐ, bạn sẽ trở thành thành viên Bạch Kim và được hưởng giảm giá 20% cho mỗi đơn hàng.</p>
				</div>

				<div class="membership-tier" onclick="toggleDetails('diamond-member')">
					<h4><i class="fa fa-diamond"></i> Thành viên Kim Cương</h4>
					<p id="diamond-member" class="details">Với mức chi tiêu từ 15.000.000 VNĐ trở lên, bạn sẽ gia nhập thành viên Kim Cương với giảm giá 30%.</p>
				</div>
			</div>
		</div>
    </div>
<script>
    // Ẩn toàn bộ nội dung ban đầu
    document.querySelectorAll('.details').forEach(element => {
        element.style.display = 'none';
    });
</script>
<script src="./js/amination.js"></script>
</div>
<!-- /ĐƠN HÀNG CỦA TÔI -->

