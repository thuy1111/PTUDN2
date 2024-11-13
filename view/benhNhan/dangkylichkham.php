<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Đăng ký lịch khám bệnh</title>
    <link rel="shortcut icon" href="../../assets/images/logo/hospital.png" type="image/x-icon">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F0FFFE]">
    <div class="w-full">
        <div class="flex justify-between items-center w-full p-4 border-b">
            <div class="flex flex-col items-center">
                <img
                    src="../../assets/images/logo/hospital.png"
                    alt="Hospital logo"
                    class="size-16 mb-2" />
                <h1 class="text-xl font-bold">HOSPITAL</h1>
            </div>
            <div class="flex justify-around items-center">
                <div class="flex items-center mr-8">
                    <h3 class="text-xl font-bold mr-1">BỆNH NHÂN</h3>
                    <i class="fa-regular fa-clipboard text-2xl ml-1"></i>
                </div>
                <div class="flex items-center ml-8">
                    <span class="mr-1"> CHOUMENDEN </span>
                    <i class="fas fa-user-circle text-4xl ml-1"></i>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/4 bg-[#D1E7E7] px-6 py-4 ">
                <div class="text-2xl font-bold mb-2 pb-2 text-center border-b border-black">DÀNH CHO BỆNH NHÂN</div>
                <ul>
                    <li class="mb-2 border-b border-black">
                        <a class="block p-2" href="index.php"> TRANG CHỦ </a>
                    </li>
                    <li class="mb-2 border-b border-black">
                        <a class="block p-2" href="xemlichkham.php"> XEM LỊCH KHÁM </a>
                    </li>
                    <li class="mb-2 border-b border-black">
                        <a class="block p-2" href="xemphieukham.php">XEM PHIẾU KHÁM BỆNH</a>
                    </li>
                    <li class="mb-2 border-b border-black">
                        <a class="block p-2 font-semibold" href="dangkylichkham.php"> ĐĂNG KÝ KHÁM BỆNH </a>
                    </li>
                </ul>
            </div>
            <div class="w-3/4 flex justify-between h-max">
                <div class="px-6 py-4 rounded shadow-md w-full">
                    <div class="text-xl font-bold mb-4 pb-3 border-b border-black">ĐĂNG KÝ KHÁM BỆNH</div>
                    <div class="flex mb-4">
                        <button class="bg-[#D1E7E7] rounded-md text-gray-800 px-4 py-2 mr-2">Đăng ký lịch khám</button>
                        <button class="bg-[#D1E7E7] rounded-md text-gray-800 px-4 py-2 mr-2">Đăng Ký</button>
                        <button class="bg-[#D1E7E7] rounded-md text-gray-800 px-4 py-2">Hủy</button>
                    </div>
                    <div class="text-xl font-bold my-4 py-2 border-b border-black">THÔNG TIN CHUNG</div>
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block mb-1"> KHOA QUẢN LÝ </label>
                            <select name="" id="" class="w-full p-2 border border-gray-300 rounded-md outline-blue-400">
                                <option value=""></option>
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1"> BÁC SĨ </label>
                            <select name="" id="" class="w-full p-2 border border-gray-300 rounded-md outline-blue-400">
                                <option value=""></option>
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1"> CHUYÊN KHOA </label>
                            <select name="" id="" class="w-full p-2 border border-gray-300 rounded-md outline-blue-400">
                                <option value=""></option>
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1"> TÊN PHÒNG KHÁM </label>
                            <select name="" id="" class="w-full p-2 border border-gray-300 rounded-md outline-blue-400">
                                <option value=""></option>
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1"> TRẠNG THÁI </label>
                            <select name="" id="" class="w-full p-2 border border-gray-300 rounded-md outline-blue-400">
                                <option value=""></option>
                                <option value="">1</option>
                                <option value="">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-xl font-bold mb-4 pb-2 border-b border-black">LỊCH ĐĂNG KÝ</div>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-[#D1E7E7]">
                                <th class="border border-gray-300 p-2">STT</th>
                                <th class="border border-gray-300 p-2">TÊN BÁC SĨ</th>
                                <th class="border border-gray-300 p-2">CHUYÊN KHOA</th>
                                <th class="border border-gray-300 p-2">THỜI GIAN</th>
                                <th class="border border-gray-300 p-2">ĐỊA ĐIỂM</th>
                                <th class="border border-gray-300 p-2">TRẠNG THÁI</th>
                                <th class="border border-gray-300 p-2">GHI CHÚ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">1</td>
                                <td class="border border-gray-300 p-2">VÕ NGỌC CHÂU</td>
                                <td class="border border-gray-300 p-2">KHOA NGOẠI</td>
                                <td class="border border-gray-300 p-2">3-10-2024</td>
                                <td class="border border-gray-300 p-2">PHÒNG 0175</td>
                                <td class="border border-gray-300 p-2">Đang hoạt động</td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2 text-center">2</td>
                                <td class="border border-gray-300 p-2">LÊ HOÀNG PHÚC</td>
                                <td class="border border-gray-300 p-2">KHOA TRĨ</td>
                                <td class="border border-gray-300 p-2">4-10-2024</td>
                                <td class="border border-gray-300 p-2">PHÒNG 1475</td>
                                <td class="border border-gray-300 p-2">Đang hoạt động</td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>