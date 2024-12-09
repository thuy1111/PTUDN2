
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
                                    <h4 class="page-title">Quản Lý Thông Tin Nhân Viên</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <hr style="border-color: black;">

                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-primary mx-2">Thêm</button>
                                <button type="button" class="btn btn-success mx-2">Cập nhật</button>
                                <button type="button" class="btn btn-danger mx-2">Xóa</button>
                                <button type="button" class="btn btn-danger mx-2">Hủy</button>
                            </div>
                        </div>

                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">Thông tin nhân viên</h4>

                        <form class="mb-3">
                            <div class="row">
                                <!-- Left column -->
                                <div class="col-md-6">
                                   
                                    <!-- Employee name -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="tenNhanVien" class="form-label">Tên phòng khám</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="tenNhanVien" placeholder="Nhập tên nhân viên">
                                        </div>
                                    </div>

                                    <!-- date of birth -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                        <label for="ngaySinh" class="form-label">Ngày sinh</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="ngaySinh" placeholder="Chọn ngày sinh">
                                    </div>
                                </div>

                                    <!-- gender -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="gioiTinh" class="form-label">Giới tính</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="gioiTinh">
                                                <option selected>Chọn giới tính</option>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="diaChi" class="form-label">Địa chỉ</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="diaChi" placeholder="Nhập địa chỉ">
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


                                    <!-- position -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="chucVu" class="form-label">Chức vụ</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="chucVu">
                                                <option selected>Chọn chức vụ</option>
                                                <option value="1">Bác sĩ</option>
                                                <option value="2">Y tá</option>
                                                <option value="1">Quản lý thuốc</option>
                                                <option value="2">Kế toán</option>
                                            </select>
                                        </div>
                                    </div>    

                                    <!-- part -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="boPhan" class="form-label">Bộ phận</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="boPhan">
                                                <option selected>Chọn bộ phận</option>
                                                <option value="1">Khoa 1</option>
                                                <option value="2">Khoa 2</option>
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
                                    <h4 class="header-title mb-3">Danh sách nhân viên</h4>
                                    <div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã nhân viên">
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
                                                    <th>MÃ NHÂN VIÊN</th>
                                                    <th>TÊN NHÂN VIÊN</th>
                                                    <th>NGÀY SINH</th>
                                                    <th>GIỚI TÍNH</th>
                                                    <th>SỐ ĐIỆN THOẠI</th>
                                                    <th>EMAIL</th>
                                                    <th>ĐỊA CHỈ</th>
                                                    <th>BỘ PHẬN</th>
                                                    <th>CHỨC VỤ</th>
                                                    <th>TÌNH TRẠNG LÀM VIỆC</th>
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
            flatpickr("#ngaySinh", {
                dateFormat: "d-m-Y", // Định dạng ngày
                locale: "vn" // Ngôn ngữ (có thể cần import nếu muốn dùng tiếng Việt)
            });
        </script>
    </body>

</html>