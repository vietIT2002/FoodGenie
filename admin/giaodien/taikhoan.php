<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $con = mysqli_connect($host, $user, $password, $database);
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT `trang_thai`, `id_quyen`, `username`, `pass`, `fullname`,`id`, `ten_quyen` FROM `taikhoang`, `quyen` WHERE `id`=`id_quyen`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $taikhoang = mysqli_query($con, "SELECT `trang_thai`, `id_quyen`, `username`, `pass`, `fullname`,`id`, `ten_quyen` FROM `taikhoang`, `quyen` WHERE `id`=`id_quyen` ORDER BY `username` ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "");
    $quyen1 = mysqli_query($con, "SELECT `id`, `ten_quyen` FROM `quyen`");
    $data = $quyen1->fetch_all(MYSQLI_ASSOC);

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Thêm Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="flex justify-between items-center">
        <div class="flex  pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl" >Tài khoản</p>
        </div>

        <div class="flex py-8 pr-6">
            <!-- <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                class="w-52 h-24 p-2 rounded-[15px] bg-red-600 hover:bg-rose-400 text-white text-3xl rounded-full "
                type="button">
                Thêm mới
            </button> -->
            <div class="buttons">
                <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                    class="w-52 h-24 p-2 rounded-[15px] bg-red-600 hover:bg-rose-400 text-white text-3xl rounded-full "
                    type="button">
                    Thêm mới
                </button>
            </div>

        </div>
    </div>
    <!-- <div class="buttons">
                <a href="admin.php?act=addtk"> <i class="fa fa-plus" aria-hidden="true"> </i>Thêm mới </a>
            </div> -->
    <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


        <div class='h-full w-full px-4 bg-base-100 divide-y divide-slate-200'>

            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <table class=" min-w-full bg-white   ">
                    <thead class="h-20 bg-gray-300 ">
                        <tr>
                            <th class="font-normal px-6 py-3">Tên tài khoản</th>
                            <th class="font-normal px-6 py-3">Mật khẩu</th>
                            <th class="font-normal px-6 py-3">Họ và tên</th>
                            <th class="font-normal px-6 py-3">Quyền</th>
                            <th class="font-normal px-6 py-3">Trạng thái</th>
                            <th class="font-normal px-6 py-3">Thay đổi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($taikhoang)) {
                                ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        </tr>
                        <td class="px-6 py-4"><?= $row['username'] ?></td>
                        <td class="px-6 py-4">
                            <?= str_repeat('*', strlen($row['pass'])) ?>
                        </td>
                        <td class="px-6 py-4"><?= $row['fullname'] ?></td>
                        <td class="px-6 py-4">

                            <form method="POST" action="./xulythem.php?id=<?= $row['username'] ?>">
                                <select name="quyen">
                                    <option value="<?= $row['id_quyen'] ?>"><?= $row['ten_quyen'] ?></option>
                                    <?php foreach ($data as $quyen2) { ?>
                                    <option value="<?= $quyen2['id'] ?>">
                                        <?= $quyen2['ten_quyen'] ?>
                                    </option><?php } ?>
                                </select>

                        </td>
                        <td class="px-6 py-4">

                            <input type="checkbox" name="trangthai" <?php if ($row['trang_thai'] == 0)
                                        echo "checked"; ?>>
                            <?php if ($row['trang_thai'] == 0)
                                        echo "Bình thường";
                                    else
                                        echo "Bị khóa"; ?>

                        </td>
                        <td class="px-6 py-4">
                            <input type="submit" name="btntksua" value="Thay đổi">
                        </td>
                        </form>
                        <!-- <td><?php if ($row['trang_thai'] == 1) { ?>
                                        <a href="admin.php?act=xoatk&id=<?= $row['username'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"></a><?php } ?></td> -->
                        <div class="clear-both"></div>

                        </tr>
                        <?php } ?>
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

    include 'taikhoan_adding.php';

    ?>
</body>

</html>