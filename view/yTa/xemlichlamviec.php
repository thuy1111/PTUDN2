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
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php include('../../assets/inc/nav.php'); ?>

        <div class="left-side-menu">
        <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href=".php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="dangkicalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <h2 class="mb-4">LỊCH LÀM VIỆC</h2>

                    <div class="week-navigation">
                        <button class="btn btn-secondary" id="prevWeekBtn">Tuần Trước</button>
                        <span id="weekDateRange" class="h5"></span>
                        <button class="btn btn-secondary" id="nextWeekBtn">Tuần Sau</button>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered shift-table">
                                    <thead>
                                        <tr>
                                            <th>THỨ 2</th>
                                            <th>THỨ 3</th>
                                            <th>THỨ 4</th>
                                            <th>THỨ 5</th>
                                            <th>THỨ 6</th>
                                            <th>THỨ 7</th>
                                            <th>CN</th>
                                        </tr>
                                    </thead>
                                    <tbody id="scheduleBody">
                                        <!-- Schedule data will be inserted here -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="shift-notes mt-3">
                                <span><strong>Ca 1:</strong> 7:30 - 11:30</span>
                                <span><strong>Ca 2:</strong> 13:00 - 16:30</span>
                                <span><strong>Ca 3:</strong> 17:00 - 19:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for shift details -->
    <div id="shiftModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Chi tiết ca làm việc</h2>
            <div id="shiftDetails"></div>
        </div>
    </div>

    <script src="../../assets/js/vendor.min.js"></script>
    <script src="../../assets/js/app.min.js"></script>
    <script>
        let currentDate = new Date();

        function formatDate(date) {
            const dd = String(date.getDate()).padStart(2, '0');
            const mm = String(date.getMonth() + 1).padStart(2, '0');
            const yyyy = date.getFullYear();
            return `${yyyy}-${mm}-${dd}`;
        }

        function updateWeekDisplay() {
            let startOfWeek = new Date(currentDate);
            let day = startOfWeek.getDay();
            let diff = startOfWeek.getDate() - day + (day == 0 ? -6 : 1);
            startOfWeek.setDate(diff);

            let endOfWeek = new Date(startOfWeek);
            endOfWeek.setDate(startOfWeek.getDate() + 6);

            const weekRange = `Tuần từ: ${formatDate(startOfWeek)} đến ${formatDate(endOfWeek)}`;
            document.getElementById('weekDateRange').textContent = weekRange;

            // Update the displayed work schedule
            loadSchedule(formatDate(startOfWeek), formatDate(endOfWeek));
        }

        function loadSchedule(startDate, endDate) {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "getLich.php?start=" + startDate + "&end=" + endDate, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Update the schedule table
                    document.getElementById("scheduleBody").innerHTML = xhr.responseText;
                    
                    // Add click event listeners to shift buttons
                    const shiftButtons = document.querySelectorAll('.shift-button');
                    shiftButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const shiftId = this.getAttribute('data-shift-id');
                            showShiftDetails(shiftId);
                        });
                    });
                }
            };
            xhr.send();
        }

        function showShiftDetails(shiftId) {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "chitietCLV.php?id=" + shiftId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("shiftDetails").innerHTML = xhr.responseText;
                    document.getElementById("shiftModal").style.display = "block";
                }
            };
            xhr.send();
        }

        document.getElementById('prevWeekBtn').addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() - 7);
            updateWeekDisplay();
        });

        document.getElementById('nextWeekBtn').addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() + 7);
            updateWeekDisplay();
        });

        // Close modal when clicking on <span> (x)
        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('shiftModal').style.display = "none";
        });

        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('shiftModal')) {
                document.getElementById('shiftModal').style.display = "none";
            }
        });

        updateWeekDisplay(); // Initial call
    </script>
</body>
</html>

