-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2022 at 11:13 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL COMMENT 'ID',
  `comp_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên công ty',
  `comp_location` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Địa điểm',
  `comp_address` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Địa chỉ công ty',
  `comp_description` text CHARACTER SET utf8mb4 COMMENT 'Mô tả công ty',
  `comp_logo` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Logo công ty',
  `comp_tax_id` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mã số thuế',
  `comp_size` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Quy mô',
  `comp_website` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Website công ty',
  `comp_email` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Email công ty',
  `comp_field` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Lĩnh vực'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`, `comp_location`, `comp_address`, `comp_description`, `comp_logo`, `comp_tax_id`, `comp_size`, `comp_website`, `comp_email`, `comp_field`) VALUES
(28, 'Công Ty TNHH Lampart', 'TP Hồ Chí Minh', 'An Phú Plaza, Tầng 12, 119 Lý Chính Thắng, Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh', 'Công ty TNHH Lampart được thành lập từ năm 2012 với mục tiêu trở thành đơn vị đem đến những giải pháp về hệ thống đáp ứng những nhu cầu của khách hàng.\r\n\r\nLampart được vận hành bởi những kỹ sư người Nhật và người Việt có trình độ chuyên môn cao. Hiện công ty đang cung cấp các dịch vụ về ứng dụng website, thi công phần mềm cho các khách hàng là doanh nghiệp Việt và cả những công ty Nhật Bản hoạt động kinh doanh tại Việt Nam.', 'lampart-logodOhjVFYx.jpg', '', '200 - 500 nhân viên', 'lampart-vn.com', 'recruit@lampart-vn.com', 'Công nghệ thông tin'),
(29, 'Công ty TMCP Wemade', 'TP Hồ Chí Minh', '31 Làng Tăng Phú', 'Công ty khởi nghiệp Wemade được thành lập và cũng do Park Kwan-ho làm chủ tịch, và cũng đã thực sự giới thiệu bộ sưu tập trò chơi điện tử Mir trong suốt nhiều năm. Nó bắt đầu ra mắt bộ sưu tập trò chơi điện tử Mir vào năm 2000, tuy nhiên đã xoay vòng sang môi trường kinh tế mã thông báo trò chơi dựa trên blockchain vào ngày 26 tháng 4, với sự ra mắt của MIR170. Trò chơi đã được giới thiệu ở 12 quốc gia bằng 10 ngôn ngữ và cũng đã thực sự được tải xuống và cài đặt hơn một triệu lần trên Google Play,  lợi nhuận thực tế cho các yếu tố trò chơi ở mức 4 triệu đô la hàng tháng theo tiêu chuẩn hiện tại. Trước MIR500, Wemade. Bộ sưu tập Mir hiện đã có XNUMX triệu game thủ chỉ tính riêng ở Trung Quốc.', 'unnamedqhj0cm1v.png', '', '50 - 200 nhân viên', 'daidung99.com', 'wemade@gmail.com', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
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
  `degree` text COMMENT 'Học vấn bằng cấp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `user_id`, `position`, `level`, `exp`, `gender`, `birthday`, `marriage`, `city`, `address`, `hard_skl`, `soft_skl`, `career`, `workplace`, `rank`, `salary`, `type_work`, `career_goals`, `exp_work`, `degree`) VALUES
(3, 9, 'Backend PHP Intern', 'Cao đẳng', 'Chưa có kinh nghiệm', 'Nam', '1999-12-08', 'Độc thân', 'TP Hồ Chí Minh', 'TPHCM', '<ul>\r\n	<li>HTML5/CSS3/JS/JQuery</li>\r\n	<li>PHP/MySQL</li>\r\n	<li>Database Desgin</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Kỹ năng l&agrave;m việc nh&oacute;m</li>\r\n	<li>Kỹ năng quản l&yacute; thời gian</li>\r\n	<li>Kỹ năng giao tiếp</li>\r\n</ul>\r\n', 'Công nghệ thông tin', 'TP Hồ Chí Minh', 'Nhân viên', 'Thỏa thuận', 'Toàn thời gian cố định', '<p>Trở th&agrave;nh developer PHP chuy&ecirc;n nghiệp</p>\r\n', '<p>Project Website tuyển dụng việc l&agrave;m PHP/MySQL MVC</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
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
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`emp_id`, `emp_email`, `emp_fullname`, `emp_user`, `emp_password`, `emp_phone`, `emp_address`, `comp_id`) VALUES
(23, 'n.nquanght@gmail.com', 'Nguyễn Nhựt Quang', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0356809728', 'TP Hồ Chí Minh', 28),
(24, 'dungdai@gmail.com', 'Đại Anh Dũng', 'daidung99', '9388ac7ca68c433105f2d695795ba36d', '01234565648', '', 29);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `news_description` text CHARACTER SET utf8mb4,
  `news_image` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
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
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_position`, `post_career`, `post_type_work`, `post_address_work`, `post_rank`, `post_amount`, `post_expired`, `post_exp`, `post_gender`, `post_degree`, `post_salary`, `post_test_work`, `post_work_description`, `post_work_required`, `post_work_benefit`, `post_work_apply`, `emp_id`, `emp_fullname`, `emp_email`, `emp_phone`, `emp_address`, `post_createdDate`, `post_isActive`) VALUES
(405, 'PHP Intern', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Thực tập sinh', 10, '2022-06-19', 'Chưa có kinh nghiệm', 'Nam', 'Đại học', 'Thỏa thuận', '3 tháng', '<ul>\r\n	<li>Được đào tạo phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng web thực t&ecirc;́, phát tri&ecirc;̉n ph&acirc;̀n m&ecirc;̀m bằng ng&ocirc;n ngữ PHP với c&aacute;c kỹ thuật mới nhất.</li>\r\n	<li>Nắm bắt nghi&ecirc;̣p vụ đã ph&acirc;n tích đ&ecirc;̉ phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng tr&ecirc;n n&ecirc;̀n web cùng với các kỹ sư tại Vi&ecirc;̣t Nam và tại Nh&acirc;̣t Bản.</li>\r\n	<li>Ưu ti&ecirc;n: C&aacute;c sinh vi&ecirc;n thực tập c&oacute; mong muốn được l&agrave;m việc ch&iacute;nh thức tại C&ocirc;ng ty sau thực tập. C&ocirc;ng ty sẽ quyết định k&yacute; HĐLĐ sau khi đánh gi&aacute; sinh vi&ecirc;n đủ năng lực sau thực tập. Sinh vi&ecirc;n sau khi trở thành nh&acirc;n vi&ecirc;n chính thức có th&ecirc;̉ đi làm tu&acirc;̀n từ 3 ngày trở l&ecirc;n v&agrave; được hưởng c&aacute;c quyền lợi của Nh&acirc;n vi&ecirc;n ch&iacute;nh thức cho tới khi chính thức t&ocirc;́t nghi&ecirc;̣p.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Sinh vi&ecirc;n năm cuối ở các ngành Khoa học máy tính, ph&acirc;̀n m&ecirc;̀m tại các trường Cao Đẳng, Đại Học.</li>\r\n	<li>Có th&ecirc;̉ làm vi&ecirc;̣c trong thời gian thực t&acirc;̣p tại c&ocirc;ng ty từ 6 &ndash; 10 buổi / tuần ( tương đương 3 &ndash; 5 ng&agrave;y/ tuần)</li>\r\n	<li>Có hi&ecirc;̉u bi&ecirc;́t hoặc đã tìm hi&ecirc;̉u v&ecirc;̀ l&acirc;̣p trình website và ng&ocirc;n ngữ PHP mảng back end hoặc y&ecirc;u thích phát tri&ecirc;̉n web với PHP</li>\r\n	<li>&nbsp; PHP, MySQL</li>\r\n	<li>&nbsp; PHP Famework: CodeIgniter, CakePHP, Zend, &hellip;)</li>\r\n	<li>&nbsp; Javascript v&agrave; JS Frameworks (jQuery, AngularJS, Vuejs&hellip;)</li>\r\n	<li>&nbsp; DB (MySQL v&agrave; thiết kế Database)</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:04:33', 'active'),
(406, 'Business Analyst (Software Development)', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Nhân viên', 4, '2022-06-30', 'Dưới 1 năm', 'Không yêu cầu', 'Đại học', 'Thỏa thuận', '2 tháng', '<ul>\r\n	<li>Tiếp nhận, khảo s&aacute;t, thu thập v&agrave; l&agrave;m r&otilde; y&ecirc;u cầu từ kỹ sư hệ thống của c&ocirc;ng ty mẹ tại Nhật v&agrave; tại Việt Nam, th&ocirc;ng qua h&igrave;nh thức trao đổi gi&aacute;n tiếp: web meeting, chat tool&hellip;</li>\r\n	<li>M&ocirc; tả v&agrave; ph&acirc;n t&iacute;ch quy tr&igrave;nh nghiệp vụ, đề xuất với kh&aacute;ch h&agrave;ng c&aacute;c giải ph&aacute;p cải thiện quy tr&igrave;nh</li>\r\n	<li>C&oacute; thể ph&acirc;n t&iacute;ch y&ecirc;u cầu của kh&aacute;ch h&agrave;ng, từ đ&oacute; thiết kế quy tr&igrave;nh kinh doanh th&agrave;nh hệ thống, tạo bảng thiết kế cơ bản v&agrave; chi tiết.</li>\r\n	<li>Quản l&yacute; v&agrave; cập nhật lại bảng thiết kế khi c&oacute; sự thay đổi trong qu&aacute; tr&igrave;nh thực hiện dự &aacute;n</li>\r\n	<li>Đ&oacute;ng vai tr&ograve; cầu nối trong việc trao đổi th&ocirc;ng tin giữa đội dự &aacute;n v&agrave; kh&aacute;ch h&agrave;ng</li>\r\n	<li>T&igrave;m hiểu v&agrave; chia sẻ kiến thức nghiệp vụ của kh&aacute;ch h&agrave;ng cho đội dự &aacute;n</li>\r\n	<li>Hỗ trợ người quản l&yacute; dự &aacute;n phản hồi những thắc mắc hay y&ecirc;u cầu của kh&aacute;ch h&agrave;ng</li>\r\n	<li>Hỗ trợ c&aacute;c b&ecirc;n li&ecirc;n quan thực hiện c&aacute;c c&ocirc;ng việc li&ecirc;n quan đến thủ tục, quy tr&igrave;nh li&ecirc;n quan đến dự &aacute;n.</li>\r\n	<li>Tạo v&agrave; hướng dẫn về bảng thiết kế d&agrave;nh cho Developer v&agrave; QC Tester</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Tốt nghiệp c&aacute;c chuy&ecirc;n ng&agrave;nh CNTT hoặc c&aacute;c chuy&ecirc;n ng&agrave;nh kh&aacute;c li&ecirc;n quan.</li>\r\n	<li>C&oacute; kinh nghiệm ph&aacute;t triển phần mềm tr&ecirc;n 3 năm</li>\r\n	<li>Từng l&agrave;m vị tr&iacute; Business Analyst hoặc c&oacute; kinh nghiệm PM/PL v&agrave; l&agrave;m việc trước tiếp với kh&aacute;ch h&agrave;ng.</li>\r\n	<li>C&oacute; khả năng ph&acirc;n t&iacute;ch, tư duy logic.</li>\r\n	<li>C&oacute; kinh nghiệm trong việc ph&aacute;t triển phần mềm theo m&ocirc; h&igrave;nh Agile hoặc Waterfall, định hướng v&agrave; thiết kế dựa tr&ecirc;n đặc trưng, y&ecirc;u cầu chức năng, hiệu suất, v&agrave; trải nghiệm của người d&ugrave;ng.</li>\r\n	<li>C&oacute; kỹ năng về SQL v&agrave; thiết kế table</li>\r\n	<li>C&oacute; kỹ năng hiểu v&agrave; l&yacute; giải về ng&ocirc;n ngữ ph&aacute;t triển</li>\r\n	<li>Đọc hiểu t&agrave;i liệu tiếng Anh chuy&ecirc;n ng&agrave;nh, nếu biết tiếng Nhật l&agrave; một lợi thế.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n	<li>Vui l&ograve;ng gửi CV bằng tiếng anh</li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:15:13', 'active'),
(407, 'Front End Leader', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'Hà Nội', 'Trưởng nhóm', 2, '2022-07-01', '3 năm', 'Không yêu cầu', 'Đại học', 'Thỏa thuận', '3 tháng', '<ul>\r\n	<li>Quản l&yacute; Team Frontend nhằm củng cố, ph&aacute;t triển c&aacute;c member trong Team (cụ thể l&agrave; chuẩn bị &ndash; duy tr&igrave; m&ocirc;i trường kỹ thuật, thiết kế phương &aacute;n ph&aacute;t triển Team &ndash; kế hoạch đ&agrave;o tạo nh&acirc;n sự, đ&aacute;nh gi&aacute; nh&acirc;n sự, v.v&hellip;)</li>\r\n	<li>Chịu tr&aacute;ch nhiệm gi&aacute;m s&aacute;t, kiểm tra chất lượng v&agrave; lập tr&igrave;nh ch&iacute;nh trong c&aacute;c dự &aacute;n gia c&ocirc;ng phần mềm sử dụng JavaScript (Angular/ ReactJS/ VueJS) v&agrave; triển khai HTML, CSS hoặc CMS (WordPress v.v&hellip;) để ph&aacute;t triển v&agrave; hỗ trợ ph&aacute;t triển Website theo y&ecirc;u cầu của kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Nghi&ecirc;n cứu, t&igrave;m hiểu c&aacute;c c&ocirc;ng nghệ về HTML/CSS Javascript mới nhất để &aacute;p dụng v&agrave;o c&aacute;c dự &aacute;n của C&ocirc;ng ty.</li>\r\n	<li>Quản l&yacute; team thực hiện c&aacute;c dự &aacute;n được giao dưới sự đi&ecirc;̀u ph&ocirc;́i của Quản lý trực ti&ecirc;́p v&agrave; chịu tr&aacute;ch nhiệm xử l&yacute; c&aacute;c vấn đề ph&aacute;t sinh về kỹ thuật v&agrave; điều phối nh&acirc;n sự cho dự &aacute;n</li>\r\n	<li>Một số nghiệp vụ n&acirc;ng cao chất lượng sản phẩm li&ecirc;n quan đến ph&aacute;t triển kỹ thuật. (FrontEnd, hoặc x&acirc;y dựng Website).</li>\r\n	<li>Ph&aacute;t triển v&agrave; vận h&agrave;nh website nội bộ..</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Kinh nghiệm &iacute;t nhất 2 năm l&agrave;m Frontend Leader hoặc c&oacute; 3 năm kinh nghiệm PM dự &aacute;n FrontEnd.</li>\r\n	<li>Kinh nghiệm &iacute;t nhất 2 năm quản l&yacute; v&agrave; ph&aacute;t triển c&aacute;c kỹ sư FrontEnd trong nội bộ Team</li>\r\n	<li>Kinh nghiệm đ&agrave;o tạo &ndash; dẫn dắt member (đ&agrave;o tạo những kỹ sư trẻ)</li>\r\n	<li>Kinh nghiệm quản l&yacute; dự &aacute;n Frontend với quy m&ocirc; khoảng 10 member.</li>\r\n	<li>Kinh nghiệm l&agrave;m việc thực tế từ 5 năm trở l&ecirc;n c&aacute;c dự &aacute;n JavaScript sử dụng FrameWorks/Libraries như VueJS/AngularJS/ReactJS.</li>\r\n	<li>Kinh nghiệm ph&aacute;t triển c&aacute;c Site mới v&agrave; bảo tr&igrave; c&aacute;c Service Sites hiện c&oacute;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n	<li>Trợ cấp đối với nh&acirc;n vi&ecirc;n chờ chỉ thị l&agrave;m việc tại nh&agrave; trong c&aacute;c dịp Lễ, Tết.</li>\r\n	<li>Được hưởng những ph&uacute;c lợi đặc biệt như chương tr&igrave;nh qu&agrave; tết, b&aacute;nh trung thu, tiền mừng đ&aacute;m cưới (5,000,000 VND), tiền mừng khi sanh con (2,000,000 VND),&hellip;</li>\r\n	<li>Đối với nh&acirc;n vi&ecirc;n k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn: từ thời điểm k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn, cứ mỗi năm được cộng th&ecirc;m 1 ng&agrave;y nghỉ ph&eacute;p.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:19:12', 'active'),
(408, 'Thực tập Sinh QC (Automation Test)', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Thực tập sinh', 15, '2022-07-17', 'Chưa có kinh nghiệm', 'Nữ', 'Đại học', '1 - 3 triệu', '', '<ul>\r\n	<li>Được đ&agrave;o tạo cơ bản đến n&acirc;ng cao cả chuy&ecirc;n m&ocirc;n, nghiệp vụ testing &amp; Quy tr&igrave;nh l&agrave;m việc: Waterfall, Agile.</li>\r\n	<li>Nắm bắt nghi&ecirc;̣p vụ đã ph&acirc;n tích đ&ecirc;̉ viết checklist/testcases hoặc phát tri&ecirc;̉n h&ecirc;̣ th&ocirc;́ng automation test tr&ecirc;n n&ecirc;̀n web/mobile cùng với các kỹ sư tại Vi&ecirc;̣t Nam và tại Nh&acirc;̣t Bản.</li>\r\n	<li><strong>Đi&ecirc;̀u ki&ecirc;̣n bắt bu&ocirc;̣c: C&aacute;c sinh vi&ecirc;n thực tập tại C&ocirc;ng ty sẽ trở th&agrave;nh nh&acirc;n vi&ecirc;n ch&iacute;nh thức sau khi kết th&uacute;c thời gian thực tập nếu C&ocirc;ng ty đánh giá thấy sinh vi&ecirc;n c&oacute; đủ năng lực. Sinh vi&ecirc;n sau khi trở thành nh&acirc;n vi&ecirc;n chính thức có th&ecirc;̉ đi làm tu&acirc;̀n từ 3 ngày trở l&ecirc;n cho tới khi chính thức t&ocirc;́t nghi&ecirc;̣p.</strong></li>\r\n</ul>\r\n', '<ul>\r\n	<li>Sinh vi&ecirc;n năm cuối c&aacute;c ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin/Khoa học m&aacute;y t&iacute;nh/Phần mềm,&hellip; c&aacute;c trường Cao đẳng/Đại học.</li>\r\n	<li>C&oacute; thể l&agrave;m việc trong thời gian thực tập tại c&ocirc;ng ty từ 6-10 buổi/1 tuần (tương đương 3-5 ng&agrave;y/tuần).</li>\r\n	<li>C&oacute; kiến thức về IT, Desktop v&agrave; Mobile. Kỹ năng tư duy logic, s&aacute;ng tạo v&agrave; ph&acirc;n t&iacute;ch tốt.</li>\r\n	<li>Biết một trong những ng&ocirc;n ngữ sau: Java, C#, .NET,&hellip; v&agrave; SQL server/Oracle/MySql.</li>\r\n	<li>C&oacute; kiến thức căn bản về Manual test, y&ecirc;u th&iacute;ch lập tr&igrave;nh v&agrave; muốn trở th&agrave;nh Automation test chuy&ecirc;n nghiệp trong tương lai.</li>\r\n	<li>Hiểu c&aacute;c loại test, c&oacute; thể sử dụng c&ocirc;ng cụ quản l&yacute; test.</li>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; kiến thức về:</li>\r\n	<li>○ Load test</li>\r\n	<li>○ Performance test</li>\r\n	<li>○ Responsive test</li>\r\n	<li>○ Mobile application test</li>\r\n	<li>○ HTML/CSS, client/server (căn bản)</li>\r\n	<li>○ Tiếng Anh (đọc hiểu)</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Thưởng: 2 lần/năm.</li>\r\n	<li>Review lương: tối thiếu 1 lần/năm.</li>\r\n	<li>Ngo&agrave;i c&aacute;c g&oacute;i bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn c&ograve;n được tham gia g&oacute;i bảo hiểm tai nạn lao động tại Lampart.</li>\r\n	<li>Hỗ trợ ăn trưa ch&agrave;o mừng Nh&acirc;n vi&ecirc;n mới.</li>\r\n	<li>Trợ cấp thăm bệnh.</li>\r\n	<li>C&oacute; hỗ trợ tiền ăn tối nếu tăng ca sau 19h00.</li>\r\n	<li>Tr&agrave;, sữa, coffee,&hellip; miễn ph&iacute;.</li>\r\n	<li>Tăng ca đ&ecirc;m: ngo&agrave;i tiền tăng ca ban đ&ecirc;m, c&ograve;n được nghỉ b&ugrave; c&oacute; lương v&agrave;o ng&agrave;y h&ocirc;m trước v&agrave; ng&agrave;y h&ocirc;m sau.</li>\r\n	<li>Ng&agrave;y nghỉ đặc biệt d&agrave;nh cho nh&acirc;n vi&ecirc;n nữ: 0.5 ng&agrave;y/ th&aacute;ng.</li>\r\n	<li>Trợ cấp đối với nh&acirc;n vi&ecirc;n chờ chỉ thị l&agrave;m việc tại nh&agrave; trong c&aacute;c dịp Lễ, Tết.</li>\r\n	<li>Được hưởng những ph&uacute;c lợi đặc biệt như chương tr&igrave;nh qu&agrave; tết, b&aacute;nh trung thu, tiền mừng đ&aacute;m cưới (5,000,000 VND), tiền mừng khi sanh con (2,000,000 VND),&hellip;</li>\r\n	<li>Đối với nh&acirc;n vi&ecirc;n k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn: từ thời điểm k&yacute; hợp đồng kh&ocirc;ng x&aacute;c định thời hạn, cứ mỗi năm được cộng th&ecirc;m 1 ng&agrave;y nghỉ ph&eacute;p.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Ưu ti&ecirc;n ứng vi&ecirc;n apply trực tiếp qua link:&nbsp;<a href=\"https://tinyurl.com/t2ttus6s\">https://tinyurl.com/t2ttus6s</a></li>\r\n</ul>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 05:21:34', 'active'),
(409, 'Senior Java', 'Công nghệ thông tin', 'Toàn thời gian cố định', 'TP Hồ Chí Minh', 'Trưởng nhóm', 2, '2022-06-30', 'Hơn 5 năm', 'Nam', 'Đại học', '25 - 30 triệu', '', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', '<p>L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;L&agrave;m g&igrave; cũng được&nbsp;</p>\r\n', 24, 'Đại Anh Dũng', 'dungdai@gmail.com', '01234565648', '', '2022-05-29 19:11:08', 'active'),
(410, 'Nhân Viên Marketing / Digital Marketing', 'Quản trị kinh doanh', 'Toàn thời gian cố định', 'Đà Nẵng', 'Nhân viên', 3, '2022-07-31', '1 năm', 'Nữ', 'Đại học', '7 - 10 triệu', '3 tháng', '<p>- Thực hiện, theo d&otilde;i v&agrave; ph&acirc;n t&iacute;ch hiệu quả c&aacute;c chiến dịch quảng c&aacute;o sản phẩm tr&ecirc;n page b&aacute;n h&agrave;ng v&agrave; website.</p>\r\n\r\n<p>- Ph&acirc;n t&iacute;ch thị trường v&agrave; đối thủ kh&aacute;ch h&agrave;ng, thực hiện c&aacute;c c&ocirc;ng t&aacute;c tối ưu h&oacute;a chi ph&iacute; Marketing cho C&ocirc;ng ty</p>\r\n\r\n<p>- Cập nhật th&ocirc;ng tin viết b&agrave;i tr&ecirc;n trang Web, Fanpage Facebook của C&ocirc;ng ty.</p>\r\n\r\n<p>- Quảng c&aacute;o chạy Marketing cho trang Fanpage.</p>\r\n\r\n<p>- Đề xuất c&aacute;c chương tr&igrave;nh Marketing th&uacute;c đẩy b&aacute;n h&agrave;ng. S&aacute;ng tạo c&aacute;c &yacute; tưởng mới, nội dung &amp; triển khai c&aacute;c chiến dịch truyền th&ocirc;ng online v&agrave; offline.</p>\r\n\r\n<p>- Hỗ trợ c&aacute;c cửa h&agrave;ng thực hiện c&aacute;c chương tr&igrave;nh khuyến m&atilde;i, th&uacute;c đẩy b&aacute;n h&agrave;ng.</p>\r\n\r\n<p>- Kiểm tra, gi&aacute;m s&aacute;t, đ&aacute;nh gi&aacute; to&agrave;n bộ c&aacute;c hoạt động Marketing của C&ocirc;ng ty</p>\r\n', '<p>- Nam/Nữ từ 25 tuổi trở l&ecirc;n.</p>\r\n\r\n<p>- Tr&igrave;nh độ: Cao đẳng trở l&ecirc;n</p>\r\n\r\n<p>- Ưu tiền c&aacute;c ng&agrave;nh: Marketing, Quản trị kinh doanh</p>\r\n\r\n<p>- Ưu ti&ecirc;n 1 năm kinh nghiệm ở vị tr&iacute; tương đương</p>\r\n\r\n<p>- Kỹ năng ph&acirc;n t&iacute;ch thị trường, đối thủ cạnh tranh</p>\r\n\r\n<p>- Tinh thần tr&aacute;ch nhiệm cao, t&acirc;m huyết với c&ocirc;ng việc</p>\r\n', '<p>- Thu nhập: từ 8 triệu - 10 triệu/th&aacute;ng</p>\r\n\r\n<p>- Hưởng đầy đủ c&aacute;c chế độ BHXH - BHYT v&agrave; c&aacute;c chế độ ph&uacute;c lợi người lao động theo quy định.</p>\r\n\r\n<p>- C&oacute; nhiều cơ hội thăng tiến; m&ocirc;i trường l&agrave;m việc văn minh, chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>- Thưởng th&aacute;ng lương thứ 13, ghi nhận cống hiến, thưởng v&agrave;o dịp lễ, tết trong năm</p>\r\n', '<p>Li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua email của c&ocirc;ng ty.</p>\r\n', 23, 'Nguyễn Nhựt Quang', 'n.nquanght@gmail.com', '0356809728', 'TP Hồ Chí Minh', '2022-05-29 22:15:29', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Email',
  `user_username` varchar(100) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Tên tài khoản',
  `user_password` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Mật khẩu',
  `user_fullname` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'Họ tên',
  `user_phone` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'SĐT',
  `user_avatar` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'Avatar',
  `user_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_username`, `user_password`, `user_fullname`, `user_phone`, `user_avatar`, `user_date_created`) VALUES
(9, 'quang@gmail.com', 'admin', '9fafde0a3ab3890eb4ebd593678e5454', 'Nguyễn Nhựt Quang', '03568097284', '277741523_3286476674918959_7406532727525711506_nQKLTi4Br.jpg', '2022-05-31 15:06:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Post', AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
