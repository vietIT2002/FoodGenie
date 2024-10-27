<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `theloai` WHERE `id` = " . $_GET['id']);
    $theloai = $result->fetch_assoc();
}
?>


<div class="max-w-full mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between border-b pb-4 mb-6">
        <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
            Cập nhật thể loại
        </p>
        <a href="./admin.php?tmuc=Thể loại">
            <button type="button" class="text-gray-500 hover:bg-gray-200 p-2 rounded-full">
                <i class="fas fa-times"></i>
            </button>
        </a>
    </div>
    <form id="form" name="theloai-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>"
        enctype="multipart/form-data">
        <div class="flex gap-6 mx-20">


            <div class="w-full flex-center ">
                <div class="mb-4">
                    <label class="block text-gray-700 text-2xl ">Tên thể loại:</label>
                    <input
                        class="w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        id="category_product" type="text" name="name" value="<?= (!empty($theloai) ? $theloai['ten_tl'] : "") ?>" />
                </div>
                <span style="color: red; font-size: 0.75em; margin-left: 10px;" id="category_error"></span>

                <!-- <div class="mb-4">
                    <label class="block  text-2xl text-gray-700">Số lượng:</label>
                    <input
                        class=" w-full px-4 py-2 border text-2xl rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        type="text" name="tong_sp" value="<?= (!empty($theloai) ? $theloai['tong_sp'] : "") ?>" />
                </div> -->

            </div>
        </div>

        <div class="flex justify-center mt-8">
            <button class="px-6 py-2 bg-red-600 text-3xl text-white rounded-lg hover:bg-red-700" name="btntlsua"
                type="submit">Cập nhật</button>
            <button class="ml-4 px-6 py-2 bg-gray-400  text-3xl text-white rounded-lg hover:bg-gray-500"
                type="reset">Hủy</button>
        </div>
</div>
<script src="./js/theloai_pro.js"></script>

</form>
</div>