<?php
session_start();
require_once("../../controller/cBenhNhan.php");

if (isset($_SESSION['customer'][0])) {
    $maBenhNhan = $_SESSION['customer'][0];
    $tenBenhNhan = $_SESSION['customer'][1]; // Ensure this is set when logging in
    $controller = new cBenhNhan();
    $dsLichKham = $controller->hienThiLichKhamTheoBenhNhan($maBenhNhan);
} else {
    echo "<script>alert('Vui lòng đăng nhập!'); window.location.href = '../dangNhap/';</script>";
    exit();
}
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Xem lịch khám</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/logo/hospital.png">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px; 
            line-height: 1.6; 
            color: #333; 
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: bold;
            color: #444; 
            letter-spacing: 0.5px; 
        }

        .table {
    width: 100%; 
    table-layout: fixed; 
    font-size: 14px;
    line-height: 1.5;
    color: #444;
}

.table th, .table td {
    padding: 12px;
    text-align: left; 
}

.table th {
    background-color: #f7f7f7;
    color: #333;
}

.table-hover tbody tr:hover {
    background-color: #f0f0f0;
}


.table-responsive {
    width: 100%;
    overflow-x: auto; 
    margin: 0 auto; 
}

        input, button {
            font-size: 14px; 
        }

        input:focus, button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); 
        }

        .form-control {
            font-size: 14px;
            padding: 8px;
            border-radius: 4px;
        }

        .btn-custom-search, .btn-view {
            font-size: 14px; 
            padding: 8px 15px; 
            border-radius: 5px;
        }

        
#navigation li {
    position: relative;
}

#navigation li a {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
}

#navigation li:hover > .dropdown-content {
    display: block;
}

.dropdown-content {
    display: none;
    position: absolute;
    left: 0;
    top: 100%;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    min-width: 200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

.dropdown-content li {
    padding: 8px 12px;
    border-bottom: 1px solid #eee;
}

.dropdown-content li:last-child {
    border-bottom: none;
}

.dropdown-content li a {
    color: #555;
    font-size: 14px;
    padding: 8px;
    display: block;
    text-decoration: none;
}

.dropdown-content li a:hover {
    background-color: #007bff;
    color: #fff;
    border-radius: 4px;
}

.btn.header-btn {
    font-size: 16px; 
    padding: 10px 20px; 
    border-radius: 5px; 
    color: #fff; 
    background-color: #007bff; 
    border: 1px solid #007bff; 
    transition: background-color 0.3s ease, border-color 0.3s ease; 
}

.btn.header-btn:hover {
    background-color: #0056b3; 
    border-color: #0056b3; 
    color: #fff; 
}

.dropdown-item {
    font-size: 16px; 
    padding: 10px 20px; 
    color: #fff; 
    background-color: #007bff; 
    border-radius: 5px; 
    transition: background-color 0.3s ease; 
}

.dropdown-item:hover {
    background-color: #0056b3; 
    color: #fff; 
}


.dropdown-menu {
    background-color: #f8f9fa; 
    border-radius: 5px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


/* Mobile View */
@media (max-width: 768px) {
    .dropdown-content {
        position: static;
        display: none;
        background-color: #fff;
        border: none;
        box-shadow: none;
        min-width: 100%;
    }

    #navigation li.active > .dropdown-content {
        display: block;
    }
}
            body {
                font-size: 15px; 
            }

            .table {
                font-size: 12px; 
            }

            .btn-custom-search, .btn-view {
                font-size: 12px; 
            }
    
    </style>
    <!-- CSS here -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.css">
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/gijgo.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/animated-headline.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/slick.css">
    <link rel="stylesheet" href="../../assets/css/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/payment.css">
</head>
<body>
<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-1 mt-3">
                        <div class="logo">
                            <a href="index.php"><img src="../../assets/images/logo/logo_main.png" alt="" width="100"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../../index.php">Trang Chủ</a></li>
                                        <li><a href="../../khoa.php">Chuyên Khoa</a></li>
                                        <li><a href="../../bacsi.php">Bác Sĩ</a></li>
                                        <li><a href="../../tintuc.php">Tin Tức</a></li>
                                        <li><a href="../../lienhe.php">Liên Hệ</a></li>
                                        <li class="dropdown">
                                        <a class="dropbtn" href="#">Chức năng</a>
                                        <div class="dropdown-content">
                                            <a href="dangkylichkhambenh.php.php">Đăng ký lịch khám</a>
                                            <a href="xemlichkham.php">Xem Lịch Khám</a>
                                            <a href="xemphieukham.php">Xem Phiếu Khám Bệnh</a>
                                        </div>
                                    </li>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <?php if (isset($tenBenhNhan)) { ?>
                                    <div class="dropdown">
                                        <button class="btn header-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo htmlspecialchars($tenBenhNhan); ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="../../index.php">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <a href="../dangNhap/" class="btn header-btn">Đăng nhập</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>   
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-12 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Danh Sách Lịch Khám</h1>
            </div>
            <div class="row mb-3">
                <div class="col mt-2">
                    <form class="d-flex" method="get" action="">
                        <input class="form-control me-2" type="text" name="maBenhNhan" placeholder="Nhập mã bệnh nhân" value="<?php echo isset($_GET['maBenhNhan']) ? htmlspecialchars($_GET['maBenhNhan']) : ''; ?>">
                        <button class="btn btn-custom-search" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Danh Sách lịch khám
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Mã Lịch Khám</th>
                                    <th>Ngày Khám</th>
                                    <th>Giờ Khám</th>
                                    <th>Vấn Đề Khám</th>
                                    <th>Giá Dịch Vụ</th>
                                    <th>Chi Tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        if ($dsLichKham) {
                                            foreach ($dsLichKham as $row) {
                                                echo "<tr>";
                                                echo "<td>" . htmlspecialchars($row["maLichKham"]) . "</td>";
                                                echo "<td>" . htmlspecialchars($row["ngayKham"]) . "</td>";
                                                echo "<td>" . htmlspecialchars($row["gioKham"]) . "</td>";
                                                echo "<td>" . htmlspecialchars($row["vanDeKham"]) . "</td>";
                                                echo "<td>" . number_format($row["giaDichVuKham"], 0, ',', '.') . " VND</td>";
                                                echo "<td><a href='chitietLK.php?id=" . htmlspecialchars($row["maLichKham"]) . "' class='btn btn-sm btn-outline-primary'>Xem Chi Tiết</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6' class='text-center text-danger'>Không có lịch khám nào.</td></tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<footer>
    <div class="footer-area section-bg" data-background="../../assets/images/gallery/footer_bg.jpg">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-logo">
                                <a href="index.php"><img src="../../assets/images/logo/logo2_footer.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>CHÍNH SÁCH</h4>
                                <div class="footer-pera">
                                    <p class="info1">Chính sách bảo mật</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-number mb-50">
                                <h4>0123565678</h4>
                                <p>smiles@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p>CÔNG TY CỔ PHẦN BỆNH VIỆN ĐA KHOA SMILES <i class="fa fa-heart" aria-hidden="true"></i></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        // Toggle the dropdown menu in mobile view
        $('#navigation li').click(function() {
            $(this).children('.dropdown').slideToggle();
        });
    });
</script>
</body>
</html>
