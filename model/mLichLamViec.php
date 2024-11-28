<?php
include_once("connect.php");

class LichLamViec {
    private $conn;
    private $table_name = "lichlamviec";

    public $maLichLamViec;
    public $ngayLamViec;
    public $caLamViec;
    public $maNhanVien;

    public function __construct() {
        $db = new clsKetNoi();
        $this->conn = $db->connect();
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (ngayLamViec, caLamViec, maNhanVien) VALUES (:ngayLamViec, :caLamViec, :maNhanVien)";
        $stmt = $this->conn->prepare($query);

        $this->ngayLamViec = htmlspecialchars(strip_tags($this->ngayLamViec));
        $this->caLamViec = htmlspecialchars(strip_tags($this->caLamViec));
        $this->maNhanVien = htmlspecialchars(strip_tags($this->maNhanVien));

        $stmt->bindParam(":ngayLamViec", $this->ngayLamViec);
        $stmt->bindParam(":caLamViec", $this->caLamViec);
        $stmt->bindParam(":maNhanVien", $this->maNhanVien);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read($maNhanVien, $startDate, $endDate) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE maNhanVien = :maNhanVien AND ngayLamViec BETWEEN :startDate AND :endDate ORDER BY ngayLamViec, caLamViec";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maNhanVien", $maNhanVien);
        $stmt->bindParam(":startDate", $startDate);
        $stmt->bindParam(":endDate", $endDate);
        $stmt->execute();
        return $stmt;
    }

    public function deleteExistingShifts($maNhanVien, $startDate, $endDate) {
        $query = "DELETE FROM " . $this->table_name . " WHERE maNhanVien = :maNhanVien AND ngayLamViec BETWEEN :startDate AND :endDate";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":maNhanVien", $maNhanVien);
        $stmt->bindParam(":startDate", $startDate);
        $stmt->bindParam(":endDate", $endDate);
        return $stmt->execute();
    }
}