<?php
if (isset($_POST['dangnhap'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'foodgennie') or die('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    if ($username == "" || $password == "") {
        echo '<br><p style="color:red;">Tên đăng nhập hoặc mật khẩu <br> không được để trống!</p>';
    } else {
        // Kiểm tra xem người dùng có tồn tại và lấy số lần đăng nhập, lần đăng nhập cuối, và trạng thái
        $sql = "SELECT id, ten_dangnhap, mat_khau, trangthai, solandn
                FROM khachhang WHERE ten_dangnhap = '$username'";
        $query = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($query);

        // Kiểm tra tài khoản có tồn tại hay không
        if (!$user) {
            echo '<br><p style="color:red;">Tên đăng nhập hoặc mật khẩu<br> không đúng!</p>';
        } else {
            // Kiểm tra nếu tài khoản đã bị khóa do nhập sai quá nhiều lần
            $current_time = time();
            if ($user['trangthai'] == 1) {
                echo "<script>alert('Tài khoản của bạn đã bị khóa');window.location='index.php?act=login';</script>";
            }else {
                // Xác minh mật khẩu
                if ($user['mat_khau'] === $password) {
                    // Đăng nhập thành công: reset số lần đăng nhập, thiết lập session, và chuyển hướng
                    $_SESSION['ten_dangnhap'] = $username;
                    $_SESSION['id'] = $user['id'];

                    // Reset số lần đăng nhập sai
                    $reset_sql = "UPDATE khachhang SET solandn = 0 WHERE id = {$user['id']}";
                    mysqli_query($conn, $reset_sql);

                    echo "<script>alert('Đăng nhập thành công');window.location='index.php';</script>";
                } else {
                    // Mật khẩu không đúng: tăng số lần đăng nhập sai
                    $attempts = $user['solandn'] + 1;
                    $update_sql = "UPDATE khachhang SET solandn = $attempts WHERE id = {$user['id']}";
                    mysqli_query($conn, $update_sql);

                    // Khóa tài khoản nếu số lần nhập sai vượt quá 5
                    if ($attempts >= 5) {
                        $lock_sql = "UPDATE khachhang SET trangthai = 1 WHERE id = {$user['id']}";
                        mysqli_query($conn, $lock_sql);
                        echo "<script>alert('Tài khoản của bạn đã bị khóa do nhập sai quá nhiều lần');window.location='index.php?act=login';</script>";
                    } else {
                        echo '<br><p style="color:red;">Mật khẩu không đúng!</p>';
                    }
                }
            }
        }
    }
}
?>