    <title>Xem phiếu khám bệnh</title>
    <style>
        /* Search and Form styling */
        .search {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            flex: 1;
        }

        .search select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            /* Cho phép điều chỉnh chiều cao cho textarea */
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
            background-color: #4a90e2;
        }

        .buttons .register:hover {
            background-color: #357ABD;
        }

        .buttons .cancel {
            background-color: #dc3545;
        }

        .buttons .cancel:hover {
            background-color: #c82333;
        }
    </style>
    <div class="content">
        <h1>PHIẾU KHÁM BỆNH</h1>
        <div class="search">
            <input placeholder="Tìm kiếm" type="text" />
            <select>
                <option>3231424 TRẦN ĐỨC TUẤN</option>
                <option>3131423 NGUYỄN TRỌNG CẨN</option>
                <option>3131443 LÊ VĂN LƯƠNG</option>
                <option>3233442 NGUYỄN NHẬT HIẾU</option>
                <option>3233132 NGUYỄN THỊ MAI</option>
            </select>
        </div>
        <div class="form-group">
            <label>I. Hành chính</label>

            <label for="ma-bn">Mã bệnh nhân:</label>
            <input id="ma-bn" type="text" />

            <label for="ho-ten">Họ tên:</label>
            <input id="ho-ten" type="text" />

            <label for="ngay-sinh">Ngày sinh:</label>
            <input id="ngay-sinh" type="text" />

            <label for="gioi-tinh">Giới tính:</label>
            <input id="gioi-tinh" type="text" />

            <label for="dia-chi">Địa chỉ:</label>
            <input id="dia-chi" type="text" />

            <label for="ngay-vao-vien">Ngày vào viện:</label>
            <input id="ngay-vao-vien" type="text" />

            <label for="so-the">Số thẻ:</label>
            <input id="so-the" type="text" />

            <label for="phong">Phòng:</label>
            <input id="phong" type="text" />

            <label for="giuong">Giường:</label>
            <input id="giuong" type="text" />

            <label for="chan-doan">Chẩn đoán:</label>
            <input id="chan-doan" type="text" />
        </div>

        <div class="form-group">
            <label>II. Lý do vào viện:</label>
            <textarea></textarea>
        </div>
        <div class="form-group">
            <label>III. Hỏi bệnh</label>
            <textarea></textarea>
        </div>
        <div class="form-group">
            <label>1. Quá trình bệnh lý</label>
            <textarea></textarea>
        </div>
        <div class="form-group">
            <label>2. Tiền sử bệnh</label>
            <textarea></textarea>
        </div>
        <div class="form-group">
            <label>IV. Khám bệnh</label>
            <textarea></textarea>
        </div>
        <div class="form-group">
            <label>V. Kết quả chẩn đoán</label>
            <textarea></textarea>
        </div>
        <div class="form-group">
            <label>VI. Đơn thuốc</label>
            <textarea></textarea>
        </div>
    </div>
    </div>