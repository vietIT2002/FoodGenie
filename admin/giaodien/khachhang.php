<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


<?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `khachhang`");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $khachhang = mysqli_query($con, "SELECT * FROM `khachhang` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

        mysqli_close($con);
    ?>


<div class="flex justify-between items-center">
    <div class="flex  pt-10 p pl-8">
        <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl"
            style="color: #0099cc !important;">
            Quản lý khách hàng
        </p>

    </div>


    <div class="flex py-8 pr-6">
     
    </div>
</div>

<div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


    <div class='h-11/12 w-full px-4 bg-base-100 divide-y divide-slate-200'>

        <div class="bg-white shadow-md rounded-lg overflow-hidden ">
            <div class="overflow-x-auto overflow-y-auto h-5/6">
                <table class=" min-w-full bg-white   ">
                    <thead class="h-20 bg-gray-300 sticky top-0 z-10 ">
                        <tr>
                            <th class="font-normal px-6 py-3">Mã khách hàng</th>
                            <th class="font-normal px-6 py-3">Tên khách hàng</th>
                            <th class="font-normal px-6 py-3">Email</th>
                            <th class="font-normal px-6 py-3">Số điện thoại</th>
                            <th class="font-normal px-6 py-3">Tổng tiền mua hàng(VNĐ)</th>
                            <th class="font-normal px-6 py-3">Trạng thái</th>
                            <th class="font-normal px-6 py-3">Thay đổi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($khachhang)) {
                            ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <?php
                                $id = $row["id"];
                                $randomLetters = strtoupper(substr(md5($id), 0, 3));
                                echo $randomLetters . $id;
                            ?>
                            </td>
                            <td class="px-6 py-4"><?= $row['ten_kh'] ?></td>
                            <td class="px-6 py-4"><?= $row['email'] ?></td>
                            <td class="px-6 py-4">
                                <?php
                            $phone = $row['phone'];
                            $maskedPhone = substr_replace($phone, '***', -3);
                            echo $maskedPhone;
                            ?>
                            </td>
                            <td class="px-6 py-4">

                                <?= number_format($row['tong_tien_muahang'], 0, '', '.') ?>

                            </td>
                            <td class="px-6 py-4">

                                <form method="POST" action="./xulythem.php?id=<?= $row['id'] ?>">
                                    <input type="checkbox" name="trangthai"
                                        <?php if($row['trangthai']==0) echo "checked";?>>

                            </td>
                            <td class="px-6 py-4">

                                <button type="submit" name="btnkhtt">
                                    <i class="fa fa-pencil-square-o text-green-600 hover:text-green-800"
                                        aria-hidden="true"></i>
                                </button>

                            </td>
                            </form>
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
    </div>
    <?php
    }
    ?>