<?php

if (!empty($_SESSION['nguoidung'])) {
    ?>
<div class="main-content">
    <h1>Xóa nhân viên</h1>
    <div id="content-box">
        <?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include_once './connect_db.php';
                include_once './function.php';
                $result = execute("UPDATE `nhanvien` SET `status` = 1 WHERE `id` = " . $_GET['id'] . "");
                if (!$result) {
                    $error = "Không thể xóa nhân viên.";
                }
                if ($error != false) {
                    ?>
        <div id="error-notify" class="box-content">
            <h2>Quay lại</h2>

            <a href="./admin.php?tmuc=Nhân viên">Danh sách nhân viên</a>
        </div>
        <?php } else { ?>
        <div id="success-notify" class="box-content">
            <h2>Xóa nhân viên thành công</h2>
            <a href="./admin.php?tmuc=Nhân viên">Danh sách nhân viên</a>

        </div>
        <?php } ?>
        <?php } ?>
    </div>
</div>
<?php
}

?>
<script>
// Show the success notification for a few seconds
setTimeout(function() {
    // Redirect to the desired page after 3 seconds
    window.location.href = "./admin.php?tmuc=Nhân viên";
}, 100); // 3000 milliseconds = 3 seconds
</script>