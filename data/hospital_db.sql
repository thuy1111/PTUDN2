-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 02:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baohiem`
--

CREATE TABLE `baohiem` (
  `maBaoHiem` int(11) NOT NULL,
  `loaiBaoHiem` int(11) NOT NULL,
  `quyenLoi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baohiem`
--

INSERT INTO `baohiem` (`maBaoHiem`, `loaiBaoHiem`, `quyenLoi`) VALUES
(1, 1, 'Chi trả viện phí');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `maBenhNhan` int(11) NOT NULL,
  `hoTen` varchar(50) NOT NULL,
  `ngaySinh` date DEFAULT NULL,
  `gioiTinh` enum('Nữ','Nam','Khác') DEFAULT NULL,
  `diaChi` varchar(100) NOT NULL,
  `soDienThoai` varchar(11) NOT NULL,
  `tenDangNhap` varchar(20) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `maBaoHiem` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`maBenhNhan`, `hoTen`, `ngaySinh`, `gioiTinh`, `diaChi`, `soDienThoai`, `tenDangNhap`, `matKhau`, `maBaoHiem`, `maHoaDon`) VALUES
(1, 'Nguyễn Văn A', '2000-11-05', 'Nữ', '12 Nguyễn Văn Bảo Gò Vấp', '0955734569', 'nguyenvana', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'Trần Thị B', '1990-08-22', 'Nữ', '456 Đường XYZ, TP. Hồ Chí Minh', '0987654321', 'tranthib', 'e10adc3949ba59abbe56e057f20f883e', 1, 2),
(3, 'Lê Văn C', '2000-11-10', 'Nam', '789 Đường DEF, Đà Nẵng', '0934567890', 'levanc', 'e10adc3949ba59abbe56e057f20f883e', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `maChucVu` int(11) NOT NULL,
  `tenChucVu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`maChucVu`, `tenChucVu`) VALUES
(1, 'Bác sĩ'),
(2, 'Y tá'),
(3, 'Quản lý Nhân sự'),
(4, 'Lễ Tân'),
(5, 'Nhân viên quản lý thuốc'),
(6, 'Nhân viên kế toán');

-- --------------------------------------------------------

--
-- Table structure for table `donthuoc`
--

CREATE TABLE `donthuoc` (
  `maDonThuoc` int(11) NOT NULL,
  `bacSiChiDinh` varchar(100) NOT NULL,
  `soLuong` int(10) NOT NULL,
  `maThuoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donthuoc`
--

INSERT INTO `donthuoc` (`maDonThuoc`, `bacSiChiDinh`, `soLuong`, `maThuoc`) VALUES
(1, '1', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `ngayKham` date DEFAULT NULL,
  `tongTienKham` decimal(10,0) DEFAULT NULL,
  `tongTienThuoc` decimal(10,0) DEFAULT NULL,
  `tongTienXetNghiem` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHoaDon`, `ngayKham`, `tongTienKham`, `tongTienThuoc`, `tongTienXetNghiem`) VALUES
(1, '2023-03-08', 100000, 50000, 200000),
(2, '2023-09-02', 200000, 70000, 70000),
(3, '2023-10-01', 300000, 120000, 80000),
(4, '2023-09-01', 150000, 50000, 30000),
(5, '2023-09-02', 200000, 70000, 40000),
(6, '2023-09-03', 120000, 45000, 25000),
(7, '2023-09-04', 170000, 60000, 30000),
(8, '2023-09-05', 130000, 50000, 20000),
(9, '2023-09-06', 190000, 55000, 40000),
(10, '2023-09-07', 160000, 60000, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon_phieukhambenh`
--

CREATE TABLE `hoadon_phieukhambenh` (
  `maHoaDon` int(11) NOT NULL,
  `maPKB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `maKhoa` int(10) NOT NULL,
  `tenKhoa` varchar(100) NOT NULL,
  `truongKhoa` varchar(100) NOT NULL,
  `soDienThoai` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`maKhoa`, `tenKhoa`, `truongKhoa`, `soDienThoai`, `email`) VALUES
(1, 'Xét nghiệm', 'Nguyễn Phú Quý', '0868105111', 'nguyenphuquy91@gmail.com'),
(2, 'Khám bệnh', 'Nguyễn Thanh Hà', '0389636777', 'nguyenthanhha1909@gmail.com'),
(3, 'Dược', 'Đinh Tùng Anh', '0368789353', 'dinhtunganh11@gmail.com'),
(4, 'Chuẩn đoán hình ảnh', 'Bùi Văn Nam', '0305915271', 'buivannam85@gmail.com'),
(5, 'Nội soi', 'Trần Thị Mai', '0356897512', 'tranthimai@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lichkham`
--

CREATE TABLE `lichkham` (
  `maLichKham` int(10) UNSIGNED NOT NULL,
  `ngayKham` date DEFAULT NULL,
  `gioKham` time DEFAULT NULL,
  `vanDeKham` text DEFAULT NULL,
  `giaDichVuKham` int(11) DEFAULT NULL,
  `maNhanVien` int(11) DEFAULT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `maBaoHiem` int(11) DEFAULT NULL,
  `maKhoa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichkham`
--

INSERT INTO `lichkham` (`maLichKham`, `ngayKham`, `gioKham`, `vanDeKham`, `giaDichVuKham`, `maNhanVien`, `maBenhNhan`, `maBaoHiem`, `maKhoa`) VALUES
(1, '2024-10-12', '09:30:00', 'Đau đầu và chóng mặt', 500000, 1, 1, 1, 2),
(2, '2024-10-13', '10:00:00', 'Ho và sốt', 500000, 5, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `maLichLamViec` int(11) NOT NULL,
  `ngayLamViec` date NOT NULL,
  `caLamViec` enum('Ca 1','Ca 2','Ca 3','') NOT NULL,
  `maNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichlamviec`
--

INSERT INTO `lichlamviec` (`maLichLamViec`, `ngayLamViec`, `caLamViec`, `maNhanVien`) VALUES
(1, '2024-11-03', 'Ca 1', 1),
(2, '2024-11-03', 'Ca 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lichlamviec_phongkham`
--

CREATE TABLE `lichlamviec_phongkham` (
  `maLichLamViec` int(11) DEFAULT NULL,
  `maPhongKham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaibaohiem`
--

CREATE TABLE `loaibaohiem` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaibaohiem`
--

INSERT INTO `loaibaohiem` (`maLoai`, `tenLoai`) VALUES
(1, 'Bảo hiểm Y');

-- --------------------------------------------------------

--
-- Table structure for table `loaithuoc`
--

CREATE TABLE `loaithuoc` (
  `maLoaiThuoc` int(10) NOT NULL,
  `tenLoaiThuoc` varchar(50) NOT NULL,
  `moTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loaithuoc`
--

INSERT INTO `loaithuoc` (`maLoaiThuoc`, `tenLoaiThuoc`, `moTa`) VALUES
(1, 'Thuốc giảm đau', 'Dùng để giảm đau, hạ sốt, viêm'),
(2, 'Kháng sinh', 'Điều trị nhiễm khuẩn'),
(3, 'Vitamin', 'Bổ sung vitamin cho cơ thể'),
(4, 'Thuốc tiêu hóa', 'Điều trị các vấn đề về tiêu hóa'),
(5, 'Thuốc tim mạch', 'Điều trị các bệnh về tim mạch'),
(6, 'Thuốc nội tiết', 'Điều hòa hoạt động nội tiết');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNhanVien` int(11) NOT NULL,
  `hoTen` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` enum('Nam','Nữ','Khác') NOT NULL,
  `tenDangNhap` varchar(50) NOT NULL,
  `matKhau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soDienThoai` varchar(15) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tinhTrangNhanVien` enum('Đang làm việc','Nghỉ việc','Tạm nghỉ') DEFAULT NULL,
  `maChucVu` int(11) NOT NULL,
  `maKhoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`maNhanVien`, `hoTen`, `ngaySinh`, `gioiTinh`, `tenDangNhap`, `matKhau`, `soDienThoai`, `email`, `diaChi`, `tinhTrangNhanVien`, `maChucVu`, `maKhoa`) VALUES
(1, 'Nguyễn Văn An', '1985-05-15', 'Nam', 'nguyenvanan', 'e10adc3949ba59abbe56e057f20f883e', '0123456789', 'nguyenvanan@gmail.com', '123 Đường ABC, Quận 1, TP.HCM', 'Đang làm việc', 1, 2),
(2, 'Trần Thị Bích', '1990-07-20', 'Nữ', 'tranthibich', 'e10adc3949ba59abbe56e057f20f883e', '0987654321', 'tranthibich@gmail.com', '456 Đường DEF, Quận 2, TP.HCM', 'Đang làm việc', 2, 2),
(3, 'Lê Văn Cẩn', '1988-03-10', 'Nam', 'levancan', 'e10adc3949ba59abbe56e057f20f883e', '0123987654', 'levanc@gmail.com', '789 Đường GHI, Quận 3, TP.HCM', 'Đang làm việc', 1, 2),
(4, 'Phạm Thị Diễm', '1995-11-25', 'Nữ', 'phamthidiem', 'e10adc3949ba59abbe56e057f20f883e', '0987123456', 'phamthidiem@gmail.com', '321 Đường JKL, Quận 4, TP.HCM', 'Đang làm việc', 2, 2),
(5, 'Hoàng Văn Thụ', '1980-12-30', 'Nam', 'hoangvanthu', 'e10adc3949ba59abbe56e057f20f883e', '0123456780', 'hoangvanthu@gmail.com', '654 Đường MNO, Quận 5, TP.HCM', 'Đang làm việc', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `phieukhambenh`
--

CREATE TABLE `phieukhambenh` (
  `maPhieuKhamBenh` int(11) NOT NULL,
  `maPhongKham` varchar(10) DEFAULT NULL,
  `ngayKham` date DEFAULT NULL,
  `lyDoKham` varchar(255) DEFAULT NULL,
  `tienSu` text DEFAULT NULL,
  `benhSu` text DEFAULT NULL,
  `mach` varchar(255) DEFAULT NULL,
  `huyetAp` varchar(255) DEFAULT NULL,
  `nhietDo` varchar(255) DEFAULT NULL,
  `chieuCao` varchar(255) DEFAULT NULL,
  `canNang` varchar(255) DEFAULT NULL,
  `chanDoan` varchar(255) DEFAULT NULL,
  `ketLuan` varchar(255) DEFAULT NULL,
  `trieuChung` text DEFAULT NULL,
  `maDonThuoc` int(11) NOT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `maNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieukhambenh`
--

INSERT INTO `phieukhambenh` (`maPhieuKhamBenh`, `maPhongKham`, `ngayKham`, `lyDoKham`, `tienSu`, `benhSu`, `mach`, `huyetAp`, `nhietDo`, `chieuCao`, `canNang`, `chanDoan`, `ketLuan`, `trieuChung`, `maDonThuoc`, `maBenhNhan`, `maNhanVien`) VALUES
(1, '1', '2023-09-01', 'Ho kéo dài', 'Dị ứng thời tiết', 'Không', '80', '120/80', '37', '165', '60', 'Viêm họng', 'Uống thuốc điều trị', 'Ho,Đau họng', 1, 1, 1),
(2, '2', '2023-09-01', 'Ho kéo dài', 'Dị ứng thời tiết', 'Không', '80', '120/80', '37', '165', '60', 'Viêm họng', 'Uống thuốc điều trị', 'Ho, đau họng', 1, 1, 1),
(3, '3', '2023-09-02', 'Đau đầu', 'Thiếu máu', 'Không', '85', '130/85', '36.5', '170', '65', 'Đau đầu mãn tính', 'Điều trị bằng thuốc', 'Đau đầu, chóng mặt', 1, 1, 1),
(4, '4', '2023-09-03', 'Sốt cao', 'Sốt', 'Có', '90', '110/70', '38', '160', '55', 'Sốt virus', 'Nghỉ ngơi và uống thuốc', 'Sốt, đau cơ', 1, 1, 1),
(5, '5', '2023-09-04', 'Khó thở', 'Hen suyễn', 'Có', '75', '120/75', '36.8', '175', '70', 'Hen suyễn', 'Dùng thuốc điều trị', 'Khó thở', 1, 1, 1),
(6, '6', '2023-09-05', 'Đau bụng', 'Viêm dạ dày', 'Không', '80', '125/80', '37.2', '155', '50', 'Viêm dạ dày', 'Điều trị bằng thuốc', 'Đau bụng', 1, 1, 1),
(7, '7', '2023-09-06', 'Phát ban', 'Dị ứng', 'Có', '85', '120/78', '36.7', '180', '75', 'Dị ứng da', 'Dùng kem và thuốc', 'Ngứa, phát ban', 1, 1, 1),
(8, '8', '2023-09-07', 'Đau ngực', 'Không', 'Có', '78', '140/90', '37', '168', '68', 'Bệnh tim', 'Khám chuyên khoa', 'Đau ngực', 1, 1, 1),
(9, '9', '2023-09-08', 'Suy nhược', 'Không', 'Không', '82', '110/65', '36.5', '172', '62', 'Suy nhược cơ thể', 'Bổ sung dinh dưỡng', 'Mệt mỏi', 1, 1, 1),
(10, '10', '2023-09-09', 'Đau lưng', 'Thoát vị đĩa đệm', 'Có', '88', '135/85', '36.8', '180', '80', 'Thoát vị đĩa đệm', 'Vật lý trị liệu', 'Đau lưng', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phieuxetnghiem`
--

CREATE TABLE `phieuxetnghiem` (
  `maPhieuXetNghiem` int(11) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `donGia` decimal(10,0) DEFAULT NULL,
  `tongTien` decimal(10,0) DEFAULT NULL,
  `ketQua` varchar(255) DEFAULT NULL,
  `ngayXetNghiem` date DEFAULT NULL,
  `maBacSi` varchar(10) DEFAULT NULL,
  `maPhongKham` varchar(10) DEFAULT NULL,
  `tenDichVuXetNghiem` varchar(255) DEFAULT NULL,
  `ketLuan` varchar(255) DEFAULT NULL,
  `maPhieuKhamBenh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieuxetnghiem`
--

INSERT INTO `phieuxetnghiem` (`maPhieuXetNghiem`, `soLuong`, `donGia`, `tongTien`, `ketQua`, `ngayXetNghiem`, `maBacSi`, `maPhongKham`, `tenDichVuXetNghiem`, `ketLuan`, `maPhieuKhamBenh`) VALUES
(1, 2, 150000, 300000, 'Âm tính', '2023-10-01', '1', '1', 'Xét nghiệm máu', 'Không phát hiện bất thường', 1),
(2, 1, 200000, 200000, 'Dương tính', '2023-10-02', '2', '2', 'Xét nghiệm nước tiểu', 'Dương tính với chất béo', 2),
(3, 3, 100000, 300000, 'Bình thường', '2023-10-03', '3', '3', 'Xét nghiệm đường huyết', 'Mức đường bình thường', 3),
(4, 1, 250000, 250000, 'Âm tính', '2023-10-04', '4', '4', 'Xét nghiệm viêm gan', 'Không có virus', 4),
(5, 2, 120000, 240000, 'Bình thường', '2023-10-05', '5', '5', 'Xét nghiệm chức năng gan', 'Chức năng bình thường', 5),
(6, 1, 180000, 180000, 'Âm tính', '2023-10-06', '6', '6', 'Xét nghiệm mỡ máu', 'Không phát hiện bất thường', 6),
(7, 2, 160000, 320000, 'Dương tính', '2023-10-07', '7', '7', 'Xét nghiệm vitamin', 'Thiếu vitamin D', 7),
(8, 1, 140000, 140000, 'Bình thường', '2023-10-08', '8', '8', 'Xét nghiệm canxi', 'Mức canxi bình thường', 8),
(9, 1, 110000, 110000, 'Âm tính', '2023-10-09', '9', '9', 'Xét nghiệm tổng quát', 'Không phát hiện bệnh', 9),
(10, 1, 190000, 190000, 'Dương tính', '2023-10-10', '10', '10', 'Xét nghiệm dị ứng', 'Dị ứng phấn hoa', 10);

-- --------------------------------------------------------

--
-- Table structure for table `phongkham`
--

CREATE TABLE `phongkham` (
  `maPhongKham` int(10) NOT NULL,
  `tenPhongKham` varchar(100) NOT NULL,
  `chucNang` varchar(50) NOT NULL,
  `tinhTrangHoatDong` enum('Đang hoạt động','Ngưng hoạt động','','') NOT NULL,
  `maKhoa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phongkham`
--

INSERT INTO `phongkham` (`maPhongKham`, `tenPhongKham`, `chucNang`, `tinhTrangHoatDong`, `maKhoa`) VALUES
(1, 'Phòng lấy mẫu', 'Lấy mẫu xét nghiệm', 'Đang hoạt động', 1),
(2, 'Phòng xét nghiệm', 'Thực hiện xét nghiệm', 'Đang hoạt động', 1),
(3, 'Phòng khám bệnh 1', 'Khám bệnh', 'Đang hoạt động', 2),
(4, 'Phòng khám bệnh 2', 'Khám bệnh', 'Đang hoạt động', 2),
(5, 'Phòng nội soi 1', 'Nội soi', 'Đang hoạt động', 5),
(6, 'Phòng nội soi 2', 'Nội soi', 'Đang hoạt động', 5),
(7, 'Phòng XQuang', 'Chụp X-Quang', 'Đang hoạt động', 4),
(8, 'Phòng siêu âm', 'Siêu âm', 'Đang hoạt động', 4);

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `maThuoc` int(10) NOT NULL,
  `tenThuoc` varchar(50) NOT NULL,
  `soLuong` int(10) DEFAULT NULL,
  `hanSuDung` date DEFAULT NULL,
  `donViCungCap` varchar(100) DEFAULT NULL,
  `donGia` decimal(10,2) DEFAULT NULL,
  `cachDung` text DEFAULT NULL,
  `donViTinh` varchar(50) DEFAULT NULL,
  `hoatChat` varchar(100) DEFAULT NULL,
  `dangBaoChe` varchar(50) DEFAULT NULL,
  `nhaSanXuat` varchar(100) DEFAULT NULL,
  `trangThai` enum('Còn hàng','Hết hàng','Gần hết','','') NOT NULL,
  `maLoaiThuoc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`maThuoc`, `tenThuoc`, `soLuong`, `hanSuDung`, `donViCungCap`, `donGia`, `cachDung`, `donViTinh`, `hoatChat`, `dangBaoChe`, `nhaSanXuat`, `trangThai`, `maLoaiThuoc`) VALUES
(9, 'Paracetamol', 100, '2025-12-31', 'Công ty Dược Việt Nam', 5000.00, 'Uống sau ăn', 'Viên', 'Paracetamol', 'Viên nén', 'Dược Hậu Giang', 'Còn hàng', 1),
(10, 'Ibuprofen', 80, '2024-11-30', 'Công ty Dược Traphaco', 8000.00, 'Uống sau ăn', 'Viên', 'Ibuprofen', 'Viên nang', 'Traphaco', 'Còn hàng', 1),
(11, 'Aspirin', 120, '2026-05-01', 'Công ty Dược Hậu Giang', 10000.00, 'Uống trước ăn', 'Viên', 'Aspirin', 'Viên nén', 'Dược Hậu Giang', 'Còn hàng', 1),
(12, 'Diclofenac', 50, '2025-07-20', 'Công ty Dược Mediplantex', 12000.00, 'Uống sau ăn', 'Viên', 'Diclofenac', 'Viên nang', 'Mediplantex', 'Gần hết', 1),
(13, 'Meloxicam', 70, '2024-12-01', 'Công ty Dược Pharma', 15000.00, 'Uống sau ăn', 'Viên', 'Meloxicam', 'Viên nén', 'Pharma', 'Hết hàng', 1),
(14, 'Naproxen', 90, '2026-02-15', 'Công ty Dược SPM', 13000.00, 'Uống sau ăn', 'Viên', 'Naproxen', 'Viên nang', 'SPM', 'Còn hàng', 1),
(15, 'Etoricoxib', 60, '2025-08-30', 'Công ty Dược Mekophar', 16000.00, 'Uống trước ăn', 'Viên', 'Etoricoxib', 'Viên nén', 'Mekophar', 'Gần hết', 1),
(16, 'Celecoxib', 75, '2024-09-30', 'Công ty Dược Vimedimex', 14000.00, 'Uống sau ăn', 'Viên', 'Celecoxib', 'Viên nang', 'Vimedimex', 'Còn hàng', 1),
(17, 'Piroxicam', 40, '2025-03-20', 'Công ty Dược Agimexpharm', 9000.00, 'Uống trước ăn', 'Viên', 'Piroxicam', 'Viên nén', 'Agimexpharm', 'Hết hàng', 1),
(18, 'Indomethacin', 85, '2026-01-10', 'Công ty Dược Sanofi', 7000.00, 'Uống sau ăn', 'Viên', 'Indomethacin', 'Viên nang', 'Sanofi', 'Còn hàng', 1),
(19, 'Amoxicillin', 120, '2025-10-15', 'Công ty Dược Hà Tây', 5000.00, 'Uống sau ăn', 'Viên', 'Amoxicillin', 'Viên nang', 'Hà Tây', 'Còn hàng', 2),
(20, 'Azithromycin', 90, '2024-06-05', 'Công ty Dược Mekophar', 15000.00, 'Uống sau ăn', 'Viên', 'Azithromycin', 'Viên nén', 'Mekophar', 'Còn hàng', 2),
(21, 'Ciprofloxacin', 50, '2026-12-12', 'Công ty Dược Traphaco', 10000.00, 'Uống trước ăn', 'Viên', 'Ciprofloxacin', 'Viên nén', 'Traphaco', 'Gần hết', 2),
(22, 'Levofloxacin', 100, '2025-05-15', 'Công ty Dược Sanofi', 20000.00, 'Uống sau ăn', 'Viên', 'Levofloxacin', 'Viên nang', 'Sanofi', 'Còn hàng', 2),
(23, 'Doxycycline', 75, '2024-11-30', 'Công ty Dược Hậu Giang', 13000.00, 'Uống sau ăn', 'Viên', 'Doxycycline', 'Viên nén', 'Dược Hậu Giang', 'Hết hàng', 2),
(24, 'Clarithromycin', 60, '2025-08-25', 'Công ty Dược Pharma', 18000.00, 'Uống sau ăn', 'Viên', 'Clarithromycin', 'Viên nang', 'Pharma', 'Còn hàng', 2),
(25, 'Erythromycin', 110, '2025-04-18', 'Công ty Dược Agimexpharm', 12000.00, 'Uống trước ăn', 'Viên', 'Erythromycin', 'Viên nén', 'Agimexpharm', 'Gần hết', 2),
(26, 'Metronidazole', 130, '2026-06-20', 'Công ty Dược Vimedimex', 8000.00, 'Uống sau ăn', 'Viên', 'Metronidazole', 'Viên nén', 'Vimedimex', 'Còn hàng', 2),
(27, 'Vancomycin', 95, '2024-10-25', 'Công ty Dược SPM', 25000.00, 'Tiêm', 'Dung dịch', 'Vancomycin', 'Dung dịch tiêm', 'SPM', 'Hết hàng', 2),
(28, 'Meropenem', 65, '2025-01-01', 'Công ty Dược Agimexpharm', 30000.00, 'Tiêm', 'Dung dịch', 'Meropenem', 'Dung dịch tiêm', 'Agimexpharm', 'Còn hàng', 2),
(29, 'Vitamin A', 140, '2025-11-20', 'Công ty Dược Vimedimex', 5000.00, 'Uống sau ăn', 'Viên', 'Retinol', 'Viên nang', 'Vimedimex', 'Còn hàng', 3),
(30, 'Vitamin B1', 120, '2024-07-12', 'Công ty Dược Agimexpharm', 4000.00, 'Uống sau ăn', 'Viên', 'Thiamine', 'Viên nén', 'Agimexpharm', 'Còn hàng', 3),
(31, 'Vitamin B6', 130, '2026-02-05', 'Công ty Dược Mekophar', 6000.00, 'Uống sau ăn', 'Viên', 'Pyridoxine', 'Viên nang', 'Mekophar', 'Hết hàng', 3),
(32, 'Vitamin B12', 100, '2025-09-30', 'Công ty Dược Traphaco', 8000.00, 'Uống sau ăn', 'Viên', 'Cobalamin', 'Viên nén', 'Traphaco', 'Còn hàng', 3),
(33, 'Vitamin C', 200, '2024-05-15', 'Công ty Dược Dược Hậu Giang', 3000.00, 'Uống sau ăn', 'Viên', 'Ascorbic acid', 'Viên sủi', 'Dược Hậu Giang', 'Còn hàng', 3),
(34, 'Vitamin D3', 90, '2026-01-01', 'Công ty Dược Mediplantex', 10000.00, 'Uống sau ăn', 'Viên', 'Cholecalciferol', 'Viên nang', 'Mediplantex', 'Còn hàng', 3),
(35, 'Vitamin E', 80, '2025-10-10', 'Công ty Dược SPM', 7000.00, 'Uống sau ăn', 'Viên', 'Tocopherol', 'Viên nang', 'SPM', 'Gần hết', 3),
(36, 'Vitamin K', 60, '2024-11-30', 'Công ty Dược Pharma', 9000.00, 'Uống sau ăn', 'Viên', 'Phytonadione', 'Viên nén', 'Pharma', 'Hết hàng', 3),
(37, 'Vitamin B2', 50, '2026-06-30', 'Công ty Dược Agimexpharm', 5000.00, 'Uống sau ăn', 'Viên', 'Riboflavin', 'Viên nén', 'Agimexpharm', 'Còn hàng', 3),
(38, 'Vitamin B3', 110, '2025-04-15', 'Công ty Dược Traphaco', 6000.00, 'Uống sau ăn', 'Viên', 'Niacin', 'Viên nén', 'Traphaco', 'Còn hàng', 3),
(39, 'Omeprazole', 90, '2025-08-31', 'Công ty Dược Pharma', 8000.00, 'Uống trước ăn', 'Viên', 'Omeprazole', 'Viên nang', 'Pharma', 'Còn hàng', 4),
(40, 'Esomeprazole', 70, '2024-09-10', 'Công ty Dược Mekophar', 9500.00, 'Uống sau ăn', 'Viên', 'Esomeprazole', 'Viên nang', 'Mekophar', 'Còn hàng', 4),
(41, 'Pantoprazole', 80, '2026-03-01', 'Công ty Dược SPM', 10000.00, 'Uống trước ăn', 'Viên', 'Pantoprazole', 'Viên nén', 'SPM', 'Gần hết', 4),
(42, 'Lansoprazole', 120, '2025-10-15', 'Công ty Dược Traphaco', 12000.00, 'Uống sau ăn', 'Viên', 'Lansoprazole', 'Viên nén', 'Traphaco', 'Còn hàng', 4),
(43, 'Ranitidine', 110, '2024-12-20', 'Công ty Dược Agimexpharm', 5000.00, 'Uống sau ăn', 'Viên', 'Ranitidine', 'Viên nén', 'Agimexpharm', 'Hết hàng', 4),
(44, 'Metoclopramide', 130, '2025-06-01', 'Công ty Dược Vimedimex', 7000.00, 'Uống sau ăn', 'Viên', 'Metoclopramide', 'Viên nén', 'Vimedimex', 'Còn hàng', 4),
(45, 'Domperidone', 60, '2026-01-10', 'Công ty Dược Mediplantex', 6000.00, 'Uống sau ăn', 'Viên', 'Domperidone', 'Viên nén', 'Mediplantex', 'Còn hàng', 4),
(46, 'Loperamide', 75, '2024-11-25', 'Công ty Dược Dược Hậu Giang', 5000.00, 'Uống sau ăn', 'Viên', 'Loperamide', 'Viên nang', 'Dược Hậu Giang', 'Gần hết', 4),
(47, 'Bismuth subsalicylate', 50, '2026-07-12', 'Công ty Dược Mekophar', 5500.00, 'Uống sau ăn', 'Viên', 'Bismuth subsalicylate', 'Viên nang', 'Mekophar', 'Còn hàng', 4),
(48, 'Simethicone', 140, '2025-05-15', 'Công ty Dược Agimexpharm', 4500.00, 'Uống sau ăn', 'Viên', 'Simethicone', 'Viên nén', 'Agimexpharm', 'Còn hàng', 4),
(49, 'Amlodipine', 100, '2026-04-01', 'Công ty Dược Dược Hậu Giang', 6000.00, 'Uống mỗi ngày', 'Viên', 'Amlodipine', 'Viên nén', 'Dược Hậu Giang', 'Còn hàng', 5),
(50, 'Bisoprolol', 70, '2024-08-15', 'Công ty Dược Traphaco', 7500.00, 'Uống mỗi ngày', 'Viên', 'Bisoprolol', 'Viên nén', 'Traphaco', 'Còn hàng', 5),
(51, 'Atenolol', 80, '2025-12-31', 'Công ty Dược Pharma', 9000.00, 'Uống mỗi ngày', 'Viên', 'Atenolol', 'Viên nén', 'Pharma', 'Gần hết', 5),
(52, 'Lisinopril', 50, '2026-03-20', 'Công ty Dược SPM', 7000.00, 'Uống mỗi ngày', 'Viên', 'Lisinopril', 'Viên nén', 'SPM', 'Còn hàng', 5),
(53, 'Ramipril', 75, '2025-11-10', 'Công ty Dược Mekophar', 9500.00, 'Uống mỗi ngày', 'Viên', 'Ramipril', 'Viên nén', 'Mekophar', 'Hết hàng', 5),
(54, 'Perindopril', 120, '2025-06-15', 'Công ty Dược Vimedimex', 8000.00, 'Uống mỗi ngày', 'Viên', 'Perindopril', 'Viên nén', 'Vimedimex', 'Còn hàng', 5),
(55, 'Metoprolol', 130, '2024-10-05', 'Công ty Dược Mediplantex', 8500.00, 'Uống mỗi ngày', 'Viên', 'Metoprolol', 'Viên nén', 'Mediplantex', 'Còn hàng', 5),
(56, 'Enalapril', 90, '2026-02-12', 'Công ty Dược Dược Hậu Giang', 5500.00, 'Uống mỗi ngày', 'Viên', 'Enalapril', 'Viên nén', 'Dược Hậu Giang', 'Còn hàng', 5),
(57, 'Irbesartan', 140, '2025-09-20', 'Công ty Dược Agimexpharm', 11000.00, 'Uống mỗi ngày', 'Viên', 'Irbesartan', 'Viên nén', 'Agimexpharm', 'Gần hết', 5),
(58, 'Losartan', 160, '2024-12-25', 'Công ty Dược Traphaco', 10500.00, 'Uống mỗi ngày', 'Viên', 'Losartan', 'Viên nén', 'Traphaco', 'Còn hàng', 5);

-- --------------------------------------------------------

--
-- Table structure for table `thuoc_donthuoc`
--

CREATE TABLE `thuoc_donthuoc` (
  `maThuoc` int(11) NOT NULL,
  `maDonThuoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baohiem`
--
ALTER TABLE `baohiem`
  ADD PRIMARY KEY (`maBaoHiem`),
  ADD KEY `FK_BH_LBH` (`loaiBaoHiem`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`maBenhNhan`),
  ADD KEY `FK_BN_HD` (`maHoaDon`),
  ADD KEY `FK_BN_BH` (`maBaoHiem`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`maChucVu`);

--
-- Indexes for table `donthuoc`
--
ALTER TABLE `donthuoc`
  ADD PRIMARY KEY (`maDonThuoc`),
  ADD KEY `FK_MT_DT` (`maThuoc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHoaDon`);

--
-- Indexes for table `hoadon_phieukhambenh`
--
ALTER TABLE `hoadon_phieukhambenh`
  ADD KEY `FK_HD_PKB` (`maHoaDon`),
  ADD KEY `FK_PKB_HD` (`maPKB`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`maKhoa`);

--
-- Indexes for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD PRIMARY KEY (`maLichKham`),
  ADD KEY `FK_LK_NV` (`maNhanVien`),
  ADD KEY `FK_LK_BN` (`maBenhNhan`),
  ADD KEY `FK_LK_BH` (`maBaoHiem`),
  ADD KEY `FK_LK_K` (`maKhoa`) USING BTREE;

--
-- Indexes for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`maLichLamViec`),
  ADD KEY `FK_LLV_NV` (`maNhanVien`);

--
-- Indexes for table `lichlamviec_phongkham`
--
ALTER TABLE `lichlamviec_phongkham`
  ADD KEY `FK_LLV_PK` (`maLichLamViec`),
  ADD KEY `FK_PK_LLV` (`maPhongKham`);

--
-- Indexes for table `loaibaohiem`
--
ALTER TABLE `loaibaohiem`
  ADD PRIMARY KEY (`maLoai`);

--
-- Indexes for table `loaithuoc`
--
ALTER TABLE `loaithuoc`
  ADD PRIMARY KEY (`maLoaiThuoc`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNhanVien`),
  ADD KEY `FK_NV_CV` (`maChucVu`),
  ADD KEY `FK_NV_K` (`maKhoa`);

--
-- Indexes for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  ADD PRIMARY KEY (`maPhieuKhamBenh`),
  ADD KEY `FK_PKB_BN` (`maBenhNhan`),
  ADD KEY `FK_PKB_DT` (`maDonThuoc`),
  ADD KEY `FK_PKB_NV` (`maNhanVien`);

--
-- Indexes for table `phieuxetnghiem`
--
ALTER TABLE `phieuxetnghiem`
  ADD PRIMARY KEY (`maPhieuXetNghiem`),
  ADD KEY `FK_PXN_PKB` (`maPhieuKhamBenh`);

--
-- Indexes for table `phongkham`
--
ALTER TABLE `phongkham`
  ADD PRIMARY KEY (`maPhongKham`),
  ADD KEY `FK_PK_K` (`maKhoa`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`maThuoc`),
  ADD KEY `FK_T_LT` (`maLoaiThuoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `maBenhNhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `maChucVu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donthuoc`
--
ALTER TABLE `donthuoc`
  MODIFY `maDonThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `maKhoa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lichkham`
--
ALTER TABLE `lichkham`
  MODIFY `maLichKham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `maLichLamViec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaibaohiem`
--
ALTER TABLE `loaibaohiem`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loaithuoc`
--
ALTER TABLE `loaithuoc`
  MODIFY `maLoaiThuoc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `maNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  MODIFY `maPhieuKhamBenh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phieuxetnghiem`
--
ALTER TABLE `phieuxetnghiem`
  MODIFY `maPhieuXetNghiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phongkham`
--
ALTER TABLE `phongkham`
  MODIFY `maPhongKham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `maThuoc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `FK_LK_NV` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`),
  ADD CONSTRAINT `LK_LK_BH` FOREIGN KEY (`maBaoHiem`) REFERENCES `baohiem` (`maBaoHiem`),
  ADD CONSTRAINT `LK_LK_BN` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `LK_LK_K` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NV_CV` FOREIGN KEY (`maChucVu`) REFERENCES `chucvu` (`maChucVu`),
  ADD CONSTRAINT `FK_NV_K` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`);

--
-- Constraints for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  ADD CONSTRAINT `FK_PKB_BN` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `FK_PKB_DT` FOREIGN KEY (`maDonThuoc`) REFERENCES `donthuoc` (`maDonThuoc`),
  ADD CONSTRAINT `FK_PKB_NV` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`);

--
-- Constraints for table `phieuxetnghiem`
--
ALTER TABLE `phieuxetnghiem`
  ADD CONSTRAINT `FK_PXN_PKB` FOREIGN KEY (`maPhieuKhamBenh`) REFERENCES `phieukhambenh` (`maPhieuKhamBenh`);

--
-- Constraints for table `phongkham`
--
ALTER TABLE `phongkham`
  ADD CONSTRAINT `FK_PK_K` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`);

--
-- Constraints for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD CONSTRAINT `FK_T_LT` FOREIGN KEY (`maLoaiThuoc`) REFERENCES `loaithuoc` (`maLoaiThuoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
