-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 30, 2022 lúc 03:26 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `recruitment`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_job`
--

CREATE TABLE `apply_job` (
  `apply_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'ID User',
  `comp_id` int(11) NOT NULL COMMENT 'ID Company',
  `cv_id` int(11) NOT NULL COMMENT 'ID CV',
  `post_id` int(11) NOT NULL,
  `introduction` text,
  `action` varchar(50) DEFAULT NULL,
  `type_apply` varchar(50) DEFAULT NULL,
  `date_apply` datetime DEFAULT NULL,
  `date_approval` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `apply_job`
--

INSERT INTO `apply_job` (`apply_id`, `user_id`, `comp_id`, `cv_id`, `post_id`, `introduction`, `action`, `type_apply`, `date_apply`, `date_approval`) VALUES
(35, 13, 28, 7, 407, 'hello ', 'Đã phỏng vấn', 'profile', '2022-06-13 04:48:19', NULL),
(37, 13, 28, 7, 408, 'trúng tuyển', 'Trúng tuyển', 'profile', '2022-06-13 04:56:39', '2022-06-26 18:34:34'),
(38, 13, 28, 7, 405, '', 'Đã phỏng vấn', 'profile', '2022-06-13 04:58:00', NULL),
(39, 13, 28, 7, 406, '', 'Trúng tuyển', 'profile', '2022-06-13 05:01:12', NULL),
(41, 9, 28, 3, 405, '', 'Đã duyệt', 'profile', '2022-06-13 05:40:09', '2022-06-26 19:09:19'),
(42, 15, 28, 9, 407, 'trúng tuyển', 'Đã phỏng vấn', 'cv', '2022-06-13 05:51:50', NULL),
(43, 9, 28, 3, 406, 'Nhớ đến đúng giờ nha em !', 'Đã duyệt', 'profile', '2022-06-18 07:28:37', '2022-06-26 20:03:31'),
(45, 16, 28, 10, 405, '', 'Chờ duyệt', 'profile', '2022-06-22 09:53:42', NULL),
(46, 9, 29, 3, 409, '', 'Chờ duyệt', 'profile', '2022-06-26 20:15:17', NULL),
(47, 17, 28, 11, 405, 'Xin chào nhà tuyển dụng, em xin nộp đơn ứng tuyển vị trí PHP Intern', 'Chờ duyệt', 'profile', '2022-06-27 07:10:33', NULL),
(48, 17, 31, 11, 412, 'XIN CHÀO', 'Đã duyệt', 'profile', '2022-06-27 07:17:59', '2022-06-27 07:18:08'),
(49, 16, 31, 10, 412, 'xin chào !', 'Chờ duyệt', 'profile', '2022-06-27 09:47:34', NULL),
(50, 16, 28, 10, 407, 'hello !', 'Chờ duyệt', 'profile', '2022-06-27 09:56:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL COMMENT 'ID',
  `comp_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên công ty',
  `comp_location` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Địa điểm',
  `comp_address` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Địa chỉ công ty',
  `comp_description` text CHARACTER SET utf8mb4 COMMENT 'Mô tả công ty',
  `comp_logo` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Logo công ty',
  `comp_tax_id` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mã số thuế',
  `comp_size` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Quy mô',
  `comp_website` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Website công ty',
  `comp_email` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Email công ty',
  `comp_field` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Lĩnh vực'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`, `comp_location`, `comp_address`, `comp_description`, `comp_logo`, `comp_tax_id`, `comp_size`, `comp_website`, `comp_email`, `comp_field`) VALUES
(28, 'Công Ty TNHH Lampart', 'TP Hồ Chí Minh', 'An Phú Plaza, Tầng 12, 119 Lý Chính Thắng, Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh', 'Công ty TNHH Lampart được thành lập từ năm 2012 với mục tiêu trở thành đơn vị đem đến những giải pháp về hệ thống đáp ứng những nhu cầu của khách hàng.\r\n\r\nLampart được vận hành bởi những kỹ sư người Nhật và người Việt có trình độ chuyên môn cao. Hiện công ty đang cung cấp các dịch vụ về ứng dụng website, thi công phần mềm cho các khách hàng là doanh nghiệp Việt và cả những công ty Nhật Bản hoạt động kinh doanh tại Việt Nam.', 'lampart-logodOhjVFYx.jpg', '', '200 - 500 nhân viên', 'lampart-vn.com', 'recruit@lampart-vn.com', 'Công nghệ thông tin'),
(29, 'Công ty TMCP Wemade', 'TP Hồ Chí Minh', '31 Làng Tăng Phú', 'Công ty khởi nghiệp Wemade được thành lập và cũng do Park Kwan-ho làm chủ tịch, và cũng đã thực sự giới thiệu bộ sưu tập trò chơi điện tử Mir trong suốt nhiều năm. Nó bắt đầu ra mắt bộ sưu tập trò chơi điện tử Mir vào năm 2000, tuy nhiên đã xoay vòng sang môi trường kinh tế mã thông báo trò chơi dựa trên blockchain vào ngày 26 tháng 4, với sự ra mắt của MIR170. Trò chơi đã được giới thiệu ở 12 quốc gia bằng 10 ngôn ngữ và cũng đã thực sự được tải xuống và cài đặt hơn một triệu lần trên Google Play,  lợi nhuận thực tế cho các yếu tố trò chơi ở mức 4 triệu đô la hàng tháng theo tiêu chuẩn hiện tại. Trước MIR500, Wemade. Bộ sưu tập Mir hiện đã có XNUMX triệu game thủ chỉ tính riêng ở Trung Quốc.', 'unnamedqhj0cm1v.png', '', '50 - 200 nhân viên', 'daidung99.com', 'wemade@gmail.com', 'Công nghệ thông tin'),
(30, 'Công ty TNHH HT', 'TP Hồ Chí Minh', 'ABC, Điện Biên Phủ, TPHCM', 'Công ty HT', NULL, '', '500 - 1000 nhân viên', 'htcompany.com', 'HT@recruitment.com', 'Marketing'),
(31, 'Công ty TNHH ABC', 'TP Hồ Chí Minh', 'Điện Biên Phủ, TPHCM', NULL, '1001-kieu-sang-tao-voi-background-nha-trong-cua-sinh-vien-hutech-3ec5749PJ71srm.jpg', '', '10 - 50 nhân viên', 'abcgroup.vn', 'abcgroup@gmail.com', 'IT'),
(32, 'Công ty TMCP YAY', 'Hà Nội', 'Hà nội', 'Công ty Yay Marketing', 'line-art-house-roof-and-buildings-4485ldHhCYtx04.png', '', '50 - 200 nhân viên', 'yay.net', 'yayy_company@gmail.com', 'Marketing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL COMMENT 'Vị trí công việc cần tìm',
  `level` varchar(100) DEFAULT NULL COMMENT 'Trình độ học vấn',
  `exp` varchar(50) DEFAULT NULL COMMENT 'Số năm kinh nghiệm',
  `gender` varchar(10) DEFAULT NULL COMMENT 'Giới tính',
  `birthday` date DEFAULT NULL COMMENT 'Ngày sinh',
  `marriage` varchar(100) DEFAULT NULL COMMENT 'Tình trạng hôn nhân',
  `city` varchar(50) DEFAULT NULL COMMENT 'Tỉnh Thành phố',
  `address` varchar(200) DEFAULT NULL COMMENT 'Địa chỉ nơi ở',
  `hard_skl` text COMMENT 'Kỹ năng cứng',
  `soft_skl` text COMMENT 'Kỹ năng mềm',
  `career` varchar(100) DEFAULT NULL COMMENT 'Ngành nghề',
  `workplace` varchar(100) DEFAULT NULL COMMENT 'Nơi làm việc mong muốn',
  `rank` varchar(100) DEFAULT NULL COMMENT 'Cấp bậc mong muốn',
  `salary` varchar(50) DEFAULT NULL COMMENT 'Mức lương mong muốn',
  `type_work` varchar(50) DEFAULT NULL COMMENT 'loại hình công việc',
  `career_goals` text COMMENT 'Mục tiêu nghề nghiệp',
  `exp_work` text COMMENT 'Kinh nghiệm làm việc',
  `degree` text COMMENT 'Học vấn bằng cấp',
  `update_time` date DEFAULT NULL COMMENT 'Thời gian cập nhật CV',
  `fileCV` text COMMENT 'file upload CV'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cv`
--

INSERT INTO `cv` (`id`, `user_id`, `position`, `level`, `exp`, `gender`, `birthday`, `marriage`, `city`, `address`, `hard_skl`, `soft_skl`, `career`, `workplace`, `rank`, `salary`, `type_work`, `career_goals`, `exp_work`, `degree`, `update_time`, `fileCV`) VALUES
(3, 9, 'Backend PHP Intern', 'Cao đẳng', 'Chưa có kinh nghiệm', 'Nam', '1999-12-08', 'Độc thân', 'TP Hồ Chí Minh', 'TPHCM', '<ul>\r\n	<li>HTML5/CSS3/JS/JQuery</li>\r\n	<li>PHP/MySQL</li>\r\n	<li>Database Desgin</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Kỹ năng l&agrave;m việc nh&oacute;m</li>\r\n	<li>Kỹ năng quản l&yacute; thời gian</li>\r\n	<li>Kỹ năng giao tiếp</li>\r\n</ul>\r\n', 'Công nghệ thông tin', 'TP Hồ Chí Minh', 'Nhân viên', 'Thỏa thuận', 'Toàn thời gian cố định', '<p>Trở th&agrave;nh developer PHP chuy&ecirc;n nghiệp</p>\r\n', '<p>Project Website tuyển dụng việc l&agrave;m PHP/MySQL MVC</p>\r\n', '', '2022-06-23', 'NguyenNhutQuang_CV-PHP-DEV-InterneW6FsYKj.pdf'),
(5, 11, 'Team Leader (Java/C#)', 'Đại học', '2 năm', 'Nam', '1995-02-12', 'Đã kết hôn', 'Hậu Giang', 'hậu giang', '<p>C#</p>\r\n\r\n<p>JAVA</p>\r\n\r\n<p>HTML</p>\r\n\r\n<p>CSS</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Giao tiếp</p>\r\n\r\n<p>L&agrave;m việc nh&oacute;m</p>\r\n', 'Công nghệ thông tin', 'Hậu Giang', 'Quản lý', '12 - 15 triệu', 'Toàn thời gian cố định', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>TEAM LEAD</li>\r\n	<li>TEAM LEAD</li>\r\n	<li>TEAM LEAD</li>\r\n</ul>\r\n', '<ul>\r\n	<li>TEAM LEAD</li>\r\n	<li>TEAM LEAD</li>\r\n	<li>TEAM LEAD</li>\r\n</ul>\r\n', '', '2022-06-13', 'NguyenNhutQuang_CV-PHP-DEV-InternKLt4GaSN.pdf'),
(6, 12, 'Công nghệ Thực Phẩm', 'Cao đẳng', '1 năm', 'Nữ', '1994-08-08', 'Đã kết hôn', 'Bà Rịa - Vũng Tàu', 'Vũng Tàu', '<p>&nbsp;</p>\r\n\r\n<p>Kỹ năng&nbsp;</p>\r\n\r\n<p>Kỹ năng&nbsp;</p>\r\n\r\n<p>Kỹ năng&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Kỹ năng&nbsp;</p>\r\n\r\n<p>Kỹ năng&nbsp;</p>\r\n\r\n<p>Kỹ năng&nbsp;</p>\r\n', 'Công nghệ thực phẩm', 'Bà Rịa - Vũng Tàu', 'Trưởng nhóm', '10 - 12 triệu', 'Toàn thời gian tạm thời', '<p>&nbsp;</p>\r\n\r\n<p>Mục ti&ecirc;u</p>\r\n\r\n<p>Mục ti&ecirc;u</p>\r\n\r\n<p>Mục ti&ecirc;u</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>EXP</p>\r\n\r\n<p>EXP</p>\r\n\r\n<p>EXP</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '2022-06-05', NULL),
(7, 13, 'Game Dev (Unity/C#)', 'Đại học', 'Dưới 1 năm', 'Nam', '1999-11-10', 'Độc thân', 'TP Hồ Chí Minh', 'TPHCM', '<p>Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;</p>\r\n', '<p>Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;</p>\r\n', 'Công nghệ thông tin', 'TP Hồ Chí Minh', 'Nhân viên', '12 - 15 triệu', 'Toàn thời gian cố định', '<p>Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;</p>\r\n', '<p>Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;</p>\r\n', '<p>Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;Unity&nbsp;</p>\r\n', '2022-06-16', 'NguyenNhutQuang_CV-PHP-DEV-InternA5dhmy94.pdf'),
(9, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13', 'NguyenNhutQuang_CV-PHP-DEV-InternNQ6w4Mra.pdf'),
(10, 16, 'PHP Dev', 'Đại học', 'Chưa có kinh nghiệm', 'Nam', '1999-12-08', 'Độc thân', 'TP Hồ Chí Minh', 'TPHCM', '<ul>\r\n	<li>HTML/CSS/JS</li>\r\n	<li>PHP/MYSQL</li>\r\n	<li>JQUERY</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Kỹ năng giao tiếp</li>\r\n	<li>Kỹ năng l&agrave;m việc nh&oacute;m</li>\r\n	<li>Kỹ năng quản l&yacute; thời gian</li>\r\n</ul>\r\n', 'Công nghệ thông tin', 'TP Hồ Chí Minh', 'Nhân viên', '7 - 10 triệu', 'Toàn thời gian cố định', '<p>Trở th&agrave;nh Fullstack Developer</p>\r\n', '<p>Đồ &aacute;n m&ocirc;n học: Web b&aacute;n s&aacute;ch PHP/MySQL</p>\r\n\r\n<p>Đồ &aacute;n cơ sở: Web NukeViet</p>\r\n\r\n<p>Đồ &aacute;n chuy&ecirc;n ng&agrave;nh: Website tuyển dụng việc l&agrave;m</p>\r\n', '', '2022-06-24', 'NguyenNhutQuang_CV-PHP-DEV-InternJYBXO86c.pdf'),
(11, 17, 'PHP Intern', 'Đại học', 'Chưa có kinh nghiệm', 'Nam', '1999-12-08', 'Độc thân', 'TP Hồ Chí Minh', 'Quận 9, TPHCM', '<ul>\r\n	<li>HTML/CSS/JS</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>L&agrave;m việc nh&oacute;m</li>\r\n	<li>L&agrave;m việc độc lập</li>\r\n	<li>Quản l&yacute; thời gian</li>\r\n</ul>\r\n', 'Công nghệ thông tin', 'TP Hồ Chí Minh', 'Thực tập sinh', '1 - 3 triệu', 'Toàn thời gian cố định', '<ul>\r\n	<li>Trở th&agrave;nh lập tr&igrave;nh vi&ecirc;n PHP</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Đồ &aacute;n m&ocirc;n học Website tuyển dụng việc l&agrave;m</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Bằng đại học</li>\r\n</ul>\r\n', '2022-06-27', 'NguyenNhutQuang_CV-PHP-DEV-Intern7xuafKLg.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employer`
--

CREATE TABLE `employer` (
  `emp_id` int(11) NOT NULL COMMENT 'Id',
  `emp_email` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Email',
  `emp_fullname` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên',
  `emp_user` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên tài khoản',
  `emp_password` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Password',
  `emp_phone` varchar(11) CHARACTER SET utf8mb4 NOT NULL COMMENT 'SĐT ',
  `emp_address` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Vị trí',
  `comp_id` int(11) NOT NULL COMMENT 'ID Công ty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `employer`
--

INSERT INTO `employer` (`emp_id`, `emp_email`, `emp_fullname`, `emp_user`, `emp_password`, `emp_phone`, `emp_address`, `comp_id`) VALUES
(23, 'n.nquanght@gmail.com', 'Nguyễn Nhựt Quang', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0356809728', 'TP Hồ Chí Minh', 28),
(24, 'dungdai@gmail.com', 'Đại Anh Dũng', 'daidung99', 'cfac813fb11c839af5cd29553c406c6d', '01234565648', '', 29),
(25, 'n.nquangh2t@gmail.com', 'Nguyễn Quang', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '0356809728', 'TPHCM', 30),
(26, 'n.nquanght@gmail.com', 'Quang Nguyễn', 'abc', '25f9e794323b453885f5181f1b624d0b', '0356809728', 'TPHCM', 31),
(27, 'xyzabc@gmail.com', 'Nguyễn Trần D', 'admin3', '21232f297a57a5a743894a0e4a801fc3', '0326589536', 'Q1, TPHCM', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobsaved`
--

CREATE TABLE `jobsaved` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `saved_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `jobsaved`
--

INSERT INTO `jobsaved` (`post_id`, `user_id`, `comp_id`, `saved_time`) VALUES
(405, 11, 28, '2022-06-26 16:04:25'),
(406, 11, 28, '2022-06-26 16:06:08'),
(408, 9, 28, '2022-06-26 18:25:06'),
(409, 11, 29, '2022-06-27 02:34:10'),
(408, 17, 28, '2022-06-27 07:10:45'),
(411, 17, 30, '2022-06-27 07:10:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `news_description` text CHARACTER SET utf8mb4,
  `news_thumbnail` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `news_status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `news_createdtime` datetime DEFAULT NULL,
  `news_updatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_description`, `news_thumbnail`, `news_status`, `emp_id`, `news_createdtime`, `news_updatetime`) VALUES
(7, 'Agile là gì? Scrum là gì? Quy trình vận hành ra sao?', '<h2><span style=\"font-size:14px\"><strong>Agile l&agrave; g&igrave;?</strong></span></h2>\r\n\r\n<p>Agile l&agrave; g&igrave;? Agile l&agrave; một phương ph&aacute;p ph&aacute;t triển phần mềm linh hoạt để l&agrave;m sao đưa sản phẩm đến tay người d&ugrave;ng c&agrave;ng nhanh c&agrave;ng tốt c&agrave;ng sớm c&agrave;ng tốt.</p>\r\n\r\n<h3><span style=\"font-size:14px\"><strong>Tuy&ecirc;n ng&ocirc;n Agile (<a href=\"http://agilemanifesto.org/\" rel=\"noopener noreferrer\" target=\"_blank\">Agile Manifesto</a>)</strong></span></h3>\r\n\r\n<p>Tuy&ecirc;n ng&ocirc;n Agile l&agrave; g&igrave;? &ldquo;Tuy&ecirc;n ng&ocirc;n Ph&aacute;t triển phần mềm linh hoạt&rdquo; (&ldquo;Manifesto for Agile Software Development&rdquo; &ndash; gọi tắt l&agrave; &ldquo;Tuy&ecirc;n ng&ocirc;n Agile&rdquo;) đưa ra c&aacute;c gi&aacute; trị cốt l&otilde;i nhất m&agrave; to&agrave;n bộ c&aacute;c nh&agrave; l&yacute; thuyết cũng như những người thực h&agrave;nh Agile phải tu&acirc;n thủ</p>\r\n', '1001-kieu-sang-tao-voi-background-nha-trong-cua-sinh-vien-hutech-3ec574Prv51UbZ.jpg', 'active', 23, '2022-06-24 06:21:35', '2022-06-24 13:21:04'),
(8, 'Python là gì? Lập trình Python ', '<p><em><strong>Python l&agrave; g&igrave;? Bạn đang muốn t&igrave;m t&agrave;i liệu học lập tr&igrave;nh Python cơ bản? Sau đ&acirc;y l&agrave; 20 nguồn t&agrave;i liệu Python cơ bản đến n&acirc;ng cao m&agrave; bất kỳ ai cũng n&ecirc;n lưu lại.</strong></em></p>\r\n\r\n<p>C&ugrave;ng với Ruby, Python l&agrave; ng&ocirc;n ngữ lập tr&igrave;nh gi&uacute;p developer nhận mức lương cao thứ nh&igrave; (khoảng $107,000 /năm) tại Mỹ. Python l&agrave; ng&ocirc;n ngữ lập tr&igrave;nh hướng đối tượng bậc cao, d&ugrave;ng để ph&aacute;t triển website v&agrave; nhiều ứng dụng kh&aacute;c nhau. Với c&uacute; ph&aacute;p cực k&igrave; đơn giản v&agrave; thanh lịch, Python l&agrave; lựa chọn ho&agrave;n hảo cho những ai lần đầu ti&ecirc;n học lập tr&igrave;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"data:image/jpeg;base64,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\" style=\"height:183px; width:276px\" /></p>\r\n', 'thumbnail_defaultTQgjvqCN.jpg', 'active', 23, '2022-06-24 08:03:26', '2022-06-24 13:23:37'),
(9, 'Bạn có biết QA là gì? QC là gì? [Cập nhật 2021]', '<p>QA l&agrave; người chịu tr&aacute;ch nhiệm đảm bảo chất lượng sản phẩm th&ocirc;ng qua việc đưa ra quy tr&igrave;nh l&agrave;m việc giữa c&aacute;c b&ecirc;n li&ecirc;n quan.</p>\r\n\r\n<p>QC l&agrave; người chịu tr&aacute;ch nhiệm thực hiện c&ocirc;ng việc kiểm tra chất lượng phần mềm.</p>\r\n\r\n<p>Đọc b&agrave;i viết n&agrave;y để t&igrave;m hiểu ngay QA l&agrave; g&igrave;, QC l&agrave; g&igrave; v&agrave; nh&acirc;n vi&ecirc;n QA kh&aacute;c g&igrave; nh&acirc;n vi&ecirc;n QC.</p>\r\n', 'thumbnail_default9vLIyahz.jpg', 'active', 23, '2022-06-24 08:40:48', '2022-06-24 13:50:32'),
(10, 'Thiết kế game là gì? Công việc của Game Designer là gì?', '<p><strong><em>hiết kế Game l&agrave; l&agrave;m g&igrave;? Game Designer l&agrave; ai? Thiết kế game kh&ocirc;ng phải l&agrave; c&ocirc;ng việc li&ecirc;n quan đến thiết kế đồ họa như mọi người vẫn nhầm, m&agrave; l&agrave; tạo ra những c&acirc;u chuyện, nh&acirc;n vật, mục ti&ecirc;u&hellip; trong tr&ograve; chơi.</em></strong></p>\r\n\r\n<p>Game Designer l&agrave; một &ldquo;mảnh gh&eacute;p&rdquo; trong một team l&agrave;m game bao gồm Game Programmer, Game Artist, Game Animator v&agrave; QC Tester,&hellip;</p>\r\n\r\n<p>C&ugrave;ng ITviec t&igrave;m hiểu kỹ hơn về c&ocirc;ng việc thiết kế game cũng như vị tr&iacute; Game Designer qua buổi tr&ograve; chuyện với anh&nbsp;<strong>Nguyễn Đại C&aacute;t</strong>&nbsp;&ndash; Co-founder &amp; COO tại&nbsp;<a href=\"https://itviec.com/companies/zedraw-studio\" rel=\"noopener\" target=\"_blank\"><strong>Zedraw Studio</strong></a>, người c&oacute; hơn 10 năm kinh nghiệm trong ng&agrave;nh c&ocirc;ng nghiệp game.</p>\r\n', 'Thế giới Pixel_ (17)0r2jFqAT.jpg', 'active', 23, '2022-06-24 08:41:17', '2022-06-27 10:19:55'),
(11, 'Các series “Developer Chất” ', '<h3><strong>Đừng bỏ qua series &ldquo;Developer Chất&rdquo; cực chất từ ITviec!</strong></h3>\r\n\r\n<p>Mỗi đoạn phim ngắn sẽ thể hiện&nbsp;tinh thần hết m&igrave;nh của những Developer chất qua&nbsp;những khoảnh khắc vui nhộn quanh cuộc sống của Developer như &ldquo;chiến đấu&rdquo; với kh&aacute;ch h&agrave;ng, diệt bug hay sự đam m&ecirc; m&atilde;nh liệt với code.</p>\r\n\r\n<p>Ch&uacute;c bạn thưởng thức series #developerchat vui vẻ!</p>\r\n', NULL, 'active', 23, '2022-06-24 08:55:30', '2022-06-24 08:59:51'),
(12, 'PHP là gì? Tại sao nên học PHP ?', '<p>PHP là viết tắt của cụm từ Personal Home Page nay đã được chuyển thành Hypertext Preprocessor. Hiểu đơn giản thì PHP là một ngôn ngữ lập trình kịch bản (scripting language) đa mục đích. PHP được dùng phổ biến cho việc phát triển các ứng dụng web chạy trên máy chủ. Dó đó, ngôn ngữ lập trình PHP có thể xử lý các chức năng từ phía server để sinh ra mã HTML trên client như thu thập dữ liệu biểu mẫu, sửa đổi cơ sở dữ liệu, quản lý file trên server hay các hoạt động khác.</p>\n', NULL, 'active', 25, '2022-06-26 21:30:17', NULL),
(13, 'Hello World', '<p>PHP MYSQL</p>\r\n', '1001-kieu-sang-tao-voi-background-nha-trong-cua-sinh-vien-hutech-3ec574yhlGjpSY.jpg', 'active', 26, '2022-06-27 07:17:42', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL COMMENT 'ID Post',
  `post_position` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Chức danh',
  `post_career` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Ngành nghề',
  `post_type_work` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Hình thức làm việc',
  `post_address_work` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Địa chỉ',
  `post_rank` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Cấp bậc',
  `post_amount` int(11) NOT NULL COMMENT 'Số lượng tuyển dụng',
  `post_expired` date NOT NULL COMMENT 'Hạn nộp',
  `post_exp` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Kinh nghiệm',
  `post_gender` varchar(20) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Giới tính',
  `post_degree` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Bằng cấp',
  `post_salary` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mức lương',
  `post_test_work` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Thời hạn thử việc',
  `post_work_description` text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mô tả công việc',
  `post_work_required` text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Yêu cầu công việc',
  `post_work_benefit` text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Quyền lợi',
  `post_work_apply` text CHARACTER SET utf8mb4 NOT NULL COMMENT 'Cách thức ứng tuyển',
  `emp_id` int(11) NOT NULL COMMENT 'Id NTD',
  `emp_fullname` varchar(100) NOT NULL COMMENT 'Tên NTD',
  `emp_email` varchar(100) NOT NULL COMMENT 'Email NTD',
  `emp_phone` varchar(11) NOT NULL COMMENT 'SĐT NTD',
  `emp_address` varchar(200) NOT NULL COMMENT 'Địa chỉ NTD',
  `post_createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
  `post_isActive` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'active' COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`post_id`, `post_position`, `post_career`, `post_type_work`, `post_address_work`, `post_rank`, `post_amount`, `post_expired`, `post_exp`, `post_gender`, `post_degree`, `post_salary`, `post_test_work`, `post_work_description`, `post_work_required`, `post_work_benefit`, `post_work_apply`, `emp_id`, `emp_fullname`, `emp_email`, `emp_phone`, `emp_address`, `post_createdDate`, `post_isActive`) VALUES
(405, 'PHP Intern', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Thực tập sinh', 10, '2022-07-10', 'Chưa có kinh nghiệm', 'Nam', 'Đại học', 'Thỏa thuận', '3 tháng', '<ul>\r\n	<li>Được đào tạo phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng web thực t&ecirc;́, phát tri&ecirc;̉n ph&acirc;̀n m&ecirc;̀m bằng ng&ocirc;n ngữ PHP với c&aacute;c kỹ thuật mới nhất.</li>\r\n	<li>Nắm bắt nghi&ecirc;̣p vụ đã ph&acirc;n tích đ&ecirc;̉ phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng tr&ecirc;n n&ecirc;̀n web cùng với các kỹ sư tại Vi&ecirc;̣t Nam và tại Nh&acirc;̣t Bản.</li>\r\n	<li>Ưu ti&ecirc;n: C&aacute;c sinh vi&ecirc;n thực tập c&oacute; mong muốn được l&agrave;m việc ch&iacute;nh thức tại C&ocirc;ng ty sau thực tập. C&ocirc;ng ty sẽ quyết định k&yacute; HĐLĐ sau khi đánh gi&aacute; sinh vi&ecirc;n đủ năng lực sau thực tập. Sinh vi&ecirc;n sau khi trở thành nh&acirc;n vi&ecirc;n chính thức có th&ecirc;̉ đi làm tu&acirc;̀n từ 3 ngày trở l&ecirc;n v&agrave; được hưởng c&aacute;c quyền lợi của Nh&acirc;n vi&ecirc;n ch&iacute;nh thức cho tới khi chính thức t&ocirc;́t nghi&ecirc;̣p.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Sinh vi&ecirc;n năm cuối ở các ngành Khoa học máy tính, ph&acirc;̀n m&ecirc;̀m tại các trường Cao Đẳng, Đại Học.</li>\r\n	<li>Có th&ecirc;̉ làm vi&ecirc;̣c trong thời gian thực t&acirc;̣p tại c&ocirc;ng ty từ 6 &ndash; 10 buổi / tuần ( tương đương 3 &ndash; 5 ng&agrave;y/ tuần)</li>\r\n	<li>Có hi&ecirc;̉u bi&ecirc;́t hoặc đã tìm hi&ecirc;̉u v&ecirc;̀ l&acirc;̣p trình website và ng&ocirc;n ngữ PHP mảng back end hoặc y&ecirc;u thích phát tri&ecirc;̉n web với PHP</li>\r\n	<li>&nbsp; PHP, MySQL</li>\r\n	<li>&nbsp; PHP Famework: CodeIgniter, CakePHP, Zend, &hellip;)</li>\r\n	<li>&nbsp; Javascript v&agrave; JS Frameworks (jQuery, AngularJS, Vuejs&hellip;)</li>\r\n	<li>&nbsp; DB (MySQL v&agrave; thiết kế Database)</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:04:33', 'active'),
(406, 'Business Analyst (Software Development)', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Nhân viên', 4, '2022-06-10', 'Dưới 1 năm', 'Không yêu cầu', 'Đại học', 'Thỏa thuận', '2 tháng', '<ul>\r\n	<li>Tiếp nhận, khảo s&aacute;t, thu thập v&agrave; l&agrave;m r&otilde; y&ecirc;u cầu từ kỹ sư hệ thống của c&ocirc;ng ty mẹ tại Nhật v&agrave; tại Việt Nam, th&ocirc;ng qua h&igrave;nh thức trao đổi gi&aacute;n tiếp: web meeting, chat tool&hellip;</li>\r\n	<li>M&ocirc; tả v&agrave; ph&acirc;n t&iacute;ch quy tr&igrave;nh nghiệp vụ, đề xuất với kh&aacute;ch h&agrave;ng c&aacute;c giải ph&aacute;p cải thiện quy tr&igrave;nh</li>\r\n	<li>C&oacute; thể ph&acirc;n t&iacute;ch y&ecirc;u cầu của kh&aacute;ch h&agrave;ng, từ đ&oacute; thiết kế quy tr&igrave;nh kinh doanh th&agrave;nh hệ thống, tạo bảng thiết kế cơ bản v&agrave; chi tiết.</li>\r\n	<li>Quản l&yacute; v&agrave; cập nhật lại bảng thiết kế khi c&oacute; sự thay đổi trong qu&aacute; tr&igrave;nh thực hiện dự &aacute;n</li>\r\n	<li>Đ&oacute;ng vai tr&ograve; cầu nối trong việc trao đổi th&ocirc;ng tin giữa đội dự &aacute;n v&agrave; kh&aacute;ch h&agrave;ng</li>\r\n	<li>T&igrave;m hiểu v&agrave; chia sẻ kiến thức nghiệp vụ của kh&aacute;ch h&agrave;ng cho đội dự &aacute;n</li>\r\n	<li>Hỗ trợ người quản l&yacute; dự &aacute;n phản hồi những thắc mắc hay y&ecirc;u cầu của kh&aacute;ch h&agrave;ng</li>\r\n	<li>Hỗ trợ c&aacute;c b&ecirc;n li&ecirc;n quan thực hiện c&aacute;c c&ocirc;ng việc li&ecirc;n quan đến thủ tục, quy tr&igrave;nh li&ecirc;n quan đến dự &aacute;n.</li>\r\n	<li>Tạo v&agrave; hướng dẫn về bảng thiết kế d&agrave;nh cho Developer v&agrave; QC Tester</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Tốt nghiệp c&aacute;c chuy&ecirc;n ng&agrave;nh CNTT hoặc c&aacute;c chuy&ecirc;n ng&agrave;nh kh&aacute;c li&ecirc;n quan.</li>\r\n	<li>C&oacute; kinh nghiệm ph&aacute;t triển phần mềm tr&ecirc;n 3 năm</li>\r\n	<li>Từng l&agrave;m vị tr&iacute; Business Analyst hoặc c&oacute; kinh nghiệm PM/PL v&agrave; l&agrave;m việc trước tiếp với kh&aacute;ch h&agrave;ng.</li>\r\n	<li>C&oacute; khả năng ph&acirc;n t&iacute;ch, tư duy logic.</li>\r\n	<li>C&oacute; kinh nghiệm trong việc ph&aacute;t triển phần mềm theo m&ocirc; h&igrave;nh Agile hoặc Waterfall, định hướng v&agrave; thiết kế dựa tr&ecirc;n đặc trưng, y&ecirc;u cầu chức năng, hiệu suất, v&agrave; trải nghiệm của người d&ugrave;ng.</li>\r\n	<li>C&oacute; kỹ năng về SQL v&agrave; thiết kế table</li>\r\n	<li>C&oacute; kỹ năng hiểu v&agrave; l&yacute; giải về ng&ocirc;n ngữ ph&aacute;t triển</li>\r\n	<li>Đọc hiểu t&agrave;i liệu tiếng Anh chuy&ecirc;n ng&agrave;nh, nếu biết tiếng Nhật l&agrave; một lợi thế.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n	<li>Vui l&ograve;ng gửi CV bằng tiếng anh</li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:15:13', 'inactive'),
(407, 'Front End Leader', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'Hà Nội', 'Trưởng nhóm', 2, '2022-07-31', '3 năm', 'Không yêu cầu', 'Đại học', 'Thỏa thuận', '3 tháng', '<ul>\r\n	<li>Quản l&yacute; Team Frontend nhằm củng cố, ph&aacute;t triển c&aacute;c member trong Team (cụ thể l&agrave; chuẩn bị &ndash; duy tr&igrave; m&ocirc;i trường kỹ thuật, thiết kế phương &aacute;n ph&aacute;t triển Team &ndash; kế hoạch đ&agrave;o tạo nh&acirc;n sự, đ&aacute;nh gi&aacute; nh&acirc;n sự, v.v&hellip;)</li>\r\n	<li>Chịu tr&aacute;ch nhiệm gi&aacute;m s&aacute;t, kiểm tra chất lượng v&agrave; lập tr&igrave;nh ch&iacute;nh trong c&aacute;c dự &aacute;n gia c&ocirc;ng phần mềm sử dụng JavaScript (Angular/ ReactJS/ VueJS) v&agrave; triển khai HTML, CSS hoặc CMS (WordPress v.v&hellip;) để ph&aacute;t triển v&agrave; hỗ trợ ph&aacute;t triển Website theo y&ecirc;u cầu của kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Nghi&ecirc;n cứu, t&igrave;m hiểu c&aacute;c c&ocirc;ng nghệ về HTML/CSS Javascript mới nhất để &aacute;p dụng v&agrave;o c&aacute;c dự &aacute;n của C&ocirc;ng ty.</li>\r\n	<li>Quản l&yacute; team thực hiện c&aacute;c dự &aacute;n được giao dưới sự đi&ecirc;̀u ph&ocirc;́i của Quản lý trực ti&ecirc;́p v&agrave; chịu tr&aacute;ch nhiệm xử l&yacute; c&aacute;c vấn đề ph&aacute;t sinh về kỹ thuật v&agrave; điều phối nh&acirc;n sự cho dự &aacute;n</li>\r\n	<li>Một số nghiệp vụ n&acirc;ng cao chất lượng sản phẩm li&ecirc;n quan đến ph&aacute;t triển kỹ thuật. (FrontEnd, hoặc x&acirc;y dựng Website).</li>\r\n	<li>Ph&aacute;t triển v&agrave; vận h&agrave;nh website nội bộ..</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Kinh nghiệm &iacute;t nhất 2 năm l&agrave;m Frontend Leader hoặc c&oacute; 3 năm kinh nghiệm PM dự &aacute;n FrontEnd.</li>\r\n	<li>Kinh nghiệm &iacute;t nhất 2 năm quản l&yacute; v&agrave; ph&aacute;t triển c&aacute;c kỹ sư FrontEnd trong nội bộ Team</li>\r\n	<li>Kinh nghiệm đ&agrave;o tạo &ndash; dẫn dắt member (đ&agrave;o tạo những kỹ sư trẻ)</li>\r\n	<li>Kinh nghiệm quản l&yacute; dự &aacute;n Frontend với quy m&ocirc; khoảng 10 member.</li>\r\n	<li>Kinh nghiệm l&agrave;m việc thực tế từ 5 năm trở l&ecirc;n c&aacute;c dự &aacute;n JavaScript sử dụng FrameWorks/Libraries như VueJS/AngularJS/ReactJS.</li>\r\n	<li>Kinh nghiệm ph&aacute;t triển c&aacute;c Site mới v&agrave; bảo tr&igrave; c&aacute;c Service Sites hiện c&oacute;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n	<li>Trợ cấp đối với nh&acirc;n vi&ecirc;n chờ chỉ thị l&agrave;m việc tại nh&agrave; trong c&aacute;c dịp Lễ, Tết.</li>\r\n	<li>Được hưởng những ph&uacute;c lợi đặc biệt như chương tr&igrave;nh qu&agrave; tết, b&aacute;nh trung thu, tiền mừng đ&aacute;m cưới (5,000,000 VND), tiền mừng khi sanh con (2,000,000 VND),&hellip;</li>\r\n	<li>Đối với nh&acirc;n vi&ecirc;n k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn: từ thời điểm k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn, cứ mỗi năm được cộng th&ecirc;m 1 ng&agrave;y nghỉ ph&eacute;p.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:19:12', 'active'),
(408, 'Thực tập Sinh QC (Automation Test)', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Thực tập sinh', 15, '2022-07-25', 'Chưa có kinh nghiệm', 'Nữ', 'Đại học', '1 - 3 triệu', '', '<ul>\r\n	<li>Được đ&agrave;o tạo cơ bản đến n&acirc;ng cao cả chuy&ecirc;n m&ocirc;n, nghiệp vụ testing &amp; Quy tr&igrave;nh l&agrave;m việc: Waterfall, Agile.</li>\r\n	<li>Nắm bắt nghi&ecirc;̣p vụ đã ph&acirc;n tích đ&ecirc;̉ viết checklist/testcases hoặc phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng automation test tr&ecirc;n n&ecirc;̀n web/mobile cùng với các kỹ sư tại Vi&ecirc;̣t Nam và tại Nh&acirc;̣t Bản.</li>\r\n	<li><strong>Đi&ecirc;̀u ki&ecirc;̣n bắt bu&ocirc;̣c: C&aacute;c sinh vi&ecirc;n thực tập tại C&ocirc;ng ty sẽ trở th&agrave;nh nh&acirc;n vi&ecirc;n ch&iacute;nh thức sau khi kết th&uacute;c thời gian thực tập nếu C&ocirc;ng ty đánh giá thấy sinh vi&ecirc;n c&oacute; đủ năng lực. Sinh vi&ecirc;n sau khi trở thành nh&acirc;n vi&ecirc;n chính thức có th&ecirc;̉ đi làm tu&acirc;̀n từ 3 ngày trở l&ecirc;n cho tới khi chính thức t&ocirc;́t nghi&ecirc;̣p.</strong></li>\r\n</ul>\r\n', '<ul>\r\n	<li>Sinh vi&ecirc;n năm cuối c&aacute;c ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin/Khoa học m&aacute;y t&iacute;nh/Phần mềm,&hellip; c&aacute;c trường Cao đẳng/Đại học.</li>\r\n	<li>C&oacute; thể l&agrave;m việc trong thời gian thực tập tại c&ocirc;ng ty từ 6-10 buổi/1 tuần (tương đương 3-5 ng&agrave;y/tuần).</li>\r\n	<li>C&oacute; kiến thức về IT, Desktop v&agrave; Mobile. Kỹ năng tư duy logic, s&aacute;ng tạo v&agrave; ph&acirc;n t&iacute;ch tốt.</li>\r\n	<li>Biết một trong những ng&ocirc;n ngữ sau: Java, C#, .NET,&hellip; v&agrave; SQL server/Oracle/MySql.</li>\r\n	<li>C&oacute; kiến thức căn bản về Manual test, y&ecirc;u th&iacute;ch lập tr&igrave;nh v&agrave; muốn trở th&agrave;nh Automation test chuy&ecirc;n nghiệp trong tương lai.</li>\r\n	<li>Hiểu c&aacute;c loại test, c&oacute; thể sử dụng c&ocirc;ng cụ quản l&yacute; test.</li>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; kiến thức về:</li>\r\n	<li>○ Load test</li>\r\n	<li>○ Performance test</li>\r\n	<li>○ Responsive test</li>\r\n	<li>○ Mobile application test</li>\r\n	<li>○ HTML/CSS, client/server (căn bản)</li>\r\n	<li>○ Tiếng Anh (đọc hiểu)</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n	<li>Trợ cấp đối với nh&acirc;n vi&ecirc;n chờ chỉ thị l&agrave;m việc tại nh&agrave; trong c&aacute;c dịp Lễ, Tết.</li>\r\n	<li>Được hưởng những ph&uacute;c lợi đặc biệt như chương tr&igrave;nh qu&agrave; tết, b&aacute;nh trung thu, tiền mừng đ&aacute;m cưới (5,000,000 VND), tiền mừng khi sanh con (2,000,000 VND),&hellip;</li>\r\n	<li>Đối với nh&acirc;n vi&ecirc;n k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn: từ thời điểm k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn, cứ mỗi năm được cộng th&ecirc;m 1 ng&agrave;y nghỉ ph&eacute;p.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:21:34', 'active'),
(409, 'Senior Java', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Trưởng nhóm', 2, '2022-07-15', 'Hơn 5 năm', 'Nam', 'Đại học', '25 - 30 triệu', '', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', 24, 'Đại Anh Dũng', 'dungdai@gmail.com', '01234565648', '', '2022-05-29 19:11:08', 'active'),
(410, 'Nhân Viên Marketing / Digital Marketing', 'Quản trị kinh doanh', 'Toàn thời gian cố định', 'Đà Nẵng', 'Nhân viên', 3, '2022-07-31', '1 năm', 'Nữ', 'Đại học', '7 - 10 triệu', '3 tháng', '<p>- Thực hiện, theo d&otilde;i v&agrave; ph&acirc;n t&iacute;ch hiệu quả c&aacute;c chiến dịch quảng c&aacute;o sản phẩm tr&ecirc;n page b&aacute;n h&agrave;ng v&agrave; website.</p>\r\n\r\n<p>- Ph&acirc;n t&iacute;ch thị trường v&agrave; đối thủ kh&aacute;ch h&agrave;ng, thực hiện c&aacute;c c&ocirc;ng t&aacute;c tối ưu h&oacute;a chi ph&iacute; Marketing cho C&ocirc;ng ty</p>\r\n\r\n<p>- Cập nhật th&ocirc;ng tin viết b&agrave;i tr&ecirc;n trang Web, Fanpage Facebook của C&ocirc;ng ty.</p>\r\n\r\n<p>- Quảng c&aacute;o chạy Marketing cho trang Fanpage.</p>\r\n\r\n<p>- Đề xuất c&aacute;c chương tr&igrave;nh Marketing th&uacute;c đẩy b&aacute;n h&agrave;ng. S&aacute;ng tạo c&aacute;c &yacute; tưởng mới, nội dung &amp; triển khai c&aacute;c chiến dịch truyền th&ocirc;ng online v&agrave; offline.</p>\r\n\r\n<p>- Hỗ trợ c&aacute;c cửa h&agrave;ng thực hiện c&aacute;c chương tr&igrave;nh khuyến m&atilde;i, th&uacute;c đẩy b&aacute;n h&agrave;ng.</p>\r\n\r\n<p>- Kiểm tra, gi&aacute;m s&aacute;t, đ&aacute;nh gi&aacute; to&agrave;n bộ c&aacute;c hoạt động Marketing của C&ocirc;ng ty</p>\r\n', '<p>- Nam/Nữ từ 25 tuổi trở l&ecirc;n.</p>\r\n\r\n<p>- Tr&igrave;nh độ: Cao đẳng trở l&ecirc;n</p>\r\n\r\n<p>- Ưu tiền c&aacute;c ng&agrave;nh: Marketing, Quản trị kinh doanh</p>\r\n\r\n<p>- Ưu ti&ecirc;n 1 năm kinh nghiệm ở vị tr&iacute; tương đương</p>\r\n\r\n<p>- Kỹ năng ph&acirc;n t&iacute;ch thị trường, đối thủ cạnh tranh</p>\r\n\r\n<p>- Tinh thần tr&aacute;ch nhiệm cao, t&acirc;m huyết với c&ocirc;ng việc</p>\r\n', '<p>- Thu nhập: từ 8 triệu - 10 triệu/th&aacute;ng</p>\r\n\r\n<p>- Hưởng đầy đủ c&aacute;c chế độ BHXH - BHYT v&agrave; c&aacute;c chế độ ph&uacute;c lợi người lao động theo quy định.</p>\r\n\r\n<p>- C&oacute; nhiều cơ hội thăng tiến; m&ocirc;i trường l&agrave;m việc văn minh, chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>- Thưởng th&aacute;ng lương thứ 13, ghi nhận cống hiến, thưởng v&agrave;o dịp lễ, tết trong năm</p>\r\n', '<p>Li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua email của c&ocirc;ng ty.</p>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 22:15:29', 'active'),
(411, 'gfdgdfgfdg', 'Công nghệ chế biến thủy sản', 'Toàn thời gian tạm thời', 'Hà Nội', 'Trưởng phòng', 3, '2022-07-02', 'Chưa có kinh nghiệm', 'Không yêu cầu', 'Không yêu cầu', 'Thỏa thuận', '', '<p>gfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfg</p>\r\n', '<p>gfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfg</p>\r\n', '<p>gfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfg</p>\r\n', '<p>gfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfggfdgfdfdhgfhfghfg</p>\r\n', 25, 'Nguyễn Quang', 'n.nquangh2t@gmail.com', '0356809728', 'TPHCM', '2022-06-26 20:04:57', 'active'),
(412, 'PHP MYSQL', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'Bà Rịa - Vũng Tàu', 'Thực tập sinh', 5, '2022-07-08', 'Chưa có kinh nghiệm', 'Không yêu cầu', 'Đại học', 'Thỏa thuận', '3 tháng', '<ul>\r\n	<li>Được đào tạo phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng web thực t&ecirc;́, phát tri&ecirc;̉n ph&acirc;̀n m&ecirc;̀m bằng ng&ocirc;n ngữ PHP với c&aacute;c kỹ thuật mới nhất.</li>\r\n	<li>Nắm bắt nghi&ecirc;̣p vụ đã ph&acirc;n tích đ&ecirc;̉ phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng tr&ecirc;n n&ecirc;̀n web cùng với các kỹ sư tại Vi&ecirc;̣t Nam và tại Nh&acirc;̣t Bản.</li>\r\n	<li>Ưu ti&ecirc;n: C&aacute;c sinh vi&ecirc;n thực tập c&oacute; mong muốn được l&agrave;m việc ch&iacute;nh thức tại C&ocirc;ng ty sau thực tập. C&ocirc;ng ty sẽ quyết định k&yacute; HĐLĐ sau khi đánh gi&aacute; sinh vi&ecirc;n đủ năng lực sau thực tập. Sinh vi&ecirc;n sau khi trở thành nh&acirc;n vi&ecirc;n chính thức có th&ecirc;̉ đi làm tu&acirc;̀n từ 3 ngày trở l&ecirc;n v&agrave; được hưởng c&aacute;c quyền lợi của Nh&acirc;n vi&ecirc;n ch&iacute;nh thức cho tới khi chính thức t&ocirc;́t nghi&ecirc;̣p.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li>Sinh vi&ecirc;n năm cuối ở các ngành Khoa học máy tính, ph&acirc;̀n m&ecirc;̀m tại các trường Cao Đẳng, Đại Học.</li>\r\n	<li>Có th&ecirc;̉ làm vi&ecirc;̣c trong thời gian thực t&acirc;̣p tại c&ocirc;ng ty từ 6 &ndash; 10 buổi / tuần ( tương đương 3 &ndash; 5 ng&agrave;y/ tuần)</li>\r\n	<li>Có hi&ecirc;̉u bi&ecirc;́t hoặc đã tìm hi&ecirc;̉u v&ecirc;̀ l&acirc;̣p trình website và ng&ocirc;n ngữ PHP mảng back end hoặc y&ecirc;u thích phát tri&ecirc;̉n web với PHP</li>\r\n	<li>&nbsp; PHP, MySQL</li>\r\n	<li>&nbsp; PHP Famework: CodeIgniter, CakePHP, Zend, &hellip;)</li>\r\n	<li>&nbsp; Javascript v&agrave; JS Frameworks (jQuery, AngularJS, Vuejs&hellip;)</li>\r\n	<li>&nbsp; DB (MySQL v&agrave; thiết kế Database)</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n</ul>\r\n', 26, 'Quang Nguyễn', 'n.nquanght@gmail.com', '0356809728', 'TPHCM', '2022-06-27 07:16:07', 'active'),
(413, 'Nhân viên marketing', 'Marketing', 'Bán thời gian cố định', 'Bình Dương', 'Nhân viên', 14, '2022-08-20', '1 năm', 'Nữ', 'Cao đẳng', 'Thỏa thuận', '1 tháng', '<ul>\r\n	<li>L&agrave;m việc theo y&ecirc;u cầu&nbsp;L&agrave;m việc theo y&ecirc;u cầu&nbsp;L&agrave;m việc theo y&ecirc;u cầu&nbsp;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Y&ecirc;u cầu về ngoại h&igrave;nh</li>\r\n	<li>Y&ecirc;u cầu về t&iacute;nh c&aacute;ch</li>\r\n	<li>Y&ecirc;u cầu về học vấn</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Quyền lợi theo thỏa thuận</li>\r\n</ul>\r\n', '<p>Nộp đơn online tại HTJOB</p>\r\n', 27, 'Nguyễn Trần D', 'xyzabc@gmail.com', '0326589536', 'Q1, TPHCM', '2022-06-27 10:12:10', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profilesaved`
--

CREATE TABLE `profilesaved` (
  `cv_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `time_save` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `profilesaved`
--

INSERT INTO `profilesaved` (`cv_id`, `emp_id`, `time_save`) VALUES
(7, 23, '2022-06-25'),
(3, 23, '2022-06-25'),
(3, 26, '2022-06-27'),
(7, 26, '2022-06-27'),
(10, 26, '2022-06-27'),
(5, 26, '2022-06-27'),
(3, 27, '2022-06-27'),
(7, 27, '2022-06-27'),
(6, 27, '2022-06-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Email',
  `user_username` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên tài khoản',
  `user_password` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mật khẩu',
  `user_fullname` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Họ tên',
  `user_phone` varchar(11) CHARACTER SET utf8mb4 NOT NULL COMMENT 'SĐT',
  `user_avatar` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Avatar',
  `user_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_username`, `user_password`, `user_fullname`, `user_phone`, `user_avatar`, `user_date_created`) VALUES
(9, 'quang@gmail.com', 'admin', '9fafde0a3ab3890eb4ebd593678e5454', 'Nguyễn Nhựt Quang', '03568097284', '277741523_3286476674918959_7406532727525711506_nQKLTi4Br.jpg', '2022-05-31 15:06:12'),
(11, 'user2@gmail.com', 'user2', '9fafde0a3ab3890eb4ebd593678e5454', 'Nguyễn Văn B', '0326974589', NULL, '2022-06-05 07:51:07'),
(12, 'user3@gmail.com', 'user3', '9fafde0a3ab3890eb4ebd593678e5454', 'Phạm Thị C', '0326974583', NULL, '2022-06-05 07:51:07'),
(13, 'user4@gmail.com', 'user4', '9fafde0a3ab3890eb4ebd593678e5454', 'Nguyễn Văn V', '0236984534', '273550402_351614563320970_658110892863803805_n2uxPdXnB.jpg', '2022-06-09 01:21:52'),
(15, 'user5@gmail.com', 'user5', '9fafde0a3ab3890eb4ebd593678e5454', 'Nguyễn A', '0254545454', NULL, '2022-06-13 05:51:28'),
(16, 'n.nquangh4t@gmail.com', 'user', '9fafde0a3ab3890eb4ebd593678e5454', 'Nguyễn Quang', '0356809728', NULL, '2022-06-22 09:48:13'),
(17, 'n.nquangh4t@gmail.com', 'quanght', '25f9e794323b453885f5181f1b624d0b', 'Nguyễn Quang', '0356809728', '277741523_3286476674918959_7406532727525711506_nQKLTi4BrgrNutncU.jpg', '2022-06-27 07:06:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`apply_id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Chỉ mục cho bảng `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Chỉ mục cho bảng `jobsaved`
--
ALTER TABLE `jobsaved`
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `employer`
--
ALTER TABLE `employer`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Post', AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  ADD CONSTRAINT `apply_job_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`id`);

--
-- Các ràng buộc cho bảng `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);

--
-- Các ràng buộc cho bảng `jobsaved`
--
ALTER TABLE `jobsaved`
  ADD CONSTRAINT `jobsaved_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employer` (`emp_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employer` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
