<?php

if (!empty($_SESSION['nguoidung'])) {
    ?>

<?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include_once './connect_db.php';
                include_once './function.php';
                $result = execute("DELETE FROM `quyen` WHERE `id` = " . $_GET['id']."");
                // UPDATE  `theloai` SET `trang_thai` = 1 WHERE `id` = " . $_GET['id'].""
                if (!$result) {
                    $error = "Không thể xóa Quyền.";
                }
                if ($error != false) {
                    ?>
<div id="toast-success"
    class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert" style="margin-top: 20px; margin-right: 20px;">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-3xl font-normal">Thành công</div>

    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
<script>
// Hiển thị thông báo thành công
function showSuccessToast() {
    const toast = document.getElementById("toast-success");
    toast.style.display = "flex"; // Hiển thị thông báo

    // Tự động chuyển hướng sau 1 giây
    setTimeout(function() {
        window.location.href = "admin.php?tmuc=Danh mục";
    }, 1000);
}

// Gọi hàm để hiển thị toast khi thành công
showSuccessToast();
</script>
<?php } else { ?>
<div id="toast-error"
    class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-3xl font-normal">Thất bại</div>
    <a href="./admin.php?tmuc=Thể loại" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh
        sách thể loại</a>

    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
    </button>
</div>
<script>
// Hiển thị thông báo thất bại
function showErrorToast() {
    const toast = document.getElementById("toast-error");
    toast.style.display = "flex"; // Hiển thị thông báo

    // Tự động chuyển hướng sau 1 giây
    setTimeout(function() {
        window.location.href = "admin.php?tmuc=Danh mục";
    }, 1000);
}

// Gọi hàm để hiển thị toast khi thất bại
showErrorToast();
</script>
<?php } ?>
<?php } ?>

<?php
}

?>