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
		// Function to check if a medicine already exists
		public function thuocTonTai($tenThuoc) {
			$query = "SELECT * FROM thuoc WHERE tenThuoc = '$tenThuoc'";
			$result = mysqli_query($this->conn, $query);

			// Return true if a record exists, false otherwise
			return mysqli_num_rows($result) > 0;
		}

	
		// Function to update medicine details
		public function capnhatThuoc($maThuoc, $tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $loaiThuoc)
{
    // Open database connection
    $p = new clsKetNoi();
    $conn = $p->moketnoi();
    $conn->set_charset("utf8");

    if (!$conn) {
        return false; // Connection failed
    }

    // Sanitize inputs to prevent SQL injection
    $maThuoc = mysqli_real_escape_string($conn, $maThuoc);
    $tenThuoc = mysqli_real_escape_string($conn, $tenThuoc);
    $soLuong = mysqli_real_escape_string($conn, $soLuong);
    $donViCungCap = mysqli_real_escape_string($conn, $donViCungCap);
    $donGia = mysqli_real_escape_string($conn, $donGia);
    $donViTinh = mysqli_real_escape_string($conn, $donViTinh);
    $cachDung = mysqli_real_escape_string($conn, $cachDung);
    $trangThai = mysqli_real_escape_string($conn, $trangThai);
    $loaiThuoc = mysqli_real_escape_string($conn, $loaiThuoc);

    // Build the update query
    $query = "UPDATE thuoc 
              SET 
                  tenThuoc = '$tenThuoc',
                  soLuong = '$soLuong',
                  donViCungCap = '$donViCungCap',
                  donGia = '$donGia',
                  donViTinh = '$donViTinh',
                  cachDung = '$cachDung',
                  trangThai = '$trangThai',
                  maLoaiThuoc = '$loaiThuoc'
              WHERE 
                  maThuoc = '$maThuoc'";

    // Execute the query
    $result = $conn->query($query);

    // Close the connection
    $p->dongketnoi($conn);

    // Return the result (true for success, false for failure)
    return $result;
}

		
	}
?>