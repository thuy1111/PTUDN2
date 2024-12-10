<style>
    .schedule-grid {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .schedule-table th, .schedule-table td {
        text-align: center;
        vertical-align: middle;
    }

    .schedule-table th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .schedule-table td input[type="checkbox"] {
        transform: scale(1.5);
        margin: 5px;
    }

    .schedule-table td {
        padding: 10px;
    }

    .schedule-table {
        margin-bottom: 20px;
    }

    .schedule-table thead th {
        border-top: none;
    }

    .btn-dk {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-dk:hover {
        background-color: #218838;
    }

    .alert-success, .alert-danger {
        padding: 10px 15px;
        border-radius: 5px;
        margin-top: 10px;
        font-weight: bold;
        text-align: center;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

<?php

include_once("../../controller/cYTa.php");
error_reporting(0);


date_default_timezone_set('Asia/Ho_Chi_Minh');
$homnay = date('Y-m-d');
$week = date('w');
$ngaydautuan = date('Y-m-d', strtotime("-" . (0 + $week) . " days"));
$ngaycuoituan = date('Y-m-d', strtotime("+" . (6 - $week) . " days"));
$a = date('Y-m-d', strtotime($ngaydautuan . " +7 day"));
$t2 = date('d-m', strtotime($a . " +1 day")); 
$t3 = date('d-m', strtotime($a . " +2 days")); 
$t4 = date('d-m', strtotime($a . " +3 days")); 
$t5 = date('d-m', strtotime($a . " +4 days")); 
$t6 = date('d-m', strtotime($a . " +5 days")); 
$t7 = date('d-m', strtotime($a . " +6 days")); 
$t8 = date('d-m', strtotime($a . " +7 days")); 
$daysOfWeek = [];
for ($i = 1; $i < 8; $i++) {
    $daysOfWeek[] = date('Y-m-d', strtotime($a . " +{$i} days"));
}

echo'
    <form method="POST" action="">
    <input type="hidden" name="currentWeekStart" value="'.$ngaydautuan.'">
    </form>
        <div class="schedule-grid mb-4" id="schedule-container">
            <table class="schedule-table table table-bordered">
                <thead>
                    <tr class="bg-light">
                        <th>Ca</th>
                        <th>Thứ 2|' . $t2 . '</th>
                        <th>Thứ 3|' . $t3 . '</th>
                        <th>Thứ 4|' . $t4 . '</th>
                        <th>Thứ 5|' . $t5 . '</th>
                        <th>Thứ 6|' . $t6 . '</th>
                        <th>Thứ 7|' . $t7 . '</th>
                        <th>Chủ nhật|' . $t8 . '</th>
                    </tr>
                </thead>
                <tbody>';
                echo '<form method="POST" action="">
                <tr>
                    <td>Ca 1</td>';
                    for ($i = 0; $i < 7; $i++) {
                        echo '<td><input type="checkbox" class="" name="date[Ca 1][]" value="'.$daysOfWeek[$i].'">
                            
                        </td>';
                    }
                    echo '</tr>';
                echo '<tr>
                <td>Ca 2</td>';
                for ($i = 0; $i < 7; $i++) {
                    echo '<td><input type="checkbox" class="" name="date[Ca 2][]" value="'.$daysOfWeek[$i].'">
                    </td>';
                }
                echo '</tr>';
                echo '<tr>
                    <td>Ca 3</td>';
                    for ($i = 0; $i < 7; $i++) {
                        echo '<td><input type="checkbox" class="" name="date[Ca 3][]" value="'.$daysOfWeek[$i].'">
                        
                        </td>';
                    }
                    echo '</tr>';
        echo '  </tbody>
            </table>
            <input type="submit" class="" name="btnDK" value="Đăng ký">
            </form>
        </div>';

        if (isset($_POST['btnDK'])) {
            if (isset($_POST['date']) && !empty($_POST['date'])) {
                $manv = $_SESSION['user'][0]; 
                $date = $_POST['date'];
                $ca = array_keys($date);
                $l2 = count($ca);
                $rs = 0;
                $message = '';
                
                for ($k = 0; $k < $l2; $k++) {
                    $c = $ca[$k];
                    $l = count($date[$c]);
                    for ($i = 0; $i < $l; $i++) {
                        $d = $date[$c][$i];
                        $p = new cYTa();
                        $response = $p->DKCa($manv, $d, $c);
                        if ($response['status'] == true) {
                            $rs = 1;
                            $message = $response['message']; // Thành công
                        } else {
                            $rs = 0;
                            $message = $response['message']; // Thất bại
                        }
                    }
                }
        
                if ($rs == 1) {
                    echo '<script>alert("' . $message . '")</script>';
                } else {
                    echo '<script>alert("' . $message . '")</script>';
                }
            } else {
                echo '<script>alert("Vui lòng chọn ca làm việc")</script>';
            }    
        }
        

?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll("button[name='changeWeek']");
    buttons.forEach(button => {
        button.addEventListener("click", function(e) {
            e.preventDefault();

            const weekChange = button.value;

            let currentWeekStart = document.querySelector("input[name='currentWeekStart']").value;
            currentWeekStart = new Date(currentWeekStart);

            if (weekChange === 'prev') {
                currentWeekStart.setDate(currentWeekStart.getDate() - 7);
            } else if (weekChange === 'next') {
                currentWeekStart.setDate(currentWeekStart.getDate() + 7);
            } else if (weekChange === 'current') {
                // Set to the current week's Sunday
                const today = new Date();
                currentWeekStart = new Date(today.setDate(today.getDate() - today.getDay()));
            }

            currentWeekStart.setDate(currentWeekStart.getDate() - currentWeekStart.getDay());

            document.querySelector("input[name='currentWeekStart']").value = currentWeekStart.toISOString().split('T')[0];

            const khoaSelect = document.querySelector("select[name='khoaSelect']") ? document.querySelector("select[name='khoaSelect']").value : "";

            updateSchedule({ changeWeek: weekChange, currentWeekStart: currentWeekStart.toISOString().split('T')[0], khoaSelect: khoaSelect });
        });
    });

    function updateSchedule(data) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", window.location.href, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                const parser = new DOMParser();
                const responseDoc = parser.parseFromString(xhr.responseText, "text/html");
                const newSchedule = responseDoc.querySelector("#schedule-container");
                const container = document.querySelector("#schedule-container");
                if (newSchedule && container) {
                    container.innerHTML = newSchedule.innerHTML;
                }
            }
        };


        const params = Object.keys(data).map(key => `${key}=${encodeURIComponent(data[key])}`).join("&");
        xhr.send(params);
    }
});
</script>
