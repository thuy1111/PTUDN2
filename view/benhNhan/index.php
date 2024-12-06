<html lang="en">
<?php
error_reporting(1);
session_start();

if (!isset($_SESSION["loginBN"]))
    echo "<script>
        if (alert('Bạn không có quyền truy cập!') != false)
            window.location.href = '../dangNhap';
    </script>";
?>
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Trang chủ | Bệnh nhân</title>
    <link rel="shortcut icon" href="../../assets/images/logo/hospital.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <i class="fa-solid fa-clipboard-user text-2xl mr-1"></i>
                </div>
                <div class="flex items-center ml-8">
                    <i class="fas fa-user-circle text-4xl ml-1"></i> 
                    <span class="mr-1 ml-1 font-bold text-2xl"> <?php echo end(explode(" ", $_SESSION["customer"][1])); ?> </span>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/4 bg-[#D1E7E7] px-6 py-4 ">
                <div class="text-2xl font-bold mb-2 pb-2 text-center border-b border-black">DÀNH CHO BỆNH NHÂN</div>
                <ul class="navbar">
                    <li class="border-b border-black">
                        <a class="block p-2" href="index.php" id="trangchu"> TRANG CHỦ </a>
                    </li>
                    <li class="border-b border-black">
                        <a class="block p-2" href="index.php?p=xemlich" id="xemlich"> XEM LỊCH KHÁM </a>
                    </li>
                    <li class="border-b border-black">
                        <a class="block p-2" href="index.php?p=xemphieu" id="xemphieu">XEM PHIẾU KHÁM BỆNH</a>
                    </li>
                    <li class="border-b border-black">
                        <a class="block p-2" href="index.php?p=dkkham" id="dkkham"> ĐĂNG KÝ KHÁM BỆNH </a>
                    </li>
                    <li class="border-b bg-gray-300 border-black">
                        <a class="block p-2" href="../../view/dangXuat/"> ĐĂNG XUẤT </a>
                    </li>
                </ul>
            </div>
            <div class="w-3/4 flex justify-between">
                <?php
                $p = "";

                if (isset($_GET["p"])) {
                    $p = $_GET["p"];
                } else $p = "trangchu";

                if ($p != "trangchu") {
                    include_once($p . ".php");
                } else {
                    echo "<div class='px-6 py-4 rounded shadow-md w-full'>
                        <div class='text-xl font-bold mb-4 pb-3 border-b border-black'>TRANG CHỦ</div>
                    </div>";
                    include_once("index.php");
                }
                ?>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const navlinks = document.querySelectorAll(".navbar a");
                let idActive = "trangchu";

                navlinks.forEach(function(item) {
                    item.addEventListener("click", () => {
                        navlinks.forEach((i) => i.classList.remove("font-bold"));
                    });
                });

                if (window.location.search != "")
                    idActive = window.location.search.slice(3);

                window.addEventListener("load", () => {
                    navlinks.forEach(function(item) {
                        if (item.id == idActive) item.classList.add("font-bold");
                        else item.classList.remove("font-bold");
                    });
                });

            });
        </script>
</body>

</html>