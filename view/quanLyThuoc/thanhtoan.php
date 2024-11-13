<html>
 <head>
  <title>
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
   body {
            font-family: 'Times New Roman', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .container {
            display: flex;
            height: calc(100% - 60px);
        }
        .sidebar {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
            position: fixed;
            height: 100%;
        }
        .sidebar img {
            width: 50px;
            margin-bottom: 20px;
        }
        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            align-items: center;
        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header img {
            height: 40px;
            margin-right: 10px;
        }
        .user-info {
            display: flex;
            align-items: center;
            font-weight: bold;
        }
        .header .user-icon {
            font-size: 28px;
            margin-right: 8px;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            margin-left:270px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content h1,h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-group label {
            flex: 1;
            margin-right: 10px;
        }
        .form-group input, .form-group select {
            flex: 2;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            color: #fff;
            cursor: pointer;
        }
        .buttons .thanhtoan {
            background-color: #28a745;
        }
        .buttons .huy {
            background-color: #dc3545;
        }
        .table-container {margin-top: 20px;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table-container th {
            background-color: #f5f5f5;
        }
        .summary {
    width: 300px; /* Adjust the width as needed */
    padding: 10px;
    margin: 0; /* Aligns the container to the left */
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    margin-left:900px;
}

.form-group {
    margin-bottom: 10px;
}

label {
    font-size: 14px;
}

input[type="text"] {
    width: 100%; /* Ensures input fields fit within the .summary container */
    padding: 5px;
    font-size: 14px;
}

  </style>
 </head>
 <body>
    <div class="header">
        <div>
            <img src="../../assets/img/logo.png" alt="Logo">
            
        </div>
        <div>
            <span>QUẢN LÝ THUỐC</span>
            <i class="fas fa-user-circle user-icon"></i>
        </div>
    </div>

    <div class="sidebar">
   <h2>TỔNG QUAN</h2>
   <ul>
    <li>
     <a href="quanlythuoc.php">
      <i class="fas fa-users"></i>Quản lý thuốc</a>
    </li>
    <li>
     <a href="thanhtoan.php">
      <i class="fas fa-hospital"></i><b>Xử lý đơn thuốc</b></a>
    </li>
    <li>
     <a href="thongke.php">
      <i class="fas fa-clinic-medical"></i>Thống kê thuốc đã kê đơn</a>
    </li>
   </ul>
  </div>
    <div class="content">
     <h1>ĐƠN THUỐC</h1>
     <hr>
     <h2>Thông tin đơn thuốc</h2>
     <div class="form-group">
      <label for="ma-dt">Mã đơn thuốc:</label>
      <input id="ma-dt" placeholder="" type="text"/>

      <label for="bhyt">Bảo hiểm y tế:</label>
      <select id="bhyt">
       <option>Chọn bảo hiểm</option></select>
     </div>

     <div class="form-group">
      <label for="bac-si-ke-don">Bác sĩ kê đơn:</label>
      <input id="bac-si-ke-don" placeholder="" type="text"/>

      <label for="gioi-tinh">Giới tính:</label>
      <select id="gioi-tinh">
       <option>Chọn giới tính</option></select>
     </div>

     <div class="form-group">
      <label for="chuc-nang">Tên bệnh nhân:</label>
      <input id="benh-nhan" placeholder="" type="text"/>

      <label for="dia-chi">Địa chỉ:</label>
      <input id="dia-chi" placeholder="" type="text"/>
     </div>

     <div class="form-group">
      <label for="chuan-doan">Chuẩn đoán:</label>
      <input id="chuan-doan" placeholder="" type="text"/>
     </div>
     <hr/>
     <div class="table-container">
      <table>
       <thead>
        <tr>
         <th>STT</th>
         <th>TÊN THUỐC</th>
         <th>ĐƠN VỊ</th>
         <th>ĐƠN GIÁ</th>
         <th>SL</th>
         <th>THÀNH TIỀN</th>
         <th>CÁCH DÙNG</th>
        </tr>
       </thead>
      </table>
     </div><br>
     <div class="summary">
      <div>
       <label for="tong-tien">Tổng tiền:</label>
       <input id="tong-tien" readonly="" type="text" value=""/>
      </div>

      <div>
       <label for="khau-tru">Khấu trừ BHYT:</label>
       <input id="khau-tru" readonly="" type="text" value=""/>
      </div>

      <div>
       <label for="tong-thanh-toan">Tổng số tiền thanh toán:</label>
       <input id="tong-thanh-toan" readonly="" type="text" value=""/>
      </div>
     </div>
<br>
     <div class="buttons">
      <button class="thanhtoan">
       Thanh toán
      </button>
      <button class="huy">
       Hủy
      </button>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>