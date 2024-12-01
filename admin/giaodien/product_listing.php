<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Thêm Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;

  
    $query = "SELECT * FROM `sanpham` WHERE `trangthai` = 0";

    
    if (isset($_POST['search']) && !empty($_POST['search'])) {
        $search = mysqli_real_escape_string($con, $_POST['search']);
        $query .= " AND (
            `ten_sp` LIKE '%$search%' OR 
            `so_luong` LIKE '%$search%' OR 
            `xuat_xu` = '$search' -- Chỉ khớp chính xác cho xuất xứ
        )";
    }
   
    if (isset($_GET['sapxep'])) {
        $sort = $_GET['sapxep'];
        switch ($sort) {
            case 'idgiam':
                $query .= " ORDER BY `id` DESC";
                break;
            case 'idtang':
                $query .= " ORDER BY `id` ASC";
                break;
            case 'tengiam':
                $query .= " ORDER BY `ten_sp` DESC";
                break;
            case 'tentang':
                $query .= " ORDER BY `ten_sp` ASC";
                break;
            case 'tongiam':
                $query .= " ORDER BY `so_luong` DESC";
                break;
            case 'tontang':
                $query .= " ORDER BY `so_luong` ASC";
                break;
            case 'bangiam':
                $query .= " ORDER BY `sl_da_ban` DESC";
                break;
            case 'bantang':
                $query .= " ORDER BY `sl_da_ban` ASC";
                break;
            default:
                $query .= " ORDER BY `ngay_tao`";  
        }
    } else {
        $query .= " ORDER BY `ngay_tao`";  
    }

   
    $query .= " LIMIT " . $item_per_page . " OFFSET " . $offset;


    $products = mysqli_query($con, $query);

   
    $totalRecordsQuery = "SELECT * FROM `sanpham` WHERE `trangthai` = 0";
     if (isset($_POST['search']) && !empty($_POST['search'])) {
        $totalRecordsQuery .= " AND (
            `ten_sp` LIKE '%$search%' OR 
            `so_luong` LIKE '%$search%' OR 
            `xuat_xu` = '$search' -- Chỉ khớp chính xác cho xuất xứ
        )";
    }
    $totalRecords = mysqli_query($con, $totalRecordsQuery);
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);

        mysqli_close($con);
        ?>



    <div class="flex justify-between items-center">
        <div class="flex  pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl"
                style="color: #0099cc !important;">
                Quản lý sản phẩm
            </p>

        </div>


        <div class="flex py-8 pr-6">
            <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                class="w-40 h-16 p-2 rounded-[15px] bg-blue-500 hover:bg-blue-500 text-white text-3xl rounded-full "
                type="button">
                Thêm
            </button>

        </div>
    </div>
    <form action="./admin.php?muc=4&tmuc=Sản%20phẩm" method="POST">

        <div class="flex justify-end space-x-4 pb-2 pr-4">
            <input type="text" name="search" id="search"
                class="p-2 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Nhập mã cần tìm..."
                value=" <?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
            <button type="submit" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


            <div class='h-11/12 w-full px-4 bg-base-100 divide-y divide-slate-200'>

                <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                    <div class="overflow-x-auto overflow-y-auto h-5/6">
                        <table class=" min-w-full bg-white   ">
                            <thead class="h-20 bg-gray-300 sticky top-0 z-10">
                                <tr>
                                    <th class="font-normal px-6 py-3">Mã sản phẩm <div><a
                                                href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idgiam"><i
                                                    class="fa fa-arrow-down"></i></a>
                                            <a href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idtang"><i
                                                    class="fa fa-arrow-up"></i></a>
                                        </div>

                                    </th>
                                    <th class="font-normal px-6 py-3">Hình ảnh </th>
                                    <th class="font-normal px-6 py-3">Tên sản phẩm <a
                                            href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tengiam"><i
                                                class="pdl-5px fa fa-arrow-down"></i></a><a
                                            href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tentang"><i
                                                class="fa fa-arrow-up"></i></a></th>
                                    <th class="font-normal px-6 py-3">Số lượng tồn<br> <a
                                            href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tongiam"><i
                                                class="pdl-5px fa fa-arrow-down"></i></a><a
                                            href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tontang"><i
                                                class="fa fa-arrow-up"></i></a></th>
                                    <th class="font-normal px-6 py-3">Đã bán <br> <a
                                            href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bangiam"><i
                                                class="pdl-5px fa fa-arrow-down"></i></a><a
                                            href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bantang"><i
                                                class="fa fa-arrow-up"></i></a></th>


                                    <th class="font-normal px-6 py-3">Khối lượng </th>
                                    <th class="font-normal px-6 py-3">Xuất xứ</th>
                                    <!-- <th class="font-normal px-6 py-3">Trạng thái </th> -->
                                    <th class="font-normal px-6 py-3">Chỉnh sửa</th>
                                    <th class="font-normal px-6 py-3">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            while ($row = mysqli_fetch_array($products)) {
                                ?>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        <div class="pts-abl">SP<?= $row['id'] ?></div>
                                    </td>
                                    <td class="pst-rela d-flex">

                                        <img class="h-28 w-328 rounded-full" src="../img/<?= $row['hinh_anh'] ?>" />
                                        <?php !empty($row['name']) ? $row['name'] : '' ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="pts-abl"><?= $row['ten_sp'] ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="pts-abl"><?= $row['so_luong'] ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="pts-abl"><?= $row['sl_da_ban'] ?></div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="pts-abl"><?= $row['khoi_luong'] ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="pts-abl"><?= $row['xuat_xu'] ?></div>
                                    </td>
                                    <!-- <td class="px-6 py-4">
                                <div class="pts-abl"><?php if ($row['trangthai'] == '0')
                                            echo "Hiển thị";
                                        else
                                            echo "Bị ẩn" ?></div>
                               
                            </td> -->
                                    <td class="px-6 py-4">
                                        <div class="pts-abl"><a class="btn btn-outline-success"
                                                href="admin.php?act=sua&id=<?= $row['id'] ?>"><i
                                                    class=" update_product fa-solid fa-pen-to-square text-green-500"></i></a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="pts-abl">
                                            <?php if ($row['trangthai'] == '0') { ?><a class="btn btn-outline-danger"
                                                href="admin.php?act=xoa&id=<?= $row['id'] ?>"
                                                onclick="return confirm('Bạn có muốn xóa sản phẩm này không?');"><i
                                                    class="fa fa-trash-o text-red-500"
                                                    aria-hidden="true"></i></a><?php } ?>
                                        </div>
                                    </td>
                                    <div class="clear-both"></div>
                                </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            include './pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </form>
    <?php
    }
    ?>

    <?php

    include 'product_adding.php';

    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>