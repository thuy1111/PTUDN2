<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Range Selector</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="form-group">
        <label for="timeRange">Khoảng thời gian</label>
        <select class="form-control" id="timeRange">
            <option value="today">Trong ngày</option>
            <option value="7days">Trong 7 ngày</option>
            <option value="month">Trong tháng</option>
            <option value="custom">Tùy chọn</option>
        </select>
    </div>

    <!-- Custom Date Range Picker Section -->
    <div class="custom-date-range d-none">
        <div class="row">
            <div class="col">
                <label for="startDate">Ngày bắt đầu</label>
                <input type="text" id="startDate" class="form-control" placeholder="YYYY-MM-DD">
            </div>
            <div class="col">
                <label for="endDate">Ngày kết thúc</label>
                <input type="text" id="endDate" class="form-control" placeholder="YYYY-MM-DD">
            </div>
        </div>
    </div>

    
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(document).ready(function() {
        // Khởi tạo Flatpickr cho các ô nhập ngày
        $("#startDate, #endDate").flatpickr({
            dateFormat: "Y-m-d"
        });

        // Hiển thị hoặc ẩn ô nhập ngày tùy chọn
        $('#timeRange').on('change', function() {
            if ($(this).val() === 'custom') {
                $('.custom-date-range').removeClass('d-none');
            } else {
                $('.custom-date-range').addClass('d-none');
            }
        });
    });
</script>
</body>
</html>
