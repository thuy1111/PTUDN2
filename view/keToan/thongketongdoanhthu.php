
<!DOCTYPE html>
<html lang="en">
    
    <!--Head Code-->
    <?php include("../../assets/inc/head.php");?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('../../assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">
                            <li>
                                <a href="index.php">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                                
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-user-tie"></i>
                                    <span>Thống kê doanh thu</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="thongketongdoanhthu.php">Tổng doanh thu</a>
                                    </li>
                                    <li>
                                        <a href="thongkedoanhthutheoloaithoigian.php">Theo loại thời gian</a>
                                    </li>
                                    <li>
                                        <a href="thongkedoanhthutheokhoa.php">Theo khoa</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-hospital-building"></i>
                                    <span>Phân số thứ tự, phòng khám</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">THỐNG KÊ DOANH THU</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row mb-2">
                            <div class="col-12 text-center">
                                <a href="thongketongdoanhthu.php" class="btn btn-primary mx-2">Thống kê tổng doanh thu</a>
                                <a href="thongkedoanhthutheoloaithoigian.php" class="btn btn-success mx-2">Theo loại thời gian</a>
                                <a href="thongkedoanhthutheokhoa.php" class="btn btn-danger mx-2">Theo khoa</a>
                            </div>
                        </div>

                        <hr style="border-color: black;">

                        <form class="mb-3">
                            <div class="row">
                                <!-- Thời gian bắt đầu -->
                                <div class="col-md-6">
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-md-4 text-end">
                                            <label for="thoiGianBatDau" class="form-label">Thời gian bắt đầu</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="month" class="form-control" id="thoiGianBatDau">
                                                <!-- <span class="input-group-text" id="iconStart">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thời gian kết thúc -->
                                <div class="col-md-6">
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-md-4 text-end">
                                            <label for="thoiGianKetThuc" class="form-label">Thời gian kết thúc</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="month" class="form-control" id="thoiGianKetThuc">
                                                <!-- <span class="input-group-text" id="iconEnd">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Các nút chức năng -->
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary mx-2">Xác nhận</button>
                                    <button type="button" class="btn btn-secondary mx-2">In báo cáo</button>
                                </div>
                            </div>
                        </form>

                        <hr style="border-color: black;">

                        <script>
                            // Hàm mở lịch và nhập giá trị khi chọn xong
                            function openDatePicker(inputId) {
                                const input = document.getElementById(inputId);
                                input.showPicker(); // Mở lịch của HTML5
                            }

                            // Gắn sự kiện click cho các icon lịch
                            document.getElementById('iconStart').addEventListener('click', function() {
                                openDatePicker('thoiGianBatDau');
                            });

                            document.getElementById('iconEnd').addEventListener('click', function() {
                                openDatePicker('thoiGianKetThuc');
                            });
                        </script>

                        <h4 class="header-title mb-3">DOANH THU BỆNH VIỆN</h4>
                        <div class="row">
                            <!-- Bảng doanh thu -->
                            <div class="col-6">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Thời gian bắt đầu</th>
                                                    <th>Thời gian kết thúc</th>
                                                    <th>Tổng doanh thu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01/01/2024</td>
                                                    <td>31/01/2024</td>
                                                    <td>500,000,000 VND</td>
                                                </tr>
                                                <tr>
                                                    <td>01/02/2024</td>
                                                    <td>28/02/2024</td>
                                                    <td>600,000,000 VND</td>
                                                </tr>
                                                <tr>
                                                    <td>01/03/2024</td>
                                                    <td>31/03/2024</td>
                                                    <td>550,000,000 VND</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Biểu đồ doanh thu -->
                            <div class="col-6">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <canvas id="revenueChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thêm script để vẽ biểu đồ với Chart.js -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var ctx = document.getElementById('revenueChart').getContext('2d');
                            var revenueChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['01/2024', '02/2024', '03/2024'],
                                    datasets: [{
                                        label: 'Tổng doanh thu (VND)',
                                        data: [500000000, 600000000, 550000000],
                                        backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                                        borderColor: ['rgba(75, 192, 192, 1)'],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                callback: function(value) {
                                                    return value.toLocaleString() + ' VND';
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        </script>



                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

        <!-- Vendor js -->
        <script src="../../assets/js/vendor.min.js"></script>
        <!-- Plugins js-->
        <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="../../assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>
        
    </body>

</html>