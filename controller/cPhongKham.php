<?php
    include_once("../../model/mPhongKham.php");
    class cPhongKham{
		private $conn;
	
		// Constructor to initialize the database connection
		public function __construct() {
			// Use correct username, password, and database name
			$this->conn = mysqli_connect("localhost", "root", "", "hospital_db");
	
			// Check the connection
			if (!$this->conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
		}
        public function laydanhsachphongkham(){
            $p = new mPhongKham();
           
			$tbl = $p->xemdanhsachphongkham();
			if ($tbl) {
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return -1; // Không có dữ liệu trong bảng
				}
			} else {
				return false;
			}
        }
		public function xemthongtinphongkham($maPhongKham){
            $p = new   mPhongKham();
           
			$tbl = $p->xem1phongkham($maPhongKham);
			if ($tbl) {
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return -1; // Không có dữ liệu trong bảng
				}
			} else {
				return false;
			}
        }
		public function timkiempk($timkiem){
            $p = new   mPhongKham();
           
			$tbl = $p->searchpk($timkiem);
			
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return false; // Không có dữ liệu trong bảng
				}
			
        }
        public function addphongkham($tenPhongKham,$maKhoa,$chucNang,$trangthai)
        {
            $p = new   mPhongKham();
           
			$tbl = $p->themphongkham($tenPhongKham,$maKhoa,$chucNang,$trangthai);
			
				
				return $tbl;
				
			
        }
		public function phongkhamTonTai($tenPhongKham) {
			$query = "SELECT * FROM phongkham WHERE tenPhongKham = '$tenPhongKham'";
			$result = mysqli_query($this->conn, $query);

			// Return true if a record exists, false otherwise
			return mysqli_num_rows($result) > 0;
		}
        public function updatettpk($maPhongKham,$tenPhongKham,$maKhoa,$chucNang,$trangthai)
        {
            $p = new   mPhongKham();
           
			$tbl = $p->capnhatthongtinphongkham($maPhongKham,$tenPhongKham,$maKhoa,$chucNang,$trangthai);
			
				
				return $tbl;
				
			
        }
		
    }
    ?>