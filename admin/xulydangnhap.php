<?php
// session_start();
// $user = $_POST['username'];
// $pass = $_POST['password'];
// $conn = mysqli_connect("localhost", "root", "", "foodgennie");
// $sql = "SELECT * FROM `taikhoang` WHERE username='$user' AND pass='$pass'";
// echo $sql;
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);
// $sql2 = "SELECT * FROM `nhanvien` WHERE ten_dangnhap='".$row['username']."'";
// $result2 = mysqli_query($conn, $sql2);
// $row2 = mysqli_fetch_array($result2);
// if ($row['trang_thai'] == '1')
//     header("location:index.php?dn=khoa");
// else
//     if (mysqli_num_rows($result) > 0) {
//     $_SESSION['nguoidung'] = $row['fullname'];
//     $_SESSION['quyen'] = $row['id_quyen'];
//     $_SESSION['user'] = $row['username'];
//     $_SESSION['idnhanvien'] = $row2['id'];
//     $_SESSION['tennhanvien'] = $row2['ten_nv'];
//     header("location:admin.php?dn=true");
// } else header("location:index.php?dn=false");
?>

<?php
session_start();
$ten_dangnhap = $_POST['ten_dangnhap'];
$mat_khau = $_POST['mat_khau'];

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "foodgennie");

// Kiểm tra kết nối cơ sở dữ liệu
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Truy vấn kiểm tra tên đăng nhập và mật khẩu
$sql = "SELECT * FROM nhanvien WHERE ten_dangnhap='$ten_dangnhap' AND mat_khau='$mat_khau'";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả truy vấn
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    // Kiểm tra trạng thái tài khoản
    if ($row['status'] == '1') {
        header("Location: index.php?dn=khoa"); // Tài khoản bị khóa
        exit();
    }

    // Lưu thông tin người dùng vào session
    $_SESSION['nguoidung'] = $row['ten_nv'];       // Lấy tên nhân viên
    $_SESSION['quyen'] = $row['id_loainv'];        // Lấy quyền của nhân viên
    $_SESSION['user'] = $row['ten_dangnhap'];      // Lấy tên đăng nhập
    $_SESSION['idnhanvien'] = $row['id'];          // Lấy id của nhân viên

    // Chuyển hướng đến trang admin
    header("Location: admin.php?dn=true");
    exit();
} else {
    // Nếu thông tin đăng nhập không đúng
    header("Location: index.php?dn=false");
    exit();
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>