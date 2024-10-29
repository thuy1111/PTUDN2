<html>
 <head>
  <title>
   Quản lý thông tin nhân viên
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
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content h3 {
            margin-top: 0;
            font-size: 48px;
        }
        .form-group {
            display: flex;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 150px;
            font-weight: bold;
            font-size: 16px;
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
        .buttons .delete-btn {
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
        .content .confirmation {
            margin-top: 20px;
            padding: 20px;
            background-color: #E0F7FA;
            text-align: center;
        }
        .content .confirmation button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            color: #fff;
            cursor: pointer;
        }
        .content .confirmation .cancel {
            background-color: #BDBDBD;
        }
        .content .confirmation .confirm {
            background-color: #FF5252;
            color: #fff;
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
       </i>
       Quản lý thông tin nhân viên
      </a>
     </li>
     <li>
      <a href="#">
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
     <h1>
      Quản Lý Thông Tin Nhân Viên
     </h1>
     <hr/>
     <div class="buttons">
      <button class="add-btn" >
       Thêm
      </button>
      <button class="update-btn">
       Cập nhật
      </button>
      <button class="delete-btn">
       Xóa
      </button>
     </div>
     <hr/>
     <h2>
      Thông tin nhân viên
     </h2>
     <div class="form-group">
      <label for="ho-va-ten">
       Họ và tên
      </label>
      <input id="ho-va-ten" placeholder="Nhập họ tên" type="text"/>
      <label for="gender" >
        Gioi tính:
       </label>
       <select id="gender">
        <option value="male">
         Nam
        </option>
        <option value="female">
         Nữ
        </option>
       </select>
     </div>
     <div class="form-group">
        <label for="birth-year">
            Năm sinh:
           </label>
           <input id="birth-year" placeholder="Nhập năm sinh" type="text"/>
           <label for="department">
            Bộ phận:
           </label>
           <select id="department">
            <option value="department1">
             Bộ phận 1
            </option>
            <option value="department2">
             Bộ phận 2
            </option>
           </select>
     </div>
     <div class="form-group">
        <label for="phone">
            Số điện thoại:
           </label>
           <input id="phone" placeholder="Nhập số điện thoại" type="text"/>
           <label for="position">
            Chức vụ:
           </label>
           <select id="position">
            <option value="position1">
             Chức vụ 1
            </option>
            <option value="position2">
             Chức vụ 2
            </option>
           </select>
     </div>
    
     <div class="form-group">
        <label for="email">
            Nhập email:
           </label>
           <input id="email" placeholder="Nhập email" type="text"/>
           <label for="address">
            Địa chỉ:
           </label>
           <input id="address" placeholder="Nhập địa chỉ" type="text"/>
     </div>
     
     <hr/>
     <div class="confirmation">
        <p>
         BẠN CÓ MUỐN XÓA NHÂN VIÊN NÀY KHÔNG?
        </p>
        <button class="cancel">
         Hủy
        </button>
        <button class="confirm">
         Xóa
        </button>
       </div>
    </div>
   </div>
  </div>
 </body>
</html>