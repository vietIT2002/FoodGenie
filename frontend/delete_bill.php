<?php
include('../db/dbhelper.php'); // Đảm bảo tệp này có kết nối đến cơ sở dữ liệu

if (isset($_POST['id_hoadon'])) {
    $id_hoadon = $_POST['id_hoadon'];

    // Kết nối database và bắt đầu transaction
    $conn = mysqli_connect('localhost', 'root', '', 'foodgennie');
    if (!$conn) {
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }
    mysqli_begin_transaction($conn);

    try {
        // Lấy danh sách sản phẩm và số lượng từ hóa đơn
        $sql_get_details = "SELECT id_sanpham, so_luong FROM cthoadon WHERE id_hoadon = " . $id_hoadon;
        $result = mysqli_query($conn, $sql_get_details);

        if (!$result) {
            throw new Exception("Lỗi truy vấn chi tiết hóa đơn: " . mysqli_error($conn));
        }

        // Hoàn lại số lượng sản phẩm và giảm số lượng đã bán
        while ($row = mysqli_fetch_assoc($result)) {
            $sanpham_id = $row['id_sanpham'];
            $so_luong = $row['so_luong'];

            // Hoàn lại số lượng trong kho
            $sql_update_product = "UPDATE sanpham SET so_luong = so_luong + $so_luong, sl_da_ban = sl_da_ban - $so_luong WHERE id = $sanpham_id";
            if (!mysqli_query($conn, $sql_update_product)) {
                throw new Exception("Lỗi cập nhật sản phẩm: " . mysqli_error($conn));
            }
        }

        // Xóa chi tiết hóa đơn
        $sql_delete_details = "DELETE FROM cthoadon WHERE id_hoadon = " . $id_hoadon;
        if (!mysqli_query($conn, $sql_delete_details)) {
            throw new Exception("Lỗi xóa chi tiết hóa đơn: " . mysqli_error($conn));
        }

        // Xóa hóa đơn
        $sql_delete_invoice = "DELETE FROM hoadon WHERE id = " . $id_hoadon;
        if (!mysqli_query($conn, $sql_delete_invoice)) {
            throw new Exception("Lỗi xóa hóa đơn: " . mysqli_error($conn));
        }

        // Commit transaction
        mysqli_commit($conn);
        echo "Xóa hóa đơn thành công!";
    } catch (Exception $e) {
        // Rollback nếu có lỗi
        mysqli_rollback($conn);
        echo "Đã xảy ra lỗi: " . $e->getMessage();
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>

