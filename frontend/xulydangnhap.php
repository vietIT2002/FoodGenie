<?php
if (isset($_POST['dangnhap'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'foodgennie') or die('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    if ($username == "" || $password == "") {
        echo '<br><p style="color:red;">Username hoặc Password không được để trống!</p>';
    } else {
        $sql = "SELECT id, ten_dangnhap, mat_khau, trangthai FROM khachhang WHERE ten_dangnhap = '$username' AND mat_khau = '$password'";
        $query = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($query);

        if ($num_rows == 0) {
            echo '<br><p style="color:red;">Tên đăng nhập hoặc mật khẩu không đúng!</p>';
        } else {
            $row = mysqli_fetch_array($query, 1);
            // Tiến hành lưu tên đăng nhập và ID vào session
            if ($row['trangthai'] == 1) {
                echo "<script type='text/javascript'>alert('Tài khoản của bạn đã bị khóa');window.location='index.php?act=login';</script>";
            } else {
                $_SESSION['ten_dangnhap'] = $username;
                $_SESSION['id'] = $row['id']; // Lưu ID khách hàng vào session
                echo "<script type='text/javascript'>alert('Đăng nhập thành công');window.location='index.php';</script>";
            }
        }
    }
}
?>