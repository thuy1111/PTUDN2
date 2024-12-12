<?php
    include_once("../../model/mNhanVien.php");
    class cNhanVien{
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
        public function laydanhsachnhanvien(){
            $p = new   mNhanVien();
			
			$tbl = $p->xemdanhsachnhanvien();
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
        public function xemthongtinnv($maNhanVien){
            $p = new   mNhanVien();
           
			$tbl = $p->xem1nhanvien($maNhanVien);
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
		public function timkiemnv($timkiem){
            $p = new   mNhanVien();
           
			$tbl = $p->searchNV($timkiem);
			
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return false; // Không có dữ liệu trong bảng
				}
			
        }
        public function addnhanvien($hoTen,$ngaySinh,$gioiTinh,$tenDangNhap,$matKhau,$soDienThoai,$email,$diachi,$maChucVu,$maKhoa,$trangthai)
        {
            $p = new   mNhanVien();
           
			$tbl = $p->themnhanvien($hoTen,$ngaySinh,$gioiTinh,$tenDangNhap,$matKhau,$soDienThoai,$email,$diachi,$maChucVu,$maKhoa,$trangthai);
			
				
				return $tbl;
        }
		public function nhanvienTonTai($hoTen) {
			$query = "SELECT * FROM nhanvien WHERE hoTen = '$hoTen'";
			$result = mysqli_query($this->conn, $query);

			// Return true if a record exists, false otherwise
			return mysqli_num_rows($result) > 0;
		}
        public function updatettnv($maNhanVien,$hoTen,$ngaySinh,$soDienThoai,$email,$diachi,$trangthai,$maChucVu,$maKhoa)
        {
            $p = new   mNhanVien();
           
			$tbl = $p->capnhatthongtinnv($maNhanVien,$hoTen,$ngaySinh,$soDienThoai,$email,$diachi,$trangthai,$maChucVu,$maKhoa);
			
				
				return $tbl;
				
			
        }
		

    }
    ?>