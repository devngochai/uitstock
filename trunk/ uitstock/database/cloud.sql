-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 05, 2010 at 11:46 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `cloud`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `articles`
-- 

CREATE TABLE `articles` (
  `id` int(11) NOT NULL auto_increment,
  `cat_id` int(11) default NULL,
  `user_id` int(11) default NULL,
  `relative_id` int(11) default NULL,
  `title` varchar(255) default NULL,
  `alias` varchar(255) default NULL,
  `summarize` text,
  `image` varchar(255) default NULL,
  `content` text,
  `create_date` date default NULL,
  `modify_date` date default NULL,
  `published` tinyint(1) default NULL,
  `important` tinyint(1) default NULL,
  `count` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Dumping data for table `articles`
-- 

INSERT INTO `articles` VALUES (1, 2, 1, 0, 'CII: Deutsche Bank đăng ký mua 2,5 triệu cp và bán 1 triệu cp', 'cii-deutsche-bank-dang-ky-mua-25-trieu-cp-va-ban-1-trieu-cp', 'CTCP Đầu tư Hạ tầng Kỹ thuật TP.HCM (mã CII, HoSE) thông báo kết quả và giao dịch tiếp của cổ đông lớn.', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, cổ đ&ocirc;ng lớn của c&ocirc;ng ty l&agrave; Deutsche Bank AG London đăng k&yacute; b&aacute;n tiếp 2,5 triệu cp v&agrave; b&aacute;n 1 triệu cp từ 6/12/2010 đến 28/1/2011 th&ocirc;ng qua h&igrave;nh thức khớp lệnh v&agrave; thỏa thuận.<br />\r\n	<br />\r\n	Trước đ&oacute;, từ 5/10/25010 đến 30/11/2010 cổ đ&ocirc;ng n&agrave;y đ&atilde; mua 711.770 đơn vị (trong số 1,1 triệu cp đ&atilde; đăng k&yacute;); đ&atilde; b&aacute;n 36.410 đơn vị (trong số 1,1 triệu CP đăng k&yacute; b&aacute;n). L&yacute; do kh&ocirc;ng giao dịch mua v&agrave; b&aacute;n hết số lượng đăng k&yacute; v&igrave; thị trường biến động n&ecirc;n thay đổi kế hoạch.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (2, 2, 1, 0, 'VNE: thành viên HĐQT bán 100 ngàn CP', 'vne-thanh-vien-hdqt-ban-100-ngan-cp', 'Tổng công ty Cổ phần Xây dựng điện Việt Nam (mã VNE, HoSE) thông báo giao dịch của cổ đông nội bộ.', NULL, '<div align=\\"justify\\">\r\n	<p>\r\n		<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, &ocirc;ng Nguyễn Th&agrave;nh Đồng, th&agrave;nh vi&ecirc;n HĐQT đăng k&yacute; b&aacute;n 100 ng&agrave;n CP th&ocirc;ng qua h&igrave;nh thức khớp lệnh.<br />\r\n		<br />\r\n		Thời gian dự kiến giao dịch từ 6/12/2010 đến 6/2/2011.<br />\r\n		<br />\r\n		Số lượng CP cổ đ&ocirc;ng n&agrave;y nắm giữ trước khi thực hiện giao dịch l&agrave; 186.800 CP, chiếm 0,293% vốn điều lệ. Nếu giao dịch th&agrave;nh c&ocirc;ng th&igrave; số CP nắm giữ giảm xuống c&ograve;n 86.800 CP.</span></p>\r\n	<p style=\\"text-align: right;\\">\r\n		&nbsp;</p>\r\n</div>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (3, 2, 1, 0, 'PXS: 11 tháng lãi 44,98 tỷ đồng sau thuế, đạt 83,13% KH năm', 'pxs-11-thang-lai-4498-ty-dong-sau-thue-dat-8313-kh-nam', 'Đại hội đồng cổ đông Công ty Cổ phần Kết cấu Kim loại và Lắp máy Dầu khí (PXS - HoSE) vừa qua đã thông qua...', NULL, '<div align=\\"justify\\">\r\n	<p style=\\"text-align: justify;\\">\r\n		<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">T&iacute;nh đến ng&agrave;y 30/11/2010, <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> đ&atilde; ho&agrave;n th&agrave;nh 399 tỷ đồng doanh thu v&agrave; 44,98 tỷ đồng lợi nhuận sau thuế, tương đương đạt 83,13% kế hoạch doanh thu v&agrave; đạt 89,5% kế hoạch lợi nhuận năm. Trong 11 th&aacute;ng đầu năm 2010, tổng thu tiền về t&agrave;i khỏan của <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> đạt 392 tỷ đồng, dự kiến th&aacute;ng 12 sẽ tiếp tục thu 75 tỷ đồng. Tổng cộng tiền thu trong năm đạt 467 tỷ đồng, chiếm 97,3% so với tổng doanh thu.<br />\r\n		<br />\r\n		Từ đầu qu&yacute; 3 năm 2010, Ban l&atilde;nh đạo C&ocirc;ng ty đ&atilde; th&agrave;nh lập Tổ thu hồi vốn doTGĐ c&ocirc;ng ty trực tiếp l&agrave;m tổ trưởng, để đ&ocirc;n đốc thu hồi khối lượng tại tất cả c&aacute;c c&ocirc;ng tr&igrave;nh m&agrave; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> tham gia thực hiện.<br />\r\n		<br />\r\n		C&ocirc;ng t&aacute;c thu hồi được triển khai đồng loạt ở c&aacute;c c&ocirc;ng tr&igrave;nh trọng điểm do <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> thi c&ocirc;ng: Nh&agrave; m&aacute;y chu tr&igrave;nh Điện hỗn hợp Nhơn Trạch 2, C&ocirc;ng tr&igrave;nh chế tạo Ch&acirc;n đế mỏ Đại H&ugrave;ng, Chế tạo Ch&acirc;n đế - khối thượng tầng Gi&agrave;n khai th&aacute;c Mộc Tinh &ndash; Biển Đ&ocirc;ng, Chế tạo Ch&acirc;n đế - khối thượng tầng Gi&agrave;n khai th&aacute;c BK15 &ndash; Mỏ Bạch Hổ, Chế tạo Ch&acirc;n đế - khối thượng tầng Gi&agrave;n khai th&aacute;c RC3 &ndash; Mỏ Rồng&hellip;To&agrave;n bộ hồ sơ ho&agrave;n c&ocirc;ng, nghiệm thu đang được <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> ho&agrave;n tất để kịp xuất ho&aacute; đơn trong th&aacute;ng 12/2010.</span></p>\r\n</div>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (4, 2, 1, 0, 'SMC: 13/12 chốt quyền nhận cổ tức 10% bằng tiền mặt', 'smc-1312-chot-quyen-nhan-co-tuc-10-bang-tien-mat', 'Công ty Cổ phần Đầu tư – Thương mại SMC (mã SMC, HoSE) thông báo trả cổ tức đợt 1/2010.', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Ng&agrave;y 13/12 l&agrave; ng&agrave;y đăng k&yacute; cuối c&ugrave;ng v&agrave; ng&agrave;y 9/12 l&agrave; GDKHQ để nhận cổ tức đợt 1 năm 2010 tỷ lệ 10%/mệnh gi&aacute; (01 cổ phiếu nhận được 1.000 đồng). Thời gian chi trả v&agrave;o ng&agrave;y 22/12/2010.<br />\r\n	<br />\r\n	- Địa điểm thực hiện:<br />\r\n	<br />\r\n	+ Đối với chứng kho&aacute;n đ&atilde; lưu k&yacute;: Người sở hữu chứng kho&aacute;n l&agrave;m thủ tục nhận cổ tức tại c&aacute;c TVLK nơi mở t&agrave;i khoản lưu k&yacute; chứng kho&aacute;n.<br />\r\n	<br />\r\n	+ Đối với chứng kho&aacute;n chưa lưu k&yacute;: Người sở hữu chứng kho&aacute;n l&agrave;m thủ tục nhận cổ tức tại Văn ph&ograve;ng C&ocirc;ng ty.<br />\r\n	<br />\r\n	Được biết, lũy kế 9 th&aacute;ng đầu năm 2010, <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=jBwI8niAXfY=\\" target=\\"_blank\\">SMC</a></b> đạt 68,51 tỷ đồng LNST trong đ&oacute;, phần LNST của cổ đ&ocirc;ng c&ocirc;ng ty mẹ l&agrave; 68,01 tỷ đồng. Mức lợi nhuận n&agrave;y tăng 24,72% so với 9 th&aacute;ng đầu năm 2009. So với kế hoạch 80 tỷ đồng LNST cả năm 2010, kết th&uacute;c qu&yacute; III, <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=jBwI8niAXfY=\\" target=\\"_blank\\">SMC</a></b> ho&agrave;n th&agrave;nh 85,64%.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (5, 2, 1, 0, 'CII: Cầu đường Bình Triệu đăng ký mua 2 triệu CP', 'cii-cau-duong-binh-trieu-dang-ky-mua-2-trieu-cp', 'CTCP Đầu tư và Xây dựng Cầu đường Bình Triệu - tổ chức có liên quan đến cổ đông nội bộ CTCP Đầu tư Hạ tầng...', 'files/news/20101205/20101205085615.jpg', '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Giao dịch dự kiến được thực hiện trong thời gian từ ng&agrave;y 6/12/2010 đến 6/2/2011, bằng phương thức khớp lệnh hoặc thỏa thuận.<br />\r\n	<br />\r\n	Hiện Cầu đường B&igrave;nh Triệu đang nắm giữ 2.250.000 CP <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b>, tương đương tỷ lệ 3%. Nếu giao dịch th&agrave;nh c&ocirc;ng th&igrave; số lượng sở hữu sẽ tăng l&ecirc;n 4.250.000 đơn vị, tương đương tỷ lệ 5,7%.<br />\r\n	&nbsp;<br />\r\n	Được biết, từ 6/12/2010 đến 28/1/2011, cổ đ&ocirc;ng lớn của <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b> c&ocirc;ng ty l&agrave; Deutsche Bank AG London cũng đăng k&yacute; mua tiếp 2,5 triệu CP v&agrave; b&aacute;n 1 triệu CP, th&ocirc;ng qua h&igrave;nh thức khớp lệnh v&agrave; thỏa thuận. Trước đ&oacute;, từ 5/10/25010 đến 30/11/2010 cổ đ&ocirc;ng n&agrave;y đ&atilde; mua 711.770 đơn vị (trong số 1,1 triệu cp đ&atilde; đăng k&yacute;); đ&atilde; b&aacute;n 36.410 đơn vị (trong số 1,1 triệu CP đăng k&yacute; b&aacute;n).<br />\r\n	<br />\r\n	* Ng&agrave;y 10/12 l&agrave; ng&agrave;y giao dịch kh&ocirc;ng hưởng quyền v&agrave; ng&agrave;y 14/12/2010 l&agrave; ng&agrave;y đăng k&yacute; cuối c&ugrave;ng chốt danh s&aacute;ch cổ đ&ocirc;ng để <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b> thực hiện tạm ứng cổ tức đợt 1/2010 bằng tiền theo tỷ lệ 10%/mệnh gi&aacute;. Ng&agrave;y chi trả l&agrave; 14/1/2011. <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b> cũng chốt quyền để tổ chức ĐHĐCĐ bất thường năm 2011 nhằm lấy &yacute; kiến về việc ph&aacute;t h&agrave;nh th&ecirc;m 15 triệu USD tr&aacute;i phiếu chuyển đổi cho Goldman Sachs.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (6, 2, 1, 0, 'ITC: HĐQT chấp thuận mua lại 3 triệu CP làm CP quỹ', 'itc-hdqt-chap-thuan-mua-lai-3-trieu-cp-lam-cp-quy', 'Công ty Cổ phần Đầu tư - Kinh doanh nhà (mã ITC, HoSE) công bố Nghị quyết HĐQT về việc mua lại cổ phiếu quỹ.', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, HĐQT chấp thuận mua lại 3 triệu CP l&agrave;m CP quỹ bằng nguồn vốn thặng dư. Mục đ&iacute;ch mua cổ phiếu quỹ l&agrave; chia cổ tức cho cổ đ&ocirc;ng hoặc cổ phiếu thưởng.<br />\r\n	<br />\r\n	HĐQT ủy quyền cho TGĐ quyết định gi&aacute; mua v&agrave; kế hoạch mua.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (7, 2, 1, 0, 'Phong tỏa tài khoản của ông Lê Văn Dũng, 2 Công ty và 13 người có liên quan', 'phong-toa-tai-khoan-cua-ong-le-van-dung-2-cong-ty-va-13-nguoi-co-lien-quan', 'Cơ quan An ninh điều tra - Bộ Công an đã khởi tố vụ án hình sự, khởi tố bị can, bắt tạm giam đối với ông Lê Văn Dũng (nguyên Chủ tịch Hội đồng Quản trị, kiêm Tổng Giám đốc Công ty Cổ phần Dược...', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo y&ecirc;u cầu của cơ quan An ninh để phục vụ c&ocirc;ng t&aacute;c điều tra v&agrave; bảo vệ quyền, lợi &iacute;ch hợp ph&aacute;p của nh&agrave; đầu tư, Ủy ban Chứng kho&aacute;n Nh&agrave; nước đ&atilde; c&oacute; c&ocirc;ng văn y&ecirc;u cầu Trung t&acirc;m Lưu k&yacute; Chứng kho&aacute;n Việt Nam v&agrave; 04 C&ocirc;ng ty chứng kho&aacute;n (C&ocirc;ng ty Cổ phần Chứng kho&aacute;n S&agrave;i G&ograve;n Thương T&iacute;n (SBS); C&ocirc;ng ty Cổ phần Chứng kho&aacute;n S&agrave;i G&ograve;n H&agrave; Nội (SHS); C&ocirc;ng ty Cổ phần Chứng kho&aacute;n S&agrave;i G&ograve;n (SSI) v&agrave; C&ocirc;ng ty Cổ phần Chứng kho&aacute;n Bảo Việt (BVSC) phong tỏa ngay t&agrave;i khoản của &ocirc;ng L&ecirc; Văn Dũng, 2 C&ocirc;ng ty (C&ocirc;ng ty Cổ phần Đầu tư Y tế Medi, C&ocirc;ng ty TNHH Ph&aacute;t triển thương mại v&agrave; Kỹ thuật Ho&agrave;n Thiện) v&agrave; 13 người c&oacute; li&ecirc;n quan;<br />\r\n	<br />\r\n	Đồng thời, Ủy ban chứng kho&aacute;n y&ecirc;u cầu c&aacute;c Sở Giao dịch chứng kho&aacute;n gi&aacute;m s&aacute;t việc thực hiện phong tỏa n&ecirc;u tr&ecirc;n.<br />\r\n	<br />\r\n	Được biết, ng&agrave;y 26/11/2010 Cơ quan an ninh điều tra - Bộ C&ocirc;ng an đ&atilde; c&oacute; th&ocirc;ng b&aacute;o bắt &ocirc;ng L&ecirc; Văn Dũng, Chủ tịch Hội đồng Quản trị ki&ecirc;m Tổng gi&aacute;m đốc C&ocirc;ng ty Cổ phần Dược phẩm Viễn Đ&ocirc;ng (<b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b>) do li&ecirc;n quan đến h&agrave;nh vi thao t&uacute;ng gi&aacute; chứng kho&aacute;n.<br />\r\n	<br />\r\n	Cổ phiếu <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b> được đưa v&agrave;o diện bị kiểm so&aacute;t kể từ ng&agrave;y 2/12/2010 do việc giải tỉnh khacứ phục thiếu s&oacute;t dẫn đến việc đ&igrave;nh chỉ đợt ch&agrave;o b&aacute;n chứng kho&aacute;n ra c&ocirc;ng ch&uacute;ng chưa đ&aacute;p ứng đầy đủ y&ecirc;u cầu của Ủy ban Chứng kho&aacute;n, vấn đề n&agrave;y c&oacute; thể ảnh hưởng đến quyết định của nh&agrave; đầu tư đối với cổ phiếu <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b> v&agrave; hạn chế thời gian giao dịch đối với cổ phiếu <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b> l&agrave; chỉ được thực hiện giao dịch 15 ph&uacute;t trong phi&ecirc;n khớp lệnh định kỳ x&aacute;c định gi&aacute; đ&oacute;ng cửa.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (8, 2, 1, 0, 'Habeco: Đấu giá gần 7 triệu cổ phiếu với giá khởi điểm 32.000 đồng', 'habeco-dau-gia-gan-7-trieu-co-phieu-voi-gia-khoi-diem-32000-dong', 'Sở Giao dịch Chứng khoán Hà Nội (HNX) thông báo về việc đấu giá cổ phần của Tổng Công ty Cổ phần Bia – Rượu – Nước Giải khát Hà Nội (Habeco).', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, ng&agrave;y 24/12/2010, HNX sẽ tổ chức đấu gi&aacute; 6.954.000 cổ phần của Tổng C&ocirc;ng ty Cổ phần Bia &ndash; Rượu &ndash; Nước Giải kh&aacute;t H&agrave; Nội (Habeco) với gi&aacute; khởi điểm đấu gi&aacute; l&agrave; 32.000 đồng.<br />\r\n	<br />\r\n	Habeco hiện c&oacute; vốn điều lệ 2.318 tỷ đồng, trụ sở ch&iacute;nh đặt tại 183 Ho&agrave;ng Hoa Th&aacute;m, Ba Đ&igrave;nh, H&agrave; Nội. C&ocirc;ng ty hoạt động ch&iacute;nh trong lĩnh vực sản xuất kinh doanh bia, rượu, nước giải kh&aacute;t.<br />\r\n	<br />\r\n	Năm 2010, Habeco th&ocirc;ng qua kế hoạch kinh doanh với tổng sản lượng bua ti&ecirc;u thụ l&agrave; 418.200 triệu l&iacute;t; tổng doanh thu v&agrave; thu nhập đạt 4.946,948 tỷ đồng; tổng lợi nhuận trước thuế v&agrave; sau thuế lần lượt đạt 649,954 tỷ đồng v&agrave; 492,194 tỷ đồng; cổ tức 12%/năm.<br />\r\n	<br />\r\n	Được biết, tổng doanh thu b&aacute;n h&agrave;ng v&agrave; dịch vụ năm 2009 đạt 4.079,358 tỷ đồng; doanh thu hoạt động t&agrave;i ch&iacute;nh đạt 116,417 tỷ đồng; lợi nhuận trước v&agrave; sau thuế lần lượt đạt 375,263 tỷ đồng v&agrave; 293,054 tỷ đồng.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (9, 2, 1, 0, 'VFG: 13/12 chốt quyền nhận cổ tức 10%', 'vfg-1312-chot-quyen-nhan-co-tuc-10', 'CTCP Khử Trùng Việt Nam (VFG, HoSE) thông báo chốt quyền trả cổ tức đợt 2 năm 2010 bằng tiền mặt.', 'files/news/20101205/20101205085901.jpg', '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Ng&agrave;y giao dịch kh&ocirc;ng hưởng quyền: 9/12/2010. Ng&agrave;y đăng k&yacute; cuối c&ugrave;ng: 13/12/2010.<br />\r\n	<br />\r\n	Theo đ&oacute;, c&ocirc;ng ty chi trả cổ tức đợt 2 năm 2010 bằng tiền mặt tỷ lệ 10%. Cổ tức được thanh to&aacute;n ng&agrave;y 27/12/2010.<br />\r\n	<br />\r\n	Đối với chứng kho&aacute;n đ&atilde; lưu k&yacute; : Người sở hữu l&agrave;m thủ tục nhận cổ tức tại c&aacute;c TVLK nơi mở t&agrave;i khoản lưu k&yacute;.<br />\r\n	&nbsp;<br />\r\n	Đối với chứng kho&aacute;n chưa lưu k&yacute; : Người sở hữu l&agrave;m thủ tục nhận cổ tức bằng tiền mặt (hoặc chuyển khoản) tại C&ocirc;ng ty Cổ phần Khử Tr&ugrave;ng Việt Nam. </span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (10, 2, 1, 0, 'KDC chào bán hơn 18 triệu cổ phần cho việc sáp nhập', 'kdc-chao-ban-hon-18-trieu-co-phan-cho-viec-sap-nhap', 'Đợt chào bán 18,2 triệu cổ phần của Kinh Đô lần này nhằm đổi lấy cổ phiếu NKD và Kido đang lưu hành ngoài thị trường cho mục đích sáp nhập đã thông qua tại Đại hội cổ đông hồi giữa năm của cả 3 doanh nghiệp.', 'files/news/20101205/20101205090009.jpg', '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Ủy ban Chứng kho&aacute;n vừa cấp giấy chứng nhận ch&agrave;o b&aacute;n cổ phiếu ra c&ocirc;ng ch&uacute;ng cho C&ocirc;ng ty cổ phần Kinh Đ&ocirc; (m&atilde; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b>). Trong số 18.244.743 cổ phần ph&aacute;t h&agrave;nh th&ecirc;m, 75% (tương đương 13,7 triệu) d&ugrave;ng để ho&aacute;n đổi với NKD (cổ phiếu của C&ocirc;ng ty thực phẩm Kinh Đ&ocirc; miền Bắc) v&agrave; số c&ograve;n lại gần 4,5 triệu d&agrave;nh cho việc chuyển đổi cổ phiếu Kido (C&ocirc;ng ty Kem Ki do) theo tỷ lệ 1:1,1. Lượng ch&agrave;o b&aacute;n th&ecirc;m sẽ ch&iacute;nh thức giao dịch bổ sung tại HOSE sau một th&aacute;ng nữa.<br />\r\n	<br />\r\n	Tỷ lệ số cổ phần ph&aacute;t h&agrave;nh th&ecirc;m bằng 18,2% tổng số cổ phần đang lưu h&agrave;nh. Gi&aacute; trị ch&agrave;o b&aacute;n theo mệnh gi&aacute; 182,4 tỷ đồng.<br />\r\n	<br />\r\n	Theo Ủy ban Chứng kho&aacute;n Nh&agrave; nước, gi&aacute; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b> kh&ocirc;ng bị điều chỉnh giảm, do số ph&aacute;t h&agrave;nh th&ecirc;m d&ugrave;ng để ho&aacute;n đổi cổ phiếu thực hiện việc s&aacute;p nhập. Kinh Đ&ocirc; dự kiến lợi nhuận sau thuế v&agrave; EPS l&agrave; 936 tỷ đồng, 7.034 đồng, tăng lần lượt 13% v&agrave; 9% so với trước s&aacute;p nhập. Doanh thu năm đầu ti&ecirc;n sau s&aacute;p nhập ước đạt 167 triệu USD.<br />\r\n	<br />\r\n	Phương &aacute;n s&aacute;p nhập của bộ ba <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b>, NKD, Kido sau nhiều lần tr&igrave; ho&atilde;n đ&atilde; đi đến bước cuối c&ugrave;ng, khi cổ đ&ocirc;ng của 3 doanh nghiệp duyệt lộ tr&igrave;nh cũng như gi&aacute; chuyển đổi tại đại hội cổ đ&ocirc;ng hồi th&aacute;ng 5. Theo đ&oacute;, NKD v&agrave; Kido sẽ trở th&agrave;nh những c&ocirc;ng ty con dưới h&igrave;nh thức c&ocirc;ng ty TNHH một th&agrave;nh vi&ecirc;n, m&agrave; chủ sở hữu l&agrave; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b>. Vốn điều lệ mới n&acirc;ng l&ecirc;n gần 1.200 tỷ đồng, gấp 7 lần vốn điều lệ hiện tại của NKD v&agrave; gần 20 lần so với Kido.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (11, 3, 1, 0, 'POM: Đăng ký mua 1.640.560 cp quỹ (HOSE)', 'pom-dang-ky-mua-1640560-cp-quy-hose', '', NULL, '<p>\r\n	<strong>C&ocirc;ng ty CP Th&eacute;p <a href=\\"\\\\&quot;http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=QaE4UO2USm4=\\\\&quot;\\" target=\\"\\\\&quot;_blank\\\\&quot;\\"><strong>POM</strong></a>INA (<a href=\\"\\\\&quot;http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=QaE4UO2USm4=\\\\&quot;\\" target=\\"\\\\&quot;_blank\\\\&quot;\\"><strong>POM</strong></a>)CBTT đăng k&yacute; mua cổ phiếu quỹ như sau:</strong></p>\r\n<ul>\r\n	<li>\r\n		<span id=\\"\\\\&quot;ctl00_mainContent_lblContent\\\\&quot;\\">Số lượng cổ phiếu quỹ hiện tại: 359.440 cổ phiếu</span></li>\r\n	<li>\r\n		Số lượng đăng k&yacute; mua: 1.640.560 cổ phiếu</li>\r\n	<li>\r\n		Tổng số cổ phiếu sau khi giao dịch: 2.000.000 cổ phiếu</li>\r\n	<li>\r\n		Mục đ&iacute;ch: ổn định gi&aacute; cổ phiếu v&agrave; sử dụng hiệu quả nguồn vốn</li>\r\n	<li>\r\n		Nguồn vốn thực hiện: thặng dư vốn v&agrave; lợi nhuận giữ lại t&iacute;nh đến ng&agrave;y 30/06/2010</li>\r\n	<li>\r\n		Phương thức giao dịch: khớp lệnh</li>\r\n	<li>\r\n		Thời gian đăng k&yacute; giao dịch: từ ng&agrave;y 09/12/2010 đến ng&agrave;y 09/03/2011</li>\r\n	<li>\r\n		C&ocirc;ng ty Chứng kho&aacute;n được ủy quyền thực hiện việc mua: C&ocirc;ng ty CP Chứng kho&aacute;n S&agrave;i G&ograve;n</li>\r\n</ul>', '2010-12-05', '2010-12-05', 1, 0, 0);
INSERT INTO `articles` VALUES (12, 3, 1, 0, 'TTF: Ông Tạ Văn Nam - TV.HĐQT kiêm Phó TGĐ đã bán 90.000 cp (HOSE)', 'ttf-ong-ta-van-nam---tvhdqt-kiem-pho-tgd-da-ban-90000-cp-hose', '', NULL, '<p>\r\n	<span class=\\"\\\\&quot;p_te8\\\\&quot;\\" id=\\"\\\\&quot;UcNewsDetail1_lblNoiDung\\\\&quot;\\" style=\\"\\" width:=\\"\\">B&aacute;o c&aacute;o kết quả giao dịch cổ đ&ocirc;ng nội bộ của CTCP Tập đo&agrave;n Kỹ nghệ Gỗ Trường Th&agrave;nh n</span></p>', '2010-12-05', '2010-12-05', 1, 0, 0);
INSERT INTO `articles` VALUES (13, 3, 1, 0, 'LIX: Red River Holding - Cổ đông lớn đã mua 30.000 cp (HOSE)', 'lix-red-river-holding---co-dong-lon-da-mua-30000-cp-hose', '', NULL, '<p>\r\n	<span class=\\"\\\\&quot;\\\\\\\\&quot;p_te8\\\\\\\\&quot;\\\\&quot;\\" id=\\"\\\\&quot;\\\\\\\\&quot;UcNewsDetail1_lblNoiDung\\\\\\\\&quot;\\\\&quot;\\" style=\\"\\" width:=\\"\\\\&quot;\\\\&quot;\\">B&aacute;o c&aacute;o kết quả giao dịch cổ đ&ocirc;ng lớn C&ocirc;ng ty Cổ phần Bột giặt <b><a href=\\"\\\\&quot;\\\\\\\\&quot;http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=NlWlY+jJwLI=\\\\\\\\&quot;\\\\&quot;\\" target=\\"\\\\&quot;\\\\\\\\&quot;_blank\\\\\\\\&quot;\\\\&quot;\\">LIX</a></b></span></p>', '2010-12-05', '2010-12-05', 1, 0, 0);
INSERT INTO `articles` VALUES (14, 3, 1, 0, 'FBT: Tổ chức ĐHCĐ bất thường năm 2010 (HOSE)', 'fbt-to-chuc-dhcd-bat-thuong-nam-2010-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">CTCP Xuất nhập khẩu L&acirc;m thủy sản Bến tre th&ocirc;ng b&aacute;o tổ chức Đại hội cổ đ&ocirc;ng bất thường năm 2010</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (15, 3, 1, 0, 'AGR: Ông Lê Văn Minh - TV.HĐQT kiêm Phó TGĐ chưa mua được cp (HOSE)', 'agr-ong-le-van-minh---tvhdqt-kiem-pho-tgd-chua-mua-duoc-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">B&aacute;o c&aacute;o kết quả giao dịch của Ủy vi&ecirc;n HĐQT CTCP Chứng kho&aacute;n NH N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển N&ocirc;ng th&ocirc;n Việt Nam</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (16, 3, 1, 0, 'SBT: Tổ chức liên quan với bà Huỳnh Bích Ngọc - TV.HĐQT đã mua 35.197.600 cp (HOSE)', 'sbt-to-chuc-lien-quan-voi-ba-huynh-bich-ngoc---tvhdqt-da-mua-35197600-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">B&aacute;o c&aacute;o kết quả giao dịch của tổ chức c&oacute; li&ecirc;n quan đến cổ đ&ocirc;ng nội bộ C&ocirc;ng ty Cổ phần Bourbon T&acirc;y Ninh</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (17, 3, 1, 0, 'MTG: Quyết định niêm yết bổ sung gần 4 triệu cp (HOSE)', 'mtg-quyet-dinh-niem-yet-bo-sung-gan-4-trieu-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Quyết định ni&ecirc;m yết bổ sung cổ phiếu của C&ocirc;ng ty Cổ phần MT GAS</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (18, 3, 1, 0, 'PAC: FTIF – Templeton frontier markets fund - Cổ đông lớn đã mua 229.090 cp (HOSE)', 'pac-ftif--templeton-frontier-markets-fund---co-dong-lon-da-mua-229090-cp-hose', '', NULL, '<p>\r\n	<strong>Th&ocirc;ng b&aacute;o sở hữu của cổ đ&ocirc;ng lớn của CTCP Pin Ắc quy Miền nam (<a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=bzEuqShuMz8=\\" target=\\"_blank\\"><strong>PAC</strong></a>) như sau:</strong></p>\r\n<ul>\r\n	<li>\r\n		<span id=\\"ctl00_mainContent_lblContent\\">T&ecirc;n nhà đ&acirc;̀u tư thực hi&ecirc;̣n giao dịch: FTIF &ndash; Templeton frontier markets fund</span></li>\r\n	<li>\r\n		Mã chứng khoán giao dịch: <a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=bzEuqShuMz8=\\" target=\\"_blank\\"><strong>PAC</strong></a></li>\r\n	<li>\r\n		Số lượng, tỷ lệ c&ocirc;̉ phi&ecirc;́u nắm giữ trước khi thực hi&ecirc;̣n giao dịch: 1.132.130 c&ocirc;̉ phi&ecirc;́u (5,1%)</li>\r\n	<li>\r\n		Số lượng c&ocirc;̉ phi&ecirc;́u đ&atilde; mua: 229.090 cổ phiếu</li>\r\n	<li>\r\n		Số lượng, tỷ lệ c&ocirc;̉ phi&ecirc;́u nắm giữ sau khi thực hi&ecirc;̣n giao dịch: 1.361.220 c&ocirc;̉ phi&ecirc;́u (6,13%)</li>\r\n	<li>\r\n		L&yacute; do thay đổi sở hữu: thực hiện đầu tư</li>\r\n	<li>\r\n		Phương thức giao dịch: khớp lệnh</li>\r\n	<li>\r\n		Thời gian thay đổi sở hữu v&agrave; trở th&agrave;nh cổ đ&ocirc;ng lớn: ng&agrave;y 18/11/2010</li>\r\n</ul>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (19, 3, 1, 0, 'KDC: Bản cáo bạch chào bán cp (HOSE)', 'kdc-ban-cao-bach-chao-ban-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Bản c&aacute;o bạch ch&agrave;o b&aacute;n cổ phiếu của C&ocirc;ng ty Cổ phần Kinh Đ&ocirc;</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (20, 3, 1, 0, 'TTF: Ông Tạ Văn Nam - TV.HĐQT kiêm Phó TGĐ đăng ký bán 107.500 cp (HOSE)', 'ttf-ong-ta-van-nam---tvhdqt-kiem-pho-tgd-dang-ky-ban-107500-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Th&ocirc;ng b&aacute;o giao dịch cổ đ&ocirc;ng nội bộ của CTCP Tập đo&agrave;n Kỹ nghệ Gỗ Trường Th&agrave;nh</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (21, 3, 1, 0, 'PRUBF1: Thông báo về việc chào mua công khai (HOSE)', 'prubf1-thong-bao-ve-viec-chao-mua-cong-khai-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Quỹ đầu tư C&acirc;n bằng Prudential - PRUBF1 th&ocirc;ng b&aacute;o về việc ch&agrave;o mua c&ocirc;ng khai</span></p>', '2010-12-05', NULL, 1, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `company`
-- 

CREATE TABLE `company` (
  `COMPANY_ID` varchar(10) NOT NULL,
  `GROUP_ID` varchar(10) default NULL,
  `NAME` varchar(255) default NULL,
  `INFO` text,
  PRIMARY KEY  (`COMPANY_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `company`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `company_group`
-- 

CREATE TABLE `company_group` (
  `GROUP_ID` varchar(10) NOT NULL,
  `GROUP_NAME` varchar(50) default NULL,
  `DESCRIPTION` varchar(256) default NULL,
  PRIMARY KEY  (`GROUP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `company_group`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `components`
-- 

CREATE TABLE `components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `is_admin` tinyint(1) default NULL,
  `ordering` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `components`
-- 

INSERT INTO `components` VALUES (1, 'Admin', 1, 3);
INSERT INTO `components` VALUES (2, 'Chứng khoán', 0, 1);
INSERT INTO `components` VALUES (3, 'Tin tức', 0, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `content_categories`
-- 

CREATE TABLE `content_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) default '0',
  `name` varchar(50) default NULL,
  `alias` varchar(50) default NULL,
  `description` text,
  `published` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `content_categories`
-- 

INSERT INTO `content_categories` VALUES (1, 0, 'Tin tức', 'tin-tuc', 'Tin tức', 1);
INSERT INTO `content_categories` VALUES (2, 1, 'Tin vắn chứng khoắn', 'tin-van-chung-khoan', 'Tin vắn chứng khoắn', 1);
INSERT INTO `content_categories` VALUES (3, 1, 'Tin HOSE', 'tin-hose', 'Tin HOSE', 1);
INSERT INTO `content_categories` VALUES (4, 1, 'Tin từ công ty niêm yết', 'tin-tu-cong-ty-niem-yet', 'Tin từ công ty niêm yết', 1);
INSERT INTO `content_categories` VALUES (5, 0, 'Nhận định thị trường', 'nhan-dinh-thi-truong', 'Nhận định thị trường', 1);
INSERT INTO `content_categories` VALUES (6, 5, 'Công ty CK nhận định', 'cong-ty-ck-nhan-dinh', 'Công ty CK nhận định', 1);
INSERT INTO `content_categories` VALUES (7, 5, 'Thị trường', 'thi-truong', 'Thị trường', 1);
INSERT INTO `content_categories` VALUES (8, 5, 'Công ty', 'cong-ty', 'Công ty', 1);
INSERT INTO `content_categories` VALUES (9, 0, 'Kinh tế Việt Nam', 'kinh-te-viet-nam', 'Kinh tế Việt Nam', 1);
INSERT INTO `content_categories` VALUES (10, 9, 'Thị trường VN', 'thi-truong-vn', 'Thị trường VN', 1);
INSERT INTO `content_categories` VALUES (11, 9, 'Tài chính - ngân hàng', 'tai-chinh---ngan-hang', 'Tài chính - ngân hàng', 1);
INSERT INTO `content_categories` VALUES (12, 9, 'Bất động sản', 'bat-dong-san', 'Bất động sản', 1);
INSERT INTO `content_categories` VALUES (13, 0, 'Kinh tế thế giới', 'kinh-te-the-gioi', 'Kinh tế thế giới', 1);
INSERT INTO `content_categories` VALUES (14, 13, 'Chứng khoán', 'chung-khoan', 'Chứng khoán', 1);
INSERT INTO `content_categories` VALUES (15, 13, 'Thị trường TG', 'thi-truong-tg', 'Thị trường TG', 1);
INSERT INTO `content_categories` VALUES (16, 0, 'Kiến thức đầu tư', 'kien-thuc-dau-tu', 'Kiến thức đầu tư', 1);
INSERT INTO `content_categories` VALUES (17, 16, 'Kiến thức cơ bản', 'kien-thuc-co-ban', 'Kiến thức cơ bản', 1);
INSERT INTO `content_categories` VALUES (18, 16, 'Kinh nghiệm đầu tư', 'kinh-nghiem-dau-tu', 'Kinh nghiệm đầu tư', 1);
INSERT INTO `content_categories` VALUES (19, 0, 'Điểm tin UITStock', 'diem-tin-uitstock', 'Điểm tin UITStock', 1);
INSERT INTO `content_categories` VALUES (20, 0, 'Báo cáo phân tích', 'bao-cao-phan-tich', 'Báo cáo phân tích', 1);
INSERT INTO `content_categories` VALUES (21, 0, 'Lịch sự kiện', 'lich-su-kien', 'Lịch sự kiện', 1);
INSERT INTO `content_categories` VALUES (22, 0, 'Thể lệ sàn ảo', 'the-le-san-ao', 'Thể lệ sàn ảo', 1);
INSERT INTO `content_categories` VALUES (23, 22, 'Luật chơi', 'luat-choi', 'Luật chơi', 1);
INSERT INTO `content_categories` VALUES (24, 22, 'Hướng dẫn đặt lệnh', 'huong-dan-dat-lenh', 'Hướng dẫn đặt lệnh', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `market`
-- 

CREATE TABLE `market` (
  `MARKET_ID` varchar(10) NOT NULL,
  `NAME` varchar(50) default NULL,
  `DISCRIPTION` varchar(256) default NULL,
  PRIMARY KEY  (`MARKET_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `market`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `menu_category`
-- 

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) default NULL,
  `description` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `menu_category`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `menu_items`
-- 

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) default NULL,
  `menu_cat_id` int(11) default NULL,
  `name` varbinary(50) default NULL,
  `alias` varchar(255) default NULL,
  `link` varchar(255) default NULL,
  `ordering` int(11) default NULL,
  `published` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `menu_items`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `modules`
-- 

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(50) default NULL,
  `type` varchar(50) default NULL,
  `publshed` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `modules`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `pages`
-- 

CREATE TABLE `pages` (
  `id` int(11) NOT NULL auto_increment,
  `component_id` char(10) default NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(50) default NULL,
  `published` tinyint(1) default NULL,
  `ordering` int(11) default NULL,
  `is_home` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `pages`
-- 

INSERT INTO `pages` VALUES (1, '2', 'Trang chủ', 'index', 1, 1, 1);
INSERT INTO `pages` VALUES (2, '2', 'Thực hiện giao dịch', 'a', 1, 2, 0);
INSERT INTO `pages` VALUES (3, '2', 'Thống kê sàn ảo', 'statics', 1, 3, 0);
INSERT INTO `pages` VALUES (4, '2', 'Thể lệ sàn ảo', 'rule', 1, 4, 0);
INSERT INTO `pages` VALUES (5, '2', 'Đăng nhập', 'd', 1, 5, 0);
INSERT INTO `pages` VALUES (6, '2', 'Đăng ký', 'e', 1, 6, 0);
INSERT INTO `pages` VALUES (7, '3', 'Trang chủ', 'index', 1, 7, 1);
INSERT INTO `pages` VALUES (8, '3', 'Loại tin', 'category', 1, 8, 0);
INSERT INTO `pages` VALUES (9, '3', 'Tin', 'detail', 1, 9, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `page_widget`
-- 

CREATE TABLE `page_widget` (
  `id` int(11) NOT NULL auto_increment,
  `page_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL,
  `position` varchar(50) default NULL,
  `ordering` int(11) default NULL,
  `published` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

-- 
-- Dumping data for table `page_widget`
-- 

INSERT INTO `page_widget` VALUES (1, 1, 1, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (2, 2, 1, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (3, 3, 1, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (4, 4, 1, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (5, 5, 1, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (6, 6, 1, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (7, 1, 2, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (8, 2, 2, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (9, 3, 2, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (10, 4, 2, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (11, 5, 2, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (12, 6, 2, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (13, 1, 3, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (14, 2, 3, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (15, 3, 3, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (16, 4, 3, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (17, 5, 3, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (18, 6, 3, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (19, 1, 4, 'Header', 4, 1);
INSERT INTO `page_widget` VALUES (20, 2, 4, 'Header', 4, 1);
INSERT INTO `page_widget` VALUES (21, 3, 4, 'Header', 4, 1);
INSERT INTO `page_widget` VALUES (22, 4, 4, 'Header', 4, 1);
INSERT INTO `page_widget` VALUES (23, 5, 4, 'Header', 4, 1);
INSERT INTO `page_widget` VALUES (24, 6, 4, 'Header', 4, 1);
INSERT INTO `page_widget` VALUES (25, 1, 5, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (26, 2, 5, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (27, 3, 5, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (28, 4, 5, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (29, 5, 5, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (30, 6, 5, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (31, 1, 6, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (32, 2, 6, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (33, 3, 6, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (34, 4, 6, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (35, 5, 6, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (36, 6, 6, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (37, 1, 7, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (38, 2, 7, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (39, 3, 7, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (40, 4, 7, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (41, 5, 7, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (42, 6, 7, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (43, 1, 8, 'Right', 4, 1);
INSERT INTO `page_widget` VALUES (44, 2, 8, 'Right', 4, 1);
INSERT INTO `page_widget` VALUES (45, 3, 8, 'Right', 4, 1);
INSERT INTO `page_widget` VALUES (46, 4, 8, 'Right', 4, 1);
INSERT INTO `page_widget` VALUES (47, 5, 8, 'Right', 4, 1);
INSERT INTO `page_widget` VALUES (48, 6, 8, 'Right', 4, 1);
INSERT INTO `page_widget` VALUES (49, 1, 9, 'Statics', 1, 1);
INSERT INTO `page_widget` VALUES (50, 2, 9, 'Statics', 1, 1);
INSERT INTO `page_widget` VALUES (51, 3, 9, 'Statics', 1, 1);
INSERT INTO `page_widget` VALUES (52, 4, 9, 'Statics', 1, 1);
INSERT INTO `page_widget` VALUES (53, 5, 9, 'Statics', 1, 1);
INSERT INTO `page_widget` VALUES (54, 6, 9, 'Statics', 1, 1);
INSERT INTO `page_widget` VALUES (55, 1, 10, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (56, 2, 10, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (57, 3, 10, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (58, 4, 10, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (59, 5, 10, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (60, 6, 10, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (61, 1, 11, 'Left', 1, 1);
INSERT INTO `page_widget` VALUES (62, 1, 12, 'Left', 2, 1);
INSERT INTO `page_widget` VALUES (63, 1, 13, 'Left', 3, 1);
INSERT INTO `page_widget` VALUES (64, 4, 14, 'Left', 1, 1);
INSERT INTO `page_widget` VALUES (65, 3, 15, 'Left', 1, 1);
INSERT INTO `page_widget` VALUES (66, 3, 16, 'Left', 2, 1);
INSERT INTO `page_widget` VALUES (67, 7, 17, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (68, 8, 17, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (69, 9, 17, 'Header', 1, 1);
INSERT INTO `page_widget` VALUES (70, 7, 18, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (71, 8, 18, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (72, 9, 18, 'Header', 2, 1);
INSERT INTO `page_widget` VALUES (73, 7, 19, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (74, 8, 19, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (75, 9, 19, 'Header', 3, 1);
INSERT INTO `page_widget` VALUES (76, 7, 20, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (77, 8, 20, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (78, 9, 20, 'Right', 1, 1);
INSERT INTO `page_widget` VALUES (79, 7, 21, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (80, 8, 21, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (81, 9, 21, 'Right', 2, 1);
INSERT INTO `page_widget` VALUES (82, 7, 22, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (83, 8, 22, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (84, 9, 22, 'Right', 3, 1);
INSERT INTO `page_widget` VALUES (85, 7, 23, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (86, 8, 23, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (87, 9, 23, 'Footer', 1, 1);
INSERT INTO `page_widget` VALUES (88, 7, 24, 'Left', 1, 1);
INSERT INTO `page_widget` VALUES (89, 7, 25, 'Left', 2, 1);
INSERT INTO `page_widget` VALUES (90, 7, 26, 'Left', 3, 1);
INSERT INTO `page_widget` VALUES (91, 7, 27, 'Left', 4, 1);
INSERT INTO `page_widget` VALUES (92, 7, 28, 'Left', 5, 1);
INSERT INTO `page_widget` VALUES (93, 8, 29, 'Left', 1, 1);
INSERT INTO `page_widget` VALUES (94, 9, 29, 'Left', 1, 1);
INSERT INTO `page_widget` VALUES (95, 8, 30, 'Left', 2, 1);
INSERT INTO `page_widget` VALUES (96, 8, 31, 'Left', 3, 1);
INSERT INTO `page_widget` VALUES (97, 8, 32, 'Left', 4, 1);
INSERT INTO `page_widget` VALUES (98, 9, 32, 'Left', 3, 1);
INSERT INTO `page_widget` VALUES (99, 9, 33, 'Left', 2, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `portfolio`
-- 

CREATE TABLE `portfolio` (
  `PORTFOLIO_ID` varchar(10) NOT NULL,
  `NAME` varchar(100) default NULL,
  `USER_ID` varchar(10) default NULL,
  `STOCK_ID` varchar(3) default NULL,
  `BALANCE` int(11) default NULL,
  `AVERAGE_PRICE` float default NULL,
  PRIMARY KEY  (`PORTFOLIO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `portfolio`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `privileges`
-- 

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `module_id` int(11) default NULL,
  `pri_type_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `privileges`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `privilege_types`
-- 

CREATE TABLE `privilege_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) default NULL,
  `description` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `privilege_types`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `quy_dinh`
-- 

CREATE TABLE `quy_dinh` (
  `THOI_GIAN_TRA` int(11) default NULL,
  `CHO_MUA_BAN_TRONG_NGAY` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `quy_dinh`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `roles`
-- 

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) default NULL,
  `description` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `roles`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `role_privilege`
-- 

CREATE TABLE `role_privilege` (
  `id` int(11) NOT NULL,
  `role_id` int(11) default NULL,
  `pri_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `role_privilege`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `stock`
-- 

CREATE TABLE `stock` (
  `STOCK_ID` varchar(3) NOT NULL,
  `COMPANY_ID` varchar(10) default NULL,
  `MARKET_ID` varchar(10) default NULL,
  `CEILING_PRICE` float default NULL,
  `REFERENCE_PRICE` float default NULL,
  `FLOOR_PRICE` float default NULL,
  `BUY_PRICE1` float default NULL,
  `BUY_VOLUME1` int(11) default NULL,
  `BUY_PRICE2` float default NULL,
  `BUY_VOLUME2` int(11) default NULL,
  `BUY_PRICE3` float default NULL,
  `BUY_VOLUME3` int(11) default NULL,
  `SELL_PRICE1` float default NULL,
  `SELL_VOLUME1` int(11) default NULL,
  `SELL_PRICE2` float default NULL,
  `SELL_VOLUME2` int(11) default NULL,
  `SELL_PRICE3` float default NULL,
  `SELL_VOLUME3` int(11) default NULL,
  `CLOSING_PRICE` float default NULL,
  `HIGH_PRICE` float default NULL,
  `LOW_PRICE` float default NULL,
  `LAST_TRADED_PRICE` float default NULL,
  `LAST_TRADED_VOLUME` int(11) default NULL,
  `TOTAL_MATCHED_VOLUME` int(11) default NULL,
  `LAST_UPDATED_TIME` date default NULL,
  PRIMARY KEY  (`STOCK_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `stock`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `stock_history`
-- 

CREATE TABLE `stock_history` (
  `DATE` date NOT NULL,
  `STOCK_ID` varchar(3) NOT NULL,
  `CEILING_PRICE` float default NULL,
  `REFERENCE_PRICE` float default NULL,
  `FLOOR_PRICE` float default NULL,
  `CLOSING_PRICE` float default NULL,
  `HIGH_PRICE` float default NULL,
  `LOW_PRICE` float default NULL,
  `LAST_TRADED_PRICE` float default NULL,
  `LAST_TRADED_VOLUME` int(11) default NULL,
  `TOTAL_MATCHED_VOLUME` int(11) default NULL,
  PRIMARY KEY  (`DATE`,`STOCK_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `stock_history`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `templates`
-- 

CREATE TABLE `templates` (
  `id` int(11) NOT NULL auto_increment,
  `component_id` int(11) default NULL,
  `name` varchar(50) default NULL,
  `path` varchar(255) default NULL,
  `is_default` tinyint(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `templates`
-- 

INSERT INTO `templates` VALUES (1, 1, 'Slate Template', '/admin/templates/default', 1);
INSERT INTO `templates` VALUES (2, 1, 'Template Admin Test', '/admin/templates/abc', 0);
INSERT INTO `templates` VALUES (3, 2, 'Template 2 cột', '/stock/templates/default', 1);
INSERT INTO `templates` VALUES (4, 3, 'Template 2 cột', '/news/templates/default', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `themes`
-- 

CREATE TABLE `themes` (
  `id` int(11) NOT NULL auto_increment,
  `component_id` int(11) default NULL,
  `name` varchar(50) default NULL,
  `path` varchar(255) default NULL,
  `is_default` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `themes`
-- 

INSERT INTO `themes` VALUES (1, 1, 'Slate Theme', '/admin/themes/default', 1);
INSERT INTO `themes` VALUES (2, 1, 'Theme Admin test', '/admin/themes/abc', 0);
INSERT INTO `themes` VALUES (3, 2, 'Theme màu xanh lá cây', '/stock/themes/default', 1);
INSERT INTO `themes` VALUES (4, 3, 'Theme màu xanh nước biển', '/news/themes/default', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `transaction`
-- 

CREATE TABLE `transaction` (
  `TRANS_ID` varchar(10) NOT NULL,
  `USER_ID` varchar(10) default NULL,
  `STOCK_ID` varchar(3) default NULL,
  `TRANS_TYPE` varchar(50) default NULL,
  `QUANTITY` int(11) default NULL,
  `PRICE` float default NULL,
  `TRADING_DATE` date default NULL,
  `STATUS` int(11) default NULL,
  PRIMARY KEY  (`TRANS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `transaction`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) default NULL,
  `name` varchar(255) default NULL,
  `pass` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `full_name` varchar(255) default NULL,
  `is_enable` tinyint(1) default NULL,
  `is_online` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `users`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user_account`
-- 

CREATE TABLE `user_account` (
  `USER_ID` varchar(10) NOT NULL,
  `LEVEL_ID` varchar(10) default NULL,
  `NAME` varchar(255) default NULL,
  `HASHED_PASS` varchar(255) default NULL,
  `FULL_NAME` varchar(255) default NULL,
  `ADDRESS` text,
  `EMAIL` varchar(255) default NULL,
  `PHONE` int(11) default NULL,
  `STATUS` varchar(50) default NULL,
  `MONEY` float default NULL,
  `LAST_LOGIN_TIME` date default NULL,
  PRIMARY KEY  (`USER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user_account`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user_level`
-- 

CREATE TABLE `user_level` (
  `LEVEL_ID` varchar(10) NOT NULL,
  `LEVEL_NAME` varchar(50) default NULL,
  `DESCRIPTION` text,
  PRIMARY KEY  (`LEVEL_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user_level`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user_session`
-- 

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) default NULL,
  `ip` varchar(50) default NULL,
  `time` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user_session`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `widgets`
-- 

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `alias` varchar(255) default NULL,
  `path` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `widgets`
-- 

INSERT INTO `widgets` VALUES (1, 'Banner', 'widget_stock_banner', '\\modules\\stock\\widgets\\widget_stock_banner\\Banner.php');
INSERT INTO `widgets` VALUES (2, 'Main Menu', 'widget_stock_main_menu', '\\modules\\stock\\widgets\\widget_stock_main_menu\\MainMenu.php');
INSERT INTO `widgets` VALUES (3, 'Stock Horzintal', 'widget_stock_horzintal_stock', '\\modules\\stock\\widgets\\widget_stock_horzintal_stock\\StockHorzintal.php');
INSERT INTO `widgets` VALUES (4, 'User Navigation', 'widget_stock_nav_user', '\\modules\\stock\\widgets\\widget_stock_nav_user\\NavUser.php');
INSERT INTO `widgets` VALUES (5, 'Search', 'widget_stock_search', '\\modules\\stock\\widgets\\widget_stock_search\\Search.php');
INSERT INTO `widgets` VALUES (6, 'Menu SideBar', 'widget_stock_menu_sidebar', '\\modules\\stock\\widgets\\widget_stock_menu_sidebar\\MenuSidebar.php');
INSERT INTO `widgets` VALUES (7, 'Price Gold', 'widget_stock_price_gold', '\\modules\\stock\\widgets\\widget_stock_price_gold\\PriceGold.php');
INSERT INTO `widgets` VALUES (8, 'Exchange Rate', 'widget_stock_exchange_rate', '\\modules\\stock\\widgets\\widget_stock_exchange_rate\\ExchangeRate.php');
INSERT INTO `widgets` VALUES (9, 'User Statics', 'widget_stock_user_statics', '\\modules\\stock\\widgets\\widget_stock_user_statics\\UserStatics.php');
INSERT INTO `widgets` VALUES (10, 'Footer', 'widget_stock_footer', '\\modules\\stock\\widgets\\widget_stock_footer\\Footer.php');
INSERT INTO `widgets` VALUES (11, 'VN Index', 'widget_stock_vnindex', '\\modules\\stock\\widgets\\widget_stock_vnindex\\VnIndex.php');
INSERT INTO `widgets` VALUES (12, 'News Info', 'widget_stock_news_info', '\\modules\\stock\\widgets\\widget_stock_news_info\\NewsInfo.php');
INSERT INTO `widgets` VALUES (13, 'Stock Info', 'widget_stock_info_stock', '\\modules\\stock\\widgets\\widget_stock_info_stock\\StockInfo.php');
INSERT INTO `widgets` VALUES (14, 'Rule Info', 'Rule', '\\modules\\stock\\widgets\\widget_stock_rule_info\\RuleInfo.php');
INSERT INTO `widgets` VALUES (15, 'Trading Amount', 'widget_stock_trading_amount', '\\modules\\stock\\widgets\\widget_stock_trading_amount\\TradingAmount.php');
INSERT INTO `widgets` VALUES (16, 'Member Ranking', 'widget_stock_member_ranking', '\\modules\\stock\\widgets\\widget_stock_member_ranking\\MemberRanking.php');
INSERT INTO `widgets` VALUES (17, 'Banner', 'widget_news_banner', '\\modules\\\\news\\widgets\\widget_news_banner\\Banner.php');
INSERT INTO `widgets` VALUES (18, 'User Navigation', 'widget_news_nav_user', '\\modules\\\\news\\widgets\\widget_news_nav_user\\NavUser.php');
INSERT INTO `widgets` VALUES (19, 'Main Menu', 'widget_news_main_menu', '\\modules\\\\news\\widgets\\widget_news_main_menu\\MainMenu.php');
INSERT INTO `widgets` VALUES (20, 'Hot News', 'widget_news_hot_news', '\\modules\\\\news\\widgets\\widget_news_hot_news\\NewsHot.php');
INSERT INTO `widgets` VALUES (21, 'Stock Rate', 'widget_news_stock_rate', '\\modules\\\\news\\widgets\\widget_news_stock_rate\\StockRate.php');
INSERT INTO `widgets` VALUES (22, 'Gold Currency Info', 'widget_news_gold_currentcy_info', '\\modules\\\\news\\widgets\\widget_news_gold_currentcy_info\\GoldCurrencyInfo.php');
INSERT INTO `widgets` VALUES (23, 'Footer', 'widget_news_footer', '\\modules\\\\news\\widgets\\widget_news_footer\\Footer.php');
INSERT INTO `widgets` VALUES (24, 'Top News', 'widget_news_top_news', '\\modules\\\\news\\widgets\\widget_news_top_news\\TopNews.php');
INSERT INTO `widgets` VALUES (25, 'Top 3 News', 'widget_news_top_3_news', '\\modules\\\\news\\widgets\\widget_news_top_3_news\\Top3News.php');
INSERT INTO `widgets` VALUES (26, 'Expert', 'widget_news_expert', '\\modules\\\\news\\widgets\\widget_news_expert\\Expert.php');
INSERT INTO `widgets` VALUES (27, 'Company News', 'widget_news_company_news', '\\modules\\\\news\\widgets\\widget_news_company_news\\CompanyNews.php');
INSERT INTO `widgets` VALUES (28, 'News Box', 'widget_news_news_box', '\\modules\\\\news\\widgets\\widget_news_news_box\\NewsBox.php');
INSERT INTO `widgets` VALUES (29, 'widget_news_breadcrumb', 'Breadcrumb', '\\modules\\\\news\\widgets\\widget_news_breadcrumb\\Breadcrumb.php');
INSERT INTO `widgets` VALUES (30, 'Important News', 'widget_news_impotant_news', '\\modules\\\\news\\widgets\\widget_news_impotant_news\\ImportantNews.php');
INSERT INTO `widgets` VALUES (31, 'CatBox', 'widget_news_cat_box', '\\modules\\\\news\\widgets\\widget_news_cat_box\\CatBox.php');
INSERT INTO `widgets` VALUES (32, 'Other News', 'widget_news_other_news', '\\modules\\\\news\\widgets\\widget_news_other_news\\OtherNews.php');
INSERT INTO `widgets` VALUES (33, 'Content News', 'widget_news_content_news', '\\modules\\\\news\\widgets\\widget_news_content_news\\ContentNews.php');
