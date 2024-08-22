<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body >

    <h1 class="text-2xl font-bold mb-6">Thêm tài khoản</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form name="taikhoan-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
  
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Tài khoản:</label>
                <input class="form-control w-full px-3 py-2 border rounded-md" type="text" name="tendangnhap" value="" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Mật khẩu:</label>
                <input class="form-control w-full px-3 py-2 border rounded-md" type="password" name="matkhau" value="" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Họ và tên:</label>
                <input class="form-control w-full px-3 py-2 border rounded-md" type="text" name="name" value="" />
            </div>

            <div class="flex justify-center mt-6">
                <button class="btn bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-md mr-4" name="btntkadd" type="submit" title="Lưu tài khoản">Thêm</button>
                <button class="btn bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-md" type="reset" title="Hủy">Hủy</button>
            </div>
            
        </form>
    </div>

</body>

</html>
