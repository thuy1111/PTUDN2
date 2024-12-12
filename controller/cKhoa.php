<?php
	include_once("../../model/mKhoa.php");
	class cKhoa
	{
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
		public function layDSKhoa()
		{
			$p = new mKhoa();
			$tbl = $p->layDSKhoa();
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

		public function layDSBSTheoKhoa($maKhoa){
			$p = new mKhoa();
			$dsBS = $p->layDSBSTheoKhoa($maKhoa);
			if ($dsBS) {
				return $dsBS;
			} else {
				return false;
			}
		}
		public function xemthongtinkhoa($maKhoa){
            $p = new   mKhoa();
           
			$tbl = $p->xem1Khoa($maKhoa);
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
		public function timkiemkhoa($timkiem){
            $p = new   mKhoa();
           
			$tbl = $p->searchKhoa($timkiem);
			
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return false; // Không có dữ liệu trong bảng
				}
			
        }
        public function addKhoa($tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai)
        {
            $p = new   mKhoa();
           
			$tbl = $p->themKhoa($tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai);
			
				
				return $tbl;	
        }
		public function khoaTonTai($tenKhoa) {
			$query = "SELECT * FROM khoa WHERE tenKhoa = '$tenKhoa'";
			$result = mysqli_query($this->conn, $query);

			// Return true if a record exists, false otherwise
			return mysqli_num_rows($result) > 0;
		}

		

        public function updatettkhoa($maKhoa,$tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai)
        {
            $p = new   mKhoa();
           
			$tbl = $p->capnhatthongtinkhoa($maKhoa,$tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai);
			
				
				return $tbl;
				
			
        }
	}
?>
