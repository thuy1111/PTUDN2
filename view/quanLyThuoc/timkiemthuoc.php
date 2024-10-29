
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

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                                <a href="#">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                                
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-user-tie"></i>
                                    <span>Quản lý thuốc</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="timkiemthuoc.php">Tìm kiếm thuốc</a>
                                    </li>
                                    <li>
                                        <a href="#">Thêm thuốc mới</a>
                                    </li>
                                    <li>
                                        <a href="#">Cập nhật thông tin thuốc</a>
                                    </li>
                                    <li>
                                        <a href="#">Xóa thông tin thuốc</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-hospital-building"></i>
                                    <span>Xử lý đơn thuốc</span>
                                    <span class="menu-arrow"></span>
                                </a>

                            </li>

                            <li>
                                <a href="../../view/quanLyNhanSu/quanlyphongkham.php">
                                    <i class="fas fa-clinic-medical"></i>
                                    <span>Thống kê thuốc</span>
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
                                    <h4 class="page-title">Quản Lý Thuốc</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <hr style="border-color: black;">

                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <form class="app-search" style="width: 300px;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nhập tên hoặc mã thuốc..." aria-label="Search" aria-describedby="search-button">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="search-button">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">KẾT QUẢ TÌM KIẾM</h4>

                        <!--Clinic list-->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>MÃ THUỐC</th>
                                                    <th>TÊN THUỐC</th>
                                                    <th>SỐ LƯỢNG TỒN</th>
                                                    <th>CÔNG DỤNG</th>
                                                    <th>ĐƠN GIÁ</th>
                                                    <th>NHÀ SẢN XUẤT</th>
                                                    <th>DẠNG BÀO CHẾ</th>
                                                    <th>TRẠNG THÁI</th>
                                                </tr>
                                            </thead>
                                           
                                            <tbody>
                                                <tr>

                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>    
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->                                                                                                                                                                                                                                         
                        </div>
                        <!-- end row -->
                        
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
        <script src=../../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>
        
    </body>

</html>