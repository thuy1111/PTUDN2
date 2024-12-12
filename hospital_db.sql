-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 04:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `maBenhNhan` int(20) NOT NULL,
  `hoTen` varchar(50) NOT NULL,
  `ngaySinh` date DEFAULT NULL,
  `gioiTinh` enum('Nữ','Nam','Khác') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `diaChi` varchar(100) NOT NULL,
  `soDienThoai` varchar(11) NOT NULL,
  `tenDangNhap` varchar(20) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `recovery_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`maBenhNhan`, `hoTen`, `ngaySinh`, `gioiTinh`, `email`, `diaChi`, `soDienThoai`, `tenDangNhap`, `matKhau`, `maHoaDon`, `recovery_code`) VALUES
(1, 'Nguyễn Văn A', '2000-11-05', 'Nữ', 'nguyenvana@gmail.com', '12 Nguyễn Văn Bảo Gò Vấp', '0955734569', 'nguyenvana', 'e10adc3949ba59abbe56e057f20f883e', 1, ''),
(2, 'Trần Thị B', '1990-08-22', 'Nữ', 'tranthib@gmail.com', '456 Đường XYZ, TP. Hồ Chí Minh', '0987654321', 'tranthib', 'e10adc3949ba59abbe56e057f20f883e', 2, ''),
(3, 'Lê Văn C', '2000-11-10', 'Nam', 'levanc@gmail.com', '789 Đường DEF, Đà Nẵng', '0934567890', 'levanc', 'e10adc3949ba59abbe56e057f20f883e', 3, ''),
(4, 'Võ Ngọc Châu', '2003-11-30', 'Nam', '121793011200ba@gmail.com', 'Vườn Lài, Gò Vấp, HCM', '0934567890', 'vongocchau', 'e10adc3949ba59abbe56e057f20f883e', 3, '4e0cc7bf04210e483d0b6ab7094dce64'),
(5, 'Nguyễn Văn An', '2000-11-05', 'Nam', 'nguyenvanan123@gmail.com', '12 Nguyễn Văn Bảo, P4, Gò Vấp, TPHCM', '095573456', 'nguyenvanan', 'e10adc3949ba59abbe56e057f20f883e', 1, 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Bùi Đức Vinh', '2003-08-22', 'Nam', 'buiducvinh123@gmail.com', '456 Trần Hưng Đạo, xã Tắc, Hóc Môn, TPHCM', '0987654321', 'buiducvinh123', 'e10adc3949ba59abbe56e057f20f883e', 2, 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'Vũ Thảo Ánh', '2003-02-04', 'Nữ', 'vuthaoanh123@gmail.com', '789 Nguyễn Văn Bảo, P4, GV, TPHCM', '0934567890', 'vuthaoanh123', 'e10adc3949ba59abbe56e057f20f883e', 3, 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Phan Ngọc Thùy', '2003-11-11', 'Nữ', 'thuyphan1111@gmail.com', '123 Nguyễn Đình Chiểu, P4, Cái Bè, TG', '0934567890', 'thuyphan1111', 'e10adc3949ba59abbe56e057f20f883e', 4, 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'Võ Ngọc  Châu', '2003-11-30', 'Nam', 'vongocchaudeptrai@gmail.com', '31 Nguyễn Huệ, P4, Q1, TPHCM', '0383444997', 'vongocchaudeptrai', 'e10adc3949ba59abbe56e057f20f883e', 5, 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'Nguyễn Thị Ánh', '2002-03-16', 'Nữ', 'nguyenthianh123@gmail.com', '458, ấp Lộc Thạnh, xã Yên Phước, Móng Cái, Quảng Ninh', '0348456147', 'nguyenthianh123', 'e10adc3949ba59abbe56e057f20f883e', 6, 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Trần Nhật Cường', '2003-12-09', 'Nữ', 'nhatcuong2003@gmail.com', '142 đường Caesar, Phường Tà Thần, Quận 1, TPHCM', '0945009045', 'nhatcuong2003', 'e10adc3949ba59abbe56e057f20f883e', 7, 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'Leo Messi', '1985-08-12', 'Nam', 'messi10@gmail.com', '148 Lý Thường Kiệt, P Linh Trung, TP Thủ Đức, TPHCM', '0910123410', 'messi10', 'e10adc3949ba59abbe56e057f20f883e', 8, 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'Lê Văn Đỗ Kì', '1983-04-01', 'Nam', 'levando777@gmail.com', '7 Lê Lợi, P4, Gò Vấp, TPHCM', '0733781710', 'lewy9', 'e10adc3949ba59abbe56e057f20f883e', 9, 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'Kim Ri Đô', '1983-10-20', 'Nam', 'kimridokorea777@gmail.com', '700 Tân Cảng, Phường 25, Bình Thạnh, Hồ Chí Minh', '0754102148', 'cr700tan', 'e10adc3949ba59abbe56e057f20f883e', 10, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonthuoc`
--

CREATE TABLE `chitietdonthuoc` (
  `maChiTietDT` int(11) NOT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `maBacSi` int(11) NOT NULL,
  `chuanDoan` text NOT NULL,
  `STT` int(11) NOT NULL,
  `donVi` varchar(50) NOT NULL,
  `donGia` decimal(10,0) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `thanhTien` decimal(10,0) NOT NULL,
  `maDonThuoc` int(11) NOT NULL,
  `tinhTrang` enum('Đã Thanh Toán','Chưa Thanh Toán') NOT NULL,
  `maThuoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonthuoc`
--

INSERT INTO `chitietdonthuoc` (`maChiTietDT`, `maBenhNhan`, `maBacSi`, `chuanDoan`, `STT`, `donVi`, `donGia`, `soLuong`, `thanhTien`, `maDonThuoc`, `tinhTrang`, `maThuoc`) VALUES
(1, 3, 3, 'Nhức Đầu', 1, 'Viên', 5000, 20, 100000, 1, 'Đã Thanh Toán', 15),
(2, 3, 3, 'Nhức Đầu', 2, 'Viên', 10000, 5, 50000, 1, 'Đã Thanh Toán', 10),
(3, 2, 5, 'Đau Vai', 1, 'Viên', 12000, 10, 120000, 2, 'Đã Thanh Toán', 12),
(4, 2, 5, 'Đau Vai', 2, 'Viên', 5000, 10, 50000, 2, 'Đã Thanh Toán', 19),
(5, 2, 5, 'Đau Vai', 3, 'Viên', 5000, 5, 25000, 2, 'Đã Thanh Toán', 37),
(6, 5, 3, 'Sốt', 1, 'Viên', 10000, 10, 100000, 3, 'Chưa Thanh Toán', 21),
(7, 5, 3, 'Sốt', 2, 'Viên', 13000, 10, 130000, 3, 'Chưa Thanh Toán', 23),
(8, 5, 3, 'Sốt', 3, 'Viên', 3000, 5, 15000, 3, 'Chưa Thanh Toán', 33);

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
  `chuanDoan` text DEFAULT NULL,
  `maBenhNhan` int(11) DEFAULT NULL,
  `tinhTrang` enum('Đã Thanh Toán','Chưa Thanh Toán','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donthuoc`
--

INSERT INTO `donthuoc` (`maDonThuoc`, `chuanDoan`, `maBenhNhan`, `tinhTrang`) VALUES
(1, 'Nhức đầu', 3, 'Đã Thanh Toán'),
(2, 'Đau Vai', 2, 'Đã Thanh Toán'),
(3, 'Sốt', 5, 'Chưa Thanh Toán'),
(4, 'Viêm ruột thừa', 4, 'Chưa Thanh Toán');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `ngayKham` date DEFAULT NULL,
  `tongTienKham` decimal(18,2) DEFAULT 0.00,
  `tongTienThuoc` decimal(18,2) DEFAULT 0.00,
  `tongTienXetNghiem` decimal(18,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHoaDon`, `ngayKham`, `tongTienKham`, `tongTienThuoc`, `tongTienXetNghiem`) VALUES
(1, '2023-03-08', 100000.00, 50000.00, 200000.00),
(2, '2023-09-02', 200000.00, 70000.00, 70000.00),
(3, '2023-10-01', 300000.00, 120000.00, 80000.00),
(4, '2023-09-01', 150000.00, 50000.00, 30000.00),
(5, '2023-09-02', 200000.00, 70000.00, 40000.00),
(6, '2023-09-03', 120000.00, 45000.00, 25000.00),
(7, '2023-09-04', 170000.00, 60000.00, 30000.00),
(8, '2023-09-05', 130000.00, 50000.00, 20000.00),
(9, '2023-09-06', 190000.00, 55000.00, 40000.00),
(10, '2023-09-07', 160000.00, 60000.00, 35000.00),
(11, '2024-12-16', 200000.00, 0.00, 0.00),
(12, '2024-12-16', 200000.00, 0.00, 0.00),
(13, '2024-12-16', 200000.00, 0.00, 0.00),
(14, '2024-12-16', 200000.00, 0.00, 0.00),
(15, '2024-12-17', 400000.00, 0.00, 0.00),
(16, '2024-12-16', 200000.00, 0.00, 0.00),
(17, '2024-12-16', 200000.00, 0.00, 0.00),
(18, '2024-12-16', 200000.00, 0.00, 0.00),
(19, '2024-12-17', 400000.00, 0.00, 0.00),
(20, '2024-12-17', 400000.00, 0.00, 0.00),
(21, '2024-12-17', 400000.00, 0.00, 0.00),
(22, '2024-12-17', 400000.00, 0.00, 0.00),
(23, '2024-12-16', 200000.00, 0.00, 0.00),
(24, '2024-12-16', 200000.00, 0.00, 0.00),
(25, '2024-12-16', 200000.00, 0.00, 0.00),
(26, '2024-12-16', 200000.00, 0.00, 0.00),
(27, '2024-12-16', 200000.00, 0.00, 0.00),
(28, '2024-12-16', 200000.00, 0.00, 0.00),
(29, '2024-12-16', 200000.00, 0.00, 0.00),
(30, '2024-12-16', 200000.00, 0.00, 0.00),
(31, '2024-12-16', 200000.00, 0.00, 0.00),
(32, '2024-12-17', 400000.00, 0.00, 0.00),
(33, '2024-12-16', 200000.00, 0.00, 0.00),
(34, '2024-12-16', 200000.00, 0.00, 0.00),
(35, '2024-12-16', 200000.00, 0.00, 0.00),
(36, '2024-12-16', 200000.00, 0.00, 0.00),
(37, '2024-12-16', 200000.00, 0.00, 0.00),
(38, '2024-12-16', 200000.00, 0.00, 0.00),
(39, '2024-12-16', 200000.00, 0.00, 0.00),
(40, '2024-12-12', 200000.00, 500000.00, 500000.00);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon_phieukhambenh`
--

CREATE TABLE `hoadon_phieukhambenh` (
  `maHoaDon` int(11) NOT NULL,
  `maPKB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoadon_phieukhambenh`
--

INSERT INTO `hoadon_phieukhambenh` (`maHoaDon`, `maPKB`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(40, 12);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `maKhoa` int(10) NOT NULL,
  `tenKhoa` varchar(100) NOT NULL,
  `truongKhoa` varchar(100) NOT NULL,
  `soDienThoai` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `trangThaiKhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`maKhoa`, `tenKhoa`, `truongKhoa`, `soDienThoai`, `email`, `trangThaiKhoa`) VALUES
(1, 'Xét nghiệm', 'Nguyễn Phú Quý', '0868105111', 'nguyenphuquy91@gmail.com', 'Đang hoạt động'),
(2, 'Khám bệnh', 'Nguyễn Thanh Hà', '0389636777', 'nguyenthanhha1909@gmail.com', 'Đang hoạt động'),
(3, 'Dược', 'Đinh Tùng Anh', '0368789353', 'dinhtunganh11@gmail.com', 'Đang hoạt động'),
(4, 'Chẩn đoán hình ảnh', 'Bùi Văn Nam', '0305915271', 'buivannam85@gmail.com', 'Đang hoạt động'),
(5, 'Nội soi', 'Trần Thị Mai', '0356897512', 'tranthimai@gmail.com', 'Đang hoạt động'),
(6, 'Không thuộc khoa', '', '', '', ''),
(7, '', '', '', '', ''),
(8, '', '', '', '', ''),
(9, '', '', '', '', ''),
(10, '', '', '', '', ''),
(11, 'khoa cu', 'thuy', '0888877789', 'nguyenphuquy91@gmail.com', '2'),
(12, 'khoa moi', 'thuy', '0868105112', 'nguyenphuquy91@gmail.com', '1'),
(13, 'aaa', 'thuy', '0357815018', 'aaaa@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lichkham`
--

CREATE TABLE `lichkham` (
  `maLichKham` int(10) UNSIGNED NOT NULL,
  `ngayKham` date DEFAULT NULL,
  `gioKham` varchar(100) DEFAULT NULL,
  `vanDeKham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaDichVuKham` decimal(18,2) DEFAULT NULL,
  `maNhanVien` int(11) DEFAULT NULL,
  `maBenhNhan` int(11) NOT NULL,
  `maKhoa` int(10) NOT NULL,
  `trangThaiThanhToan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Chưa thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichkham`
--

INSERT INTO `lichkham` (`maLichKham`, `ngayKham`, `gioKham`, `vanDeKham`, `giaDichVuKham`, `maNhanVien`, `maBenhNhan`, `maKhoa`, `trangThaiThanhToan`) VALUES
(1, '2024-10-12', '09:30:00', 'Đau đầu và chóng mặt', 500000.00, 1, 5, 2, 'Chưa thanh toán'),
(2, '2024-10-13', '10:00:00', 'Ho và sốt', 500000.00, 5, 2, 2, 'Chưa thanh toán'),
(3, '2024-12-01', '08:30:00', 'Xét Nghiệm', 500000.00, 1, 3, 1, 'Chưa thanh toán'),
(4, '2024-12-02', '09:00:00', 'Khám bệnh', 300000.00, 5, 5, 2, 'Chưa thanh toán'),
(5, '2024-12-03', '10:00:00', 'Dược', 150000.00, 7, 2, 3, 'Chưa thanh toán'),
(6, '2024-12-04', '11:30:00', 'Chuẩn đoán hình ảnh', 800000.00, 10, 1, 4, 'Đã thanh toán'),
(7, '2024-12-05', '14:00:00', 'Nội soi', 1000000.00, 15, 6, 5, 'Chưa thanh toán'),
(8, '2024-12-06', '08:00:00', 'Xét nghiệm', 500000.00, 2, 8, 1, 'Chưa thanh toán'),
(9, '2024-12-07', '09:30:00', 'Khám bệnh', 300000.00, 12, 9, 2, 'Chưa thanh toán'),
(10, '2024-12-08', '13:30:00', 'Dược', 150000.00, 10, 5, 3, 'Chưa thanh toán'),
(11, '2024-12-16', '00:00:00', 'Đau lưng', 200000.00, 1, 1, 1, 'Chưa thanh toán'),
(12, '2024-12-17', '00:00:00', 'Khám đau bụng', 400000.00, 1, 1, 1, 'Đã thanh toán'),
(13, '2024-12-16', '00:00:00', 'Khám', 200000.00, 7, 1, 2, 'Chưa thanh toán'),
(1734011884, '2024-12-16', '7:30 - 11:30', 'Đau đầu chóng mặt', 200000.00, 1, 1, 1, 'Chưa thanh toán'),
(1734012864, '2024-12-16', '7:30 - 11:30', 'Đau lưng', 200000.00, 1, 1, 1, 'Chưa thanh toán'),
(1734013149, '2024-12-16', '7:30 - 11:30', 'Mỏi cổ', 200000.00, 1, 1, 1, 'Chưa thanh toán'),
(1734013216, '2024-12-17', '18:30 - 21:30', 'Ngộ độc', 400000.00, 1, 1, 1, 'Đã thanh toán'),
(1734013469, '2024-12-17', '18:30 - 21:30', 'Chấn thương', 400000.00, 1, 1, 1, 'Chưa thanh toán'),
(1734013667, '2024-12-17', '13:30 - 17:30', 'Ho dai dẳng', 200000.00, 1, 1, 1, 'Chưa thanh toán'),
(1734013730, '2024-12-17', '18:30 - 21:30', 'Rối loạn lo âu', 400000.00, 1, 1, 1, 'Chưa thanh toán'),
(1734016207, '2024-12-16', '7:30 - 11:30', 'Say nắng', 200000.00, 1, 1, 1, 'Chưa thanh toán'),
(1734016229, '2024-12-16', '7:30 - 11:30', 'Sốt cao ', 200000.00, 1, 1, 1, 'Chưa thanh toán');

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
(2, '2024-11-03', 'Ca 1', 2),
(3, '2024-11-13', 'Ca 2', 1),
(4, '2024-11-13', 'Ca 2', 2),
(5, '2024-11-14', 'Ca 1', 3),
(6, '2024-11-14', 'Ca 2', 3),
(7, '2024-11-14', 'Ca 3', 4),
(8, '2024-11-15', 'Ca 1', 5),
(9, '2024-12-16', 'Ca 1', 1),
(10, '2024-12-18', 'Ca 1', 1),
(11, '2024-12-17', 'Ca 2', 1),
(12, '2024-12-18', 'Ca 2', 1),
(13, '2024-12-19', 'Ca 2', 1),
(14, '2024-12-20', 'Ca 2', 1),
(15, '2024-12-21', 'Ca 2', 1),
(16, '2024-12-17', 'Ca 3', 1),
(17, '2024-12-19', 'Ca 3', 1),
(18, '2024-12-16', 'Ca 1', 7),
(19, '2024-12-16', 'Ca 1', 9),
(20, '2024-12-16', 'Ca 1', 14),
(21, '2024-12-16', 'Ca 1', 3),
(22, '2024-12-17', 'Ca 1', 2),
(23, '2024-12-19', 'Ca 1', 2),
(24, '2024-12-21', 'Ca 1', 2),
(25, '2024-12-16', 'Ca 2', 2),
(26, '2024-12-17', 'Ca 2', 2),
(27, '2024-12-18', 'Ca 2', 2),
(28, '2024-12-19', 'Ca 2', 2),
(29, '2024-12-20', 'Ca 2', 2),
(30, '2024-12-16', 'Ca 3', 2),
(31, '2024-12-20', 'Ca 3', 2),
(32, '2024-12-19', 'Ca 1', 12),
(33, '2024-12-19', 'Ca 1', 16),
(34, '2024-12-19', 'Ca 1', 4),
(36, '2024-12-10', 'Ca 1', 1),
(37, '2024-12-10', 'Ca 2', 1),
(38, '0000-00-00', 'Ca 1', 1),
(39, '2024-12-09', 'Ca 1', 1),
(40, '2024-12-13', 'Ca 1', 1),
(41, '2024-12-14', 'Ca 1', 1),
(42, '2024-12-14', 'Ca 2', 1);

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
(1, 'Nguyễn Phú Quý ', '2024-12-03', 'Nam', 'nguyenphuquy', 'e10adc3949ba59abbe56e057f20f883e', '0868105111', 'nguyenphuquy91@gmail.com', '123 Đường ABC, Quận 1, TP.HCM', 'Đang làm việc', 1, 1),
(2, 'Trần Thị Bích', '1990-07-20', 'Nữ', 'tranthibich', 'e10adc3949ba59abbe56e057f20f883e', '0987654321', 'tranthibich@gmail.com', '456 Đường DEF, Quận 2, TP.HCM', 'Đang làm việc', 2, 2),
(3, 'Lê Văn Cẩn', '1988-03-10', 'Nam', 'levancan', 'e10adc3949ba59abbe56e057f20f883e', '0123987654', 'levanc@gmail.com', '789 Đường GHI, Quận 3, TP.HCM', 'Đang làm việc', 1, 2),
(4, 'Phạm Thị Diễm', '1995-11-25', 'Nữ', 'phamthidiem', 'e10adc3949ba59abbe56e057f20f883e', '0987123456', 'phamthidiem@gmail.com', '321 Đường JKL, Quận 4, TP.HCM', 'Đang làm việc', 2, 2),
(5, 'Hoàng Văn Thụ', '1980-12-30', 'Nam', 'hoangvanthu', 'e10adc3949ba59abbe56e057f20f883e', '0123456780', 'hoangvanthu@gmail.com', '654 Đường MNO, Quận 5, TP.HCM', 'Đang làm việc', 1, 2),
(6, 'Trần Văn Anh', '1985-03-12', 'Nam', 'tranvananh', 'e10adc3949ba59abbe56e057f20f883e', '0912345671', 'tranvananh@gmail.com', '45 Lê Lợi, Hà Nội', 'Đang làm việc', 1, 1),
(7, 'Nguyễn Thanh Hà', '1992-07-24', 'Nữ', 'nguyenthanhha', 'e10adc3949ba59abbe56e057f20f883e', '0389636777', 'nguyenthanhha1909@gmail.com', '67 Phạm Ngọc Thạch, Đà Nẵng', 'Đang làm việc', 1, 2),
(8, 'Trương Thị Thanh', '1989-01-03', 'Nữ', 'truongthithanh', 'e10adc3949ba59abbe56e057f20f883e', '0912345680', 'truongthithanh@gmail.com', '23 Xuân Thuỷ, Hà Nội', 'Đang làm việc', 1, 1),
(9, 'Nguyễn Văn Chung', '1988-11-19', 'Nam', 'nguyenvanchung', 'e10adc3949ba59abbe56e057f20f883e', '0912345673', 'nguyenvanchung@gmail.com', '89 Lê Duẩn, TP.HCM', 'Đang làm việc', 1, 3),
(10, 'Đinh Tùng Anh', '1986-12-25', 'Nam', 'dinhtunganh', 'e10adc3949ba59abbe56e057f20f883e', '0368789353', 'dinhtunganh@gmail.com', '44 Nguyễn Văn Linh, TP.HCM', 'Đang làm việc', 1, 3),
(11, 'Nguyễn Thị Thương', '1992-03-29', 'Nữ', 'nguyenthithuong', 'e10adc3949ba59abbe56e057f20f883e', '0912345683', 'nguyenthithuong@gmail.com', '88 Kim Mã, Hà Nội', 'Đang làm việc', 2, 3),
(12, 'Phạm Thị Dung', '1995-05-30', 'Nữ', 'phamthidung', 'e10adc3949ba59abbe56e057f20f883e', '0912345674', 'phamthidung@gmail.com', '123 Trường Chinh, Hà Nội', 'Đang làm việc', 2, 4),
(13, 'Đỗ Minh Hiếu', '1990-09-12', 'Nam', 'dominhhieu', 'e10adc3949ba59abbe56e057f20f883e', '0912345675', 'dominhhieu@gmail.com', '56 Nguyễn Huệ, Đà Nẵng', 'Đang làm việc', 1, 4),
(14, 'Bùi Văn Nam', '1986-12-25', 'Nam', 'buivannam', 'e10adc3949ba59abbe56e057f20f883e', '0305915271', 'buivannam@gmail.com', '44 Nguyễn Văn Linh, TP.HCM', 'Đang làm việc', 1, 4),
(15, 'Trần Thị Mai', '1987-04-17', 'Nữ', 'tranthimai', 'e10adc3949ba59abbe56e057f20f883e', '0356897512', 'tranthimai@gmail.com', '101 Pasteur, TP.HCM', 'Đang làm việc', 1, 5),
(16, 'Ngô Thị Hương', '1993-08-15', 'Nữ', 'ngothihuong', 'e10adc3949ba59abbe56e057f20f883e', '0912345678', 'ngothihuong@gmail.com', '99 Quang Trung, Đà Nẵng', 'Đang làm việc', 2, 5),
(17, 'Phạm Văn Đồng', '2023-12-19', 'Nam', 'phamvandong', 'e10adc3949ba59abbe56e057f20f883e', '0912345685', 'phamvandong@gmail.com', '39 Nguyễn Thị Minh Khai, TP.HCM', 'Đang làm việc', 1, 1),
(18, 'Lý Thị Ly', '1996-10-22', 'Nữ', 'lythily', 'e10adc3949ba59abbe56e057f20f883e', '0912345682', 'lythily@gmail.com', '134 Nguyễn Tri Phương, TP.HCM', 'Đang làm việc', 4, 6),
(19, 'Hoàng Văn Quyết', '2024-04-20', 'Nam', 'hoangvanquyet', 'e10adc3949ba59abbe56e057f20f883e', '0912345687', 'hoangvanquyet@gmail.com', '45 Nguyễn Hữu Thọ, Đà Nẵng', 'Đang làm việc', 1, 1),
(20, 'Trần Thị Ninh', '2024-07-19', 'Nữ', 'tranthininh', 'e10adc3949ba59abbe56e057f20f883e', '0912345684', 'tranthininh@gmail.com', '12 Nguyễn Khuyến, Đà Nẵng', 'Đang làm việc', 6, 6),
(65, 'nhanvien tess', '2024-04-20', 'Nam', 'abcdefg', 'e10adc3949ba59abbe56e057f20f883e', '0868105112', 'b@gmail.com', 'thhh', 'Nghỉ việc', 2, 3),
(66, 'nhanvien tesst', '2024-04-20', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0868105112', 'b@gmail.com', '26 le loi aaaa', '', 1, 1),
(67, 'Hoàng Văn Quyết', '2024-04-20', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0912345687', 'hoangvanquyet@gmail.com', '45 Nguyễn Hữu Thọ, Đà Nẵng', NULL, 1, 1),
(68, '', '1970-01-01', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL, 1, 1),
(69, '', '1970-01-01', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 'hehehe', NULL, 1, 1),
(70, 'eooooo', '2024-12-12', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'Đang làm việc', 1, 1),
(71, 'Phan Ngoc Thuy', '1970-01-01', 'Nữ', 'abcdef', '827ccb0eea8a706c4c34a16891f84e7b', '0868105112', 'usertmdt@gmail.com', 'aaaa', '', 1, 1),
(72, 'aaaa', '1970-01-01', '', 'aa', '827ccb0eea8a706c4c34a16891f84e7b', '0357815245', 'usertmdt@gmail.com', 'aaaaaa', NULL, 1, 1),
(73, 'Nguyễn Phú Quý2', '2024-12-12', 'Nam', 'abcdef', '827ccb0eea8a706c4c34a16891f84e7b', '0568105112', 'usertmdt@gmail.com', '123 Đường ABC, Quận 1, TP.HCM', NULL, 2, 4),
(74, 'Nguyễn Phú Quý2', '2024-12-05', 'Nữ', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', '0868105112', 'usertmdt@gmail.com', 'm', 'Đang làm việc', 3, 4),
(75, 'Nguyễn B', '2014-12-01', 'Nữ', 'nguyenb', 'e10adc3949ba59abbe56e057f20f883e', '123456789', 'nguyenb@gmail.com', 'HCM', 'Đang làm việc', 3, 6);

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
(1, '1', '2023-09-01', 'Ho kéo dài', 'Dị ứng thời tiết', 'Không', '80', '120/80', '37', '165', '60', 'Viêm họng', 'Uống thuốc điều trị', 'Ho,Đau họng', 1, 5, 1),
(2, '2', '2023-09-01', 'Ho kéo dài', 'Dị ứng thời tiết', 'Không', '80', '120/80', '37', '165', '60', 'Viêm họng', 'Uống thuốc điều trị', 'Ho, đau họng', 1, 5, 3),
(3, '3', '2023-09-02', 'Đau đầu', 'Thiếu máu', 'Không', '85', '130/85', '36.5', '170', '65', 'Đau đầu mãn tính', 'Điều trị bằng thuốc', 'Đau đầu, chóng mặt', 1, 5, 10),
(4, '4', '2023-09-03', 'Sốt cao', 'Sốt', 'Có', '90', '110/70', '38', '160', '55', 'Sốt virus', 'Nghỉ ngơi và uống thuốc', 'Sốt, đau cơ', 1, 5, 7),
(5, '5', '2023-09-04', 'Khó thở', 'Hen suyễn', 'Có', '75', '120/75', '36.8', '175', '70', 'Hen suyễn', 'Dùng thuốc điều trị', 'Khó thở', 1, 5, 1),
(6, '6', '2023-09-05', 'Đau bụng', 'Viêm dạ dày', 'Không', '80', '125/80', '37.2', '155', '50', 'Viêm dạ dày', 'Điều trị bằng thuốc', 'Đau bụng', 1, 6, 1),
(7, '7', '2023-09-06', 'Phát ban', 'Dị ứng', 'Có', '85', '120/78', '36.7', '180', '75', 'Dị ứng da', 'Dùng kem và thuốc', 'Ngứa, phát ban', 1, 7, 1),
(8, '8', '2023-09-07', 'Đau ngực', 'Không', 'Có', '78', '140/90', '37', '168', '68', 'Bệnh tim', 'Khám chuyên khoa', 'Đau ngực', 1, 11, 1),
(9, '9', '2023-09-08', 'Suy nhược', 'Không', 'Không', '82', '110/65', '36.5', '172', '62', 'Suy nhược cơ thể', 'Bổ sung dinh dưỡng', 'Mệt mỏi', 1, 1, 1),
(10, '10', '2023-09-09', 'Đau lưng', 'Thoát vị đĩa đệm', 'Có', '88', '135/85', '36.8', '180', '80', 'Thoát vị đĩa đệm', 'Vật lý trị liệu', 'Đau lưng', 1, 1, 1),
(12, '2', '2024-12-12', 'Đau bụng kéo dài', 'Không', 'Không', 'Ổn định', 'Ổn định', 'Cao', '1m75', '60kg', 'Viêm ruột thừa', 'Viêm ruột thừa', 'Đau bụng kéo dài', 4, 9, 1);

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
(4, '', '', '', 1),
(5, 'Phòng nội soi 1', 'Nội soi', 'Đang hoạt động', 5),
(6, 'Phòng nội soi 2', 'Nội soi', 'Đang hoạt động', 5),
(7, 'Phòng XQuang', 'Chụp X-Quang', 'Đang hoạt động', 4),
(8, 'Phòng siêu âm', 'Siêu âm', 'Đang hoạt động', 4),
(9, 'Phòng dược', 'Cung cấp thuốc cho bệnh nhân', 'Đang hoạt động', 3),
(10, 'aaaaaa', 'heehe', '', 2),
(11, '', '', '', 1),
(12, '', '', '', 1),
(13, 'phongkham', 'heehe', '', 2),
(14, 'bbbb', 'ddd', '', 2);

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
(9, 'Paracetamol', 500, '2025-12-31', 'Công ty Dược Việt Nam', 5000.00, 'Uống sau ăn', 'Viên', 'Paracetamol', 'Viên nén', 'Dược Hậu Giang', 'Còn hàng', 1),
(10, 'Ibuprofen', 483, '2024-11-30', 'Công ty Dược Traphaco', 8000.00, 'Uống sau ăn', 'Viên', 'Ibuprofen', 'Viên nang', 'Traphaco', 'Còn hàng', 1),
(11, 'Aspirin', 963, '2026-05-01', 'Công ty Dược Hậu Giang', 10000.00, 'Uống trước ăn', 'Viên', 'Aspirin', 'Viên nén', 'Dược Hậu Giang', 'Còn hàng', 1),
(12, 'Diclofenac', 364, '2025-07-20', 'Công ty Dược Mediplantex', 12000.00, 'Uống sau ăn', 'Viên', 'Diclofenac', 'Viên nang', 'Mediplantex', 'Gần hết', 1),
(13, 'Meloxicam', 0, '2024-12-01', 'Công ty Dược Pharma', 15000.00, 'Uống sau ăn', 'Viên', 'Meloxicam', 'Viên nén', 'Pharma', 'Hết hàng', 1),
(14, 'Naproxen', 634, '2026-02-15', 'Công ty Dược SPM', 13000.00, 'Uống sau ăn', 'Viên', 'Naproxen', 'Viên nang', 'SPM', 'Còn hàng', 1),
(15, 'Etoricoxib', 267, '2025-08-30', 'Công ty Dược Mekophar', 16000.00, 'Uống trước ăn', 'Viên', 'Etoricoxib', 'Viên nén', 'Mekophar', 'Gần hết', 1),
(16, 'Celecoxib', 487, '2024-09-30', 'Công ty Dược Vimedimex', 14000.00, 'Uống sau ăn', 'Viên', 'Celecoxib', 'Viên nang', 'Vimedimex', 'Còn hàng', 1),
(17, 'Piroxicam', 0, '2025-03-20', 'Công ty Dược Agimexpharm', 9000.00, 'Uống trước ăn', 'Viên', 'Piroxicam', 'Viên nén', 'Agimexpharm', 'Hết hàng', 1),
(18, 'Indomethacin', 963, '2026-01-10', 'Công ty Dược Sanofi', 7000.00, 'Uống sau ăn', 'Viên', 'Indomethacin', 'Viên nang', 'Sanofi', 'Còn hàng', 1),
(19, 'Amoxicillin', 742, '2025-10-15', 'Công ty Dược Hà Tây', 5000.00, 'Uống sau ăn', 'Viên', 'Amoxicillin', 'Viên nang', 'Hà Tây', 'Còn hàng', 2),
(20, 'Azithromycin', 672, '2024-06-05', 'Công ty Dược Mekophar', 15000.00, 'Uống sau ăn', 'Viên', 'Azithromycin', 'Viên nén', 'Mekophar', 'Còn hàng', 2),
(21, 'Ciprofloxacin', 50, '2026-12-12', 'Công ty Dược Traphaco', 10000.00, 'Uống trước ăn', 'Viên', 'Ciprofloxacin', 'Viên nén', 'Traphaco', 'Gần hết', 2),
(22, 'Levofloxacin', 756, '2025-05-15', 'Công ty Dược Sanofi', 20000.00, 'Uống sau ăn', 'Viên', 'Levofloxacin', 'Viên nang', 'Sanofi', 'Còn hàng', 2),
(23, 'Doxycycline', 0, '2024-11-30', 'Công ty Dược Hậu Giang', 13000.00, 'Uống sau ăn', 'Viên', 'Doxycycline', 'Viên nén', 'Dược Hậu Giang', 'Hết hàng', 2),
(24, 'Clarithromycin', 758, '2025-08-25', 'Công ty Dược Pharma', 18000.00, 'Uống sau ăn', 'Viên', 'Clarithromycin', 'Viên nang', 'Pharma', 'Còn hàng', 2),
(25, 'Erythromycin', 110, '2025-04-18', 'Công ty Dược Agimexpharm', 12000.00, 'Uống trước ăn', 'Viên', 'Erythromycin', 'Viên nén', 'Agimexpharm', 'Gần hết', 2),
(26, 'Metronidazole', 745, '2026-06-20', 'Công ty Dược Vimedimex', 8000.00, 'Uống sau ăn', 'Viên', 'Metronidazole', 'Viên nén', 'Vimedimex', 'Còn hàng', 2),
(27, 'Vancomycin', 963, '2024-10-25', 'Công ty Dược SPM', 25000.00, 'Tiêm', 'Dung dịch', 'Vancomycin', 'Dung dịch tiêm', 'SPM', 'Còn hàng', 2),
(28, 'Meropenem', 639, '2025-01-01', 'Công ty Dược Agimexpharm', 30000.00, 'Tiêm', 'Dung dịch', 'Meropenem', 'Dung dịch tiêm', 'Agimexpharm', 'Còn hàng', 2),
(29, 'Vitamin A', 697, '2025-11-20', 'Công ty Dược Vimedimex', 5000.00, 'Uống sau ăn', 'Viên', 'Retinol', 'Viên nang', 'Vimedimex', 'Còn hàng', 3),
(30, 'Vitamin B1', 783, '2024-07-12', 'Công ty Dược Agimexpharm', 4000.00, 'Uống sau ăn', 'Viên', 'Thiamine', 'Viên nén', 'Agimexpharm', 'Còn hàng', 3),
(31, 'Vitamin B6', 785, '2026-02-05', 'Công ty Dược Mekophar', 6000.00, 'Uống sau ăn', 'Viên', 'Pyridoxine', 'Viên nang', 'Mekophar', 'Còn hàng', 3),
(32, 'Vitamin B12', 648, '2025-09-30', 'Công ty Dược Traphaco', 8000.00, 'Uống sau ăn', 'Viên', 'Cobalamin', 'Viên nén', 'Traphaco', 'Còn hàng', 3),
(33, 'Vitamin C', 500, '2024-05-15', 'Công ty Dược Dược Hậu Giang', 3000.00, 'Uống sau ăn', 'Viên', 'Ascorbic acid', 'Viên sủi', 'Dược Hậu Giang', 'Còn hàng', 3),
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
(58, 'Losartan', 160, '2024-12-25', 'Công ty Dược Traphaco', 10500.00, 'Uống mỗi ngày', 'Viên', 'Losartan', 'Viên nén', 'Traphaco', 'Còn hàng', 5),
(69, '', 563, NULL, 'aaa', 5000.00, 'aaaa', 'vien', NULL, NULL, NULL, 'Hết hàng', 1),
(70, '', 642, NULL, 'nhaf', 2000.00, 'uong', 'vien', NULL, NULL, NULL, 'Hết hàng', 1),
(71, '', 563, NULL, 'nhaf', 5000.00, 'aaaa', 'vien', NULL, NULL, NULL, 'Hết hàng', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thuoc_donthuoc`
--

CREATE TABLE `thuoc_donthuoc` (
  `maThuoc` int(11) NOT NULL,
  `maDonThuoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

CREATE TABLE `vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_Amount` varchar(50) NOT NULL,
  `vnp_BankCode` varchar(50) NOT NULL,
  `vnp_BankTranNo` varchar(50) NOT NULL,
  `vnp_CardType` varchar(50) NOT NULL,
  `vnp_OrderInfo` varchar(50) NOT NULL,
  `vnp_PayDate` varchar(50) NOT NULL,
  `vnp_ResponseCode` varchar(50) NOT NULL,
  `vnp_TmnCode` varchar(50) NOT NULL,
  `vnp_TransactionNo` varchar(50) NOT NULL,
  `vnp_TransactionStatus` varchar(50) NOT NULL,
  `vnp_TxnRef` varchar(50) NOT NULL,
  `vnp_SecureHash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vnpay`
--

INSERT INTO `vnpay` (`id_vnpay`, `vnp_Amount`, `vnp_BankCode`, `vnp_BankTranNo`, `vnp_CardType`, `vnp_OrderInfo`, `vnp_PayDate`, `vnp_ResponseCode`, `vnp_TmnCode`, `vnp_TransactionNo`, `vnp_TransactionStatus`, `vnp_TxnRef`, `vnp_SecureHash`) VALUES
(1, '20000000', 'NCB', 'VNP14738319', 'ATM', 'Thanh toán lịch khám', '20241212102022', '00', 'GBX04TR9', '14738319', '00', '17339734161490870794', '81d3faf840dc19eb8976dbec5d0354801f9982d26b71e6b5f8add8b18fd4f23d2f59c447e697c836407ca16f00eda638f066b03b36167924b9bba3a35c4cf417'),
(2, '40000000', 'NCB', 'VNP14738437', 'ATM', 'Thanh toán lịch khám', '20241212110235', '00', 'GBX04TR9', '14738437', '00', '17339761432074575877', '811c8cd112b4dab9c49021f7925c934beb38ef39cd8c42d41fe7c2b136f73208d68efedad8a29728413d2eacd3ae758ac7b1e613215aa24e65ab4990bcc4b7fc'),
(3, '40000000', 'NCB', 'VNP14738351', 'ATM', 'Thanh toán lịch khám', '20241212103301', '00', 'GBX04TR9', '14738351', '00', '17339743631505874186', '406569850be742b60f1d8fa3e4cea13145599d1ac1dee5140f3239eedb68fa1334869bba7f5e152219c4eb98d45278fe7713920d53631480bf5653145212f748'),
(4, '80000000', 'NCB', 'VNP14740029', 'ATM', 'Thanh toán lịch khám', '20241212221119', '00', 'GBX04TR9', '14740029', '00', '61410565234', '8add56845c213314c82f4951f19c23aaef8c6de4be7ba084b040ffc0f4213d433a52c7b4fe2c8bc0975385aedd147efbfaaec84a95c3d3b19d4b4ecd34b4c751'),
(5, '80000000', 'NCB', 'VNP14740058', 'ATM', 'Thanh toán lịch khám', '20241212222042', '00', 'GBX04TR9', '14740058', '00', '6', '890f6a22a1fdd92fe609bf2d19dc633b8da4bd4719d14acd36ce887182a15e7359d82a778c01e2819e6ad29016d65fa2fe8a86ff22646199097f0afff8bf982c'),
(6, '40000000', 'NCB', 'VNP14740141', 'ATM', 'Thanh toán lịch khám', '20241212224848', '00', 'GBX04TR9', '14740141', '00', '121734018544', '8c52d53cef7aa3683676866778a8be3f44f12072a68caf39dee6cea24a84efd82acae96175d628e7b6e877afa5826e024392114b29c9bc6ce9ebc15619be7bcc'),
(7, '40000000', 'NCB', 'VNP14740146', 'ATM', 'Thanh toán lịch khám', '20241212225020', '00', 'GBX04TR9', '14740146', '00', '17340132164872', '3d0bc835ee935171d4e84a3ed918f4cf489cd2b73530c64704fae86be1b5779321daccf0d502c6e6ffd323e85bc05afefaec47b45b1f47a4c0618a5aacfb3bd0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`maBenhNhan`),
  ADD KEY `FK_BN_HD` (`maHoaDon`);

--
-- Indexes for table `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD KEY `FK_BN_CT` (`maBenhNhan`),
  ADD KEY `FK_BN_NV` (`maBacSi`),
  ADD KEY `FK_DT_CT` (`maDonThuoc`),
  ADD KEY `fk_mt` (`maThuoc`);

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
  ADD KEY `FK_BN` (`maBenhNhan`);

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
-- Indexes for table `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `maBenhNhan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `maChucVu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donthuoc`
--
ALTER TABLE `donthuoc`
  MODIFY `maDonThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `maKhoa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lichkham`
--
ALTER TABLE `lichkham`
  MODIFY `maLichKham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1734016230;

--
-- AUTO_INCREMENT for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `maLichLamViec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `loaithuoc`
--
ALTER TABLE `loaithuoc`
  MODIFY `maLoaiThuoc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `maNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  MODIFY `maPhieuKhamBenh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `phieuxetnghiem`
--
ALTER TABLE `phieuxetnghiem`
  MODIFY `maPhieuXetNghiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phongkham`
--
ALTER TABLE `phongkham`
  MODIFY `maPhongKham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `maThuoc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `FK_BN_HD` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`);

--
-- Constraints for table `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD CONSTRAINT `FK_BN_CT` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `FK_BN_NV` FOREIGN KEY (`maBacSi`) REFERENCES `nhanvien` (`maNhanVien`),
  ADD CONSTRAINT `FK_DT_CT` FOREIGN KEY (`maDonThuoc`) REFERENCES `donthuoc` (`maDonThuoc`),
  ADD CONSTRAINT `fk_mt` FOREIGN KEY (`maThuoc`) REFERENCES `thuoc` (`maThuoc`);

--
-- Constraints for table `donthuoc`
--
ALTER TABLE `donthuoc`
  ADD CONSTRAINT `FK_BN` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`);

--
-- Constraints for table `hoadon_phieukhambenh`
--
ALTER TABLE `hoadon_phieukhambenh`
  ADD CONSTRAINT `FK_HD_PK` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`),
  ADD CONSTRAINT `FK_PK_HD` FOREIGN KEY (`maPKB`) REFERENCES `phieukhambenh` (`maPhieuKhamBenh`);

--
-- Constraints for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `FK_LK_NV` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`),
  ADD CONSTRAINT `LK_LK_BN` FOREIGN KEY (`maBenhNhan`) REFERENCES `benhnhan` (`maBenhNhan`),
  ADD CONSTRAINT `LK_LK_K` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`);

--
-- Constraints for table `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `lichlamviec_ibfk_1` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`);

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
