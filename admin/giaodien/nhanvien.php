<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>

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
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 5;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `nhanvien`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $nhanvien = mysqli_query($con, "SELECT * FROM `nhanvien` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

        mysqli_close($con);
        ?>
        <div class="flex justify-between items-center">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white">
                Quản lý nhân viên
            </p>
            <div class="flex">
                <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                class="w-[50px] h-[100px] p-2 rounded-[15px] bg-red-600 hover:bg-rose-400 text-white" type="button">
                    Toggle modal
                </button>
                <!-- <a href="admin.php?act=addnv"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fa fa-plus mr-2"></i> Thêm mới
                </a> -->


            </div>
        </div>
        <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


            <div class='h-full w-full  bg-base-100 divide-y divide-slate-200'>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class=" min-w-full bg-white  ">
                        <thead class="h-20 bg-gray-300 ">
                            <tr>
                                <th class=" pl-8  font-normal ">ID</th>
                                <th class="font-normal">Ảnh</th>
                                <th class="font-normal">Tên nhân viên</th>
                                <th class="font-normal">Username</th>
                                <th class="font-normal">Email</th>
                                <th class="font-normal">Password</th>
                                <th class="font-normal">SĐT</th>
                                <th class="font-normal">Sửa</th>
                                <th class="font-normal">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tbody class="bg-white divide-y divide-gray-200"> -->
                            <?php while ($row = mysqli_fetch_array($nhanvien)) { ?>
                                <tr class="  bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="pl-8 "><?= $row['id'] ?></td>
                                    <td><img class="h-36 w-36 rounded-0" src="../img/<?= $row['hinh_anh'] ?>"
                                            alt="Ảnh nhân viên" />
                                    </td>
                                    <td><?= $row['ten_nv'] ?></td>
                                    <td><?= $row['ten_dangnhap'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= str_repeat('*', strlen($row['mat_khau'])) ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td>
                                        <a href="admin.php?act=suanv&id=<?= $row['id'] ?>"
                                            class="text-green-600 hover:text-green-800">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="admin.php?act=xoanv&id=<?= $row['id'] ?>"
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            class="text-red-600 hover:text-red-800">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- </div> -->

                    <!-- Phân trang -->
                    <?php include './pagination.php'; ?>
                </div>



            </div>
        </div>







    <?php } ?>




    <!-- Modal toggle button -->
    <!-- <button data-modal-target="default-modal" data-modal-toggle="default-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Toggle modal
    </button> -->

    <!-- Include the modal content -->
    <?php

    include 'nhanvien_adding.php';
    ?>

</body>

</html>