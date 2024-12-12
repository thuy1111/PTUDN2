<?php
    include_once("connect.php");

    class mThuoc
{
    private $conn;

    // Constructor without parameters
    public function __construct() {
        $p = new clsKetNoi();
        $this->conn = $p->moketnoi();
        $this->conn->set_charset("utf8");
    }

    public function layDSThuoc() {
        if ($this->conn) {
            $str = "SELECT *, l.tenLoaiThuoc FROM thuoc t JOIN loaithuoc l ON l.maLoaiThuoc = t.maLoaiThuoc ORDER BY t.maThuoc ASC";
            $tbl = $this->conn->query($str);
            return $tbl;
        } else {
            return false;
        }
    }
        public function xem1thuoc($maThuoc)
        {
            $p = new clsKetNoi();
            $conn = $p->moketnoi();
            $conn->set_charset("utf8");
            if ($conn) {
                $str = "SELECT * from thuoc where maThuoc ='$maThuoc'";
                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            } else {
                return false;
            }
        }

			// Kiểm tra thuốc tồn tại
			public function thuocTonTai($tenThuoc) {
				$p = new clsKetNoi();
				$conn = $p->moketnoi();
				$conn->set_charset("utf8");

				$tenThuoc = mysqli_real_escape_string($conn, $tenThuoc); // Xử lý chuỗi để tránh SQL Injection
				$query = "SELECT * FROM thuoc WHERE tenThuoc = '$tenThuoc'";
				$result = $conn->query($query);

				$p->dongketnoi($conn);

				// Nếu tìm thấy thuốc thì trả về `true`, ngược lại trả về `false`
				return $result->num_rows > 0;
			}

		
			// Function to add a new medicine
			public function themThuoc($tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $loaiThuoc) {
				$tenThuoc = mysqli_real_escape_string($this->conn, $tenThuoc);
				$donViCungCap = mysqli_real_escape_string($this->conn, $donViCungCap);
				$donViTinh = mysqli_real_escape_string($this->conn, $donViTinh);
				$cachDung = mysqli_real_escape_string($this->conn, $cachDung);
		
				$query = "INSERT INTO thuoc (tenThuoc, soLuong, donViCungCap, donGia, donViTinh, cachDung, trangThai, maLoaiThuoc) 
          VALUES ('$tenThuoc', $soLuong, '$donViCungCap', $donGia, '$donViTinh', '$cachDung', $trangThai, $loaiThuoc)";

				
				$result = mysqli_query($this->conn, $query);
		
				if (!$result) {
					return "Error: " . mysqli_error($this->conn);
				}
				
		
				return $result;
			}
		

        public function capnhatthongtinthuoc($maThuoc, $tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $maLoaiThuoc)
        {
            $p = new clsKetNoi();
            $conn = $p->moketnoi();
            $conn->set_charset("utf8");

            if ($conn) {
                // Sanitize inputs to prevent SQL injection
                $maThuoc = mysqli_real_escape_string($conn, $maThuoc);
                $tenThuoc = mysqli_real_escape_string($conn, $tenThuoc);
                $soLuong = mysqli_real_escape_string($conn, $soLuong);
                $donViCungCap = mysqli_real_escape_string($conn, $donViCungCap);
                $donGia = mysqli_real_escape_string($conn, $donGia);
                $donViTinh = mysqli_real_escape_string($conn, $donViTinh);
                $cachDung = mysqli_real_escape_string($conn, $cachDung);
                $trangThai = mysqli_real_escape_string($conn, $trangThai);
                $maLoaiThuoc = mysqli_real_escape_string($conn, $maLoaiThuoc);

                // Check if the input 'trangThai' is valid
                try {
                    $trangThaiEnum = TrangThaiThuoc::from($trangThai); // This ensures the value matches the enum
                    $trangThaiValue = $trangThaiEnum->value;
                } catch (ValueError $e) {
                    // If invalid, default to 'Còn hàng' (1)
                    $trangThaiValue = TrangThaiThuoc::ConHang->value;
                }

                // Build the update query
                $str = "UPDATE thuoc SET 
                        tenThuoc = '$tenThuoc', 
                        soLuong = '$soLuong', 
                        donViCungCap = '$donViCungCap', 
                        donGia = '$donGia', 
                        donViTinh = '$donViTinh', 
                        cachDung = '$cachDung', 
                        trangThai = '$trangThaiValue', 
                        maLoaiThuoc = '$maLoaiThuoc'
                        WHERE maThuoc = '$maThuoc'";

                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            } else {
                return false;
            }
        }

        public function searchthuoc($timkiem)
        {
            $p = new clsKetNoi();
            $conn = $p->moketnoi();
            $conn->set_charset("utf8");

            if ($conn) {
                if (empty($timkiem)) {
                    $str = "SELECT *, l.tenLoaiThuoc 
                            FROM thuoc t 
                            JOIN loaithuoc l 
                            ON l.maLoaiThuoc = t.maLoaiThuoc";
                } else {
                    $timkiem = mysqli_real_escape_string($conn, $timkiem);

                    $str = "SELECT *, l.tenLoaiThuoc 
                            FROM thuoc t 
                            JOIN loaithuoc l 
                            ON l.maLoaiThuoc = t.maLoaiThuoc
                            WHERE t.tenThuoc LIKE '%$timkiem%'
                            OR l.tenLoaiThuoc LIKE '%$timkiem%'
                            OR t.cachDung LIKE '%$timkiem%'";
                }

                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            } else {
                return false;
            }
        }
    }
?>
