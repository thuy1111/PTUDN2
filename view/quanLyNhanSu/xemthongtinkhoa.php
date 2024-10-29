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
      <a href="#">
       <i class="fas fa-user">
       </i >
       Quản lý thông tin nhân viên
      </a>
     </li>
     <li>
      <a href="xemthongtinkhoa.php">
       <i class="fas fa-hospital">
       </i>
       Quản lý khoa
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-clinic-medical">
       </i>
       Quản lý phòng khám
      </a>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-shield-alt">
       </i>
       Quản lý bảo hiểm
      </a>
     </li>
    </ul>
   </div>
   <div class="main-content">
    <div class="content">
     <h1 >
      Quản Lý Khoa
     </h1>
     <hr/>
     <div class="buttons">
      <button class="add-btn" >
        <a href="themthongtinkhoa.php">
       Thêm
    </a>
      </button>
      <button class="update-btn">
      <a href="capnhatthongtinkhoa.php" >
       Cập nhật
    </a>
      </button>
      <button class="cancel-btn">
       Hủy
      </button>
     </div>
     <hr/>
     <h2>
      Thông tin khoa
     </h2>
     <div class="form-group">
        <label>
            Phòng khám thuộc khoa
           </label>
           <select>
            <option value="">
             Chọn phòng khám
            </option>
           </select>
           <label>
            SDT
           </label>
           <input type="text" placeholder="Nhập số điện thoại"/>
     </div>
     <div class="form-group">
        <label>
            Tên Khoa
           </label>
           <input type="text" placeholder="Nhập tên khoa"/>
           <label for="email">
            Nhập email:
           </label>
           <input id="email" placeholder="Nhập email" type="text"/>
     </div>
     <div class="form-group">
      <label for="chuc-nang">
       Chức năng
      </label>
      <input id="chuc-nang" placeholder="Nhập chức năng" type="text"/>
      <label>
        Trưởng Khoa
       </label>
       <select>
        <option value="">
         Chọn trưởng khoa
        </option>
       </select>
     </div>
     
     <hr/>
     <h2>
      Danh sách khoa
     </h2>
     <div class="table-container">
      <table>
       <thead>
        <tr>
            <th>
             STT
            </th>
            <th>
             MÃ KHOA
            </th>
            <th>
             TÊN KHOA
            </th>
            <th>
             PHÒNG KHÁM THUỘC KHOA
            </th>
            <th>
             CHỨC NĂNG
            </th>
            <th>
             TRƯỞNG KHOA
            </th>
            <th>
             SDT
            </th>
            <th>
             EMAIL
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