-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2020 lúc 11:03 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phimmoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_post` int(11) NOT NULL,
  `cmt` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_post`, `cmt`) VALUES
(35, 'admin', 7, '<p>Haha buon cuoi vl</p>'),
(36, 'admin', 7, '<p>Phim hay</p>'),
(37, 'tanchan679@gmail.com', 7, '<p>Chỉ c&oacute; l&agrave;m mới c&oacute; ăn...kg l&agrave;m m&agrave; đ&ograve;i c&oacute; ăn th&igrave; ăn đầu buồi, ăn cứt</p>'),
(38, 'tanchan679@gmail.com', 8, '<p>Ngu như b&ograve;</p>'),
(39, 'admin', 7, '<p>Giao diện thế n&agrave;y ok chưa</p>'),
(40, 'admin', 7, '<p>dit me huy</p>'),
(41, 'admin', 13, '<p>ocs con cho</p>'),
(42, 'admin', 19, '<p>Test t&iacute;nh năng b&igrave;nh luận</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_video`
--

CREATE TABLE `list_video` (
  `id` int(11) NOT NULL,
  `id_theloai` int(11) NOT NULL,
  `tenvideo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `linkavatar` text COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `quocgia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `list_video`
--

INSERT INTO `list_video` (`id`, `id_theloai`, `tenvideo`, `link`, `linkavatar`, `mota`, `quocgia`) VALUES
(7, 0, 'Ten video fda duoc thay doi', 'https://www.youtube.com/embed/9HrT1B1I24o', 'http://localhost/Phimhot.top/upload/image/imgvideo/9a326978a0b2fc2ff0b2a4cd4bc0df68.png', '<p>hahahahhahah</p>', 'Việt Nam'),
(8, 9, 'NHẠC TRẺ REMIX 2020 HAY NHẤT HIỆN NAY - EDM Tik Tok JENNY REMIX - lk nhạc trẻ remix gây nghiện 2020', 'https://www.youtube.com/embed/9HrT1B1I24o', 'http://localhost/Phimhot.top/upload/image/imgvideo/32391_29_4.jpg', '<p>h fghfgNHẠC TRẺ REMIX 2020 HAY NHẤT HIỆN NAY - EDM Tik Tok JENNY REMIX - lk nhạc trẻ remix g&acirc;y nghiện 2020</p>', 'Việt Nam'),
(9, 9, 'NHẠC TRẺ REMIX 2020 HAY NHẤT HIỆN NAY - EDM Tik Tok JENNY REMIX - lk nhạc trẻ remix gây nghiện 2020', 'https://www.youtube.com/embed/9HrT1B1I24o', 'http://localhost/Phimhot.top/upload/image/imgvideo/9a326978a0b2fc2ff0b2a4cd4bc0df68.png', '<p>NHẠC TRẺ REMIX 2020 HAY NHẤT HIỆN NAY - EDM Tik Tok JENNY REMIX - lk nhạc trẻ remix g&acirc;y nghiện 2020</p>', 'Việt Nam'),
(10, 9, 'NHẠC TRẺ REMIX 2020 HAY NHẤT HIỆN NAY - EDM Tik Tok JENNY REMIX - lk nhạc trẻ remix gây nghiện 2020', 'https://www.youtube.com/embed/9HrT1B1I24o', 'http://localhost/Phimhot.top/upload/image/imgvideo/32391_29_4.jpg', '<p>NHẠC TRẺ REMIX 2020 HAY NHẤT HIỆN NAY - EDM Tik Tok JENNY REMIX - lk nhạc trẻ remix g&acirc;y nghiện 2020</p>', 'Việt Nam'),
(13, 10, 'TỬ CHIẾN ĐÀI HADES | Thích Hành Vũ | Phim Hành Động Võ Thuật Thuyết Minh', 'https://www.youtube.com/embed/RbfjUjRdeLc', 'http://localhost/Phimhot.top/upload/image/imgvideo/x1080.jpg', '<p>TỬ CHIẾN Đ&Agrave;I HADES | Th&iacute;ch H&agrave;nh Vũ | Phim H&agrave;nh Động V&otilde; Thuật Thuyết Minh</p>', 'Việt Nam'),
(14, 11, 'Hài Tết - Hài Thăng Long | Phim Tết Cả Ngố Bản đẹp Full HD | Xuân Bắc', 'https://www.youtube.com/embed/AxhKgLC3eWc', 'http://localhost/Phimhot.top/upload/image/imgvideo/maxresdefault.jpg', '<p>H&agrave;i Tết - H&agrave;i Thăng Long | Phim Tết Cả Ngố Bản đẹp Full HD Tết 2016 n&agrave;y xem g&igrave;? Mời c&aacute;c bạn thưởng thức phim h&agrave;i Tết c&oacute; tựa đề : Cả Ngố , một trong những phim do Thăng Long Audio sản xuất. Ch&uacute;c mọi người xem phim đ&oacute;n Tết vui vẻ b&ecirc;n người th&acirc;n, gia đ&igrave;nh!</p>', 'Việt Nam'),
(19, 9, 'Người đừng lặng im đến thế - sobin hoàng sơn', 'http://localhost/Phimhot.top/upload/video/SOOBIN HOÀNG SƠN - XIN ĐỪNG LẶNG IM - Official Audio Lyrics - Nhạc Trẻ Hay Nhất.mp4', 'http://localhost/Phimhot.top/upload/image/imgvideo/Untitled.png', '<p>Người đừng lặng im đến thế - sobin ho&agrave;ng sơn</p><p>Người đừng lặng im đến thế - sobin ho&agrave;ng sơn</p><p>Người đừng lặng im đến thế - sobin ho&agrave;ng sơn</p><p>Người đừng lặng im đến thế - sobin ho&agrave;ng sơn</p><p>Người đừng lặng im đến thế - sobin ho&agrave;ng sơn</p><p>Người đừng lặng im đến thế - sobin ho&agrave;ng sơn</p><p>Người đừng lặng im đến thế - sobin ho&agrave;ng sơn</p>', 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `tentheloai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `onmenu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `tentheloai`, `onmenu`) VALUES
(0, 'Khác', 0),
(9, 'NHẠC HÌNH', 1),
(10, 'PHIM HÀNH ĐỘNG', 1),
(11, 'HÀI HƯỚC', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuychinhweb`
--

CREATE TABLE `tuychinhweb` (
  `id` int(11) NOT NULL,
  `thuoctinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giatri` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuychinhweb`
--

INSERT INTO `tuychinhweb` (`id`, `thuoctinh`, `giatri`) VALUES
(1, 'logo', 'http://localhost/Phimhot.top/upload/image/imgvideo/phimhot.png'),
(2, 'icon', 'http://localhost/Phimhot.top/upload/image/imgvideo/logophimmoi.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `phonenumber`, `address`, `avatar`) VALUES
(0, 'admin', '160799881', 'Admin', '0347194217', 'xóm sơn tiến - xax qt', 'upload/image/avatar/9a326978a0b2fc2ff0b2a4cd4bc0df68.png'),
(8, 'tanchan679@gmail.com', '160799881', 'Tẩn Cù Chảnn', '0347194217', 'xóm Sơn Tiến - xã QT - tp.Thái Nguyên', 'upload/image/avatar/0_OXFY3HuD702kRX0s.png'),
(10, 'tanchan67g9@gmail.com', '160799881', 'hghfghfg', '654645', '645645654645', 'http://localhost/Phimhot.top/upload/image/avatar/defaultavatr.jpg'),
(11, 'a@gmail.com', '12345678', '2a65', '113', 'moutain', 'http://127.0.0.1/Phimhot.top/upload/image/avatar/defaultavatr.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_video`
--
ALTER TABLE `list_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theloai` (`id_theloai`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuychinhweb`
--
ALTER TABLE `tuychinhweb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `name` (`id`,`email`,`password`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `list_video`
--
ALTER TABLE `list_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tuychinhweb`
--
ALTER TABLE `tuychinhweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `list_video`
--
ALTER TABLE `list_video`
  ADD CONSTRAINT `theloai` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
