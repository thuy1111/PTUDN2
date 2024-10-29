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
            display: flex;
            justify-content: space-between;
        }
        .calendar {
            width: 40%;
        }
        .calendar table {
            width: 100%;
            border-collapse: collapse;
        }
        .calendar th, .calendar td {
            border: 1px solid #B2DFDB;
            padding: 10px;
            text-align: center;
        }
        .calendar th {
            background-color: #E0F2F1;
        }
        .calendar td.selected {
            background-color: #80CBC4;
        }
        .table-container {
            width: 55%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #B2DFDB;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buttons .cancel {
            background-color: #FFCDD2;
        }
        .buttons .update {
            background-color: #FFAB91;
        }
        .confirmation {
            text-align: center;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 5px;
        }
        .confirmation button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .confirmation .back {
            background-color: #E0E0E0;
        }
        .confirmation .confirm {
            background-color: #BDBDBD;
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
    <div class="calendar">
      <h3>February 2024</h3>
      <table>
       <tr>
        <th>Sun</th>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
       </tr>
       <tr>
        <td></td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
       </tr>
       <tr>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
        <td>11</td>
        <td>12</td>
        <td>13</td>
       </tr>
       <tr>
        <td>14</td>
        <td>15</td>
        <td>16</td>
        <td class="selected">17</td>
        <td>18</td>
        <td>19</td>
        <td>20</td>
       </tr>
       <tr>
        <td>21</td>
        <td>22</td>
        <td>23</td>
        <td class="selected">24</td>
        <td>25</td>
        <td>26</td>
        <td>27</td>
       </tr>
       <tr>
        <td>28</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       </tr>
      </table>
     </div>
     <div class="table-container">
      <h3>
       NHÂN VIÊN: NGUYỄN VĂN A
      </h3>
      <h3>
       CẬP NHẬT THÔNG TIN ĐĂNG KÝ CA LÀM VIỆC
      </h3>
      <table>
       <tr>
        <th>
         Ca làm việc
        </th>
        <th>
         Thời gian bắt đầu
        </th>
        <th>
         Thời gian kết thúc
        </th>
        <th>
         Trạng thái
        </th>
       </tr>
       <tr>
        <td>
         CA 1
        </td>
        <td>
         3.00 AM
        </td>
        <td>
         9.00 AM
        </td>
        <td>
         ĐÃ ĐĂNG KÝ
        </td>
       </tr>
      </table>
      <div class="buttons">
       <button class="cancel">
        HỦY
       </button>
       <button class="update">
        CẬP NHẬT
       </button>
      </div>
     </div>
    </div>
    <div class="confirmation">
     <p>
      BẠN MUỐN CẬP NHẬT CA LÀM VIỆC CỦA NHÂN VIÊN NGUYỄN VĂN A?
     </p>
     <button class="back">
      QUAY LẠI
     </button>
     <button class="confirm">
      XÁC NHẬN
     </button>
    </div>
     </div>
    </div>
    
    </div>
   </div>
  </div>
 </body>
</html>