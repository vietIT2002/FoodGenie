<!-- Thêm Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<!-- MAIN HEADER -->
<!-- <div id="nd">
    <?php
    // include('./connect_db.php');
    // include('./function.php');
    


    // $text = "<i class='fa fa-user fa-fw'> </i>" . $_SESSION['nguoidung'];
    // echo '<div style="text-transform:uppercase;margin-right:5px">' . $text . "</div>";
    
    ?>

</div> -->

<div id="nd" class="cursor-pointer">
    <?php
    include('./connect_db.php'); // Kết nối với cơ sở dữ liệu
    include('./function.php');

    // Lấy tên người dùng từ session
    $tenNguoiDung = $_SESSION['nguoidung'];

    // Truy vấn cơ sở dữ liệu để lấy đường dẫn hình ảnh của nhân viên
    $sql = "SELECT hinh_anh FROM nhanvien WHERE ten_nv = '$tenNguoiDung'";
    $result = mysqli_query($con, $sql); // Sử dụng biến $con ở đây
    if ($row = mysqli_fetch_assoc($result)) {
        $hinhAnh = $row['hinh_anh']; // Đường dẫn hình ảnh từ cơ sở dữ liệu
        // Hiển thị hình ảnh thay cho icon
        echo '<div style="display: flex; align-items: center; text-transform:uppercase; margin-right:5px;">'; // Sử dụng Flexbox
        echo "<img src='../img/$hinhAnh' alt='Hình ảnh nhân viên' style='width:35px; height:35px; border-radius:50%; margin-right:5px;'>";
        echo $tenNguoiDung;
        echo "</div>";
    } else {
        echo "Không tìm thấy thông tin người dùng.";
    }
    ?>
</div>



<!-- Dropdown menu button (ẩn ban đầu) -->
<!-- <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
    class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    Dropdown header
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
    </svg>
</button> -->

<!-- Dropdown menu (căn sang phải) -->
<div id="dropdownInformation"
    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700 dark:divide-gray-600 absolute right-24 top-20">

    <ul class="py-2 text-xl text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">

        <li>
            <a href="./admin.php?tmuc=Đổi mật khẩu"
                class="no-underline hover:no-underline block px-4 py-2 text-2xl text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                Đổi mật khẩu
            </a>

        </li>

    </ul>
    <div class="py-2">
        <a href="./index.php?logout=yes"
            class="no-underline hover:no-underline block px-4 py-2 text-xm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
            Đăng xuất
        </a>
    </div>
</div>

<script>
    // Khi click vào tên người dùng, hiển thị hoặc ẩn menu
    document.getElementById('nd').addEventListener('click', function () {
        const dropdown = document.getElementById('dropdownInformation');
        dropdown.classList.toggle('hidden');
    });

    // Đóng menu khi click bên ngoài
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('dropdownInformation');
        const userInfo = document.getElementById('nd');

        if (!userInfo.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>

<div id="nd1">
    <a href="../index.php" style="display: flex; flex-direction: row;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6" width="25" height="25">
            <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
            <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
        </svg>
        <span>Trang chủ</span>
    </a>
    <!-- <a href="./index.php?logout=yes"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a> -->
</div>