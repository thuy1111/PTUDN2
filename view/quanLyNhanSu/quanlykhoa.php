
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
            <?php include('../../assets/inc/sidebar.php');?>
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
                                    <h4 class="page-title">Quản Lý Khoa</h4>
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

                        <h4 class="header-title mb-3">Thông tin khoa</h4>

                        <form class="mb-3">
                            <div class="row">
                                <!-- Left column -->
                                <div class="col-md-6">
                                    <!-- department clinic   -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="phongKhamThuocKhoa" class="form-label">Phòng khám thuộc khoa</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="phongKhamThuocKhoa">
                                                <option selected>Chọn phòng khám</option>
                                                <option value="1">Phòng khám 1</option>
                                                <option value="2">Phòng khám 2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Department name -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="tenKhoa" class="form-label">Tên khoa</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="tenKhoa" placeholder="Nhập tên khoa">
                                        </div>
                                    </div>

                                    <!-- Functions -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="chucNang" class="form-label">Chức năng</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="chucNang" placeholder="Nhập chức năng">
                                        </div>
                                    </div>

                                    <!-- Position -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="viTri" class="form-label">Vị trí</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="viTri" placeholder="Nhập vị trí">
                                        </div>
                                    </div>
                                </div>

                                <!-- Right column -->
                                <div class="col-md-6">
                                    <!-- Phone number -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                            <label for="sDT" class="form-label">SDT</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="sDT" placeholder="Nhập số điện thoại">
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                            <label for="eMail" class="form-label">Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="eMail" placeholder="Nhập email">
                                        </div>
                                    </div>    

                                    <!-- Head of Department -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="truongKhoa" class="form-label">Trưởng khoa</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="truongKhoa">
                                                <option selected>Chọn trưởng khoa</option>
                                                <option value="1">Trưởng khoa 1</option>
                                                <option value="0">Trưởng khoa 2</option>
                                            </select>
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
                                    <h4 class="header-title mb-3">Danh sách khoa</h4>
                                    <div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã khoa">
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
                                                    <th>MÃ KHOA</th>
                                                    <th>TÊN KHOA</th>
                                                    <th>PHÒNG KHÁM THUỘC KHOA</th>
                                                    <th>TRƯỞNG KHOA</th>
                                                    <th>CHỨC NĂNG</th>
                                                    <th>VỊ TRÍ</th>
                                                    <th>SĐT</th>
                                                    <th>EMAIL</th>
                                                    <th>TRẠNG THÁI HOẠT ĐỘNG</th>
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