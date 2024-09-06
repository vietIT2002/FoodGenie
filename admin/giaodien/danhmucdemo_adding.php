<!-- Thêm Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<?php
include_once("./connect_db.php");
if (!empty($_SESSION['nguoidung'])) {
    $danhmuc1 = mysqli_query($con, "SELECT * FROM `danhmuc`");
    // $row = mysqli_fetch_array($danhmuc);
    $quyendanhmuc1 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=1  ORDER BY `id` ASC ");
    $row1 = mysqli_fetch_all($quyendanhmuc1, MYSQLI_ASSOC);
    $quyendanhmuc1List = array();
    if (!empty($row1)) {
        foreach ($row1 as $rowl1) {
            $quyendanhmuc1List[] = $rowl1['id_danhmuc'];
        }
    }
    mysqli_close($con);
    ?>
<div class="flex justify-between items-center">
    <div class="flex  pt-10 p pl-8">
        <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">
            Thêm quyền - danh mục
        </p>

    </div>
</div>

<div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


    <div class='h-full w-full px-4 bg-base-100 divide-y divide-slate-200'>
        <form action="./xulythem.php" method="POST">
            <input type="text" name="tendanhmuc" value="">
            <input type="submit" name="btndmadd" value="Lưu">
            <div>

            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <table class=" min-w-full bg-white ">
                    <thead class="h-20 bg-gray-300 ">
                        <tr>
                            <th class=" pl-8  font-normal ">Tên danh muc</th>
                            <th class=" pl-8  font-normal ">Chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while ($row = mysqli_fetch_array($danhmuc1)) {
                                ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4"><?= $row['ten_danhmuc'] ?></td>
                            <td class="px-6 py-4"><input type="checkbox" value="<?= $row['id'] ?>" name="row[]"> </td>
                            <div class="clear-both"></div>
        </form>
        </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</div>
<div class="clear-both"></div>
<?php
}
?>