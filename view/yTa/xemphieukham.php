<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../../assets/inc/head.php"); ?>
    <style>
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }
        .card-title {
            font-size: 1.2em;
            font-weight: bold;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Topbar -->
        <?php include('../../assets/inc/nav.php'); ?>

        <!-- Sidebar -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="javascript: void(0);"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="dangkycalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <h2 class="mb-4">PHIẾU KHÁM BỆNH</h2>

                    <!-- Search and Patient List Section -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Tìm Kiếm Bệnh Nhân</h5>
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="searchPatient" class="form-label">Tìm kiếm tên bệnh nhân:</label>
                                    <input type="text" class="form-control" id="searchPatient" placeholder="Nhập tên bệnh nhân">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="patientList" class="form-label">Danh Sách Bệnh Nhân:</label>
                                    <select class="form-select" id="patientList">
                                        <option selected>Chọn bệnh nhân...</option>
                                        <option value="1">Nguyễn Văn A</option>
                                        <option value="2">Trần Thị B</option>
                                        <option value="3">Lê Hoàng C</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Form -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Thông tin Phiếu Khám</h5>

                            <!-- Medical Details -->
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="examCode" class="form-label">Mã Phiếu Khám Bệnh:</label>
                                    <input type="text" class="form-control" id="examCode" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="roomCode" class="form-label">Mã Phòng Khám:</label>
                                    <input type="text" class="form-control" id="roomCode" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="examDate" class="form-label">Ngày Khám:</label>
                                    <input type="date" class="form-control" id="examDate" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="examReason" class="form-label">Lý Do Khám:</label>
                                    <textarea class="form-control" id="examReason" rows="2" readonly></textarea>
                                </div>
                            </div>

                            <!-- Medical History -->
                            <h5 class="card-title mb-4">Tiền Sử Bệnh</h5>
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="medicalHistory" class="form-label">Tiền Sử:</label>
                                    <textarea class="form-control" id="medicalHistory" rows="4" readonly></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="diseaseHistory" class="form-label">Bệnh Sử:</label>
                                    <textarea class="form-control" id="diseaseHistory" rows="4" readonly></textarea>
                                </div>
                            </div>

                            <!-- Medical Exam Results -->
                            <h5 class="card-title mb-4">Kết Quả Khám</h5>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label for="pulse" class="form-label">Mạch:</label>
                                    <input type="text" class="form-control" id="pulse" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="bloodPressure" class="form-label">Huyết Áp:</label>
                                    <input type="text" class="form-control" id="bloodPressure" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="temperature" class="form-label">Nhiệt Độ:</label>
                                    <input type="text" class="form-control" id="temperature" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="height" class="form-label">Chiều Cao:</label>
                                    <input type="text" class="form-control" id="height" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="weight" class="form-label">Cân Nặng:</label>
                                    <input type="text" class="form-control" id="weight" readonly>
                                </div>
                            </div>

                            <!-- Diagnosis and Symptoms -->
                            <h5 class="card-title mb-4">Kết Luận</h5>
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="diagnosis" class="form-label">Chẩn Đoán:</label>
                                    <textarea class="form-control" id="diagnosis" rows="4" readonly></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="symptoms" class="form-label">Triệu Chứng:</label>
                                    <textarea class="form-control" id="symptoms" rows="4" readonly></textarea>
                                </div>
                            </div>

                            <!-- Prescription -->
                            <h5 class="card-title mb-4">Đơn Thuốc</h5>
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label for="prescriptionCode" class="form-label">Mã Đơn Thuốc:</label>
                                    <input type="text" class="form-control" id="prescriptionCode" readonly>
                                </div>
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