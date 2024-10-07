<?php
// Start the session and ensure it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch customer_id from session
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;

// Define the API URL
$api_url = "http://127.0.0.1:5000/recommend/{$customer_id}";

$recommended_products = [];

// Fetch the recommended products from the API
if ($customer_id) {
    $response = @file_get_contents($api_url); // Suppress warnings for failed requests

    if ($response !== false) {
        $recommended_products = json_decode($response, true); // Decode JSON response
    } else {
        echo "Error fetching recommendations.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Trang Chủ</title>
</head>

<body>
    <div class="custom-wrapper">
        <div class="row row2">
            <div class="col-md-8 col-xs-6 column-spacing">
                <div class="slideshow-container">
                    <div class="mySlides1">
                        <img src="./img/banner/banner1.png" class="img-fluid">
                    </div>

                    <div class="mySlides1">
                        <a href="./index.php?act=product&id=1028"><img src="./img/banner/banner2.png"
                                class="img-fluid"></a>
                    </div>

                    <div class="mySlides1">
                        <a><img src="./img/banner/banner3.png" class="img-fluid"></a>
                    </div>

                    <div class="mySlides1">
                        <a href="./index.php?act=category&id=3"><img src="./img/banner/banner4.png"
                                class="img-fluid"></a>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                    <div class="dot-title">
                        <span class="dot1"></span>
                        <span class="dot1"></span>
                        <span class="dot1"></span>
                        <span class="dot1"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xs-6 column-spacing-right">
                <img src="./img/banner/bannerX.png" class="img-fluid" style="width:100%;">
            </div>
        </div>
        <script src="./js/amination.js"></script>
    </div>
    <!-- SECTION -->
    <!-- <div class="section"> -->
    <!-- container -->
    <div class="container" style="width: 85%">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/banner/banner-right.png" alt="">
                    </div>
                    <div class="shop-body">
                        <a href="news.php">
                            <h3>Tin tức<br>Thực phẩm</h3>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/banner/banner-between.png" alt="">
                    </div>
                    <div class="shop-body">
                        <a href="thuonghieu.php">
                            <h3>Trái cây<br>dinh dưỡng</h3>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/banner/banner-left.png" alt="">
                    </div>
                    <div class="shop-body">
                        <a href="Lienhe.php">
                            <h3>Mỗi ngày<br>một món ăn</h3>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <!-- Banner -->
    <!-- /Banner -->
    </div>
    <!-- /SECTION -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title text-md-left text-center">
                        <h3 class="title">Sản Phẩm</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <?php
                                        $sql='select * from sanpham where 1 limit 4, 5';
                                        $list=executeResult($sql);
                                        foreach($list as $item){	
											$gia_goc = $item['gia_goc'];
											$don_gia = $item['don_gia'];								
											
										// Calculate the discount percentage
											if($gia_goc > $don_gia) {
												$phan_tram_giam = round((($gia_goc - $don_gia) / $gia_goc) * 100);
											} else { 
												$phan_tram_giam = 0;
											}										
											if($item['so_luong']==0 && $item['trangthai']==0){ // Hết hàng 
												echo '
												<div class="product">
												<div class="product-img" style="height:250px">
													<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">
													<div class="product-label">
														<span class="new">HẾT HÀNG</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">SẢN PHẨM</p>
													<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
													<h4 class="product-price" id="price-sold">'.currency_format($item['don_gia']).' </h4>
													
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" >SẢN PHẨM ĐÃ HẾT</button>
												</div>
											</div>';
											}else if($item['trangthai']==0)// Còn hàng
                                            echo '<div class="product" >
											<div class="product-img" style="height:250px" onclick="location=\'index.php?act=product&id='.$item['id'].'\'">
												<img src="./img/'.$item['hinh_anh'].'" alt="" style="height:100%">

											<div class="product-label">
												'.($phan_tram_giam > 0 ? '<span class="new">-'.$phan_tram_giam.'%</span>' : '').'
											</div>

											</div>
											<div class="product-body">
												<p class="product-category"><small>'.$item['sl_da_ban'].' đã bán</small></p>
												<h3 class="product-name"><a href="?act=product&id='.$item['id'].'">'.$item['ten_sp'].'</a></h3>
												<div class="price-two">
													<h4 class="product-price">'.currency_format($item['don_gia']).'</h4>
													<h4 class="product-pricece" id="price-sold">'.currency_format($item['gia_goc']).' </h4>
												</div>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" onclick="addCart('.$item['id'].',1);themThanhCong('.$item['id'].');"><i class="fa fa-shopping-cart"></i> <span id="messAddCart'.$item['id'].'">thêm vào giỏ</span></button>
											</div>
										</div>';
                                        }
                                        ?>
                                    <!-- /product -->

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div><br><br>
            <!-- /row -->

            <div class="row">

                <!-- section title -->
                <!-- <div class="col-md-12">
					<div class="section-title text-md-left text-center">
						<h3 class="title">Gợi ý hôm nay</h3>
					</div>
				</div> -->
                <?php
// Bắt đầu session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// In ra nội dung của session để kiểm tra
// print_r($_SESSION);

// Kiểm tra nếu khách hàng đã đăng nhập
if (isset($_SESSION['id'])) {
    // Lấy ID khách hàng từ session
    $customer_id = $_SESSION['id'];

    echo 'Customer ID: ' . $customer_id;

    // Số lượng sản phẩm muốn hiển thị (10 sản phẩm)
    $n_recommendations = 10;

    // Tạo URL để gọi API gợi ý sản phẩm
    $api_url = "http://127.0.0.1:5000/recommend/{$customer_id}"; // Thay $id bằng $customer_id

    // Gọi API gợi ý sản phẩm bằng file_get_contents
    $response = file_get_contents($api_url);

    // Kiểm tra xem gọi API có thành công hay không
    if ($response === FALSE) {
        echo 'Gọi API thất bại!';
    } else {
        // Chuyển đổi dữ liệu JSON từ API thành mảng PHP
        $recommendations = json_decode($response, true);

        // In ra phản hồi từ API để kiểm tra
        // print_r($recommendations);

        // Kiểm tra xem API trả về dữ liệu hợp lệ hay không
        if (isset($recommendations['recommendations']) && count($recommendations['recommendations']) > 0) {
            // Hiển thị danh sách sản phẩm gợi ý
            echo '<div class="row">';
            echo '  <div class="col-md-12">';
            echo '      <div class="section-title text-md-left text-center">';
            echo '          <h3 class="title">Sản phẩm gợi ý</h3>';
            echo '      </div>';
            echo '  </div>';
            echo '  <div class="col-md-12">';
            echo '      <div class="row">';
            echo '          <div class="products-tabs">';
            echo '              <div id="tab1" class="tab-pane active">';
            echo '                  <div class="products-slick" data-nav="#slick-nav-1">';

            // Duyệt qua các sản phẩm được gợi ý từ API
            foreach ($recommendations['recommendations'] as $item) {
                $gia_goc = $item['original_price'];
                $don_gia = $item['price'];

                // Tính phần trăm giảm giá nếu có
                if ($gia_goc > $don_gia) {
                    $phan_tram_giam = round((($gia_goc - $don_gia) / $gia_goc) * 100);
                } else {
                    $phan_tram_giam = 0;
                }

                // Hiển thị sản phẩm (tùy chỉnh theo thiết kế của bạn)
                echo '<div class="product">';
                echo '  <div class="product-img" style="height:250px">';
                echo '      <img src="./img/' . htmlspecialchars($item['image']) . '" alt="" style="height:100%">';
                echo '      <div class="product-label">';
                if ($phan_tram_giam > 0) {
                    echo '          <span class="new">-' . $phan_tram_giam . '%</span>';
                }
                echo '      </div>';
                echo '  </div>';
                echo '  <div class="product-body">';
                echo '     <p class="product-category"><small>'.$item['sold_quantity'].' đã bán</small></p>';
                echo '      <h3 class="product-name"><a href="?act=product&id=' . htmlspecialchars($item['product_id']) . '">' . htmlspecialchars($item['product_name']) . '</a></h3>';
                echo '      <h4 class="product-price">' . currency_format($item['price']) . '</h4>';
                echo '												<h4 class="product-pricece" id="price-sold">'.currency_format($item['original_price']).' </h4>  <div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div></div>';
                echo '  <div class="add-to-cart">';
                echo '      <button class="add-to-cart-btn" onclick="addCart(' . htmlspecialchars($item['product_id']) . ', 1); themThanhCong(' . htmlspecialchars($item['product_id']) . ');"><i class="fa fa-shopping-cart"></i> <span>Thêm vào giỏ</span></button>';
                echo '  </div>';
                echo '</div>';
            }

            echo '                  </div>';
            echo '                  <div id="slick-nav-1" class="products-slick-nav"></div>';
            echo '              </div>';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        } else {
            echo '<p>Không có sản phẩm gợi ý cho bạn vào lúc này.</p>';
        }
    }
} else {
    // Nếu khách hàng chưa đăng nhập
    echo '<p>Vui lòng đăng nhập để xem sản phẩm gợi ý.</p>';
}
?>

                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                </div>
                <!-- Products tab & slick -->
            </div>
        </div>
        <!-- /container -->
    </div><br><br>
    <!-- /SECTION -->

</body>

</html>