<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../../assets/inc/head.php"); ?>
    <title>Lịch Làm Việc - Quản Lý Ca</title>
    <style>
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }
        .shift-notes {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .shift-notes span {
            margin: 0 10px;
        }
        .week-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Topbar -->
        <?php include('../../assets/inc/nav.php'); ?>

        <!-- Left Sidebar -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="javascript: void(0);"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <h2 class="mb-4">XEM LỊCH KHÁM</h2>
                    
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                    <th>Ngày</th>
                                    <th>Giờ khám</th>
                                    <th>Chuyên khoa</th>
                                    <th>Bảo hiểm y tế</th>
                                    <th>Vấn đề khám</th>
                                    <th>Giá dịch vụ</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01/12/2024</td>
                                    <td>7:30 - 8:30</td>
                                    <td>Nội khoa</td>
                                    <td>Có</td>
                                    <td>Đau dạ dày</td>
                                    <td>200,000 VND</td>
                                    <td>1</td>
                                    <td><span class="badge bg-success">Hoàn thành</span></td>
                                </tr>
                                <tr>
                                    <td>02/12/2024</td>
                                    <td>8:30 - 9:30</td>
                                    <td>Ngoại khoa</td>
                                    <td>Không</td>
                                    <td>Viêm họng</td>
                                    <td>150,000 VND</td>
                                    <td>1</td>
                                    <td><span class="badge bg-warning">Đang khám</span></td>
                                </tr>
                                <tr>
                                    <td>03/12/2024</td>
                                    <td>9:30 - 10:30</td>
                                    <td>Nhi khoa</td>
                                    <td>Có</td>
                                    <td>Cảm cúm</td>
                                    <td>100,000 VND</td>
                                    <td>1</td>
                                    <td><span class="badge bg-danger">Chưa khám</span></td>
                                </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary me-2" style="background-color: #6f42c1; border-color: #6f42c1;">
                                    XEM CHI TIẾT
                                </button>
                                <button type="button" class="btn btn-danger">
                                    HỦY
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../../assets/js/vendor.min.js"></script>
    <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../../assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
    <script src="../../assets/js/pages/dashboard-1.init.js"></script>
    <script src="../../assets/js/app.min.js"></script>


</body>
</html>