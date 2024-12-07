
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
            <?php include('../../assets/inc/sidebarthuoc.php');?>
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
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-primary mx-2">Thêm</button>
                                <button type="button" class="btn btn-success mx-2">Cập nhật</button>
                                <button type="button" class="btn btn-danger mx-2">Hủy</button>
                            </div>
                        </div>

                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">Thông tin thuốc</h4>

                        <form class="mb-3">
                            <div class="row">
                                <!-- Left column -->
                                <div class="col-md-6">
                                    <!-- Faculty of Management -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                            <label for="tenThuoc" class="form-label">Tên thuốc</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="tenThuoc" placeholder="Nhập tên thuốc">
                                        </div>
                                    </div>

                                    <!-- Name of the clinic -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="dangBaoChe" class="form-label">Dạng bào chế</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="dangBaoChe" placeholder="Nhập dạng bào chế">
                                        </div>
                                    </div>

                                    <!-- Functions -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="soLuongTon" class="form-label">Số lượng tồn</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="soLuongTon" placeholder="Nhập số lượng tồn">
                                        </div>
                                    </div>

                                    

                                    
                                </div>

                                <!-- Right column -->
                                <div class="col-md-6">
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="donGia" class="form-label">Đơn giá</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="donGia" placeholder="Nhập đơn giá">
                                        </div>
                                    </div>
                                    <!-- Position -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="nhaSanXuat" class="form-label">Nhà sản xuất</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="nhaSanXuat" placeholder="Nhà sản xuất ">
                                        </div>
                                    </div>


                                    <!-- Nurses -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="congDung" class="form-label">Công dụng</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="congDung" placeholder="Công dụng ">
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </form>

                        <hr style="border-color: black;">

                        <!--Clinic list-->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Danh sách phòng khám</h4>
                                    <div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã thuốc">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>
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
                                                    <th>TRẠNG THÁI </th>
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