<!-- Thêm Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $danhmuc1=mysqli_query($con,"SELECT * FROM `danhmuc`");
        // $row = mysqli_fetch_array($danhmuc);
        $quyendanhmuc1 = mysqli_query($con, "SELECT * FROM `quyendahmuc`,`danhmuc` WHERE `id_danhmuc`=`id` AND`id_quyen`=".$_GET['id']."  ORDER BY `id` ASC ");
        $row1 = mysqli_fetch_all($quyendanhmuc1, MYSQLI_ASSOC);
        $quyendanhmuc1List = array();
        if(!empty($row1)){
            foreach($row1 as $rowl1){
                $quyendanhmuc1List[] = $rowl1['id_danhmuc'];
            }
        }
        mysqli_close($con);
    ?>
<div class="flex justify-between items-center">
    <div class="flex  pt-10 p pl-8">
        <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl">
            Sửa quyền - Danh mục
        </p>

    </div>



</div>
<div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


    <div class='h-full w-full px-4 bg-base-100 divide-y divide-slate-200'>
        <form action="./xulythem.php?idq=<?= $_GET['id']?>" method="POST">

            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">

                <input type="search" name="tendanhmuc" value="<?= $_GET['tquyen'] ?>"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Mockups, Logos..." required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    name="btndmsua">Lưu</button>
            </div>
            <!-- <input type="text" name="tendanhmuc" value="<?= $_GET['tquyen'] ?>">
            <input type="submit" name="btndmsua" value="Lưu"> -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <table class=" min-w-full bg-white   ">
                    <thead class="h-20 bg-gray-300 ">
                        <tr>
                            <th class=" pl-8  font-normal ">Tên danh muc</th>
                            <th class=" pl-8  font-normal ">Chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            while($row = mysqli_fetch_array($danhmuc1)) {
                            ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4"><?= $row['ten_danhmuc'] ?></td>
                            <td class="px-6 py-4"><input type="checkbox" value="<?= $row['id']?>" name="row[]"
                                    <?php if(in_array($row['id'], $quyendanhmuc1List))echo "checked"?>> </td>
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