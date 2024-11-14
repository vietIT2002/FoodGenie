<!-- Thêm Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $con = mysqli_connect($host, $user, $password, $database);
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `quyen`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $quyen = mysqli_query($con, "SELECT * FROM `quyen` WHERE `id` != 1 ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "");
    // $quyen1=mysqli_query($con,"SELECT `id`, `ten_quyen` FROM `quyen`"); 
    // $data=$quyen1->fetch_all(MYSQLI_ASSOC);

    ?>
<div class="flex justify-between items-center">
    <div class="flex  pt-10 p pl-8">
        <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl"
            style="color: #0099cc !important;">
            Quản lý quyền- danh mục
        </p>

    </div>


    <div class="flex py-8 pr-6">
        <button class="w-40 h-16 p-2 rounded-[15px] bg-blue-500 hover:bg-blue-500 text-white text-3xl rounded-full "
            type="button">
            <a href="admin.php?act=addquyen">Thêm</a>
        </button>
        <!-- <div class="buttons">
            <a href="admin.php?act=addquyen">Thêm Quyền</a>
        </div> -->
    </div>
</div>




<div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


    <div class='h-11/12 w-full px-4 bg-base-100 divide-y divide-slate-200'>

        <div class="bg-white shadow-md rounded-lg overflow-hidden ">
            <table class=" min-w-full bg-white   ">
                <thead class="h-20 bg-gray-300 ">
                    <tr>
                        <!-- <th class=" px-6 py-4  font-normal ">Mã quyê</th> -->
                        <th class=" px-6 py-4  font-normal ">Tên quyền</th>
                        <th class=" px-6 py-4  font-normal ">Chỉnh sửa quyền</th>
                        <th class=" px-6 py-4  font-normal ">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($quyen)) {
                            ?>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <!-- <td class="px-6 py-4"><?= $row['id'] ?></td> -->
                        <td class="px-6 py-4"><?= $row['ten_quyen'] ?></td>
                        <td class="px-6 py-4"><a
                                href="admin.php?act=suaquyen&id=<?= $row['id'] ?>&tquyen=<?= $row['ten_quyen'] ?>"> <i
                                    class="fa fa-pencil-square-o text-green-500" aria-hidden="true"></i></a>
                        </td>
                        <td class="px-6 py-4"><a href="admin.php?act=xoaquyen&id=<?= $row['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete this item?');"> <i
                                    class="fa fa-trash-o text-red-600" aria-hidden="true"></i></a></td>
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