
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    
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
                                    <h4 class="page-title">Quản Lý Bảo Hiểm</h4>
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

                        <h4 class="header-title mb-3">Thông tin bảo hiểm</h4>

                        <form class="mb-3">
                            <div class="row">
                                <!-- Left column -->
                                <div class="col-md-6">
                                    <!-- Faculty of Management -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="tenPhongKham" class="form-label">Số thẻ bảo hiểm</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="soTheBaoHiem" placeholder="Nhập số thẻ bảo hiểm">
                                        </div>
                                    </div>
                                    <!-- Name of the clinic -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="bacSi" class="form-label">Loại bảo hiểm</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="loaiBaoHiem">
                                                <option selected>Chọn loại bảo hiểm</option>
                                                <option value="1">BHYT bắt buộc</option>
                                                <option value="2">BHYT tự nguyện</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Functions -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                        <label for="ngayBatDau" class="form-label">Ngày bắt đầu</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="ngayBatDau" placeholder="Chọn ngày bắt đầu">
                                    </div>
                                </div>

                                    
                                </div>

                                <!-- Right column -->
                                <div class="col-md-6">
                                    <!-- Position -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                        <label for="ngayKetThuc" class="form-label">Ngày kết thúc</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="ngayKetThuc" placeholder="Chọn ngày kết thúc">
                                    </div>
                                </div>

                                    <!-- Doctors -->
                                    
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="noiDangKyKham" class="form-label">Nơi đăng ký khám</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="noiDangKyKham" placeholder="Nhập nơi đăng ký khám">
                                        </div>
                                    </div>
                                    <!-- Nurses -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="quyenLoi" class="form-label">Quyền lợi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="quyenLoi" placeholder="Nhập quyền lợi">
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
                                    <h4 class="header-title mb-3">Danh sách bảo hiểm</h4>
                                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form method="GET" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã bảo hiểm">
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
                                                    <th>SỐ THẺ BẢO HIỂM</th>
                                                    <th>LOẠI BẢO HIỂM</th>
                                                    <th>NGÀY BẮT ĐẦU</th>
                                                    <th>NGÀY KẾT THÚC</th>
                                                    <th>NƠI ĐĂNG KÝ KHÁM</th>
                                                    <th>QUYỀN LỢI</th>
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

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Khởi tạo Flatpickr
    flatpickr("#ngayBatDau",{
        dateFormat: "d-m-Y", // Định dạng ngày
        locale: "vn" // Ngôn ngữ (có thể cần import nếu muốn dùng tiếng Việt)
    });
    flatpickr("#ngayKetThuc",{
        dateFormat: "d-m-Y", // Định dạng ngày
        locale: "vn" // Ngôn ngữ (có thể cần import nếu muốn dùng tiếng Việt)
    });
</script>
        
    </body>

</html>