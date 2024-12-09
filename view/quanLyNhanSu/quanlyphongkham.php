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
                                    <h4 class="page-title">Quản Lý Phòng Khám</h4>
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

                        <h4 class="header-title mb-3">Thông tin phòng khám</h4>

                        <form class="mb-3">
                            <div class="row">
                                <!-- Left column -->
                                <div class="col-md-6">
                                    <!-- Faculty of Management -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="khoaQuanLy" class="form-label">Khoa quản lý</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="khoaQuanLy">
                                                <option selected>Chọn khoa quản lý</option>
                                                <option value="1">Khoa 1</option>
                                                <option value="2">Khoa 2</option>
                                                </select>
                                        </div>
                                    </div>

                                    <!-- Name of the clinic -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="tenPhongKham" class="form-label">Tên phòng khám</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="tenPhongKham" placeholder="Nhập tên phòng khám">
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

                                    
                                </div>

                                <!-- Right column -->
                                <div class="col-md-6">
                                    
                                    <!-- Doctors -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="bacSi" class="form-label">Bác sĩ</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="bacSi">
                                                <option selected>Chọn bác sĩ</option>
                                                <option value="1">Bác sĩ 1</option>
                                                <option value="2">Bác sĩ 2</option>
                                            </select>
                                        </div>
                                        </div>

                                    <!-- Nurses -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="yTa" class="form-label">Y tá</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-select form-control" id="yTa">
                                                <option selected>Chọn y tá</option>
                                                <option value="1">Y tá 1</option>
                                                <option value="2">Y tá 2</option>
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
                                    <h4 class="header-title mb-3">Danh sách phòng khám</h4>
                                    <div class="row mb-3">
    <div class="col-md-6">
    <form method="GET" action="controller/PhongKhamController.php">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã phòng khám" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
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
                                                    <th>TÊN PHÒNG KHÁM</th>
                                                    <th>KHOA QUẢN LÝ</th>
                                                    <th>CHỨC NĂNG</th>
                                                   
                                                    <th>TRẠNG THÁI HOẠT ĐỘNG</th>
                                                </tr>
                                            </thead>
                                            <?php
    include_once("../../controller/cPhongKham.php");
    $q= new cPhongKham();
    $tbl = $q->laydanhsachphongkham();
    if($tbl)
    {
        echo ' <tbody>';
        $stt= 1;
        while ($r= mysqli_fetch_assoc($tbl))
        {
            echo'<tr>
                                                    <td>'.$stt.'</td>   
                                                    <td>'.$r['tenPhongKham'].'</td>
                                                    <td>'.$r['tenKhoa'].'</td>
                                                    <td>'.$r['chucNang'].'</td>
                                                    
                                                    <td>'.$r['tinhTrangHoatDong'].'</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>';
        }

    }
?>
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