<?php
include_once("./connect_db.php");

if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM ctphieunhap,sanpham WHERE id_sp=sanpham.id AND id_phieunhap=" . $_GET['id']);
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $ctphieunhap = mysqli_query($con, "SELECT id_phieunhap, id_sp, ctphieunhap.so_luong, sanpham.id, ten_sp, don_gia FROM ctphieunhap, sanpham WHERE id_sp=sanpham.id AND id_phieunhap=" . $_GET['id'] . " ORDER BY ctphieunhap.id_phieunhap ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

    // Lấy ngày tạo phiếu nhập từ bảng phieunhap
    $query_phieunhap = mysqli_query($con, "SELECT ngay_tao FROM phieunhap WHERE id = " . $_GET['id']);
    $phieunhap_data = mysqli_fetch_array($query_phieunhap);
    $ngay_tao = $phieunhap_data['ngay_tao'];

    // Tính toán xem đã qua 7 ngày chưa
    $ngay_hien_tai = date('Y-m-d');
    $datetime1 = new DateTime($ngay_tao);
    $datetime2 = new DateTime($ngay_hien_tai);
    $interval = $datetime1->diff($datetime2);
    $days_diff = $interval->days;

    // Kiểm tra xem đã qua 7 ngày chưa
    $is_return_allowed = $days_diff <= 7;

    // Xử lý khi nhấn nút "Trả hàng"
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['return_qty'])) {
        $messages = []; // Lưu thông báo cho từng sản phẩm
        $total_amount = 0; // Tổng tiền sẽ được tính lại sau khi trả hàng
        foreach ($_POST['product_id'] as $index => $product_id) {
            $current_qty = $_POST['current_qty'][$index];
            $return_qty = $_POST['return_qty'][$index];

            // Tính toán số lượng mới sau khi trả hàng
            $new_qty = $current_qty - $return_qty;

            if ($new_qty >= 0) {
                // Cập nhật lại số lượng trong bảng ctphieunhap
                $update_query = "UPDATE ctphieunhap SET so_luong = $new_qty WHERE id_sp = $product_id AND id_phieunhap = " . $_GET['id'];
                if (mysqli_query($con, $update_query)) {
                    // Cập nhật lại số lượng trong bảng sanpham
                    $get_current_stock_query = "SELECT so_luong FROM sanpham WHERE id = $product_id";
                    $result = mysqli_query($con, $get_current_stock_query);
                    $current_stock = mysqli_fetch_array($result)['so_luong'];

                    // Giảm số lượng trong bảng sanpham
                    $new_stock = $current_stock - $return_qty;
                    $update_stock_query = "UPDATE sanpham SET so_luong = $new_stock WHERE id = $product_id";
                    if (mysqli_query($con, $update_stock_query)) {
                        $messages[] = "Sản phẩm ID $product_id đã được trả thành công! Số lượng còn lại: $new_qty.";

                        // Lưu lịch sử trả hàng vào bảng lichsutrahang
                        $ngay_tra = date('Y-m-d');
                        $insert_history_query = "INSERT INTO lichsutrahang (id_phieunhap, id_sp, so_luong_tra, ngay_tra) 
                                                 VALUES (" . $_GET['id'] . ", $product_id, $return_qty, '$ngay_tra')";
                        mysqli_query($con, $insert_history_query);
                    } else {
                        $messages[] = "Có lỗi khi cập nhật số lượng trong bảng sanpham cho sản phẩm ID $product_id.";
                    }

                    // Cập nhật tổng tiền
                    $don_gia = $_POST['don_gia'][$index]; // Đơn giá của sản phẩm
                    $total_amount += $new_qty * $don_gia; // Cộng tổng tiền vào
                } else {
                    $messages[] = "Có lỗi xảy ra với sản phẩm ID $product_id, vui lòng thử lại.";
                }
            } else {
                $messages[] = "Số lượng trả không hợp lệ cho sản phẩm ID $product_id.";
            }
        }
        // NT
        // Cập nhật lại tổng tiền trong bảng phiếu nhập
        $update_total_query = "UPDATE phieunhap SET tong_tien = $total_amount WHERE id = " . $_GET['id'];
        if (mysqli_query($con, $update_total_query)) {
            $messages[] = "Cập nhật tổng tiền thành công!";
        } else {
            $messages[] = "Có lỗi khi cập nhật tổng tiền trong phiếu nhập.";
        }
    }

    // Lấy lịch sử trả hàng từ bảng trả hàng
    $history_query = mysqli_query($con, "SELECT lichsutrahang.*, sanpham.ten_sp 
                                      FROM lichsutrahang 
                                      INNER JOIN sanpham ON lichsutrahang.id_sp = sanpham.id
                                      WHERE lichsutrahang.id_phieunhap = " . $_GET['id']);
    $history = mysqli_fetch_all($history_query, MYSQLI_ASSOC);

    mysqli_close($con);
?>

<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white" style="color: #0099cc">
            Phiếu nhập sản phẩm
        </p>
        <a href="./admin.php?tmuc=Phiếu nhập">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>

    <!-- Hiển thị thông báo nếu có -->
    <?php if (!empty($messages)) { ?>
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            <?php foreach ($messages as $message) { echo "<p>$message</p>"; } ?>
        </div>
    <?php } ?>

    <form id="returnForm" method="POST">
        <div class='w-full px-4 bg-base-100 divide-y divide-slate-200'>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="h-20 bg-gray-300">
                            <tr>
                                <th class="font-normal px-6 py-3">Tên sản phẩm</th>
                                <th class="font-normal px-6 py-3">Số lượng</th>
                                <th class="font-normal px-6 py-3">Đơn giá(VNĐ)</th>
                                <th class="font-normal px-6 py-3">Thành tiền</th>
                                <th class="font-normal px-6 py-3">Số lượng trả</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($ctphieunhap)) { ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="pl-8"><?= $row['ten_sp'] ?></td>
                                <td class="px-6 py-4"><?= $row['so_luong'] ?></td>
                                <td class="px-6 py-4"><?= number_format($row['don_gia'], 0, '', '.') ?></td>
                                <td class="px-6 py-4"><?= number_format($row['so_luong'] * $row['don_gia'], 0, '', '.') ?></td>
                                <td class="px-6 py-4">
                                    <input type="hidden" name="product_id[]" value="<?= $row['id_sp'] ?>">
                                    <input type="hidden" name="don_gia[]" value="<?= $row['don_gia'] ?>"> <!-- Lưu đơn giá -->
                                    <input type="hidden" name="current_qty[]" value="<?= $row['so_luong'] ?>">
                                    <input type="number" name="return_qty[]" placeholder="Số lượng trả" min="0" max="<?= $row['so_luong'] ?>" required>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
           
            <?php if ($is_return_allowed) { ?>
                <button type="submit" class="btn btn-primary" style="background-color:#4682B4; color: white; border: none; padding: 5px 10px; font-size: 16px;">
                        Trả hàng
                    </button>
            <?php } else { ?>
                <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded cursor-not-allowed" disabled>Trả hàng</button>
                <p class="text-red-600 italic">Đã quá hạn 7 ngày, hàng không thể hoàn trả.</p>
            <?php } ?>
        </div>
    </form>

    <?php include './pagination2.php'; ?>
</div>

<h2 class="text-2xl mt-6 font-semibold">Lịch sử trả hàng</h2>
<table class="min-w-full mt-4 bg-white border-collapse border border-gray-200">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2 text-left">Mã sản phẩm</th>
            <th class="px-4 py-2 text-left">Tên sản phẩm</th> 
            <th class="px-4 py-2 text-left">Số lượng trả</th>
            <th class="px-4 py-2 text-left">Ngày trả</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($history)) { ?>
            <?php foreach ($history as $record) { ?>
                <tr class="border-t border-b">
                    <td class="px-4 py-2"><?= $record['id_sp'] ?></td>
                    <td class="px-4 py-2"><?= $record['ten_sp'] ?></td> <!-- Hiển thị tên sản phẩm -->
                    <td class="px-4 py-2"><?= $record['so_luong_tra'] ?></td>
                    <td class="px-4 py-2"><?= date('d-m-Y H:i:s', strtotime($record['ngay_tra'])) ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="4" class="px-4 py-2 text-center text-gray-500">Chưa có lịch sử trả hàng</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php } else { ?>
    <p class="text-red-500 text-center">Bạn không có quyền truy cập vào trang này.</p>
<?php } ?>

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#returnForm').on('submit', function(event) {
        event.preventDefault(); // Ngừng hành động mặc định của form

        var formData = $(this).serialize(); // Lấy dữ liệu từ form

        $.ajax({
            url: '', // URL gửi tới (có thể là chính file này)
            type: 'POST',
            data: formData,
            success: function(response) {
                // Xử lý khi phản hồi thành công
                alert('Trả hàng thành công!');
                location.reload(); // Reload lại trang để cập nhật dữ liệu
            },
            error: function() {
                // Xử lý khi có lỗi
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            }
        });
    });
});
</script>
