    <title>Lịch Làm việc</title>
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .buttons .register {
            background-color: #0056b3;
        }

        .buttons .register:hover {
            background-color: #004494;
        }

        .buttons .cancel {
            background-color: #dc3545;
        }

        .buttons .cancel:hover {
            background-color: #c82333;
        }

        /* Button active state */
        .active {
            background-color: #4CAF50;
            /* Green */
            color: white;
        }

        /* Shift notes styling */
        .shift-notes {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .shift-notes span {
            display: inline-block;
            margin-right: 15px;
        }

        .shift-notes strong {
            color: #333;
        }
    </style>
    <div class="content">
        <h1>LỊCH LÀM VIỆC</h1>
        <div class="table-section">
            <table class="schedule-table">
                <tr>
                    <th>Thứ 2</th>
                    <th>Thứ 3</th>
                    <th>Thứ 4</th>
                    <th>Thứ 5</th>
                    <th>Thứ 6</th>
                    <th>Thứ 7</th>
                    <th>CN</th>
                </tr>
                <tr>
                    <td><button class="active">Ca 1</button></td>
                    <td><button class="active">Ca 1</button></td>
                    <td><button class="active">Ca 1</button></td>
                    <td><button class="active"></button></td>
                    <td><button class="active">Ca 1</button></td>
                    <td><button class="active">Ca 1</button></td>
                    <td><button class="active">Ca 1</button></td>
                </tr>
                <tr>
                    <td><button class="active">Ca 2</button></td>
                    <td><button class="active">Ca 2</button></td>
                    <td><button class="active"></button></td>
                    <td><button class="active">Ca 2</button></td>
                    <td><button class="active">Ca 2</button></td>
                    <td><button class="active">Ca 2</button></td>
                    <td><button class="active"></button></td>
                </tr>
                <tr>
                    <td><button class="active"></button></td>
                    <td><button class="active">Ca 3</button></td>
                    <td><button class="active">Ca 3</button></td>
                    <td><button class="active">Ca 3</button></td>
                    <td><button class="active"></button></td>
                    <td><button class="active">Ca 3</button></td>
                    <td><button class="active">Ca 3</button></td>
                </tr>
            </table>
        </div>
        <div class="shift-notes">
            <span><strong>Ca 1:</strong> 7:30 - 11:30</span>
            <span><strong>Ca 2:</strong> 13:00 - 16:30</span>
            <span><strong>Ca 3:</strong> 17:00 - 19:00</span>
        </div>
        <div class="buttons">
            <button class="register">In lịch làm việc</button>
        </div>
    </div>
    </div>