<div id="extralarge-modal" tabindex="-1"
    class="fixed top-0 right-0  z-50 hidden h-full md:w-1/4  overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
    <div class="relative  h-full max-h-full w-full ">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 h-full">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div class="divider mt-1"></div>
                <p class="text-4xl py-5 font-medium text-red-800 dark:text-white">
                    Thông tin nhà cung cấp
                </p>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-700 rounded-lg text-lg w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="extralarge-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form name="nhanvien-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data"
                class="p-4 md:p-5 ">
                <div class="flex flex-wrap gap-4">

                    <div class="w-full md:w-1/2 ">
                        <!-- <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">ID Nhân viên:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                name="id" value="">
                        </div> -->
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">Tên nhà cung cấp:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="text"
                                name="name" value="">
                        </div>
                        <div class="mb-4 flex items-center ">
                            <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Email:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="email"
                                name="email" value="" placeholder="VD: abc@gmail.com">
                        </div>
                        <div class="mb-4 flex items-center">
                            <label class="w-1/3  pl-4 text-2xl text-gray-700 dark:text-white">Website:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="url"
                                name="website" value="" placeholder="VD: https://www.google.com" value="">
                        </div>
                        <div class="mb-4 flex items-center ">
                            <label class="w-1/3 pl-4 text-2xl text-gray-700 dark:text-white">SĐT:</label>
                            <input class="w-2/3 text-2xl pl-4 h-16 p-[9px 13px] focus:outline-none" type="tel"
                                name="sdt" value="" pattern="[0]{1}[0-9]{9}" placeholder="VD: 0123456789">
                        </div>

                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button
                        class="btn btn-danger w-44 pl-2 h-16 text-2xl bg-red-500 text-white px-4 py-2 rounded-md shadow-sm mr-2"
                        name="btnnccadd" type="submit" title="Lưu nhà cung cấp" value="Lưu">Thêm</button>
                    <button
                        class="btn btn-primary w-44 pl-2 h-16 text-2xl bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm"
                        type="reset" value="Hủy">Hủy</button>
                </div>
            </form>


        </div>
    </div>
</div>
<!-- <script>
    const fileInput = document.getElementById('fileInput');
    const imageDisplay = document.getElementById('imageDisplay');

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            imageDisplay.src = e.target.result;
        }

        reader.readAsDataURL(file);
    });
</script> -->