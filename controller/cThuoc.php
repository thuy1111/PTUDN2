<?php
	include_once("../../model/mThuoc.php");
	class cThuoc {
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
	
		// Function to get the list of medicines
		public function layDSThuoc() {
			$p = new mThuoc();
			$tbl = $p->layDSThuoc();
			if ($tbl) {
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return -1; // No data found in the table
				}
			} else {
				return false;
			}
		}
	
		// Function to view medicine details
		public function xemthongtinthuoc($maThuoc) {
			$p = new mThuoc();
			$tbl = $p->xem1thuoc($maThuoc);
			if ($tbl) {
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return -1; // No data found in the table
				}
			} else {
				return false;
			}
		}
	
		// Function to search for medicines
		public function timkiemthuoc($timkiem) {
			$p = new mThuoc();
			$tbl = $p->searchthuoc($timkiem);
			if ($tbl->num_rows > 0) {
				return $tbl;
			} else {
				return false; // No data found
			}
		}
	
		// Function to add a new medicine
		public function addthuoc($tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $maLoaiThuoc) {
			$p = new mThuoc();
			$tbl = $p->themthuoc($tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $maLoaiThuoc);
			return $tbl;
		}
	
		// Function to update medicine details
		public function capnhatThuoc($maThuoc, $tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai) {
			// Update query without loaiThuoc
			$query = "UPDATE thuoc SET 
						tenThuoc='$tenThuoc', 
						soLuong='$soLuong', 
						donViCungCap='$donViCungCap', 
						donGia='$donGia', 
						donViTinh='$donViTinh', 
						cachDung='$cachDung', 
						trangThai='$trangThai' 
						WHERE maThuoc='$maThuoc'";
			
			// Execute the query
			$result = mysqli_query($this->conn, $query);
			
			return $result; // Return the result (true/false)
		}
		
	
		// Destructor to close the database connection
		public function __destruct() {
			mysqli_close($this->conn);
		}
	}
	
?>