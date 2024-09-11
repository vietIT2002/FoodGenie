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
        $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `trangthai` = 0 ");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `trangthai` = 0 ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        if (isset($_GET['sapxep'])) {
            if ($_GET['sapxep'] == 'idgiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0 ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'idtang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0  ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tengiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0 ORDER BY `ten_sp` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tentang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0 ORDER BY `ten_sp` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tongiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0 ORDER BY `so_luong` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'tontang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0 ORDER BY `so_luong` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'bangiam')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0 ORDER BY `sl_da_ban` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
            if ($_GET['sapxep'] == 'bantang')
                $products = mysqli_query($con, "SELECT * FROM `sanpham`WHERE `trangthai` = 0 ORDER BY `sl_da_ban` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        mysqli_close($con);
        ?>



        <div class="flex justify-between items-center">
            <div class="flex  pt-10 p pl-8">
                <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">
                    Quản lý sản phẩm
                </p>

            </div>


            <div class="flex py-8 pr-6">
                <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                    class="w-52 h-24 p-2 rounded-[15px] bg-red-600 hover:bg-rose-400 text-white text-3xl rounded-full "
                    type="button">
                    Thêm mới
                </button>
                <!-- <div class="buttons">
                <a href="admin.php?act=add"> <i class="fa fa-plus" aria-hidden="true"> </i>Thêm </a>
            </div> -->
            </div>
        </div>
        <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


            <div class='h-11/12 w-full px-4 bg-base-100 divide-y divide-slate-200'>

                <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                    <table class=" min-w-full bg-white   ">
                        <thead class="h-20 bg-gray-300 ">
                            <tr>
                                <th class="font-normal px-6 py-3">Id <a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idgiam"><i
                                            class="pdl-5px fa fa-arrow-down"></i></a><a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=idtang"><i
                                            class="fa fa-arrow-up"></i></a></th>
                                <th class="font-normal px-6 py-3">Ảnh </th>
                                <th class="font-normal px-6 py-3">Tên sản phẩm <a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tengiam"><i
                                            class="pdl-5px fa fa-arrow-down"></i></a><a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tentang"><i
                                            class="fa fa-arrow-up"></i></a></th>
                                <th class="font-normal px-6 py-3">Số lượng tồn <a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tongiam"><i
                                            class="pdl-5px fa fa-arrow-down"></i></a><a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=tontang"><i
                                            class="fa fa-arrow-up"></i></a></th>
                                <th class="font-normal px-6 py-3">Số lượng bán <a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bangiam"><i
                                            class="pdl-5px fa fa-arrow-down"></i></a><a
                                        href="./admin.php?muc=4&tmuc=Sản%20phẩm&sapxep=bantang"><i
                                            class="fa fa-arrow-up"></i></a></th>


                                <th class="font-normal px-6 py-3">Khối lượng </th>
                                <th class="font-normal px-6 py-3">Xuất xứ</th>
                                <th class="font-normal px-6 py-3">Trạng thái </th>
                                <th class="font-normal px-6 py-3">Sửa</th>
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
                                        <div class="pts-abl"><?= $row['id'] ?></div>
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
                                    <td class="px-6 py-4">
                                        <div class="pts-abl"><?php if ($row['trangthai'] == '0')
                                            echo "Hiển thị";
                                        else
                                            echo "Bị ẩn" ?></div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="pts-abl"><a class="btn btn-outline-success"
                                                    href="admin.php?act=sua&id=<?= $row['id'] ?>"><i
                                                    class=" update_product fa-solid fa-pen-to-square"></i></a></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="pts-abl">
                                            <?php if ($row['trangthai'] == '0') { ?><a class="btn btn-outline-danger"
                                                    href="admin.php?act=xoa&id=<?= $row['id'] ?>"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
                                        </div>
                                    </td>
                                    <div class="clear-both"></div>
                                </tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            include './pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
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