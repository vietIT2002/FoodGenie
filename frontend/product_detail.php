<link rel="stylesheet" href="./css/style.css">
<!-- Lấy tên thể loại khi biết id sản phẩm -->
<?php
	$sql='select ten_sp, ten_tl, theloai.id as id_tl from sanpham, theloai where sanpham.id='.$id.' and theloai.id=sanpham.id_the_loai';
	$listcate_pro=executeSingleResult($sql);

	$sql = 'SELECT sp.ten_sp, ncc.ten_ncc, sp.id as id_sp, ncc.id as id_nha_cc 
        FROM sanpham sp, nhacungcap ncc 
        WHERE sp.id = ' . $id . ' 
        AND ncc.id = sp.id_nha_cc';
	$listcate_prot = executeSingleResult($sql);

?>

<!-- Lấy thông tin chi tiết của sản phẩm -->
<?php
	$sql='select * from sanpham where id='.$id;
	$detailproduct=executeSingleResult($sql);
?>
<!-- /Lấy thông tin chi tiết của sản phẩm -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang Chủ</a></li>
							<li><a href="?act=category">Danh Mục Sản Phẩm</a></li>
							<li><a href="?act=category&id=<?=$listcate_pro['id_tl']?>"><?=$listcate_pro['ten_tl']?></a></li>
							<li class="active"><?=$listcate_pro['ten_sp']?></li>
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
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
						<?php
							$sql='select hinh_anh from hinhanhsp where id_sp='.$id;
							$listImg=executeResult($sql);
							foreach($listImg as $item){
								echo'<div class="product-preview">
								<img src="./img/'.$item['hinh_anh'].'" alt="">
							</div>';
							}
						?>
							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
						<?php
							foreach($listImg as $item){
								echo'<div class="product-preview">
								<img src="./img/'.$item['hinh_anh'].'" alt="">
							</div>';
							}
						?>
							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?= $detailproduct['ten_sp']?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link"><?=$detailproduct['sl_da_ban']?> Đã bán</a>
							</div>
							<div>
								<h3 class="product-price"><?= currency_format($detailproduct['don_gia'])?> <del class="product-old-price"><?= currency_format($detailproduct['gia_goc'])?></del></h3>
								<span class="product-available">còn hàng</span>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">

									<div class="input-number">
										<?php
											$soLuongHienCoTrongGioHang=0;
											if(isset($_SESSION['cart'][$id]))
											$soLuongHienCoTrongGioHang=$_SESSION['cart'][$id]['qty'];
										?>
										<button class="qty-down">-</button>
										<input type="number" id="qtyAdd" value="1" onchange="kiemTraSoLuong(<?=$detailproduct['so_luong']-$soLuongHienCoTrongGioHang?>);">
										<button class="qty-up">+</button>
										<div id="sl_tonkho<?=$id?>" style="display:none"><?=($detailproduct['so_luong']-$soLuongHienCoTrongGioHang)?></div>
									</div>
								</div>
							</div>
							<div>
							<button id="fonnt" class="btn btn-default btn-sm btn-outline-danger" onclick="addCart(<?=$id?>,1);themThanhCong(<?=$id?>);"><i class="fa fa-shopping-cart"></i> <span id="messAddCart<?=$id?>">THÊM VÀO GIỎ</span></button>
							<a class="review-link" href="#">Còn <?=$detailproduct['so_luong']?> sản phẩm</a><br>
							</div>
							<div id="tbQty" style="color:red"></div>
							

							<ul class="product-links">
								<li>Danh mục:</li>
								
								<li><a href="?act=category&id=<?=$listcate_pro['id_tl']?>"><?=$listcate_pro['ten_tl']?></a></li>
							</ul>

							<ul class="product-links">
								<li>Chia sẽ:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->
				

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Thông Tin Sản Phẩm</a></li>
								
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row font-basic-tb">
										<table class="table table-bordered table-hover" id="border-sass">
											<tbody>
											<tr>
												<th class="text-nowrap" scope="row">Mã sản phẩm</th>
												<td><p class="product-id"><?= $detailproduct['id']?></p></td>
											</tr>
											<tr>
												<th class="text-nowrap" scope="row">Thông tin</th>
												<td><p class="product-name"><?= $detailproduct['noi_dung']?></p></td>
											</tr>
											<tr>
												<th class="text-nowrap" scope="row">Loại sản phẩm</th>
												<td><?= $listcate_pro['ten_tl'] ?></td>
											</tr>
											<tr>
												<th class="text-nowrap" scope="row">Nhà cung cấp</th>
												<td><?= $listcate_prot['ten_ncc'] ?></td>
											</tr>
											<tr>
												<th class="text-nowrap"  scope="row">Khối lượng</th>
												<td><p class="product-KL"><?= $detailproduct['khoi_luong']?></p></td>
											</tr>
											<tr>
												<th class="text-nowrap" scope="row">Xuất xứ</th>
												<td><p class="product-XX"><?= $detailproduct['xuat_xu']?></p></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>

			<!-- /container -->
		</div>
		<!-- /SECTION -->

        <!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Các sản phẩm tương tự</h3>
						</div>
					</div>
					<!-- product -->
					<?php
						$sql='select * from sanpham where id_the_loai='.$listcate_pro['id_tl'].' limit 2, 4';
						$list=executeResult($sql);
						foreach($list as $item){
							$gia_goc = $item['gia_goc'];
							$don_gia = $item['don_gia'];

							if($gia_goc > $don_gia) {
								$phan_tram_giam = round((($gia_goc - $don_gia) / $gia_goc) * 100);
							} else { 
								$phan_tram_giam = 0;
							}			
							if($item['so_luong']==0 && $item['trangthai']==0){
								echo '<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img" style="height:250px">
										<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
										<div class="product-label">
											
											<span class="new">HẾT HÀNG</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
										<h3 class="product-name"><a href="index.php?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
										<h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"> SẢN PHẨM ĐÃ HẾT</button>
									</div>
								</div>
							</div>';
							}else if($item['trangthai']==0)
							echo'<div class="col-md-3 col-xs-6">
							<div class="product" >
								<div class="product-img">
									<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
									
									<div class="product-label">
										'.($phan_tram_giam > 0 ? '<span class="new">-'.$phan_tram_giam.'%</span>' : '').'
									
									</div>
								</div>
								<div class="product-body">
									<p class="product-category">sản phẩm</p>
									<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
									<h4 class="product-price">'.currency_format($item['don_gia']).' </h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn" onclick="addCart('.$item['id'].',1); themThanhCong('.$item['id'].'); "><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
								</div>
							</div>
						</div>';
						}
					?>
					<!-- /product -->

					

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->