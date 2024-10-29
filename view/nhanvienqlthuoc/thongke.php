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
        }
        .header .user-icon {
            font-size: 24px;
        }
        .form-horizontal {
    display: flex;
    align-items: center;
    gap: 15px; /* Space between each form group */
}

.form-group {
    display: flex;
    align-items: center;
}

label {
    font-size: 14px;
    margin-right: 5px;
}

select,
input[type="text"] {
    padding: 5px;
    font-size: 14px;
}

i.fas.fa-calendar-alt {
    margin-left: 5px;
    cursor: pointer;
    font-size: 16px;
}
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 20px;
            position: fixed;
            height: 100%;
            border-right: 1px solid #dee2e6;
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
            color: #343a40;
            display: flex;
            align-items: center;
        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
        }
        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-section {
            background-color: white;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-section h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .form-section .form-group {
            display: flex;
            margin-bottom: 15px;
        }
        .form-section .form-group label {
            width: 150px;
            font-weight: bold;
        }
        .form-section .form-group input,
        .form-section .form-group select {
            flex: 1;
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 3px;
        }
        .form-section .form-group select {
            width: 100%;
        }
        .form-section .form-group .form-control {
            width: calc(50% - 10px);
            margin-right: 20px;
        }
        .form-section .form-group .form-control:last-child {
            margin-right: 0;
        }
        .form-section .buttons {
            text-align: right;
        }
        .form-section .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            margin-left: 10px;
            color: white;
            cursor: pointer;
        }
        .table-section {
            background-color: white;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .table-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-section table th,
        .table-section table td {
            padding: 10px;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        .table-section table th {
            background-color: #e9ecef;
        }


</style>
 </head>
 <body>
  <div class="header">
   <img alt="Logo" height="40" src="../../assets/img/logo.png" width="40"/>
   <div>
            <span>QUẢN LÝ THUỐC</span>
            <i class="fas fa-user-circle user-icon"></i>
        </div>
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
      <i class="fas fa-hospital"></i><p>Xử lý đơn thuốc</p></a>
    </li>
    <li>
     <a href="thongke.php">
      <i class="fas fa-clinic-medical"></i><b>Thống kê thuốc đã kê đơn</b></a>
    </li>
   </ul>
  </div>
  <div class="content">
   <h1> Thống kê thuốc đã kê đơn</h1>
   <div class="form-section">
   <div class="form-horizontal">
  <div class="form-group">
    <label>Chọn bảo hiểm:</label>
    <select>
      <option></option>
    </select>
  </div>
  <br><br>
  <div class="form-group">
    <label>Thời gian bắt đầu:</label>
    <input type="text"/>
    <i class="fas fa-calendar-alt"></i>
  </div>
  <div class="form-group">
    <label>Thời gian kết thúc:</label>
    <input type="text"/>
    <i class="fas fa-calendar-alt"></i>
  </div>
</div>

   <div class="table-section">
    <h2>KẾT QUẢ THỐNG KÊ</h2>
    <table>
     <thead>
      <tr>
       <th>STT</th>
       <th>MÃ THUỐC</th>
       <th>TÊN THUỐC</th>
       <th>SỐ LƯỢNG BÁN</th>
      </tr>
     </thead>
    </table>
    
   </div>
  
   </div>
  </div>
  
 </body>
</html>