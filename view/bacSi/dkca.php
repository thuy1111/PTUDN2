<title>Đăng ký ca</title>

<style>
    /* Schedule Table styling */
    .schedule-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 16px;
    }

    .schedule-table th,
    .schedule-table td {
        padding: 15px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .schedule-table th {
        background-color: #e3f2fd;
        color: #333;
        font-weight: bold;
    }

    /* Buttons */
    .buttons {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .buttons button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        margin-left: 10px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .buttons .register {
        background-color: #6c63ff;
    }

    .buttons .register:hover {
        background-color: #5a54e8;
    }

    .buttons .cancel {
        background-color: #dc3545;
    }

    .buttons .cancel:hover {
        background-color: #c82333;
    }

    .header .user-icon {
        font-size: 28px;
        margin-right: 8px;
        /* Giảm khoảng cách bên phải của icon */
        vertical-align: middle;
        /* Căn giữa icon với văn bản */
    }

    .header span {
        font-size: 20px;
        color: #fff;
        vertical-align: middle;
        /* Căn giữa văn bản với icon */
    }
</style>

<div class="content">
    <h1>ĐĂNG KÝ CA</h1>
    <table class="schedule-table">
        <thead>
            <tr>
                <th>CA</th>
                <th>THỨ 2</th>
                <th>THỨ 3</th>
                <th>THỨ 4</th>
                <th>THỨ 5</th>
                <th>THỨ 6</th>
                <th>THỨ 7</th>
                <th>CN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>CA 1<br>7:30-11:30</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
            <tr>
                <td>CA 2<br>13:00-16:30</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
            <tr>
                <td>CA 3<br>17:00-19:30</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
        </tbody>
    </table>
    <div class="buttons">
        <button class="register">ĐĂNG KÝ</button>
        <button class="cancel">HỦY</button>
    </div>
</div>
</div>