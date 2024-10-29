<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Sản phẩm')
            include('product_listing.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Thể loại')
            include('theloai.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'datncc')
            include('nhacungcap_dat.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Nhà cung cấp')
            include('nhacungcap.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Phiếu trả')
            include('phieutra.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'ctphieutra')
            include('ctphieutra.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'trancc')
            include('nhacungcap_tra.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'ncccarttra')
            include('nhacungcap_tra_addcart.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'ncccarttralist')
            include('nhacungcap_tra_cart.php');
    }

    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Khách hàng')
            include('khachhang.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Nhân viên')
            include('nhanvien.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Đổi mật khẩu')
            include('doimatkhau.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Tài khoản')
            include('taikhoan.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Hóa đơn')
            include('hoadon.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Danh mục')
            include('danhmucdemo.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Phiếu nhập')
            include('phieunhap.php');
    }
    if (isset($_GET['tmuc'])) {
        if ($_GET['tmuc'] == 'Thống kê')
            include('thongke2.php');
    }
    if (isset($_GET['act']))
        if ($_GET['act'] == 'add')
            include('product_adding.php');
    if (isset($_GET['act']))
        if ($_GET['act'] == 'addss')
            echo ("them thanh cong");

    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoa')
            include('product_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'sua')
            include('product_editing.php');
    }
    

    if (isset($_GET['act']) && isset($_GET['dk'])) {
            if ($_GET['act'] == 'addtltc') {
                if ($_GET['dk'] == 'yes') {
                    
                    echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                            <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div class="ms-3 text-3xl font-normal">Thành công</div>
                        <a href="./admin.php?tmuc=Thể loại" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách thể loại</a>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                                window.location.href = "admin.php?tmuc=Thể loại";
                            }, 1000);
                        }

                        // Gọi hàm để hiển thị toast khi thành công
                        showSuccessToast();
                    </script>');
                } elseif ($_GET['dk'] == 'no') {
                    
                    echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                            <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="sr-only">Error icon</span>
                        </div>
                        <div class="ms-3 text-3xl font-normal">Thất bại</div>
                        <a href="./admin.php?tmuc=Thể loại" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách thể loại</a>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                                window.location.href = "admin.php?tmuc=Thể loại";
                            }, 1000);
                        }

                        // Gọi hàm để hiển thị toast khi thất bại
                        showErrorToast();
                    </script>');
                }
                // include('theloai.php');
            }
        

    }
// sua the loai suatl


  if (isset($_GET['act'])) {
    if ($_GET['act'] == 'suatl') {
        include('theloai_editing.php');
    } elseif ($_GET['act'] == 'suatltc') {
        if (isset($_GET['dk'])) {
           
            if ($_GET['dk'] == 'yes') {
                echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
                <a href="./admin.php?tmuc=Thể loại" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách thể loại</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Thể loại";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thành công
                showSuccessToast();
            </script>');
            } elseif ($_GET['dk'] == 'no') {
                echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
                <a href="./admin.php?tmuc=Thể loại" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách thể loại</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                          window.location.href = "admin.php?tmuc=Thể loại";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thất bại
                showErrorToast();
            </script>');
                }
            }
        
            //  include('theloai.php');
        }
    }
    
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoatl')
            include('theloai_deleting.php');
    }

    // nhà cung cấp
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'addncc')
            include('nhacungcap_adding.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoancc')
            include('nhacungcap_deleting.php');
    }

// nhân viên 

    if (isset($_GET['act']) && isset($_GET['dk'])) 
    {
            if ($_GET['act'] == 'addnvtc') 
            {
                        if ($_GET['dk'] == 'yes')
                        {
                            // Display success toast
                            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ms-3 text-3xl font-normal">Thành công</div>
                                <a href="./admin.php?tmuc=Nhân viên" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách thể loại</a>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                                        window.location.href ="admin.php?tmuc=Nhân viên";
                                    }, 1000);
                                }

                                // Gọi hàm để hiển thị toast khi thành công
                                showSuccessToast();
                            </script>');
                        } 
                        elseif ($_GET['dk'] == 'no') 
                        {
                            // Display error toast
                            echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-3xl font-normal">Thất bại</div>
                                <a href="./admin.php?tmuc=Nhân viên" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách thể loại</a>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                                        window.location.href = "admin.php?tmuc=Nhân viên";
                                    }, 1000);
                                }

                                // Gọi hàm để hiển thị toast khi thất bại
                                showErrorToast();
                            </script>');
                        }
               
            }
   

    }
   //sửa nhân viên 

    if (isset($_GET['act'])) 
    {
        if ($_GET['act'] == 'suanv') 
        {
            include('nhanvien_editing.php');
        } elseif ($_GET['act'] == 'suanvtc') {
            if (isset($_GET['dk'])) {
                if ($_GET['dk'] == 'yes') {
                    echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-3xl font-normal">Thành công</div>
                    <a href="./admin.php?tmuc=Nhân viên" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách thể loại</a>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                            window.location.href = "admin.php?tmuc=Nhân viên";
                        }, 1000);
                    }

                    // Gọi hàm để hiển thị toast khi thành công
                    showSuccessToast();
                </script>');
                } elseif ($_GET['dk'] == 'no') {
                    echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-3xl font-normal">Thất bại</div>
                    <a href="./admin.php?tmuc=Nhân viên" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách thể loại</a>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                            window.location.href = "admin.php?tmuc=Nhân viên";
                        }, 1000);
                    }

                    // Gọi hàm để hiển thị toast khi thất bại
                    showErrorToast();
                </script>');
                }
            }
        
            // include('nhanvien.php');
        }
    }


    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoanv')
            include('nhanvien_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'cthoadon')
            include('cthoadon.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'addtk')
            include('taikhoan_adding.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'ncccart')
            include('nhacungcap_dat_addcart.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'ncccartlist')
            include('nhacungcap_dat_cart.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoapn')
            include('phieunhap_xoa.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'ctphieunhap')
            include('ctphieunhap.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoahdcxn')
            include('hoadon_deleting_cxn.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoahd')
            include('hoadon_deleting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'gallery_delete')
            include('gallery_delete.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoatk')
            include('taikhoan_deleting.php');
    }
    // if (isset($_GET['act'])) {
    //     if ($_GET['act'] == 'quyen')
    //         include('danhmucdemo.php');
    // }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'addquyen')
            include('danhmucdemo_adding.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'suaquyen')
            include('danhmucdemo_editting.php');
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xoaquyen')
            include('danhmucdemo_deleting.php');
    }


    // xác nhận hóa đơn
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'xnhdtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
               
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Hóa đơn";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thành công
                showSuccessToast();
            </script>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'xnhdtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
              
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                          window.location.href = "admin.php?tmuc=Hóa đơn";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thất bại
                showErrorToast();
            </script>');
    }

    // Khách hàng 
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'khtttc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
                // <a href="./admin.php?tmuc=Thể loại" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách thể loại</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Khách hàng";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thành công
                showSuccessToast();
            </script>');
    }
   // tài khoản
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addtktc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Tài khoản">Danh sách Tài khoản</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'addtktc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
        <a href="javascript:window.history.go(-1)">Quay lại</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suatktc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Tài khoản">Danh sách Tài khoản</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'suatktc') && ($_GET['dk'] == 'no'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thất bại</h2>
        
        <a href="./admin.php?tmuc=Tài khoản">Danh sách Tài khoản</a>
    </div>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="error-notify" class="box-content">
        <h2>Thành công</h2>
        
        <a href="./admin.php?tmuc=Danh mục">Danh sách Danh mục</a>
    </div>');
    }

    //nhaf cung cap
    // if (isset($_GET['act'])) {
    //     if (($_GET['act'] == 'nccaddtc') && ($_GET['dk'] == 'yes'))
    //         echo ('<div id="error-notify" class="box-content">
    //     <h2>Thành công</h2>
        
    //     <a href="./admin.php?tmuc=Nhà cung cấp">Danh sách Nhà cung cấp</a>
    // </div>');
    // }
    // if (isset($_GET['act'])) {
    //     if (($_GET['act'] == 'nccaddtc') && ($_GET['dk'] == 'no'))
    //         echo ('<div id="error-notify" class="box-content">
    //     <h2>Vui lòng nhập thông tin đầy đủ!!</h2>
        
    //     <a href="javascript:window.history.go(-1)">Quay lại</a>
    // </div>');
    // }
  if (isset($_GET['act']) && isset($_GET['dk'])) {
    if ($_GET['act'] == 'nccaddtc') {
        if ($_GET['dk'] == 'yes') {
           
            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
                <a href="./admin.php?tmuc=Nhà cung cấp" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách thể loại</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Nhà cung cấp";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thành công
                showSuccessToast();
            </script>');
        } elseif ($_GET['dk'] == 'no') {
            // Display error toast
            echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
                <a href="./admin.php?tmuc=Nhà cung cấp" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách thể loại</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Nhà cung cấp";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thất bại
                showErrorToast();
            </script>');
        }
        //  include('nhacungcap.php');
    }
   

}
// dổi mật khâue
     if (isset($_GET['act']) && isset($_GET['dk'])) {
    if ($_GET['act'] == 'tkmktc') {
        if ($_GET['dk'] == 'yes') {
            
            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
              
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Đổi mật khẩu";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thành công
                showSuccessToast();
            </script>');
        } elseif ($_GET['dk'] == 'no') {
            // Display error toast
            echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
                
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc= Đổi mật khẩu";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thất bại
                showErrorToast();
            </script>');
        }
        //  include('doimatkhau.php');
    }
   

}
    // sản phẩm 
 

    if (isset($_GET['act']) && isset($_GET['dk'])) {
    if ($_GET['act'] == 'addsptc') {
        if ($_GET['dk'] == 'yes') {
         
            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
                <a href="./admin.php?tmuc=Sản phẩm" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách Sản phẩm</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Sản phẩm";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thành công
                showSuccessToast();
            </script>');
        } elseif ($_GET['dk'] == 'no') {
           
            echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
                <a href="./admin.php?tmuc=Sản phẩm" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách Sản phẩm</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Sản phẩm";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thất bại
                showErrorToast();
            </script>');
        }
        //  include('product_listing.php');
    }
   

}
   //sửaSản phẩm

    if (isset($_GET['act'])) {
    if ($_GET['act'] == 'suasp') {
        include('product_editing.php');
    } elseif ($_GET['act'] == 'suasptc') {
        if (isset($_GET['dk'])) {
            if ($_GET['dk'] == 'yes') {
                echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
                <a href="./admin.php?tmuc=Sản phẩm" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Danh sách Sản phẩm</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Sản phẩm";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thành công
                showSuccessToast();
            </script>');
            } elseif ($_GET['dk'] == 'no') {
                echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
                <a href="./admin.php?tmuc=Sản phẩm" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách sản phẩm</a>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                        window.location.href = "admin.php?tmuc=Sản phẩm";
                    }, 1000);
                }

                // Gọi hàm để hiển thị toast khi thất bại
                showErrorToast();
            </script>');
            }
        }
       
// include('product_listing.php');
    }
}
    
    // danh mục
    // thêm 
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmaddtc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
               
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
            </script>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmaddtc') && ($_GET['dk'] == 'no'))
            echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
               
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
            </script>');
    }
// sửa 
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmsuatc') && ($_GET['dk'] == 'yes'))
            echo ('<div id="toast-success" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thành công</div>
               
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
            </script>');
    }
    if (isset($_GET['act'])) {
        if (($_GET['act'] == 'btndmsuatc') && ($_GET['dk'] == 'no'))
            echo ('<div id="toast-error" class="fixed right-0 top-15 flex items-center w-full h-24 max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert" style="display: none; margin-top: 20px; margin-right: 20px;">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-8 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-3xl font-normal">Thất bại</div>
                <a href="./admin.php?tmuc=Thể loại" class="ms-3 text-3xl font-normal text-blue-500 hover:underline">Quay lại danh sách thể loại</a>
               
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
            </script>');
    }
    ?>

</body>

</html>