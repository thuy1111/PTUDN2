<html>
 <head>
  <title>
   Xem thông tin khoa
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
    font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
        }
        .sidebar img {
            width: 50px;
            margin-bottom: 20px;
        }
        .sidebar h2 {
            font-size: 16px;
            color: #333;
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
        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            width: 30px;
        }
        .header .user-icon {
            font-size: 20px;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content h1 {
            font-size: 18px;
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
            justify-content: center;
            margin-top: 20px;
        }
        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-left: 10px;
            cursor: pointer;
        }
        .buttons .add-btn {
            background-color: #007bff;
            color: white;
        }
        .buttons .update-btn{
            background-color: #28a745;
            color: white;
        }
        .buttons .cancel-btn {
            background-color: #dc3545;
            color: white;
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
  </style>
 </head>
 <body>
  <div class="header">
   <img alt="Logo" height="50" src="https://storage.googleapis.com/a1aa/image/JoQrqzQNtCaxJ529k6UDqXeneFDU9uZItxwLyM33ASQ6sfVnA.jpg" width="50"/>
   <i class="fas fa-user-circle user-icon">
   </i>
  </div>
  <div class="container">
   <div class="sidebar">
    <img alt="Logo" height="50" src="https://storage.googleapis.com/a1aa/image/JoQrqzQNtCaxJ529k6UDqXeneFDU9uZItxwLyM33ASQ6sfVnA.jpg" width="50"/>
    <h2>
     NAVIGATION
    </h2>
    <ul>
     <li>
      <a href="#">
       <i class="fas fa-tachometer-alt">
       </i>
       Dashboard
      </a>
      
     </li>
     
     <li>
      <a href="xemthongtinthuoc.php">
       <i class="fas fa-hospital">
       </i>
       Quản lý thuốc
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-clinic-medical">
       </i>
       Xử lý đơn thuốc
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-shield-alt">
       </i>
       Thống kê thuốc
      </a>
     </li>
    </ul>
   </div>
   <div class="main-content">
    <div class="content">
     <h1 >
      Quản Lý Thuốc
     </h1>
     <hr/>
     <div class="buttons">
      <button class="add-btn" >
       Thêm
      </button>
      <button class="update-btn">
       Cập nhật
      </button>
      <button class="cancel-btn">
       Hủy
      </button>
      &nbsp &nbsp &nbsp &nbsp &nbsp
      <div class="search-bar">
     <input placeholder="Nhập tên hoặc mã thuốc..." type="text"/>
     <button>
      <i class="fas fa-search">
      </i>
     </button>
    </div>
     </div>
     
           
     <hr/>
     <h2>
      Thông tin thuốc
     </h2>
     <div class="form-group">
     <label>
            Tên thuốc
           </label>
           <input type="text" placeholder="Nhập tên khoa"/>
           <label>
            NSX
           </label>
           <input type="text" placeholder="Nhập nhà sản xuất"/>
           
     </div>
     <div class="form-group">
        <label>
            Dạng bào chế
           </label>
           <select>
        <option value="">
         Chọn dạng bào chế
        </option>
       </select>
           <label >
            Số lượng tồn
           </label>
           <input id="" placeholder="Nhập số lượng tồn" type="text"/>
     </div>
     <div class="form-group">
      <label for="">
       Đơn giá
      </label>
      <input id="" placeholder="Đơn giá" type="text"/>
      <label>
        Công dụng
       </label>
       <input id="" placeholder="Công dụng" type="text"/>
     </div>
     
     <hr/>
     <h2>
      Danh sách thuốc
     </h2>
     <div class="table-container">
      <table>
       <thead>
        <tr>
            <th>
             STT
            </th>
            <th>
             MÃ THUỐC
            </th>
            <th>
             TÊN THUỐC
            </th>
            <th>
             SỐ LƯỢNG TỒN
            </th>
            <th>
             CÔNG DỤNG
            </th>
            <th>
             ĐƠN GIÁ
            </th>
            <th>
             NHÀ SẢN XUẤT
            </th>
            <th>
             DẠNG BÀO CHẾ
            </th>
            <th>
             TRẠNG THÁI
            </th>
           </tr>
       </thead>
       <tbody>
        <!-- Add rows as needed -->
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>