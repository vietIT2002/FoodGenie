<?php
$host = 'localhost'; // Địa chỉ máy chủ
$username = 'root'; // Tên người dùng MySQL (mặc định là root)
$password = ''; // Mật khẩu MySQL (mặc định là rỗng)
$database = 'foodgennie'; // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
if (!empty($_SESSION['nguoidung'])) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        include_once './connect_db.php';
        include_once './function.php';

        $error = false;
        $hoadonId = $_GET['id'];

        // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
        mysqli_begin_transaction($conn);

        try {
            // Lấy danh sách sản phẩm trong hóa đơn
            $query = "SELECT id_sanpham, so_luong FROM cthoadon WHERE id_hoadon = $hoadonId";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                throw new Exception("Không thể lấy dữ liệu chi tiết hóa đơn.");
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $maSanPham = $row['id_sanpham'];
                $soLuong = $row['so_luong'];

                // Cập nhật lại số lượng và số lượng đã bán trong bảng `sanpham`
                $updateQuery = "
                    UPDATE sanpham 
                    SET so_luong = so_luong + $soLuong, sl_da_ban = sl_da_ban - $soLuong 
                    WHERE id = $maSanPham
                ";
                $updateResult = mysqli_query($conn, $updateQuery);

                if (!$updateResult) {
                    throw new Exception("Không thể cập nhật sản phẩm: $maSanPham.");
                }
            }

            // Cập nhật trạng thái hiển thị hóa đơn (coi như "xóa")
            $updateHoaDonQuery = "UPDATE hoadon SET trang_thai_hien_thi = 1 WHERE id = $hoadonId";
            $updateHoaDonResult = mysqli_query($conn, $updateHoaDonQuery);

            if (!$updateHoaDonResult) {
                throw new Exception("Không thể cập nhật trạng thái hóa đơn.");
            }

            // Commit transaction
            mysqli_commit($conn);

            // Hiển thị thông báo thành công
            echo '<div id="toast-success"
                class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Xóa hóa đơn thành công và hoàn lại số lượng sản phẩm vào kho</div>
            </div>';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "admin.php?tmuc=Hóa đơn";
                }, 2000);
            </script>';
        } catch (Exception $e) {
            // Rollback transaction nếu có lỗi xảy ra
            mysqli_rollback($conn);
            $error = $e->getMessage();

            // Hiển thị thông báo lỗi
            echo '<div id="toast-error"
                class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Lỗi: ' . htmlspecialchars($error) . '</div>
            </div>';
            echo '<script>
                setTimeout(function() {
                    window.location.href = "admin.php?tmuc=Hóa đơn";
                }, 2000);
            </script>';
        }
    }
}
?>
