-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 07, 2010 at 12:46 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `articles`
-- 

INSERT INTO `articles` VALUES (1, 2, 1, 0, 'CII: Deutsche Bank đăng ký mua 2,5 triệu cp và bán 1 triệu cp', 'cii-deutsche-bank-dang-ky-mua-25-trieu-cp-va-ban-1-trieu-cp', 'CTCP Đầu tư Hạ tầng Kỹ thuật TP.HCM (mã CII, HoSE) thông báo kết quả và giao dịch tiếp của cổ đông lớn.', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, cổ đ&ocirc;ng lớn của c&ocirc;ng ty l&agrave; Deutsche Bank AG London đăng k&yacute; b&aacute;n tiếp 2,5 triệu cp v&agrave; b&aacute;n 1 triệu cp từ 6/12/2010 đến 28/1/2011 th&ocirc;ng qua h&igrave;nh thức khớp lệnh v&agrave; thỏa thuận.<br />\r\n	<br />\r\n	Trước đ&oacute;, từ 5/10/25010 đến 30/11/2010 cổ đ&ocirc;ng n&agrave;y đ&atilde; mua 711.770 đơn vị (trong số 1,1 triệu cp đ&atilde; đăng k&yacute;); đ&atilde; b&aacute;n 36.410 đơn vị (trong số 1,1 triệu CP đăng k&yacute; b&aacute;n). L&yacute; do kh&ocirc;ng giao dịch mua v&agrave; b&aacute;n hết số lượng đăng k&yacute; v&igrave; thị trường biến động n&ecirc;n thay đổi kế hoạch.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (2, 2, 1, 0, 'VNE: thành viên HĐQT bán 100 ngàn CP', 'vne-thanh-vien-hdqt-ban-100-ngan-cp', 'Tổng công ty Cổ phần Xây dựng điện Việt Nam (mã VNE, HoSE) thông báo giao dịch của cổ đông nội bộ.', NULL, '<div align=\\"justify\\">\r\n	<p>\r\n		<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, &ocirc;ng Nguyễn Th&agrave;nh Đồng, th&agrave;nh vi&ecirc;n HĐQT đăng k&yacute; b&aacute;n 100 ng&agrave;n CP th&ocirc;ng qua h&igrave;nh thức khớp lệnh.<br />\r\n		<br />\r\n		Thời gian dự kiến giao dịch từ 6/12/2010 đến 6/2/2011.<br />\r\n		<br />\r\n		Số lượng CP cổ đ&ocirc;ng n&agrave;y nắm giữ trước khi thực hiện giao dịch l&agrave; 186.800 CP, chiếm 0,293% vốn điều lệ. Nếu giao dịch th&agrave;nh c&ocirc;ng th&igrave; số CP nắm giữ giảm xuống c&ograve;n 86.800 CP.</span></p>\r\n	<p style=\\"text-align: right;\\">\r\n		&nbsp;</p>\r\n</div>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (3, 2, 1, 0, 'PXS: 11 tháng lãi 44,98 tỷ đồng sau thuế, đạt 83,13% KH năm', 'pxs-11-thang-lai-4498-ty-dong-sau-thue-dat-8313-kh-nam', 'Đại hội đồng cổ đông Công ty Cổ phần Kết cấu Kim loại và Lắp máy Dầu khí (PXS - HoSE) vừa qua đã thông qua...', NULL, '<div align=\\"justify\\">\r\n	<p style=\\"text-align: justify;\\">\r\n		<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">T&iacute;nh đến ng&agrave;y 30/11/2010, <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> đ&atilde; ho&agrave;n th&agrave;nh 399 tỷ đồng doanh thu v&agrave; 44,98 tỷ đồng lợi nhuận sau thuế, tương đương đạt 83,13% kế hoạch doanh thu v&agrave; đạt 89,5% kế hoạch lợi nhuận năm. Trong 11 th&aacute;ng đầu năm 2010, tổng thu tiền về t&agrave;i khỏan của <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> đạt 392 tỷ đồng, dự kiến th&aacute;ng 12 sẽ tiếp tục thu 75 tỷ đồng. Tổng cộng tiền thu trong năm đạt 467 tỷ đồng, chiếm 97,3% so với tổng doanh thu.<br />\r\n		<br />\r\n		Từ đầu qu&yacute; 3 năm 2010, Ban l&atilde;nh đạo C&ocirc;ng ty đ&atilde; th&agrave;nh lập Tổ thu hồi vốn doTGĐ c&ocirc;ng ty trực tiếp l&agrave;m tổ trưởng, để đ&ocirc;n đốc thu hồi khối lượng tại tất cả c&aacute;c c&ocirc;ng tr&igrave;nh m&agrave; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> tham gia thực hiện.<br />\r\n		<br />\r\n		C&ocirc;ng t&aacute;c thu hồi được triển khai đồng loạt ở c&aacute;c c&ocirc;ng tr&igrave;nh trọng điểm do <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> thi c&ocirc;ng: Nh&agrave; m&aacute;y chu tr&igrave;nh Điện hỗn hợp Nhơn Trạch 2, C&ocirc;ng tr&igrave;nh chế tạo Ch&acirc;n đế mỏ Đại H&ugrave;ng, Chế tạo Ch&acirc;n đế - khối thượng tầng Gi&agrave;n khai th&aacute;c Mộc Tinh &ndash; Biển Đ&ocirc;ng, Chế tạo Ch&acirc;n đế - khối thượng tầng Gi&agrave;n khai th&aacute;c BK15 &ndash; Mỏ Bạch Hổ, Chế tạo Ch&acirc;n đế - khối thượng tầng Gi&agrave;n khai th&aacute;c RC3 &ndash; Mỏ Rồng&hellip;To&agrave;n bộ hồ sơ ho&agrave;n c&ocirc;ng, nghiệm thu đang được <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=s/4fnTNiugU=\\" target=\\"_blank\\">PXS</a></b> ho&agrave;n tất để kịp xuất ho&aacute; đơn trong th&aacute;ng 12/2010.</span></p>\r\n</div>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (4, 2, 1, 0, 'SMC: 13/12 chốt quyền nhận cổ tức 10% bằng tiền mặt', 'smc-1312-chot-quyen-nhan-co-tuc-10-bang-tien-mat', 'Công ty Cổ phần Đầu tư – Thương mại SMC (mã SMC, HoSE) thông báo trả cổ tức đợt 1/2010.', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Ng&agrave;y 13/12 l&agrave; ng&agrave;y đăng k&yacute; cuối c&ugrave;ng v&agrave; ng&agrave;y 9/12 l&agrave; GDKHQ để nhận cổ tức đợt 1 năm 2010 tỷ lệ 10%/mệnh gi&aacute; (01 cổ phiếu nhận được 1.000 đồng). Thời gian chi trả v&agrave;o ng&agrave;y 22/12/2010.<br />\r\n	<br />\r\n	- Địa điểm thực hiện:<br />\r\n	<br />\r\n	+ Đối với chứng kho&aacute;n đ&atilde; lưu k&yacute;: Người sở hữu chứng kho&aacute;n l&agrave;m thủ tục nhận cổ tức tại c&aacute;c TVLK nơi mở t&agrave;i khoản lưu k&yacute; chứng kho&aacute;n.<br />\r\n	<br />\r\n	+ Đối với chứng kho&aacute;n chưa lưu k&yacute;: Người sở hữu chứng kho&aacute;n l&agrave;m thủ tục nhận cổ tức tại Văn ph&ograve;ng C&ocirc;ng ty.<br />\r\n	<br />\r\n	Được biết, lũy kế 9 th&aacute;ng đầu năm 2010, <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=jBwI8niAXfY=\\" target=\\"_blank\\">SMC</a></b> đạt 68,51 tỷ đồng LNST trong đ&oacute;, phần LNST của cổ đ&ocirc;ng c&ocirc;ng ty mẹ l&agrave; 68,01 tỷ đồng. Mức lợi nhuận n&agrave;y tăng 24,72% so với 9 th&aacute;ng đầu năm 2009. So với kế hoạch 80 tỷ đồng LNST cả năm 2010, kết th&uacute;c qu&yacute; III, <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=jBwI8niAXfY=\\" target=\\"_blank\\">SMC</a></b> ho&agrave;n th&agrave;nh 85,64%.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (5, 2, 1, 0, 'CII: Cầu đường Bình Triệu đăng ký mua 2 triệu CP', 'cii-cau-duong-binh-trieu-dang-ky-mua-2-trieu-cp', 'CTCP Đầu tư và Xây dựng Cầu đường Bình Triệu - tổ chức có liên quan đến cổ đông nội bộ CTCP Đầu tư Hạ tầng...', 'files/news/20101205/20101205085615.jpg', '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Giao dịch dự kiến được thực hiện trong thời gian từ ng&agrave;y 6/12/2010 đến 6/2/2011, bằng phương thức khớp lệnh hoặc thỏa thuận.<br />\r\n	<br />\r\n	Hiện Cầu đường B&igrave;nh Triệu đang nắm giữ 2.250.000 CP <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b>, tương đương tỷ lệ 3%. Nếu giao dịch th&agrave;nh c&ocirc;ng th&igrave; số lượng sở hữu sẽ tăng l&ecirc;n 4.250.000 đơn vị, tương đương tỷ lệ 5,7%.<br />\r\n	&nbsp;<br />\r\n	Được biết, từ 6/12/2010 đến 28/1/2011, cổ đ&ocirc;ng lớn của <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b> c&ocirc;ng ty l&agrave; Deutsche Bank AG London cũng đăng k&yacute; mua tiếp 2,5 triệu CP v&agrave; b&aacute;n 1 triệu CP, th&ocirc;ng qua h&igrave;nh thức khớp lệnh v&agrave; thỏa thuận. Trước đ&oacute;, từ 5/10/25010 đến 30/11/2010 cổ đ&ocirc;ng n&agrave;y đ&atilde; mua 711.770 đơn vị (trong số 1,1 triệu cp đ&atilde; đăng k&yacute;); đ&atilde; b&aacute;n 36.410 đơn vị (trong số 1,1 triệu CP đăng k&yacute; b&aacute;n).<br />\r\n	<br />\r\n	* Ng&agrave;y 10/12 l&agrave; ng&agrave;y giao dịch kh&ocirc;ng hưởng quyền v&agrave; ng&agrave;y 14/12/2010 l&agrave; ng&agrave;y đăng k&yacute; cuối c&ugrave;ng chốt danh s&aacute;ch cổ đ&ocirc;ng để <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b> thực hiện tạm ứng cổ tức đợt 1/2010 bằng tiền theo tỷ lệ 10%/mệnh gi&aacute;. Ng&agrave;y chi trả l&agrave; 14/1/2011. <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=+DQJ4QhOiV4=\\" target=\\"_blank\\">CII</a></b> cũng chốt quyền để tổ chức ĐHĐCĐ bất thường năm 2011 nhằm lấy &yacute; kiến về việc ph&aacute;t h&agrave;nh th&ecirc;m 15 triệu USD tr&aacute;i phiếu chuyển đổi cho Goldman Sachs.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (6, 2, 1, 0, 'ITC: HĐQT chấp thuận mua lại 3 triệu CP làm CP quỹ', 'itc-hdqt-chap-thuan-mua-lai-3-trieu-cp-lam-cp-quy', 'Công ty Cổ phần Đầu tư - Kinh doanh nhà (mã ITC, HoSE) công bố Nghị quyết HĐQT về việc mua lại cổ phiếu quỹ.', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, HĐQT chấp thuận mua lại 3 triệu CP l&agrave;m CP quỹ bằng nguồn vốn thặng dư. Mục đ&iacute;ch mua cổ phiếu quỹ l&agrave; chia cổ tức cho cổ đ&ocirc;ng hoặc cổ phiếu thưởng.<br />\r\n	<br />\r\n	HĐQT ủy quyền cho TGĐ quyết định gi&aacute; mua v&agrave; kế hoạch mua.</span></p>', '2010-12-05', NULL, 1, 0, 1);
INSERT INTO `articles` VALUES (7, 2, 1, 0, 'Phong tỏa tài khoản của ông Lê Văn Dũng, 2 Công ty và 13 người có liên quan', 'phong-toa-tai-khoan-cua-ong-le-van-dung-2-cong-ty-va-13-nguoi-co-lien-quan', 'Cơ quan An ninh điều tra - Bộ Công an đã khởi tố vụ án hình sự, khởi tố bị can, bắt tạm giam đối với ông Lê Văn Dũng (nguyên Chủ tịch Hội đồng Quản trị, kiêm Tổng Giám đốc Công ty Cổ phần Dược...', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo y&ecirc;u cầu của cơ quan An ninh để phục vụ c&ocirc;ng t&aacute;c điều tra v&agrave; bảo vệ quyền, lợi &iacute;ch hợp ph&aacute;p của nh&agrave; đầu tư, Ủy ban Chứng kho&aacute;n Nh&agrave; nước đ&atilde; c&oacute; c&ocirc;ng văn y&ecirc;u cầu Trung t&acirc;m Lưu k&yacute; Chứng kho&aacute;n Việt Nam v&agrave; 04 C&ocirc;ng ty chứng kho&aacute;n (C&ocirc;ng ty Cổ phần Chứng kho&aacute;n S&agrave;i G&ograve;n Thương T&iacute;n (SBS); C&ocirc;ng ty Cổ phần Chứng kho&aacute;n S&agrave;i G&ograve;n H&agrave; Nội (SHS); C&ocirc;ng ty Cổ phần Chứng kho&aacute;n S&agrave;i G&ograve;n (SSI) v&agrave; C&ocirc;ng ty Cổ phần Chứng kho&aacute;n Bảo Việt (BVSC) phong tỏa ngay t&agrave;i khoản của &ocirc;ng L&ecirc; Văn Dũng, 2 C&ocirc;ng ty (C&ocirc;ng ty Cổ phần Đầu tư Y tế Medi, C&ocirc;ng ty TNHH Ph&aacute;t triển thương mại v&agrave; Kỹ thuật Ho&agrave;n Thiện) v&agrave; 13 người c&oacute; li&ecirc;n quan;<br />\r\n	<br />\r\n	Đồng thời, Ủy ban chứng kho&aacute;n y&ecirc;u cầu c&aacute;c Sở Giao dịch chứng kho&aacute;n gi&aacute;m s&aacute;t việc thực hiện phong tỏa n&ecirc;u tr&ecirc;n.<br />\r\n	<br />\r\n	Được biết, ng&agrave;y 26/11/2010 Cơ quan an ninh điều tra - Bộ C&ocirc;ng an đ&atilde; c&oacute; th&ocirc;ng b&aacute;o bắt &ocirc;ng L&ecirc; Văn Dũng, Chủ tịch Hội đồng Quản trị ki&ecirc;m Tổng gi&aacute;m đốc C&ocirc;ng ty Cổ phần Dược phẩm Viễn Đ&ocirc;ng (<b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b>) do li&ecirc;n quan đến h&agrave;nh vi thao t&uacute;ng gi&aacute; chứng kho&aacute;n.<br />\r\n	<br />\r\n	Cổ phiếu <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b> được đưa v&agrave;o diện bị kiểm so&aacute;t kể từ ng&agrave;y 2/12/2010 do việc giải tỉnh khacứ phục thiếu s&oacute;t dẫn đến việc đ&igrave;nh chỉ đợt ch&agrave;o b&aacute;n chứng kho&aacute;n ra c&ocirc;ng ch&uacute;ng chưa đ&aacute;p ứng đầy đủ y&ecirc;u cầu của Ủy ban Chứng kho&aacute;n, vấn đề n&agrave;y c&oacute; thể ảnh hưởng đến quyết định của nh&agrave; đầu tư đối với cổ phiếu <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b> v&agrave; hạn chế thời gian giao dịch đối với cổ phiếu <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=xmWK5jqc0Zs=\\" target=\\"_blank\\">DVD</a></b> l&agrave; chỉ được thực hiện giao dịch 15 ph&uacute;t trong phi&ecirc;n khớp lệnh định kỳ x&aacute;c định gi&aacute; đ&oacute;ng cửa.</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (8, 2, 1, 0, 'Habeco: Đấu giá gần 7 triệu cổ phiếu với giá khởi điểm 32.000 đồng', 'habeco-dau-gia-gan-7-trieu-co-phieu-voi-gia-khoi-diem-32000-dong', 'Sở Giao dịch Chứng khoán Hà Nội (HNX) thông báo về việc đấu giá cổ phần của Tổng Công ty Cổ phần Bia – Rượu – Nước Giải khát Hà Nội (Habeco).', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Theo đ&oacute;, ng&agrave;y 24/12/2010, HNX sẽ tổ chức đấu gi&aacute; 6.954.000 cổ phần của Tổng C&ocirc;ng ty Cổ phần Bia &ndash; Rượu &ndash; Nước Giải kh&aacute;t H&agrave; Nội (Habeco) với gi&aacute; khởi điểm đấu gi&aacute; l&agrave; 32.000 đồng.<br />\r\n	<br />\r\n	Habeco hiện c&oacute; vốn điều lệ 2.318 tỷ đồng, trụ sở ch&iacute;nh đặt tại 183 Ho&agrave;ng Hoa Th&aacute;m, Ba Đ&igrave;nh, H&agrave; Nội. C&ocirc;ng ty hoạt động ch&iacute;nh trong lĩnh vực sản xuất kinh doanh bia, rượu, nước giải kh&aacute;t.<br />\r\n	<br />\r\n	Năm 2010, Habeco th&ocirc;ng qua kế hoạch kinh doanh với tổng sản lượng bua ti&ecirc;u thụ l&agrave; 418.200 triệu l&iacute;t; tổng doanh thu v&agrave; thu nhập đạt 4.946,948 tỷ đồng; tổng lợi nhuận trước thuế v&agrave; sau thuế lần lượt đạt 649,954 tỷ đồng v&agrave; 492,194 tỷ đồng; cổ tức 12%/năm.<br />\r\n	<br />\r\n	Được biết, tổng doanh thu b&aacute;n h&agrave;ng v&agrave; dịch vụ năm 2009 đạt 4.079,358 tỷ đồng; doanh thu hoạt động t&agrave;i ch&iacute;nh đạt 116,417 tỷ đồng; lợi nhuận trước v&agrave; sau thuế lần lượt đạt 375,263 tỷ đồng v&agrave; 293,054 tỷ đồng.</span></p>', '2010-12-05', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (9, 2, 1, 0, 'VFG: 13/12 chốt quyền nhận cổ tức 10%', 'vfg-1312-chot-quyen-nhan-co-tuc-10', 'CTCP Khử Trùng Việt Nam (VFG, HoSE) thông báo chốt quyền trả cổ tức đợt 2 năm 2010 bằng tiền mặt.', 'files/news/20101205/20101205085901.jpg', '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Ng&agrave;y giao dịch kh&ocirc;ng hưởng quyền: 9/12/2010. Ng&agrave;y đăng k&yacute; cuối c&ugrave;ng: 13/12/2010.<br />\r\n	<br />\r\n	Theo đ&oacute;, c&ocirc;ng ty chi trả cổ tức đợt 2 năm 2010 bằng tiền mặt tỷ lệ 10%. Cổ tức được thanh to&aacute;n ng&agrave;y 27/12/2010.<br />\r\n	<br />\r\n	Đối với chứng kho&aacute;n đ&atilde; lưu k&yacute; : Người sở hữu l&agrave;m thủ tục nhận cổ tức tại c&aacute;c TVLK nơi mở t&agrave;i khoản lưu k&yacute;.<br />\r\n	&nbsp;<br />\r\n	Đối với chứng kho&aacute;n chưa lưu k&yacute; : Người sở hữu l&agrave;m thủ tục nhận cổ tức bằng tiền mặt (hoặc chuyển khoản) tại C&ocirc;ng ty Cổ phần Khử Tr&ugrave;ng Việt Nam. </span></p>', '2010-12-05', NULL, 1, 0, 1);
INSERT INTO `articles` VALUES (10, 2, 1, 0, 'KDC chào bán hơn 18 triệu cổ phần cho việc sáp nhập', 'kdc-chao-ban-hon-18-trieu-co-phan-cho-viec-sap-nhap', 'Đợt chào bán 18,2 triệu cổ phần của Kinh Đô lần này nhằm đổi lấy cổ phiếu NKD và Kido đang lưu hành ngoài thị trường cho mục đích sáp nhập đã thông qua tại Đại hội cổ đông hồi giữa năm của cả 3 doanh nghiệp.', 'files/news/20101205/20101205090009.jpg', '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Ủy ban Chứng kho&aacute;n vừa cấp giấy chứng nhận ch&agrave;o b&aacute;n cổ phiếu ra c&ocirc;ng ch&uacute;ng cho C&ocirc;ng ty cổ phần Kinh Đ&ocirc; (m&atilde; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b>). Trong số 18.244.743 cổ phần ph&aacute;t h&agrave;nh th&ecirc;m, 75% (tương đương 13,7 triệu) d&ugrave;ng để ho&aacute;n đổi với NKD (cổ phiếu của C&ocirc;ng ty thực phẩm Kinh Đ&ocirc; miền Bắc) v&agrave; số c&ograve;n lại gần 4,5 triệu d&agrave;nh cho việc chuyển đổi cổ phiếu Kido (C&ocirc;ng ty Kem Ki do) theo tỷ lệ 1:1,1. Lượng ch&agrave;o b&aacute;n th&ecirc;m sẽ ch&iacute;nh thức giao dịch bổ sung tại HOSE sau một th&aacute;ng nữa.<br />\r\n	<br />\r\n	Tỷ lệ số cổ phần ph&aacute;t h&agrave;nh th&ecirc;m bằng 18,2% tổng số cổ phần đang lưu h&agrave;nh. Gi&aacute; trị ch&agrave;o b&aacute;n theo mệnh gi&aacute; 182,4 tỷ đồng.<br />\r\n	<br />\r\n	Theo Ủy ban Chứng kho&aacute;n Nh&agrave; nước, gi&aacute; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b> kh&ocirc;ng bị điều chỉnh giảm, do số ph&aacute;t h&agrave;nh th&ecirc;m d&ugrave;ng để ho&aacute;n đổi cổ phiếu thực hiện việc s&aacute;p nhập. Kinh Đ&ocirc; dự kiến lợi nhuận sau thuế v&agrave; EPS l&agrave; 936 tỷ đồng, 7.034 đồng, tăng lần lượt 13% v&agrave; 9% so với trước s&aacute;p nhập. Doanh thu năm đầu ti&ecirc;n sau s&aacute;p nhập ước đạt 167 triệu USD.<br />\r\n	<br />\r\n	Phương &aacute;n s&aacute;p nhập của bộ ba <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b>, NKD, Kido sau nhiều lần tr&igrave; ho&atilde;n đ&atilde; đi đến bước cuối c&ugrave;ng, khi cổ đ&ocirc;ng của 3 doanh nghiệp duyệt lộ tr&igrave;nh cũng như gi&aacute; chuyển đổi tại đại hội cổ đ&ocirc;ng hồi th&aacute;ng 5. Theo đ&oacute;, NKD v&agrave; Kido sẽ trở th&agrave;nh những c&ocirc;ng ty con dưới h&igrave;nh thức c&ocirc;ng ty TNHH một th&agrave;nh vi&ecirc;n, m&agrave; chủ sở hữu l&agrave; <b><a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=c3B5rqoh1h4=\\" target=\\"_blank\\">KDC</a></b>. Vốn điều lệ mới n&acirc;ng l&ecirc;n gần 1.200 tỷ đồng, gấp 7 lần vốn điều lệ hiện tại của NKD v&agrave; gần 20 lần so với Kido.</span></p>', '2010-12-05', NULL, 1, 0, 1);
INSERT INTO `articles` VALUES (11, 3, 1, 0, 'POM: Đăng ký mua 1.640.560 cp quỹ (HOSE)', 'pom-dang-ky-mua-1640560-cp-quy-hose', '', NULL, '<p>\r\n	<strong>C&ocirc;ng ty CP Th&eacute;p <a href=\\"\\\\&quot;http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=QaE4UO2USm4=\\\\&quot;\\" target=\\"\\\\&quot;_blank\\\\&quot;\\"><strong>POM</strong></a>INA (<a href=\\"\\\\&quot;http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=QaE4UO2USm4=\\\\&quot;\\" target=\\"\\\\&quot;_blank\\\\&quot;\\"><strong>POM</strong></a>)CBTT đăng k&yacute; mua cổ phiếu quỹ như sau:</strong></p>\r\n<ul>\r\n	<li>\r\n		<span id=\\"\\\\&quot;ctl00_mainContent_lblContent\\\\&quot;\\">Số lượng cổ phiếu quỹ hiện tại: 359.440 cổ phiếu</span></li>\r\n	<li>\r\n		Số lượng đăng k&yacute; mua: 1.640.560 cổ phiếu</li>\r\n	<li>\r\n		Tổng số cổ phiếu sau khi giao dịch: 2.000.000 cổ phiếu</li>\r\n	<li>\r\n		Mục đ&iacute;ch: ổn định gi&aacute; cổ phiếu v&agrave; sử dụng hiệu quả nguồn vốn</li>\r\n	<li>\r\n		Nguồn vốn thực hiện: thặng dư vốn v&agrave; lợi nhuận giữ lại t&iacute;nh đến ng&agrave;y 30/06/2010</li>\r\n	<li>\r\n		Phương thức giao dịch: khớp lệnh</li>\r\n	<li>\r\n		Thời gian đăng k&yacute; giao dịch: từ ng&agrave;y 09/12/2010 đến ng&agrave;y 09/03/2011</li>\r\n	<li>\r\n		C&ocirc;ng ty Chứng kho&aacute;n được ủy quyền thực hiện việc mua: C&ocirc;ng ty CP Chứng kho&aacute;n S&agrave;i G&ograve;n</li>\r\n</ul>', '2010-12-05', '2010-12-05', 1, 0, 0);
INSERT INTO `articles` VALUES (12, 3, 1, 0, 'TTF: Ông Tạ Văn Nam - TV.HĐQT kiêm Phó TGĐ đã bán 90.000 cp (HOSE)', 'ttf-ong-ta-van-nam---tvhdqt-kiem-pho-tgd-da-ban-90000-cp-hose', '', NULL, '<p>\r\n	<span class=\\"\\\\&quot;p_te8\\\\&quot;\\" id=\\"\\\\&quot;UcNewsDetail1_lblNoiDung\\\\&quot;\\" style=\\"\\" width:=\\"\\">B&aacute;o c&aacute;o kết quả giao dịch cổ đ&ocirc;ng nội bộ của CTCP Tập đo&agrave;n Kỹ nghệ Gỗ Trường Th&agrave;nh n</span></p>', '2010-12-05', '2010-12-05', 1, 0, 0);
INSERT INTO `articles` VALUES (13, 3, 1, 0, 'LIX: Red River Holding - Cổ đông lớn đã mua 30.000 cp (HOSE)', 'lix-red-river-holding---co-dong-lon-da-mua-30000-cp-hose', '', NULL, '<p>\r\n	<span class=\\"\\\\&quot;\\\\\\\\&quot;p_te8\\\\\\\\&quot;\\\\&quot;\\" id=\\"\\\\&quot;\\\\\\\\&quot;UcNewsDetail1_lblNoiDung\\\\\\\\&quot;\\\\&quot;\\" style=\\"\\" width:=\\"\\\\&quot;\\\\&quot;\\">B&aacute;o c&aacute;o kết quả giao dịch cổ đ&ocirc;ng lớn C&ocirc;ng ty Cổ phần Bột giặt <b><a href=\\"\\\\&quot;\\\\\\\\&quot;http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=NlWlY+jJwLI=\\\\\\\\&quot;\\\\&quot;\\" target=\\"\\\\&quot;\\\\\\\\&quot;_blank\\\\\\\\&quot;\\\\&quot;\\">LIX</a></b></span></p>', '2010-12-05', '2010-12-05', 1, 1, 0);
INSERT INTO `articles` VALUES (14, 3, 1, 0, 'FBT: Tổ chức ĐHCĐ bất thường năm 2010 (HOSE)', 'fbt-to-chuc-dhcd-bat-thuong-nam-2010-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">CTCP Xuất nhập khẩu L&acirc;m thủy sản Bến tre th&ocirc;ng b&aacute;o tổ chức Đại hội cổ đ&ocirc;ng bất thường năm 2010</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (15, 3, 1, 0, 'AGR: Ông Lê Văn Minh - TV.HĐQT kiêm Phó TGĐ chưa mua được cp (HOSE)', 'agr-ong-le-van-minh---tvhdqt-kiem-pho-tgd-chua-mua-duoc-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">B&aacute;o c&aacute;o kết quả giao dịch của Ủy vi&ecirc;n HĐQT CTCP Chứng kho&aacute;n NH N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển N&ocirc;ng th&ocirc;n Việt Nam</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (16, 3, 1, 0, 'SBT: Tổ chức liên quan với bà Huỳnh Bích Ngọc - TV.HĐQT đã mua 35.197.600 cp (HOSE)', 'sbt-to-chuc-lien-quan-voi-ba-huynh-bich-ngoc---tvhdqt-da-mua-35197600-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">B&aacute;o c&aacute;o kết quả giao dịch của tổ chức c&oacute; li&ecirc;n quan đến cổ đ&ocirc;ng nội bộ C&ocirc;ng ty Cổ phần Bourbon T&acirc;y Ninh</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (17, 3, 1, 0, 'MTG: Quyết định niêm yết bổ sung gần 4 triệu cp (HOSE)', 'mtg-quyet-dinh-niem-yet-bo-sung-gan-4-trieu-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Quyết định ni&ecirc;m yết bổ sung cổ phiếu của C&ocirc;ng ty Cổ phần MT GAS</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (18, 3, 1, 0, 'PAC: FTIF – Templeton frontier markets fund - Cổ đông lớn đã mua 229.090 cp (HOSE)', 'pac-ftif--templeton-frontier-markets-fund---co-dong-lon-da-mua-229090-cp-hose', '', NULL, '<p>\r\n	<strong>Th&ocirc;ng b&aacute;o sở hữu của cổ đ&ocirc;ng lớn của CTCP Pin Ắc quy Miền nam (<a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=bzEuqShuMz8=\\" target=\\"_blank\\"><strong>PAC</strong></a>) như sau:</strong></p>\r\n<ul>\r\n	<li>\r\n		<span id=\\"ctl00_mainContent_lblContent\\">T&ecirc;n nhà đ&acirc;̀u tư thực hi&ecirc;̣n giao dịch: FTIF &ndash; Templeton frontier markets fund</span></li>\r\n	<li>\r\n		Mã chứng khoán giao dịch: <a href=\\"http://finance.vinabull.com/WebPages/General_stock.aspx?MaCP=bzEuqShuMz8=\\" target=\\"_blank\\"><strong>PAC</strong></a></li>\r\n	<li>\r\n		Số lượng, tỷ lệ c&ocirc;̉ phi&ecirc;́u nắm giữ trước khi thực hi&ecirc;̣n giao dịch: 1.132.130 c&ocirc;̉ phi&ecirc;́u (5,1%)</li>\r\n	<li>\r\n		Số lượng c&ocirc;̉ phi&ecirc;́u đ&atilde; mua: 229.090 cổ phiếu</li>\r\n	<li>\r\n		Số lượng, tỷ lệ c&ocirc;̉ phi&ecirc;́u nắm giữ sau khi thực hi&ecirc;̣n giao dịch: 1.361.220 c&ocirc;̉ phi&ecirc;́u (6,13%)</li>\r\n	<li>\r\n		L&yacute; do thay đổi sở hữu: thực hiện đầu tư</li>\r\n	<li>\r\n		Phương thức giao dịch: khớp lệnh</li>\r\n	<li>\r\n		Thời gian thay đổi sở hữu v&agrave; trở th&agrave;nh cổ đ&ocirc;ng lớn: ng&agrave;y 18/11/2010</li>\r\n</ul>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (19, 3, 1, 0, 'KDC: Bản cáo bạch chào bán cp (HOSE)', 'kdc-ban-cao-bach-chao-ban-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Bản c&aacute;o bạch ch&agrave;o b&aacute;n cổ phiếu của C&ocirc;ng ty Cổ phần Kinh Đ&ocirc;</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (20, 3, 1, 0, 'TTF: Ông Tạ Văn Nam - TV.HĐQT kiêm Phó TGĐ đăng ký bán 107.500 cp (HOSE)', 'ttf-ong-ta-van-nam---tvhdqt-kiem-pho-tgd-dang-ky-ban-107500-cp-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Th&ocirc;ng b&aacute;o giao dịch cổ đ&ocirc;ng nội bộ của CTCP Tập đo&agrave;n Kỹ nghệ Gỗ Trường Th&agrave;nh</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (21, 3, 1, 0, 'PRUBF1: Thông báo về việc chào mua công khai (HOSE)', 'prubf1-thong-bao-ve-viec-chao-mua-cong-khai-hose', '', NULL, '<p>\r\n	<span class=\\"p_te8\\" id=\\"UcNewsDetail1_lblNoiDung\\" style=\\"display: inline-block; width: 500px;\\">Quỹ đầu tư C&acirc;n bằng Prudential - PRUBF1 th&ocirc;ng b&aacute;o về việc ch&agrave;o mua c&ocirc;ng khai</span></p>', '2010-12-05', NULL, 1, 1, 0);
INSERT INTO `articles` VALUES (22, 26, 1, 0, 'Bảo hiểm đầu tư ra nước ngoài: Không chạy theo trào lưu', 'bao-hiem-dau-tu-ra-nuoc-ngoai-khong-chay-theo-trao-luu', '"Đầu tư ra nước ngoài không phải chạy theo trào lưu, mà đều được các DN bảo hiểm cân nhắc, nghiên cứu kỹ lưỡng dựa trên chiến...', 'files/news/20101205/20101205162636.jpg', '<p>\r\n	<em><strong>Đ&atilde; c&oacute; những &yacute; kiến e ngại, thậm ch&iacute; l&agrave; nghi ngờ về &quot;tr&agrave;o lưu&quot; đầu tư ra nước ngo&agrave;i của c&aacute;c DN bảo hiểm phi nh&acirc;n thọ, nhất l&agrave; khi thị trường trong nước c&ograve;n m&ecirc;nh m&ocirc;ng chưa khai ph&aacute; hết. L&agrave; người trong cuộc, &ocirc;ng nhận định thế n&agrave;o về việc đầu tư ra nước ngo&agrave;i n&agrave;y?</strong></em><br />\r\n	<br />\r\n	Với sự ph&aacute;t triển kh&aacute; tốt của nền kinh tế, cộng với d&acirc;n số đ&ocirc;ng, m&ocirc;i trường hấp dẫn cho c&aacute;c dự &aacute;n đầu tư nước ngo&agrave;i, Việt Nam vẫn được đ&aacute;nh gi&aacute; l&agrave; thị trường tiềm năng cho c&aacute;c DN bảo hiểm trong v&agrave; ngo&agrave;i nước khai ph&aacute;.<br />\r\n	<br />\r\n	Tuy nhi&ecirc;n, do thực trạng chung l&agrave; c&oacute; qu&aacute; nhiều DN hoạt động tr&ecirc;n thị trường, tr&igrave;nh độ nhận thức của người d&acirc;n về bảo hiểm chưa cao, n&ecirc;n sự ph&aacute;t triển của c&aacute;c DN bảo hiểm tại Việt Nam c&ograve;n rất hạn chế. T&igrave;nh h&igrave;nh cạnh tranh giữa c&aacute;c DN l&agrave; kh&aacute; gay gắt, bao gồm cả c&aacute;c h&igrave;nh thức cạnh tranh phi kỹ thuật như hạ ph&iacute;, hạ mức khấu trừ, mở rộng điều khoản điều kiện&hellip; Mở rộng đầu tư ra ngo&agrave;i thị trường Việt Nam l&agrave; một hướng đi mới v&agrave; c&oacute; thể coi l&agrave; một xu hướng tất yếu của c&aacute;c DN bảo hiểm nhằm khai th&aacute;c c&aacute;c thị trường mới nổi, c&oacute; nhiều cơ hội, v&agrave; đang rộng mở đối với c&aacute;c NĐT.<br />\r\n	<br />\r\n	<em><strong>Ngo&agrave;i c&aacute;c NĐT l&agrave; DN bảo hiểm Việt Nam, thị trường bảo hiểm Campuchia c&oacute; hấp dẫn c&aacute;c NĐT nước ngo&agrave;i kh&ocirc;ng, thưa &ocirc;ng?</strong></em><br />\r\n	<br />\r\n	Hiện nay, thị trường bảo hiểm Campuchia c&oacute; 6 DN bảo hiểm v&agrave; 1 DN t&aacute;i bảo hiểm. Ngo&agrave;i C&ocirc;ng ty T&aacute;i bảo hiểm Quốc gia Campuchia v&agrave; C&ocirc;ng ty Bảo hiểm Quốc gia Campuchia (Caminco) c&oacute; 100% vốn trong nước, c&aacute;c DN c&ograve;n lại đều c&oacute; vốn g&oacute;p nước ngo&agrave;i: CVI l&agrave; c&ocirc;ng ty bảo hiểm c&oacute; 80% vốn đầu tư từ Việt Nam; Asia Insurance (Cambodia) c&oacute; vốn g&oacute;p giữa c&aacute;c li&ecirc;n doanh bảo hiểm của Hồng K&ocirc;ng, Th&aacute;i Lan, Indonesia; Campubank Longpac l&agrave; c&ocirc;ng ty của Malaysia; Forte c&oacute; vốn g&oacute;p của Singapore; Infinity Insurance l&agrave; c&ocirc;ng ty li&ecirc;n doanh của một tập đo&agrave;n kinh tế trong nước v&agrave; nước ngo&agrave;i. Điều n&agrave;y chứng tỏ thị trường bảo hiểm Campuchia kh&aacute; hấp dẫn c&aacute;c NĐT nước ngo&agrave;i.<br />\r\n	<br />\r\n	B&ecirc;n cạnh lĩnh vực bảo hiểm h&agrave;ng kh&ocirc;ng v&agrave; xe cơ giới, nh&oacute;m sản phẩm bảo hiểm t&agrave;i sản kỹ thuật cũng sẽ l&agrave; một lĩnh vực tiềm năng đối với c&aacute;c DN bảo hiểm khi gia nhập thị trường Campuchia.<br />\r\n	<br />\r\n	<em><strong>Theo &ocirc;ng, kh&oacute; khăn lớn nhất của c&aacute;c DN bảo hiểm Việt Nam khi th&acirc;m nhập thị trường n&agrave;y l&agrave; g&igrave;?<br />\r\n	</strong></em><br />\r\n	Thứ nhất, về năng lực bảo hiểm, đa phần DN bảo hiểm hiện đang hoạt động tại Campuchia đều c&oacute; vốn g&oacute;p của c&aacute;c c&ocirc;ng ty bảo hiểm nước ngo&agrave;i. Do đ&oacute;, họ nhận được sự hỗ trợ rất lớn từ c&ocirc;ng ty mẹ ở nước sở tại trong việc cung cấp năng lực bảo hiểm để chấp nhận c&aacute;c rủi ro tại thị trường Campuchia. B&ecirc;n cạnh đ&oacute;, c&aacute;c DN n&agrave;y cũng đ&atilde; c&oacute; thời gian hoạt động kh&aacute; l&acirc;u tại Campuchia, n&ecirc;n hiểu r&otilde; đặc th&ugrave; rủi ro của thị trường, từ đ&oacute; c&oacute; được c&aacute;c điều kiện điều khoản ph&ugrave; hợp hơn.<br />\r\n	<br />\r\n	Đối với c&aacute;c DN Việt Nam, năng lực bảo hiểm chủ yếu phụ thuộc v&agrave;o c&aacute;c c&ocirc;ng ty t&aacute;i bảo hiểm nước ngo&agrave;i, đặc điểm thị trường mới n&ecirc;n rất kh&oacute; để thu xếp được chương tr&igrave;nh bảo hiểm/t&aacute;i bảo hiểm đủ sức cạnh tranh với c&aacute;c DN cũ, đặc biệt l&agrave; đối với những dự &aacute;n lớn.<br />\r\n	<br />\r\n	Thứ hai, về việc thiết lập hệ thống mạng lưới kinh doanh. Tại Việt Nam, 1 c&ocirc;ng ty bảo hiểm c&oacute; thể c&oacute; nhiều chi nh&aacute;nh v&agrave; c&oacute; mạng lưới đại l&yacute; rộng khắp cả nước. Việc khai th&aacute;c c&aacute;c dịch vụ b&aacute;n lẻ như xe cơ giới, con người chủ yếu dựa v&agrave;o mạng lưới n&agrave;y. Nhưng ở Campuchia, để được hoạt động với tư c&aacute;ch l&agrave; đại l&yacute; bảo hiểm, c&aacute; nh&acirc;n hoặc tổ chức phải được Bộ Kinh tế T&agrave;i ch&iacute;nh nước n&agrave;y cấp giấy ph&eacute;p hoạt động, phải đăng k&yacute; m&atilde; số thuế v&agrave; phải k&yacute; quỹ 10.000 USD tại Ng&acirc;n h&agrave;ng Trung ương Campuchia trong suốt thời gian hoạt động. Điều n&agrave;y sẽ hạn chế việc mở rộng mạng lưới đại l&yacute; của c&aacute;c c&ocirc;ng ty bảo hiểm, ảnh hưởng đến nguồn doanh thu từ hoạt động đại l&yacute; cho c&aacute;c DN bảo hiểm n&oacute;i ri&ecirc;ng v&agrave; doanh thu của to&agrave;n thị trường bảo hiểm n&oacute;i chung.<br />\r\n	<br />\r\n	Thứ ba, sự kh&aacute;c biệt về ng&ocirc;n ngữ v&agrave; tập qu&aacute;n kinh doanh cũng l&agrave; một kh&oacute; khăn kh&aacute; lớn cho c&aacute;c DN Việt Nam khi bắt đầu kinh doanh tại thị trường Campuchia. Sự kh&aacute;c biệt giữa hệ thống luật ph&aacute;p v&agrave; tập qu&aacute;n kinh doanh cũng y&ecirc;u cầu c&aacute;c DN Việt Nam phải c&oacute; sự nghi&ecirc;n cứu kỹ c&aacute;c văn bản ph&aacute;p luật c&oacute; li&ecirc;n quan, cũng như c&oacute; sự linh hoạt trong hoạt động cho ph&ugrave; hợp với đặc th&ugrave; của thị trường.<br />\r\n	<br />\r\n	<em><strong>CVI được trợ gi&uacute;p rất nhiều từ c&aacute;c mối quan hệ kh&aacute;ch h&agrave;ng của BIDV. Nếu kh&ocirc;ng c&oacute; sự trợ gi&uacute;p n&agrave;y th&igrave; sao, thưa &ocirc;ng?<br />\r\n	</strong></em><br />\r\n	Kh&ocirc;ng thể phủ nhận để c&oacute; những bước đi bắt đầu vững chắc như ng&agrave;y h&ocirc;m nay của CVI l&agrave; nhờ rất lớn v&agrave;o sự hậu thuẫn của BIDV v&agrave; sự hỗ trợ đắc lực về mặt nghiệp vụ bảo hiểm của BIC.<br />\r\n	<br />\r\n	CVI đ&atilde; nhận được sự ủng hộ rất lớn từ c&aacute;c mối quan hệ của BIDV, đ&oacute; l&agrave; những thuận lợi gi&uacute;p CVI c&oacute; nền tảng v&agrave; điểm tựa mạnh trong giai đoạn khởi đầu. Nhưng t&ocirc;i cho rằng, để tồn tại v&agrave; trụ vững tr&ecirc;n thị trường, đặc biệt l&agrave; khi cuộc cạnh tranh đang thực sự bắt đầu, th&igrave; điểm tựa tốt kh&ocirc;ng phải l&agrave; tất cả.<br />\r\n	<br />\r\n	Những dự &aacute;n của c&aacute;c NĐT Việt Nam v&agrave;o thị trường Campuchia th&ocirc;ng qua sự hỗ trợ của ng&acirc;n h&agrave;ng cũng mới chỉ ở giai đoạn đầu, chưa ph&aacute;t sinh doanh thu cho bảo hiểm. CVI đ&atilde; phải tự vận động t&igrave;m kiếm những kh&aacute;ch h&agrave;ng lớn, c&oacute; quan hệ với c&aacute;c cổ đ&ocirc;ng g&oacute;p vốn kh&aacute;c như H&atilde;ng h&agrave;ng kh&ocirc;ng Quốc gia Campuchia, C&ocirc;ng ty Cavifoods, Ng&acirc;n h&agrave;ng Canadian Bank&hellip; C&aacute;c kh&aacute;ch h&agrave;ng n&agrave;y đ&atilde; lựa chọn CVI v&agrave; đang tiếp tục t&iacute;n nhiệm CVI cho c&aacute;c hợp đồng bảo hiểm tiếp sau đ&oacute;. Ch&uacute;ng t&ocirc;i đang trưởng th&agrave;nh v&agrave; tự cạnh tranh bằng ch&iacute;nh năng lực v&agrave; chất lượng dịch vụ bảo hiểm của m&igrave;nh.</p>', '2010-12-05', '2010-12-05', 1, 0, 0);
INSERT INTO `articles` VALUES (23, 10, 1, 0, 'Tôm VN tiếp tục bị áp thuế', 'tom-vn-tiep-tuc-bi-ap-thue', 'Bộ Thương mại Mỹ (DOC) vừa công bố tiếp tục áp thuế chống bán phá giá đối với tôm nước ấm đông lạnh từ VN.', 'files/news/20101206/20101206214249.jpg', '<div align="justify">\r\n	<p>\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">Theo kết quả cuối c&ugrave;ng của đợt xem x&eacute;t c&ocirc;ng bố cuối th&aacute;ng 11 (gọi l&agrave; r&agrave; so&aacute;t ho&agrave;ng h&ocirc;n) vừa qua, c&aacute;c doanh nghiệp trong danh s&aacute;ch chịu mức thuế chống b&aacute;n ph&aacute; gi&aacute; thấp nhất l&agrave; 4,3-5,24%, doanh nghiệp c&ograve;n lại chịu mức thuế suất to&agrave;n quốc l&agrave; 25,76%.<br />\r\n		<br />\r\n		L&yacute; do DOC tiếp tục &aacute;p thuế chống b&aacute;n ph&aacute; gi&aacute; với t&ocirc;m VN l&agrave; v&igrave; việc gỡ bỏ thuế chống ph&aacute; gi&aacute; đối với t&ocirc;m đ&ocirc;ng lạnh của VN c&oacute; thể dẫn tới việc t&aacute;i diễn t&igrave;nh trạng b&aacute;n ph&aacute; gi&aacute;.<br />\r\n		<br />\r\n		Theo quy định của Tổ chức Thương mại thế giới, sau mỗi năm năm kể từ khi đ&aacute;nh thuế chống b&aacute;n ph&aacute; gi&aacute;, cơ quan thẩm quyền của nước nhập khẩu phải tiến h&agrave;nh r&agrave; so&aacute;t ho&agrave;ng h&ocirc;n, tức l&agrave; đ&aacute;nh gi&aacute; v&agrave; x&aacute;c định liệu việc hủy bỏ thuế chống b&aacute;n ph&aacute; gi&aacute; đối với sản phẩm nhập khẩu c&oacute; ảnh hưởng hoặc g&acirc;y thiệt hại đến ng&agrave;nh sản xuất trong nước hay kh&ocirc;ng.<br />\r\n		<br />\r\n		Nếu x&eacute;t thấy h&agrave;ng h&oacute;a nhập khẩu kh&ocirc;ng hoặc chỉ g&acirc;y thiệt hại kh&ocirc;ng đ&aacute;ng kể th&igrave; phải hủy bỏ việc &aacute;p dụng thuế chống b&aacute;n ph&aacute; gi&aacute; đối với sản phẩm nhập khẩu đ&oacute;.<br />\r\n		<br />\r\n		Với quyết định mới n&agrave;y của DOC, VN lại mất năm năm nữa mới c&oacute; cơ hội được hủy bỏ thuế chống b&aacute;n ph&aacute; gi&aacute;, đồng thời vẫn phải tiếp tục vụ kiện Mỹ tại Tổ chức Thương mại thế giới. </span></p>\r\n	<p style="text-align: right;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">(Theo TT)</span></p>\r\n</div>', '2010-12-06', '2010-12-06', 1, 0, 0);
INSERT INTO `articles` VALUES (24, 10, 1, 0, 'Tranh nhau mua xăng, dầu Dung Quất', 'tranh-nhau-mua-xang-dau-dung-quat', 'Do tình hình ngoại tệ khan hiếm, các doanh nghiệp kinh doanh xăng dầu trong nước đang xếp hàng để mua sản phẩm từ Nhà máy Lọc dầu Dung Quất.', 'files/news/20101206/20101206215203.jpg', '<p>\r\n	<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">So với thời điểm tồn kho cực đỉnh 256.000 tấn, hiện xăng dầu tại Dung Quất chỉ c&ograve;n khoảng 100.000 tấn trong kho. Con số n&agrave;y được coi l&agrave; mức tồn tối ưu của nh&agrave; m&aacute;y. Tổng gi&aacute;m đốc C&ocirc;ng ty B&igrave;nh Sơn - đơn vị tiếp nhận khai th&aacute;c v&agrave; kinh doanh dự &aacute;n Dung Quất - Nguyễn Ho&agrave;i Giang cho biết: &quot;Ch&uacute;ng t&ocirc;i đang vận h&agrave;nh nh&agrave; m&aacute;y với c&ocirc;ng suất 100%-105% mới đ&aacute;p ứng được nhu cầu ti&ecirc;u thụ trong nước&quot;.<br />\r\n	<br />\r\n	&Ocirc;ng Giang cho biết so với thời điểm sản phẩm tồn trong kho ở mức cao nhất, xăng dầu sản xuất tại Nh&agrave; m&aacute;y Dung Quất đ&atilde; ti&ecirc;u thụ được một nửa. Do vấn đề cung ứng ngoại tệ gặp kh&oacute; khăn n&ecirc;n rất nhiều doanh nghiệp đang xếp h&agrave;ng đặt mua xăng tại nh&agrave; m&aacute;y. Trong đ&oacute;, 3 đối t&aacute;c lớn nhất l&agrave; Petrolimex, PV Oil v&agrave; Petec.<br />\r\n	<br />\r\n	Theo &ocirc;ng Giang, việc khan hiếm ngoại tệ c&ugrave;ng với biến động tỷ gi&aacute; khiến nhu cầu ti&ecirc;u thụ xăng dầu từ Dung Quất sẽ tăng đột biến trong thời gian tới, thậm ch&iacute; c&oacute; thể dẫn tới căng thẳng nguồn cung.<br />\r\n	<br />\r\n	Ri&ecirc;ng xăng m&aacute;y bay ZA1, ph&iacute;a Dung Quất đang x&uacute;c tiến c&aacute;c thủ tục về ti&ecirc;u chuẩn để cung cấp sản phẩm cho nh&agrave; cung ứng xăng dầu h&agrave;ng kh&ocirc;ng theo đ&uacute;ng thỏa thuận đ&atilde; k&yacute;. Gi&aacute;m đốc C&ocirc;ng ty Xăng dầu H&agrave;ng kh&ocirc;ng Vinapco Trần Hữu Ph&uacute;c cho biết: &quot;Ch&uacute;ng t&ocirc;i lu&ocirc;n sẵn s&agrave;ng ti&ecirc;u thụ sản phẩm xăng dầu trong nước. Hợp đồng k&yacute; kết giữa Vinapco v&agrave; Dung Quất đ&atilde; k&yacute;, ch&uacute;ng t&ocirc;i chỉ chờ mỗi giấy chứng nhận hợp chuẩn&quot;.<br />\r\n	<br />\r\n	Theo &ocirc;ng Ph&uacute;c, trong bối cảnh căng thẳng ngoại tệ như hiện nay, việc mua sản phẩm trong nước l&agrave; lựa chọn tối ưu. Vấn đề biến động tỷ gi&aacute; theo đ&oacute; cũng sẽ được giải quyết.<br />\r\n	<br />\r\n	Hồi th&aacute;ng 10, dư luận bắt đầu ầm ĩ chuyện Nh&agrave; m&aacute;y Lọc dầu Dung Quất tồn h&agrave;ng trăm ngh&igrave;n tấn xăng dầu c&aacute;c loại, d&ugrave; rằng trong nước c&oacute; tới 11 nh&agrave; nhập khẩu v&agrave; ph&acirc;n phối. Tại thời điểm ấy, Bộ C&ocirc;ng Thương đ&atilde; phải nhiều lần tổ chức họp c&aacute;c b&ecirc;n để vận động doanh nghiệp trong nước chung tay ti&ecirc;u thụ sản phẩm xăng dầu nội địa. Đến đầu th&aacute;ng 11, bản thỏa thuận giữa Dung Quất với 4 nh&agrave; ti&ecirc;u thụ lớn gồm Petrolimex, Petec, PV Oil v&agrave; Vinapco được k&yacute; kết.<br />\r\n	<br />\r\n	Theo thỏa thuận k&yacute; kết, ph&iacute;a Petrolimex sẽ ti&ecirc;u thụ khoảng 2 triệu m3 sản phẩm cho Nh&agrave; m&aacute;y Lọc dầu Dung Quất, PV Oil 1,5 triệu m3, Petec 1 triệu m3, Vinapco 200.000 m3. Như vậy, tổng khối lượng m&agrave; 4 đơn vị n&agrave;y nhận ti&ecirc;u thụ l&agrave; 4,7 triệu m3 sản phẩm c&aacute;c loại, gồm xăng A92, A95, dầu diezel, xăng m&aacute;y bay Z1 v&agrave; dầu nhi&ecirc;n liệu FO. </span></p>', '2010-12-06', '2010-12-06', 1, 0, 0);
INSERT INTO `articles` VALUES (25, 10, 1, 0, 'Da giày với mục tiêu xuất khẩu 9,1 tỷ USD năm 2015', 'da-giay-voi-muc-tieu-xuat-khau-91-ty-usd-nam-2015', 'Năm 2010, ngành da giày Việt Nam đã có tốc độ tăng trưởng khá mạnh với kim ngạch xuất khẩu 10 tháng đạt 4,06 tỷ USD, gần bằng với kim ngạch cả năm 2009 và đạt mức tăng trưởng tới 24,8%, xếp hạng...', 'files/news/20101206/20101206215259.jpg', '<p>\r\n	<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">Chiến lược ph&aacute;t triển ng&agrave;nh gi&agrave;y Việt Nam vừa được Ban chấp h&agrave;nh Hiệp hội Da gi&agrave;y Việt Nam (Lefaso) x&acirc;y dựng nổi bật 2 nội dung lớn.<br />\r\n	<br />\r\n	Một l&agrave; chuyển từ thế chỉ sản xuất cho xuất khẩu sang thế c&acirc;n bằng giữa xuất khẩu v&agrave; ti&ecirc;u thụ nội địa. &Ocirc;ng Diệp Th&agrave;nh Kiệt, Ph&oacute; chủ tịch Hiệp hội ph&acirc;n t&iacute;ch, nh&igrave;n v&agrave;o bảng số liệu thống k&ecirc; 12 nước sản xuất gi&agrave;y trong khu vực ch&acirc;u &Aacute; năm 2009 của Tổ chức Satra, phần lớn c&aacute;c nước c&oacute; sự c&acirc;n bằng giữa sản xuất v&agrave; ti&ecirc;u thụ trong nước.<br />\r\n	<br />\r\n	Trong khi đ&oacute;, t&iacute;nh đến thời điểm hiện nay, tỷ lệ lượng gi&agrave;y d&eacute;p xuất khẩu so với tổng số sản xuất của Việt Nam l&agrave; 92,3%. Ngay cả những nước c&oacute; ho&agrave;n cảnh gần giống Việt Nam th&igrave; tỷ lệ xuất khẩu/ti&ecirc;u thụ nội địa thấp hơn rất nhiều, chẳng hạn như của Th&aacute;i Lan l&agrave; 42,5%, Indonesia 40,5%, Malaysia 37,9%, c&aacute; biệt c&oacute; Phillippines 5,4%, Pakistan 7,3%.<br />\r\n	<br />\r\n	Nội dung lớn thứ hai ch&iacute;nh l&agrave; phải nhanh ch&oacute;ng giảm tỷ lệ gia c&ocirc;ng đối với gi&agrave;y d&eacute;p xuất khẩu. Tỷ lệ n&agrave;y hiện đang được c&aacute;c chuy&ecirc;n gia đ&aacute;nh gi&aacute; l&agrave; rất cao, cụ thể l&agrave; tr&ecirc;n 50% trong cả ng&agrave;nh v&agrave; l&ecirc;n đến 70% đối với c&aacute;c doanh nghiệp c&oacute; vốn trong nước.<br />\r\n	<br />\r\n	Cũng theo Hiệp hội, ng&agrave;nh da gi&agrave;y Việt Nam trong qu&aacute; khứ đ&atilde; cho thấy lu&ocirc;n c&oacute; một sức bật rất tốt, con số giảm kim ngạch xuất khẩu 14,7% (đạt 4,07 tỷ USD năm 2009) vẫn được xem l&agrave; con số lạc quan so với dự b&aacute;o của nhiều chuy&ecirc;n gia l&agrave; phải giảm hơn 20%, khi bị c&aacute;c đ&ograve;n gi&aacute;ng từ việc t&aacute;i &aacute;p thuế chống b&aacute;n ph&aacute; gi&aacute; đối với gi&agrave;y mũ da v&agrave; việc b&atilde;i bỏ ch&iacute;nh s&aacute;ch ưu đ&atilde;i thuế quan (GSP) từ EU, vốn l&agrave; thị trường của gần 60% năng lực xuất khẩu qua nhiều năm.<br />\r\n	<br />\r\n	Tuy nhi&ecirc;n, từ 6 th&aacute;ng cuối năm 2009 đến nay, nhiều l&ocirc; h&agrave;ng gi&agrave;y d&eacute;p xuất khẩu từ Việt Nam đ&atilde; được chuyển hướng sang thị trường Hoa Kỳ, v&agrave; việc xuất khẩu v&agrave;o EU tuy c&oacute; giảm, nhưng Việt Nam vẫn l&agrave; nước sản xuất lớn thứ 3 ở ch&acirc;u &Aacute; v&agrave; thứ 4 tr&ecirc;n to&agrave;n thế giới (sau Brazil).<br />\r\n	<br />\r\n	C&ograve;n về xuất khẩu, kể cả tại ch&acirc;u &Aacute; v&agrave; tr&ecirc;n thế giới, ng&agrave;nh gi&agrave;y Việt Nam chỉ đứng sau Trung Quốc v&agrave; với sản lượng gấp 2,5 lần nước xuất khẩu thứ 3 (Italia). Hiện nay, cứ 100 đ&ocirc;i gi&agrave;y được sản xuất tr&ecirc;n thế giới th&igrave; c&oacute; 4,14 đ&ocirc;i mang nh&atilde;n &ldquo;Made in Vietnam&rdquo;.<br />\r\n	<br />\r\n	Ng&agrave;y 25/11, Bộ trưởng Bộ C&ocirc;ng Thương đ&atilde; k&yacute; Quyết định số 6209/QĐ-BCT ph&ecirc; duyệt Quy hoạch tổng thể ph&aacute;t triển ng&agrave;nh da - gi&agrave;y Việt Nam đến năm 2020, tầm nh&igrave;n đến năm 2025. Mục ti&ecirc;u chung ph&aacute;t triển đến năm 2020 l&agrave; x&acirc;y dựng ng&agrave;nh da gi&agrave;y trở th&agrave;nh một ng&agrave;nh c&ocirc;ng nghiệp xuất khẩu mũi nhọn quan trọng của nền kinh tế, tiếp tục giữ vị tr&iacute; trong nh&oacute;m c&aacute;c nước sản xuất v&agrave; xuất khẩu c&aacute;c sản phẩm da gi&agrave;y h&agrave;ng đầu thế giới v&agrave; tạo th&ecirc;m nhiều việc l&agrave;m cho x&atilde; hội tr&ecirc;n cơ sở thu nhập của người lao động ng&agrave;y c&agrave;ng được n&acirc;ng cao, thực hiện tr&aacute;ch nhiệm x&atilde; hội ng&agrave;y c&agrave;ng tốt, số lượng lao động được qua đ&agrave;o tạo ng&agrave;y c&agrave;ng tăng.<br />\r\n	<br />\r\n	Với tốc độ tăng trưởng dự kiến, kim ngạch xuất khẩu của to&agrave;n ng&agrave;nh năm 2015 l&agrave; 9,1 tỷ USD, năm 2020 l&agrave; 14,5 tỷ USD v&agrave; năm 2025 đạt 21 tỷ USD. Đồng thời, n&acirc;ng dần tỷ lệ nội địa ho&aacute; c&aacute;c loại sản phẩm l&agrave; một trong những vấn đề được quan t&acirc;m đặc biệt trong qu&aacute; tr&igrave;nh x&acirc;y dựng Quy hoạch trong giai đoạn 2020, tầm nh&igrave;n 2025, trong đ&oacute; phấn đấu năm 2015 tỷ lệ nội địa ho&aacute; đạt 60 - 65%, năm 2020 đạt 75 - 80 % v&agrave; năm 2025 đạt 80 - 85%.<br />\r\n	<br />\r\n	Trong Quy hoạch, gi&agrave;y d&eacute;p vẫn l&agrave; sản phẩm chủ lực của ng&agrave;nh, song sẽ quan t&acirc;m đến việc sản xuất giầy d&eacute;p da thời trang v&agrave; cặp - t&uacute;i - v&iacute; chất lượng cao phục vụ thị trường mới, thị trường cao cấp v&agrave; thị trường nội địa. Đối với sản phẩm da thuộc, ng&agrave;nh sẽ tập trung sản xuất da thuộc với c&ocirc;ng nghệ ti&ecirc;n tiến, th&acirc;n thiện với m&ocirc;i trường. Đầu tư sản xuất da thuộc được gắn liền với việc ph&aacute;t triển đ&agrave;n gia s&uacute;c g&oacute;p phần giảm nhập si&ecirc;u v&agrave; chủ động trong sản xuất.<br />\r\n	<br />\r\n	Theo quyết định tr&ecirc;n, đến năm 2020, tầm nh&igrave;n đến năm 2025, ng&agrave;nh da giầy Việt Nam sẽ ph&aacute;t triển tr&ecirc;n cơ sở ph&ugrave; hợp c&aacute;c quy định hiện h&agrave;nh về c&ocirc;ng t&aacute;c quy hoạch. To&agrave;n ng&agrave;nh vẫn duy tr&igrave; định hướng chủ động phục vụ xuất khẩu v&agrave; chiếm lĩnh dần thị trường nội địa, ph&aacute;t triển mạnh sản xuất nguy&ecirc;n phụ liệu v&agrave; c&ocirc;ng nghiệp hỗ trợ, tham gia s&acirc;u v&agrave;o chuỗi gi&aacute; trị gia tăng của thị trường sản phẩm da giầy thế giới. Ph&aacute;t triển ng&agrave;nh da gi&agrave;y Việt Nam nhằm tạo ra năng suất lao động v&agrave; hiệu quả kinh tế cao, chủ động hội nhập kinh tế với khu vực v&agrave; thế giới.<br />\r\n	<br />\r\n	Điểm mới của quy hoạch giai đoạn đến năm 2020, tầm nh&igrave;n đến năm 2025 l&agrave; việc quan t&acirc;m đến việc năng cao khả năng thiết kế mẫu m&atilde; sản phẩm v&agrave; ph&aacute;t triển nguồn nh&acirc;n lực trong lĩnh vực da giầy n&oacute;i chung v&agrave; thời trang n&oacute;i ri&ecirc;ng. Một số khu, cụm c&ocirc;ng nghiệp sản xuất da giầy sẽ được x&acirc;y dựng để sản xuất nguy&ecirc;n phụ liệu v&agrave; xử l&yacute; m&ocirc;i trường tập trung tr&ecirc;n cơ sở lợi thế về hạ tầng v&agrave; lao động để chủ động cung cấp nguy&ecirc;n phụ liệu, n&acirc;ng cao năng lực cạnh tranh cho ng&agrave;nh v&agrave; x&acirc;y dựng mới v&agrave; ph&aacute;t triển c&aacute;c cơ sở đ&agrave;o tạo, c&aacute;c cơ sở nghi&ecirc;n cứu khoa học c&ocirc;ng nghệ, c&aacute;c trung t&acirc;m kiểm định, dịch vụ ng&agrave;nh v&agrave; c&aacute;c trung t&acirc;m x&uacute;c tiến thương mại, trung t&acirc;m thời trang ở trong nước v&agrave; nước ngo&agrave;i l&agrave; những định hướng c&oacute; t&iacute;nh l&acirc;u d&agrave;i nhằm ph&aacute;t triển ng&agrave;nh theo hướng ổn định v&agrave; bền vững.<br />\r\n	<br />\r\n	Với quy hoạch theo v&ugrave;ng l&atilde;nh thổ, bố tr&iacute; sản xuất v&agrave; đầu tư của ng&agrave;nh da gi&agrave;y tr&ecirc;n to&agrave;n quốc được x&aacute;c định th&agrave;nh 4 v&ugrave;ng chủ yếu gồm v&ugrave;ng Đồng bằng s&ocirc;ng Hồng, v&ugrave;ng Đ&ocirc;ng Nam Bộ, v&ugrave;ng Bắc Trung Bộ v&agrave; Duy&ecirc;n hải miền Trung, v&ugrave;ng đồng bằng S&ocirc;ng Cửu Long.</span></p>', '2010-12-06', '2010-12-06', 1, 0, 0);
INSERT INTO `articles` VALUES (26, 10, 1, 0, 'Giảm mạnh thuế nhập khẩu xăng dầu', 'giam-manh-thue-nhap-khau-xang-dau', 'Ngày 1/12, Bộ Tài chính ban hành Thông tư số 190/2010/TT-BTC hướng dẫn thực hiện mức thuế suất thuế nhập khẩu ưu đãi đối với một số mặt hàng xăng dầu thuộc nhóm 2710 tại Biểu thuế nhập khẩu ưu đãi.', 'files/news/20101206/20101206215350.jpg', '<p>\r\n	Theo đ&oacute;, mức thuế suất thuế nhập khẩu ưu đ&atilde;i đối với một số mặt h&agrave;ng xăng, dầu thuộc nh&oacute;m 2710 thực hiện theo quy định tại th&ocirc;ng tư n&agrave;y, b&atilde;i bỏ quy định về mức thuế suất thuế nhập khẩu ưu đ&atilde;i đối với một số mặt h&agrave;ng xăng, dầu thuộc nh&oacute;m 2710 quy định tại Th&ocirc;ng tư 184/2010/TT-BTC ng&agrave;y 15/11/2010 của Bộ T&agrave;i ch&iacute;nh quy định mức thuế suất của Biểu thuế xuất khẩu, Biểu thuế nhập khẩu ưu đ&atilde;i theo danh mục mặt h&agrave;ng chịu thuế.<br />\r\n	<br />\r\n	Mức thuế nhập khẩu c&aacute;c mặt h&agrave;ng xăng theo th&ocirc;ng tư mới được giảm từ 17% xuống c&ograve;n 12%; nhiều mặt h&agrave;ng dầu v&agrave; diesel giảm từ 10% xuống c&ograve;n 5%.<br />\r\n	<br />\r\n	Th&ocirc;ng tư n&agrave;y c&oacute; hiệu lực thi h&agrave;nh kể từ ng&agrave;y 1/12/2010 v&agrave; thay thế Th&ocirc;ng tư số 59/2010/TT-BTC ng&agrave;y 19/4/2010 của Bộ T&agrave;i ch&iacute;nh hướng dẫn thực hiện mức thuế suất thuế nhập khẩu ưu đ&atilde;i đối với một số mặt h&agrave;ng thuộc nh&oacute;m 2710 tại Biểu thuế nhập khẩu ưu đ&atilde;i.<br />\r\n	<br />\r\n	Kể từ ng&agrave;y 1/1/2011, mức thuế suất thuế nhập khẩu ưu đ&atilde;i đối với một số mặt h&agrave;ng xăng, dầu thuộc nh&oacute;m 2710 tiếp tục thực hiện theo quy định tại th&ocirc;ng tư n&agrave;y.</p>\r\n<p style="text-align: right;">\r\n	(Theo vneconomy</p>', '2010-12-06', '2010-12-06', 1, 0, 0);
INSERT INTO `articles` VALUES (27, 10, 1, 0, 'Có thể ''''thả'''' giá điện, than trong năm 2011', 'co-the-tha-gia-dien-than-trong-nam-2011', 'Lộ trình điều chỉnh giá điện, than, khí, nước sạch... theo cơ chế thị trường có thể được thực hiện vào năm 2011, theo đề án điều hành giá đang được Bộ Tài chính xây dựng.', 'files/news/20101206/20101206215438.jpg', '<div align="justify">\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">Theo Bộ T&agrave;i ch&iacute;nh, năm 2011 c&oacute; rất nhiều yếu tố kh&aacute;ch quan t&aacute;c động tới mặt bằng gi&aacute; như khủng hoảng nợ c&ocirc;ng của khối EU, tỷ gi&aacute;, l&atilde;i suất biến động, thương mại to&agrave;n cầu thấp, thi&ecirc;n tai dịch bệnh diễn biến phức tạp...<br />\r\n		<br />\r\n		Tại thị trường trong nước, kinh tế Việt Nam phục hồi nhanh khiến nhu cầu nguy&ecirc;n vật liệu cao để phục vụ tăng trưởng. B&ecirc;n cạnh đ&oacute;, những yếu k&eacute;m vốn c&oacute; của nền kinh tế chưa được khắc phục triệt để như chất lượng tăng trưởng, hiệu quả sử dụng vốn... Điều n&agrave;y tiềm ẩn những yếu tố g&acirc;y lạm ph&aacute;t cao v&agrave; bất ổn kinh tế vĩ m&ocirc;.<br />\r\n		<br />\r\n		Do vậy, Bộ T&agrave;i ch&iacute;nh đề xuất 5 giải ph&aacute;p điều h&agrave;nh gi&aacute; cả năm 2011 trong đ&oacute; c&oacute; việc thực hiện lộ tr&igrave;nh gi&aacute; thị trường đối với một số h&agrave;ng h&oacute;a dịch vụ m&agrave; nh&agrave; nước c&ograve;n định gi&aacute; như điện, than, nước sinh hoạt, gi&aacute; thuốc... Đối với mặt h&agrave;ng xăng dầu, cơ quan n&agrave;y sẽ &aacute;p dụng c&aacute;c c&ocirc;ng cụ linh hoạt để điều h&agrave;nh như sử dụng thuế, quỹ b&igrave;nh ổn v&agrave; ph&iacute;...<br />\r\n		<br />\r\n		Trong phương &aacute;n điều h&agrave;nh gi&aacute; của m&igrave;nh, Bộ T&agrave;i ch&iacute;nh đề xuất cần chủ động thực hiện lộ tr&igrave;nh điều chỉnh gi&aacute; một số mặt h&agrave;ng thiết yếu như than, điện v&agrave;o thời điểm hợp l&yacute;. Lộ tr&igrave;nh n&agrave;y phải được gắn với hệ thống cung ứng h&agrave;ng h&oacute;a, dịch vụ ho&agrave;n chỉnh, giảm chi ph&iacute; sản xuất v&agrave; gi&aacute; th&agrave;nh. Việc &quot;thả&quot; gi&aacute; theo thị trường n&agrave;y phải gắn với cơ chế trợ gi&uacute;p hợp l&yacute; đối với c&aacute;c hộ ti&ecirc;u d&ugrave;ng c&oacute; điều kiện kh&oacute; khăn, đối tượng ch&iacute;nh s&aacute;ch...<br />\r\n		<br />\r\n		Cục trưởng Cục Quản l&yacute; Gi&aacute; - Nguyễn Tiến Thỏa khẳng định từ nay đến cuối năm sẽ tiếp tục giữ ổn định gi&aacute; nhiều nh&oacute;m mặt h&agrave;ng quan trọng, trong đ&oacute; c&oacute; than, điện. Tuy nhi&ecirc;n, năm 2011, gi&aacute; những mặt h&agrave;ng như điện, than... sẽ c&oacute; sự điều chỉnh ph&ugrave; hợp. Thời gian n&agrave;o, c&aacute;c mức điều chỉnh ra sao sẽ được c&aacute;c cơ quan chức năng t&iacute;nh to&aacute;n kỹ để t&aacute;c động thấp nhất đến người ti&ecirc;u d&ugrave;ng. B&ecirc;n cạnh đ&oacute;, Bộ cũng thực hiện một loạt c&aacute;c biện ph&aacute;p kiểm so&aacute;t yếu tố h&igrave;nh th&agrave;nh gi&aacute; v&agrave; y&ecirc;u cầu ni&ecirc;m yết c&ocirc;ng khai gi&aacute; nhiều nh&oacute;m h&agrave;ng h&oacute;a.<br />\r\n		<br />\r\n		Hiện nay, Tập đo&agrave;n Than v&agrave; Kho&aacute;ng sản VN (Vinacomin) đ&atilde; c&oacute; văn bản đề xuất tăng gi&aacute; b&aacute;n than cho 4 hộ ti&ecirc;u thụ lớn như giấy, ph&acirc;n b&oacute;n, điện v&agrave; xi măng từ năm 2011.<br />\r\n		<br />\r\n		Ri&ecirc;ng đối với gi&aacute; than b&aacute;n cho điện, tập đo&agrave;n n&agrave;y đề nghị được điều chỉnh theo 2 bước để t&aacute;c động thấp nhất đến việc tăng gi&aacute; điện. Vinacomin ước t&iacute;nh phương &aacute;n tăng gi&aacute; than sẽ t&aacute;c động tới gi&aacute; điện khoảng 2,4-2,6%.<br />\r\n		<br />\r\n		Kh&ocirc;ng chỉ gi&aacute; than, Tập đo&agrave;n Điện lực VN (EVN) cũng đang x&acirc;y dựng gi&aacute; b&aacute;n điện mới dự kiến &aacute;p dụng theo lộ tr&igrave;nh điện canh tranh năm 2011. Tuy nhi&ecirc;n, theo &ocirc;ng Thỏa thời điểm n&agrave;y rất nhạy cảm n&ecirc;n bất cứ phương &aacute;n đề xuất điều chỉnh gi&aacute; mặt h&agrave;ng n&agrave;o cũng phải được c&acirc;n nhắc thận trọng v&agrave; phải được t&iacute;nh to&aacute;n đầy đủ c&aacute;c yếu tố t&aacute;c động c&oacute; thể xảy ra.</span></p>\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">&nbsp;</span></p>\r\n	<p style="text-align: right;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">(Theo VNE)</span></p>\r\n</div>', '2010-12-06', '2010-12-06', 1, 1, 0);
INSERT INTO `articles` VALUES (28, 10, 1, 0, 'Mô hình tăng trưởng mới cho VN', 'mo-hinh-tang-truong-moi-cho-vn', 'Lần đầu tiên một bản báo cáo năng lực cạnh tranh quốc gia của Việt Nam được thực hiện và công bố, dưới sự giúp đỡ của GS Michael E.Porter, cha đẻ của thuyết chiến lược cạnh tranh.', 'files/news/20101206/20101206215601.jpg', '<p>\r\n	B&aacute;o c&aacute;o cho thấy bộ mặt to&agrave;n diện của nền kinh tế VN sau 20 năm với những lợi thế, hạn chế tồn tại nhằm x&acirc;y dựng m&ocirc; h&igrave;nh tăng trưởng mới dựa tr&ecirc;n sức mạnh cạnh tranh, định vị thương hiệu quốc gia, ph&aacute;t triển một c&aacute;ch bền vững hơn.<br />\r\n	<br />\r\n	<strong> Nh&acirc;n c&ocirc;ng rẻ kh&ocirc;ng c&ograve;n l&agrave; lợi thế</strong><br />\r\n	<br />\r\n	Gi&aacute;o sư Porter đ&aacute;nh gi&aacute;, hơn 2 thập ni&ecirc;n mở cửa nền kinh tế theo thị trường, VN đạt được sức tăng trưởng ấn tượng nhưng cũng đang bộc lộ r&otilde; những hạn chế. Cụ thể, d&ugrave; tăng trưởng ở mức cao nhưng mức độ thịnh vượng so với c&aacute;c nước trong khu vực như Ấn Độ, Trung Quốc&hellip; c&ograve;n thấp. Nền kinh tế vốn chỉ dựa v&agrave;o nh&acirc;n c&ocirc;ng đ&ocirc;ng đảo, chi ph&iacute; rẻ tạo năng suất kh&ocirc;ng cao. Xuất khẩu được chọn l&agrave;m lĩnh vực mũi nhọn nhưng do cơ cấu thiếu hợp l&yacute;, d&agrave;n trải v&agrave; chủ yếu gia c&ocirc;ng n&ecirc;n gi&aacute; trị gia tăng &iacute;t. Thị phần xuất khẩu lớn của Việt Nam tập trung trong c&aacute;c ng&agrave;nh sử dụng nhiều lao động v&agrave; t&agrave;i nguy&ecirc;n thi&ecirc;n nhi&ecirc;n. Li&ecirc;n kết trực tiếp giữa c&aacute;c ng&agrave;nh xuất khẩu n&agrave;y hầu như kh&ocirc;ng c&oacute;. Việt Nam vốn được c&aacute;c nh&agrave; đầu tư lựa chọn chủ yếu do chi ph&iacute; nh&acirc;n c&ocirc;ng thấp, nay đ&atilde; kh&ocirc;ng c&ograve;n hấp dẫn.<br />\r\n	<br />\r\n	Ngo&agrave;i ra, tăng trưởng được dựa tr&ecirc;n nền tảng của việc thu h&uacute;t FDI nhằm thay đổi chuyển dịch cơ cấu nền kinh tế. Lượng vốn FDI năm 1988 chỉ v&agrave;i chục triệu USD, hiện tại l&ecirc;n tới h&agrave;ng chục tỉ USD, đỉnh cao l&agrave; năm 2008 vốn đăng k&yacute; hơn 60 tỉ USD. Tuy nhi&ecirc;n, theo GS Porter hiện vẫn đang c&oacute; khoảng c&aacute;ch lớn giữa FDI c&ocirc;ng bố v&agrave; con số thực tế. Khoảng c&aacute;ch n&agrave;y đang ng&agrave;y c&agrave;ng rộng ra khiến việc chuyển dịch cơ cấu kh&ocirc;ng hiệu quả. Nh&igrave;n từ thực tiễn những năm qua, &ocirc;ng b&agrave;y tỏ lo ngại khi Việt Nam đổ qu&aacute; nhiều vốn v&agrave;o bất động sản m&agrave; chưa ch&uacute; trọng tới việc n&acirc;ng cao chất lượng c&aacute;c ng&agrave;nh mũi nhọn, chủ lực.<br />\r\n	<br />\r\n	B&ecirc;n cạnh đ&oacute;, c&aacute;c d&ograve;ng vốn lớn đổ v&agrave;o thị trường trong những năm qua đ&atilde; k&iacute;ch th&iacute;ch tăng cầu nội địa. C&ugrave;ng ch&iacute;nh s&aacute;ch kh&aacute; mở của tiền tệ v&agrave; t&agrave;i kh&oacute;a khiến lạm ph&aacute;t lu&ocirc;n ở mức cao trong khu vực. Số liệu b&aacute;o c&aacute;o cho thấy, so với Th&aacute;i Lan,&nbsp;&nbsp;&nbsp; Indonesia, Malaysia, Trung Quốc kể từ năm 2000 đến nay mức lạm ph&aacute;t của Việt Nam lu&ocirc;n đứng ở mức rất cao, đặc biệt trong 2008, l&ecirc;n tới hơn 20%.<br />\r\n	<br />\r\n	Những hạn chế tr&ecirc;n của nền kinh tế khiến chất lượng tăng trưởng kh&ocirc;ng theo c&ugrave;ng tốc độ, mức độ thịnh vượng chung trong khu vực c&ograve;n thấp, tham nhũng vẫn ở mức cao. Cụ thể, theo thống k&ecirc; tiền lương trung b&igrave;nh của VN chỉ ở mức 48,72 USD/th&aacute;ng, trong khi Nhật Bản gần 2.000 USD/th&aacute;ng, Singapore hơn 1.000 USD/th&aacute;ng, Th&aacute;i Lan 156 USD/th&aacute;ng&hellip;<br />\r\n	<br />\r\n	Theo GS Porter, Việt Nam cần c&oacute; một bước đột ph&aacute; mạnh mẽ, đột ph&aacute; từ năng lực cạnh tranh, tạo ra một m&ocirc; h&igrave;nh tăng trưởng mới chắc chắn, ổn định, bền vững. Cần tạo dựng được c&aacute;c lợi thế mới, đặc trưng thay v&igrave; chỉ đơn thuần sử dụng t&agrave;i nguy&ecirc;n sẵn c&oacute;.<br />\r\n	<br />\r\n	<strong> Th&agrave;nh lập Hội đồng năng lực cạnh tranh quốc gia</strong><br />\r\n	<br />\r\n	Theo GS Porter, để c&oacute; một m&ocirc; h&igrave;nh tăng trưởng mới, Việt Nam cần th&agrave;nh lập Hội đồng năng lực cạnh tranh quốc gia để thực thi chiến lược kinh tế mới. Cụ thể, Việt Nam c&oacute; thể học hỏi m&ocirc; h&igrave;nh của H&agrave;n Quốc, Colombia v&agrave; c&aacute;c quốc gia kh&aacute;c để th&agrave;nh lập hội đồng bao gồm những th&agrave;nh vi&ecirc;n trực thuộc bộ, ng&agrave;nh của Ch&iacute;nh phủ, do người đứng đầu Ch&iacute;nh phủ trực tiếp l&agrave;m chủ tịch hội đồng. C&aacute;c th&agrave;nh vi&ecirc;n l&agrave; những người c&oacute; nhiệt huyết, lu&ocirc;n nghĩ tới lợi &iacute;ch của quốc gia. Th&agrave;nh vi&ecirc;n hội đồng n&ecirc;n c&oacute; đại diện của khu vực kinh tế tư nh&acirc;n - đ&oacute;ng vai tr&ograve; l&agrave;m đầu t&agrave;u đưa nền kinh tế tăng trưởng, ph&aacute;t triển.<br />\r\n	<br />\r\n	Theo GS Porter, để theo đuổi m&ocirc; h&igrave;nh tăng trưởng mới dựa tr&ecirc;n năng suất, chất lượng cao Việt Nam cần phải hy sinh những lợi &iacute;ch ngắn hạn trước mắt. Đơn cử như loại bỏ c&aacute;c lĩnh vực, ng&agrave;nh lương thấp v&igrave; lương thấp cũng đồng nghĩa năng suất thấp, chất lượng kh&ocirc;ng cao. Ngo&agrave;i ra trong xuất khẩu phải tạo được sự gắn kết chặt chẽ giữa c&aacute;c ng&agrave;nh c&oacute; thể bổ trợ cho nhau gia tăng gi&aacute; trị xuất khẩu. Cần thiết th&iacute; điểm th&agrave;nh lập những cụm ng&agrave;nh c&ocirc;ng nghiệp như cụm ng&agrave;nh điện tử v&agrave; cơ kh&iacute; ở H&agrave; Nội, c&aacute;c tỉnh l&acirc;n cận; cụm ng&agrave;nh dệt may, Logistics ở khu vực TP.HCM v&agrave; l&acirc;n cận hay chế biến n&ocirc;ng sản ở đồng bằng s&ocirc;ng Cửu Long...<br />\r\n	<br />\r\n	Đ&aacute;nh gi&aacute; về m&ocirc; h&igrave;nh tăng trưởng mới, Bộ trưởng - Chủ nhiệm Văn ph&ograve;ng Ch&iacute;nh phủ Nguyễn Xu&acirc;n Ph&uacute;c cho rằng, m&ocirc; h&igrave;nh tr&ecirc;n đ&atilde; bổ sung, hỗ trợ cho chiến lược kinh tế của Việt Nam; Cụ thể h&oacute;a c&aacute;c kiến nghị về ch&iacute;nh s&aacute;ch ưu ti&ecirc;n của quốc gia. Ngo&agrave;i ra, cũng đưa ra được một thứ tự thực hiện nhiệm vụ ưu ti&ecirc;n rất r&otilde; r&agrave;ng về kinh tế vĩ m&ocirc;, về mục ti&ecirc;u ngắn hạn, d&agrave;i hạn, về năng lực vi m&ocirc;... &Ocirc;ng cũng cho rằng cần thiết ủng hộ m&ocirc; h&igrave;nh Hội đồng năng lực cạnh tranh quốc gia v&igrave; đ&acirc;y l&agrave; cơ quan điều phối c&aacute;c dự &aacute;n, đ&aacute;nh gi&aacute; cơ chế triển khai về năng lực cạnh tranh nền kinh tế.</p>\r\n<p style="text-align: right;">\r\n	(Theo TN)</p>', '2010-12-06', '2010-12-06', 1, 1, 0);
INSERT INTO `articles` VALUES (29, 10, 1, 0, 'Doanh nghiệp khát vốn cuối năm', 'doanh-nghiep-khat-von-cuoi-nam', 'Tỷ giá đôla biến động, lãi suất cho vay tăng cao khiến doanh nghiệp đứng ngồi không yên vì thiếu vốn. Nhiều doanh nghiệp kiến nghị, ngân hàng cần mở rộng hầu bao và đưa ra ra các chính sách hỗ trợ.', 'files/news/20101206/20101206215715.jpg', '<div align="justify">\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">Tại cuộc họp giao ban về t&igrave;nh h&igrave;nh xuất nhập khẩu do Bộ C&ocirc;ng Thương tổ chức chiều 29/11, đại diện của một doanh nghiệp xăng dầu cho biết, c&ocirc;ng ty &ocirc;ng đang phải đối mặt với nguy cơ lỗ nặng. Doanh nghiệp kinh doanh xăng dầu n&oacute;i chung đang chịu rất nhiều kh&oacute; khăn.<br />\r\n		<br />\r\n		Theo b&aacute;o c&aacute;o ng&agrave;y 26/11 gửi Bộ T&agrave;i ch&iacute;nh của c&ocirc;ng ty n&agrave;y, xăng lỗ 1.685 đồng mỗi l&iacute;t, diezel lỗ 1.500 đồng, dầu hỏa lỗ 1.740 đồng mỗi l&iacute;t... Mỗi ng&agrave;y doanh nghiệp xăng dầu lỗ đến h&agrave;ng chục tỷ đồng v&agrave; con số n&agrave;y l&ecirc;n đến hơn một ngh&igrave;n tỷ đồng mỗi th&aacute;ng.<br />\r\n		<br />\r\n		&ldquo;Ch&uacute;ng t&ocirc;i đ&atilde; li&ecirc;n tục c&oacute; văn bản gửi tới c&aacute;c bộ ng&agrave;nh từ 10/9 đến nay để xin hướng giải quyết. Đ&acirc;y l&agrave; những nguy cơ thực sự chứ kh&ocirc;ng phải nguy cơ dự b&aacute;o&rdquo;, vị ph&oacute; tổng gi&aacute;m đốc lo ngại.<br />\r\n		<br />\r\n		Mặt h&agrave;ng thủy sản xuất khẩu cũng đang gặp kh&oacute; khăn về nguy&ecirc;n liệu đầu v&agrave;o v&agrave; h&agrave;ng r&agrave;o kỹ thuật từ thị trường nhập khẩu. T&ocirc;m vẫn l&agrave; mặt h&agrave;ng xuất khẩu chủ lực chiếm tỷ trọng lớn nhất với hơn 41% trong danh mục c&aacute;c sản phẩm thủy sản xuất khẩu ch&iacute;nh của Việt Nam 11 th&aacute;ng năm 2010 nhưng đang bị cạnh tranh khốc liệt ở thị trường Nhật Bản. C&aacute; tra đứng thứ 2 nhưng xuất khẩu trong 11 chỉ tăng nhẹ so với năm ngo&aacute;i.<br />\r\n		<br />\r\n		&Ocirc;ng Nguyễn Ho&agrave;i Nam, Ph&oacute; Tổng thư k&yacute; Hiệp hội Chế biến v&agrave; Xuất khẩu thủy sản Việt Nam (VASEP) cho biết, xuất khẩu c&aacute; tra đang c&oacute; dấu hiệu chững lại do nhiều chủ nu&ocirc;i c&aacute; ở đồng bằng s&ocirc;ng Cửu Long đang gặp kh&oacute; khăn về vốn. Theo &ocirc;ng Nam, tỷ gi&aacute; đ&ocirc;la biến động v&agrave; gi&aacute; nguy&ecirc;n liệu đầu v&agrave;o tăng cao khiến nhiều doanh nghiệp đ&oacute;i vốn buộc phải &ldquo;bỏ ao&rdquo;.<br />\r\n		<br />\r\n		Nguồn cung c&agrave; ph&ecirc; thế giới đang thiếu hụt khiến gi&aacute; c&agrave; ph&ecirc; xuất khẩu c&oacute; xu hướng tăng. Gi&aacute; tăng cao đ&atilde; khuyến kh&iacute;ch b&agrave; con n&ocirc;ng d&acirc;n mạnh dạn vay vốn ng&acirc;n h&agrave;ng, song kh&ocirc;ng phải l&uacute;c n&agrave;o ng&acirc;n h&agrave;ng cũng mở rộng hầu bao. &Ocirc;ng Đo&agrave;n Triệu Nhạn, Ph&oacute; chủ tịch Hiệp hội C&agrave; ph&ecirc; Ca cao Việt Nam kiến nghị, ng&acirc;n h&agrave;ng cần cởi mở hơn để ưu đ&atilde;i cho n&ocirc;ng d&acirc;n vay vốn mua trang thiết bị nhằm cải thiện t&igrave;nh h&igrave;nh trồng trọt. Ngo&agrave;i ra doanh nghiệp c&oacute; thể dự trữ h&agrave;ng để đảm bảo b&igrave;nh ổn gi&aacute; cả khi gi&aacute; c&agrave; ph&ecirc; biến động.<br />\r\n		<br />\r\n		Kh&ocirc;ng chỉ lo thiếu vốn, nhiều c&ocirc;ng ty trong nước c&ograve;n phải đau đầu đối mặt với sự cạnh tranh khốc liệt từ doanh nghiệp ngoại. &Ocirc;ng Nguyễn Tiến Nghi, Ph&oacute; chủ tịch Hiệp hội Th&eacute;p Việt Nam phấn khởi đưa con số xuất khẩu ước t&iacute;nh trong năm 2010 đạt kỷ lục 1,1 triệu tấn, tăng xấp xỉ 300% so với năm 2009.<br />\r\n		<br />\r\n		Chưa kịp vui mừng, Hiệp hội Th&eacute;p đ&atilde; phải giật m&igrave;nh lo đối ph&oacute; với th&eacute;p ngoại đang gi&agrave;nh giật thị phần trong nước. Theo &ocirc;ng Nghi, trong 10 th&aacute;ng đầu năm, lượng th&eacute;p ASEAN v&agrave;o Việt Nam đ&atilde; l&ecirc;n tới 43.000 tấn tăng 6.000 tấn so với c&ugrave;ng kỳ năm ngo&aacute;i. &ldquo;Th&eacute;p ASEAN chịu thuế suất 0% đang ồ ạt v&agrave;o Việt Nam v&agrave; cạnh tranh mạnh với doanh nghiệp nội&rdquo;, &ocirc;ng Nghi lo ngại.<br />\r\n		<br />\r\n		B&agrave; Trần Thị Hồng Hạnh, Ph&oacute; vụ trưởng Vụ t&iacute;n dụng Ng&acirc;n h&agrave;ng Nh&agrave; nước cho biết, hiện nay ng&acirc;n h&agrave;ng ở khu vực Đồng Nai chưa từ chối một trường hợp cho vay vốn để mua m&aacute;y m&oacute;c thiết bị n&agrave;o. C&agrave; ph&ecirc; kh&ocirc;ng phải l&agrave; mặt h&agrave;ng đặc biệt để được hưởng ưu ti&ecirc;n n&ecirc;n quy tr&igrave;nh cho vay vốn vẫn phải theo quy định.<br />\r\n		<br />\r\n		Ri&ecirc;ng đối với mặt h&agrave;ng c&aacute; tra, theo b&agrave; Hạnh nhiều doanh nghiệp kh&ocirc;ng chứng minh được hiệu quả sản xuất kinh doanh. B&agrave; Hạnh đưa ra minh họa, một số doanh nghiệp nu&ocirc;i c&aacute; qu&aacute; b&eacute;o n&ecirc;n kh&ocirc;ng thể xuất khẩu được.<br />\r\n		<br />\r\n		&ldquo;Ng&acirc;n h&agrave;ng lu&ocirc;n đảm bảo đủ vốn cho doanh nghiệp, nhưng đối với mặt h&agrave;ng kh&ocirc;ng được hưởng ch&iacute;nh s&aacute;ch ưu đ&atilde;i th&igrave; qu&aacute; tr&igrave;nh vay vốn phải theo chu tr&igrave;nh, quy định&rdquo;, b&agrave; Hạnh nhấn mạnh.<br />\r\n		<br />\r\n		Thứ trưởng Bộ C&ocirc;ng Thương Nguyễn Th&agrave;nh Bi&ecirc;n cho rằng, cần c&oacute; sự phối hợp chặt chẽ giữa c&aacute;c bộ ban ng&agrave;nh cũng như Hiệp hội v&agrave; c&aacute;c doanh nghiệp. Bộ C&ocirc;ng Thương lắng nghe v&agrave; sẽ tiếp thu &yacute; kiến đ&oacute;ng g&oacute;p của c&aacute;c doanh nghiệp để tr&igrave;nh l&ecirc;n Ch&iacute;nh phủ.</span></p>\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">&nbsp;</span></p>\r\n	<p style="text-align: right;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">(Theo VNE)</span></p>\r\n</div>', '2010-12-06', '2010-12-06', 1, 1, 0);
INSERT INTO `articles` VALUES (30, 10, 1, 0, 'Xuất khẩu 2010: Nhiều khả năng vượt 70 tỷ USD', 'xuat-khau-2010-nhieu-kha-nang-vuot-70-ty-usd', 'Chỉ còn một tháng nữa năm 2010 sẽ khép lại và cơ sở để nhận định kim ngạch xuất khẩu thu về trong năm nay sẽ đạt trên 70 tỷ USD ngày càng hiện rõ.', 'files/news/20101206/20101206215852.jpg', '<div align="justify">\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;"><strong>Lạc quan với con số 70,8 tỷ USD</strong><br />\r\n		<br />\r\n		B&aacute;o c&aacute;o do Thứ trưởng Bộ C&ocirc;ng Thương Nguyễn Th&agrave;nh Bi&ecirc;n tr&igrave;nh b&agrave;y tại buổi giao ban về xuất nhập khẩu ng&agrave;y 29/11 n&ecirc;u r&otilde;, th&aacute;ng 11 t&igrave;nh h&igrave;nh xuất khẩu tiếp tục diễn biến theo chiều hướng t&iacute;ch cực với c&aacute;c yếu tố thuận lợi về gi&aacute;, đơn h&agrave;ng, thị trường...<br />\r\n		<br />\r\n		Gi&aacute; xuất khẩu của hầu hết c&aacute;c mặt h&agrave;ng n&ocirc;ng sản đều tăng mạnh như sắn tăng tới 83,8%, cao su tăng khoảng 81,2%, hạt điều tăng l&agrave; 21,2%... Tiếp đến l&agrave; gi&aacute; dầu th&ocirc; tăng 33,9% v&agrave; than đ&aacute; tăng l&agrave; 53,2%...<br />\r\n		<br />\r\n		Nhờ vậy, kim ngạch xuất khẩu th&aacute;ng 11/2010 tăng tới 24,5% so với c&ugrave;ng kỳ năm 2009. T&iacute;nh cả 11 th&aacute;ng, b&igrave;nh qu&acirc;n mỗi th&aacute;ng xuất khẩu đạt 5,86 tỷ USD, cao hơn mức b&igrave;nh qu&acirc;n đ&atilde; đề ra (kế hoạch năm 2010 kim ngạch xuất khẩu l&agrave; 60,5 tỷ USD, b&igrave;nh qu&acirc;n 5,04 tỷ USD/th&aacute;ng).<br />\r\n		<br />\r\n		Về cơ cấu h&agrave;ng h&oacute;a xuất khẩu, tỷ trọng nh&oacute;m h&agrave;ng c&ocirc;ng nghiệp, chế tạo đ&atilde; tăng mạnh so với c&ugrave;ng kỳ năm trước, cụ thể l&agrave; từ 62,8% l&ecirc;n 68,1%. Trong khi nh&oacute;m h&agrave;ng nhi&ecirc;n liệu v&agrave; kho&aacute;ng sản lại giảm từ 15,2% xuống 11%.<br />\r\n		<br />\r\n		Như vậy, cơ cấu h&agrave;ng h&oacute;a xuất khẩu đ&atilde; v&agrave; đang c&oacute; những chuyển dịch theo hướng t&iacute;ch cực, tăng dần tỷ trọng nh&oacute;m h&agrave;ng c&ocirc;ng nghiệp, chế tạo, nh&oacute;m h&agrave;ng c&oacute; h&agrave;m lượng c&ocirc;ng nghệ v&agrave; chất x&aacute;m cao, giảm dần xuất khẩu h&agrave;ng th&ocirc;, c&oacute; gi&aacute; trị gia tăng thấp.<br />\r\n		<br />\r\n		Tr&ecirc;n cơ sở của những t&iacute;n hiệu lạc quan n&agrave;y, Bộ C&ocirc;ng Thương dự b&aacute;o, th&aacute;ng cuối năm xuất khẩu tiếp tục vẫn diễn biến theo chiều hướng thuận lợi. Cả năm xuất khẩu c&oacute; khả năng đạt được 70,8 tỷ USD, tăng 24% so với năm 2009, v&agrave; tăng 16,5% so với kế hoạch năm.<br />\r\n		<br />\r\n		&ldquo;Với những thuận lợi như đ&atilde; ph&acirc;n t&iacute;ch ở tr&ecirc;n, khả năng đạt được mức tăng trưởng n&agrave;y l&agrave; ho&agrave;n to&agrave;n c&oacute; thể&rdquo;, Thứ trưởng Bi&ecirc;n nhận định.&nbsp;<br />\r\n		<br />\r\n		<strong>Nhập si&ecirc;u vẫn dưới ngưỡng</strong><br />\r\n		<br />\r\n		Cũng theo b&aacute;o c&aacute;o của cơ quan giữ vai tr&ograve; trong điều h&agrave;nh xuất nhập khẩu n&agrave;y, tổng nhập si&ecirc;u 11 th&aacute;ng năm 2010 ước l&agrave; 10,65 tỷ USD, bằng 16,58% kim ngạch xuất khẩu. Tỷ lệ nhập si&ecirc;u 11 th&aacute;ng vẫn nằm dưới ngưỡng 20% m&agrave; Ch&iacute;nh phủ đặt ra.<br />\r\n		<br />\r\n		Tuy vậy, nếu x&eacute;t về cơ cấu mặt h&agrave;ng nhập khẩu so với c&ugrave;ng kỳ, kim ngạch nhập khẩu nh&oacute;m h&agrave;ng cần nhập khẩu v&agrave; nh&oacute;m h&agrave;ng cần hạn chế chỉ tăng lần lượt l&agrave; 18,5% v&agrave; 16,1%, th&igrave; nh&oacute;m h&agrave;ng cần kiểm so&aacute;t lại tăng tới 33,1%.<br />\r\n		<br />\r\n		Điều n&agrave;y được l&yacute; giải chủ yếu l&agrave; do sự tăng mạnh của gi&aacute; v&agrave;ng trong thời gian qua. Để b&igrave;nh ổn gi&aacute; v&agrave;ng trong nước, Ng&acirc;n h&agrave;ng Nh&agrave; nước đ&atilde; quyết định cấp ph&eacute;p nhập khẩu v&agrave;ng miếng 4 lần.<br />\r\n		<br />\r\n		Mặc d&ugrave; theo chu kỳ h&agrave;ng năm, nhập khẩu th&aacute;ng cuối c&ugrave;ng của năm thường tăng cao hơn so với những th&aacute;ng trước. Song với c&aacute;c biện ph&aacute;p kiềm chế nhập si&ecirc;u đồng bộ đang t&iacute;ch cực được triển khai, dự b&aacute;o nhập khẩu năm 2010 sẽ chỉ khoảng 82,8 tỷ USD, tăng 18,4% so với năm 2009. Theo đ&oacute;, nhập si&ecirc;u cả năm 2010 sẽ trong khoảng 12 tỷ USD,&nbsp; tỷ lệ nhập si&ecirc;u/xuất khẩu l&agrave; 17,02%, vẫn đạt được chỉ ti&ecirc;u của Ch&iacute;nh phủ đặt ra.<br />\r\n		<br />\r\n		Tuy kh&aacute; lạc quan với c&aacute;c con số sẽ đạt được trong năm 2010, nhưng Thứ trưởng Bi&ecirc;n cũng như đại diện cho c&aacute;c hiệp hội, ng&agrave;nh h&agrave;ng vẫn kh&aacute; &ldquo;d&egrave; dặt&rdquo; trước chỉ ti&ecirc;u trong năm 2011 l&agrave; tăng trưởng xuất khẩu h&agrave;ng h&oacute;a đạt 10% so với thực hiện năm 2010, nhập si&ecirc;u h&agrave;ng ho&aacute; năm 2011 dưới 18% so với tổng kim ngạch xuất khẩu h&agrave;ng h&oacute;a vừa được Quốc hội th&ocirc;ng qua.<br />\r\n		<br />\r\n		Thứ trưởng Nguyễn Th&agrave;nh Bi&ecirc;n cho rằng điều n&agrave;y l&agrave; kh&aacute; kh&oacute; v&igrave; trong năm tới, c&aacute;c mặt h&agrave;ng xuất khẩu chủ lực của Việt Nam sẽ phải đối mặt với nhiều kh&oacute; khăn như c&aacute;c r&agrave;o cản thương mại ng&agrave;y c&agrave;ng tăng l&ecirc;n... Th&ecirc;m v&agrave;o đ&oacute;, gi&aacute; của của nhiều mặt h&agrave;ng sẽ kh&oacute; c&oacute; thể được như hiện nay do đ&acirc;y đang l&agrave; giai đoạn đầu của thời kỳ phục hồi kinh tế sau thời gian suy tho&aacute;i.</span></p>\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">&nbsp;</span></p>\r\n	<p style="text-align: right;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">(Theo VnEconomy)</span></p>\r\n</div>', '2010-12-06', '2010-12-06', 1, 1, 0);
INSERT INTO `articles` VALUES (31, 10, 1, 0, 'Giá thép tăng lần thứ hai trong tháng 11', 'gia-thep-tang-lan-thu-hai-trong-thang-11', 'Lãi suất ngân hàng quá cao cùng với tỷ giá đôla biến động mạnh khiến giá thép tăng khoảng 300.000 đồng mỗi tấn. Đây là lần thứ hai trong tháng, giá thép biến động mạnh.', 'files/news/20101206/20101206215945.jpg', '<div align="justify">\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">Ph&oacute; chủ tịch Hiệp hội Th&eacute;p Việt Nam Nguyễn Tiến Nghi cho biết, gi&aacute; th&eacute;p đ&atilde; tăng từ 100.000-300.000 đồng mỗi tấn so với những ng&agrave;y đầu th&aacute;ng. Tại nhiều nh&agrave; m&aacute;y, th&eacute;p đang được b&aacute;n quanh mức 13,4 triệu-14 triệu đồng mỗi tấn (chưa t&iacute;nh VAT, chưa trừ chiết khấu).<br />\r\n		<br />\r\n		Theo &ocirc;ng Nghi, gi&aacute; th&eacute;p tăng do chịu t&aacute;c động mạnh từ biến động tỷ gi&aacute; USD v&agrave; l&atilde;i suất ng&acirc;n h&agrave;ng. Trong khi 40% ph&ocirc;i v&agrave; 70% th&eacute;p phế phải nhập khẩu, gi&aacute; đ&ocirc;la tăng khiến chi ph&iacute; đầu v&agrave;o cao hơn buộc c&aacute;c nh&agrave; sản xuất phải tăng gi&aacute; b&aacute;n. Ngo&agrave;i ra, ng&acirc;n h&agrave;ng c&ocirc;ng bố l&atilde;i suất cho vay với doanh nghiệp th&eacute;p phổ biến l&agrave; 19% một năm, nhưng kh&ocirc;ng &iacute;t trường hợp phải vay cao hơn gi&aacute; ni&ecirc;m yết.<br />\r\n		<br />\r\n		&Ocirc;ng Nghi nhấn mạnh, với mức tăng khoảng 300.000 đồng mỗi tấn, doanh nghiệp vẫn phải chịu lỗ. Sự tăng gi&aacute; mạnh của đ&ocirc;la trong thời gian qua khiến gi&aacute; ph&ocirc;i th&eacute;p tăng 1 triệu đồng mỗi tấn, ngo&agrave;i ra c&ograve;n phải cộng th&ecirc;m 1,5-1,7 triệu đồng chi ph&iacute; gia c&ocirc;ng.<br />\r\n		<br />\r\n		&quot;L&atilde;i suất ng&acirc;n h&agrave;ng qu&aacute; cao c&ugrave;ng tỷ gi&aacute; USD biến động mạnh đang g&acirc;y sức &eacute;p tiếp tục tăng gi&aacute; cho c&aacute;c doanh nghiệp th&eacute;p&quot;, &ocirc;ng Nghi dự b&aacute;o.<br />\r\n		<br />\r\n		Hiệp hội Th&eacute;p Việt Nam cho biết lượng th&eacute;p ti&ecirc;u thụ trong th&aacute;ng 12 sẽ v&agrave;o khoảng 400.000-450.000 tấn, bằng mức ti&ecirc;u thụ của th&aacute;ng 11. Do t&acirc;m l&yacute; cuối năm, c&aacute;c nh&agrave; đầu tư phải đẩy nhanh tiến độ c&ocirc;ng tr&igrave;nh, ho&agrave;n th&agrave;nh kế hoạch năm n&ecirc;n lượng ti&ecirc;u thụ th&eacute;p sẽ tăng cao.<br />\r\n		<br />\r\n		&Ocirc;ng Nghi cho hay, với lượng ph&ocirc;i dự trữ khoảng 560.000 tấn, th&eacute;p th&agrave;nh phẩm tồn kho khoảng 280.000 tấn, nguồn cung th&eacute;p sẽ kh&ocirc;ng thiếu. Đại diện của Hiệp hội Th&eacute;p cũng đưa ra dự b&aacute;o, trong thời gian tới, c&oacute; thể gi&aacute; c&ograve;n tiếp tục tăng.<br />\r\n		<br />\r\n		Trước đợt tăng gi&aacute; n&agrave;y, gi&aacute; th&eacute;p cũng đ&atilde; tăng một lần v&agrave;o đầu th&aacute;ng 11 với mức từ 150.000-300.000 đồng mỗi tấn.</span></p>\r\n	<p style="text-align: justify;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">&nbsp;</span></p>\r\n	<p style="text-align: right;">\r\n		<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">(Theo VNE)</span></p>\r\n</div>', '2010-12-06', '2010-12-06', 1, 1, 0);
INSERT INTO `articles` VALUES (32, 4, 1, 0, 'DCC: triển khai 02 gói thầu mới với giá trị 28 tỷ đồng', 'dcc-trien-khai-02-goi-thau-moi-voi-gia-tri-28-ty-dong', '', 'files/news/20101206/20101206220832.jpg', '<p>\r\n	<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;"><strong>1/ Khởi c&ocirc;ng c&ocirc;ng tr&igrave;nh &ldquo;Nh&agrave; m&aacute;y C&ocirc;ng ty TNHH Sato-Sangyo VN&rdquo;</strong></span></p>\r\n<p>\r\n	<br />\r\n	<span class="p_te8" id="UcNewsDetail1_lblNoiDung" style="display: inline-block; width: 500px;">Ng&agrave;y 13/09/2010 tại Khu c&ocirc;ng nghiệp Mỹ Phước 3, tỉnh B&igrave;nh Dương, C&ocirc;ng ty DESCON đ&atilde; tổ chức lễ khởi c&ocirc;ng c&ocirc;ng tr&igrave;nh &ldquo;Nh&agrave; M&aacute;y C&ocirc;ng ty TNHH SATO-SANGYO (Việt Nam).<br />\r\n	<br />\r\n	Đ&acirc;y l&agrave; c&ocirc;ng tr&igrave;nh do C&ocirc;ng ty TNHH SATO-SANGYO (Việt Nam) &ndash; 100% vốn của Nhật Bản &ndash; l&agrave;m Chủ đầu tư, chuy&ecirc;n sản xuất c&aacute;c sản phẩm về gỗ.<br />\r\n	<br />\r\n	C&ocirc;ng tr&igrave;nh c&oacute; gi&aacute; trị hợp đồng tr&ecirc;n 16 tỷ đồng v&agrave; do X&iacute; nghiệp 3 (DESCON 3) thi c&ocirc;ng.<br />\r\n	&nbsp;<br />\r\n	<strong>2/&nbsp; Triển khai c&aacute;c hạng mục điện, nước v&agrave; ho&agrave;n thiện c&ocirc;ng tr&igrave;nh &ldquo;Co.opMart Đ&ocirc;ng H&agrave;&rdquo;</strong><br />\r\n	<br />\r\n	Sau khi thi c&ocirc;ng xong phần th&ocirc;, DESCON tr&uacute;ng thầu tiếp c&aacute;c hạng mục: ho&agrave;n thiện - hệ thống điện, hệ thống cấp tho&aacute;t nước, hệ thống PCCC v&agrave; chống s&eacute;t c&ocirc;ng tr&igrave;nh Co.opMart Đ&ocirc;ng H&agrave; với gi&aacute; trị hợp đồng ~12 tỷ đồng. C&ocirc;ng tr&igrave;nh do X&iacute; nghiệp C&amp;ME thi c&ocirc;ng.<br />\r\n	<br />\r\n	Chủ đầu tư c&ocirc;ng tr&igrave;nh l&agrave; C&ocirc;ng ty TNHH Thương mại Dịch vụ S&agrave;i G&ograve;n - Đ&ocirc;ng H&agrave;.<br />\r\n	<br />\r\n	C&ocirc;ng tr&igrave;nh được x&acirc;y dựng tại Thị x&atilde; Đ&ocirc;ng H&agrave;, Tỉnh Quảng Trị .</span></p>', '2010-12-06', NULL, 1, 0, 0);
INSERT INTO `articles` VALUES (33, 2, 1, 0, 'Giá trị giao dịch sàn TP HCM cao nhất trong 6 tháng', 'gia-tri-giao-dich-san-tp-hcm-cao-nhat-trong-6-thang', 'Lượng cổ phiếu, trái phiếu chuyển nhượng tại HOSE trong phiên sáng nay đạt gần 2.400 tỷ đồng. Thanh khoản sàn Hà Nội cũng tăng mạnh cho dù các Index chưa vượt thành công các ngưỡng cản quan trọng.', 'files/news/20101206/20101206222541.jpg', '<p>\r\n	2 s&agrave;n chứng kho&aacute;n khởi động tuần mới tương đối hứng khởi với đ&agrave; tăng ngắn hạn đ&atilde; được x&aacute;c lập trước đ&oacute;. Trong những ng&agrave;y gần đ&acirc;y, khối lượng giao dịch cổ phiếu tr&ecirc;n s&agrave;n TP HCM c&oacute; xu hướng tăng dần ngay trong đợt khớp lệnh mở cửa. Phi&ecirc;n s&aacute;ng nay cũng kh&ocirc;ng phải ngoại lệ với gần 6 triệu chứng kho&aacute;n (130,72 tỷ đồng) được sang tay.</p>\r\n<p>\r\n	<img alt="" src="/files/upload/images/chung-khoan-0.jpg" style="width: 490px; height: 320px;" /></p>\r\n<p class="Normal">\r\n	Vn-Index cũng tăng gần 3 điểm, l&ecirc;n 467,3 điểm khi hầu hết c&aacute;c m&atilde; blue-chip vẫn chứng tỏ được vai tr&ograve; dẫn dắt thị trường. Nh&oacute;m ng&agrave;nh chứng kho&aacute;n v&agrave; bất động sản vẫn được giao dịch nhiều nhất. Điển h&igrave;nh l&agrave; SSI với gần 2,2 triệu cổ phiếu được chuyển nhượng tại thời điểm n&agrave;y. Tiếp theo l&agrave; LCG, VIP, GTT, REE&hellip;</p>\r\n<p class="Normal">\r\n	Đ&agrave; tăng gi&aacute; cổ phiếu c&oacute; dấu hiệu đuối sức trong những ph&uacute;t đầu đợt 2 khi một số m&atilde; lớn như DRC, FPT, HDC, VIS&hellip; bắt đầu giảm điểm. Index c&oacute; l&uacute;c đ&atilde; hiện chỉ b&aacute;o đỏ nhưng cuối c&ugrave;ng vẫn duy tr&igrave; được đ&agrave; tăng nhẹ v&agrave;o cuối phi&ecirc;n nhờ lực đẩy của SSI, REE, STB, ITA, OGC, QCG, VNE&hellip;</p>\r\n<p class="Normal">\r\n	S&agrave;n TP HCM kết phi&ecirc;n ở 465,56 điểm, chỉ tăng 1,21 điểm. Tuy vậy, khối lượng v&agrave; gi&aacute; trị giao dịch vọt l&ecirc;n gần 96,78 triệu cổ phiếu v&agrave; 2.392,65 tỷ đồng. Đ&acirc;y l&agrave; gi&aacute; trị giao dịch lớn nhất tại HOSE trong v&ograve;ng 6 th&aacute;ng gần đ&acirc;y. Bảng điện tử HOSE ghi nhận gần 20 cổ phiếu c&oacute; giao dịch tr&ecirc;n một triệu chứng kho&aacute;n trong đ&oacute; SSI chuyển nhượng được tới hơn 7 triệu cổ phiếu.</p>\r\n<p class="Normal">\r\n	Tương tự s&agrave;n TP HCM, lượng giao dịch tại HNX cũng tăng mạnh l&ecirc;n 87,76 triệu cổ phiếu, tương đương 1.761,07 tỷ đồng. Tuy nhi&ecirc;n <strong><font color="#4f4f4f">HNX-Index </font></strong>tỏ ra đuối sức cuối phi&ecirc;n, chỉ tăng nhẹ 0,41 điểm, l&ecirc;n 117,07 điểm. Như vậy, cả 2 Index đều thất bại trong nỗ lực vượt ngưỡng cản 470 điểm v&agrave; 120 điểm trong s&aacute;ng nay.</p>\r\n<p class="Normal">\r\n	Kết th&uacute;c giao dịch buổi s&aacute;ng, <strong><font color="#4f4f4f">UPCoM-Index</font></strong> tăng 0,34 điểm, l&ecirc;n 43,3 điểm. Lượng giao dịch, tuy vậy, chỉ đạt 261.500 cổ phiếu, tương đương 2,79 tỷ đồng</p>', '2010-12-06', NULL, 1, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `content_categories`
-- 

INSERT INTO `content_categories` VALUES (1, 0, 'Tin tức', 'tin-tuc', 'Tin tức', 1);
INSERT INTO `content_categories` VALUES (2, 1, 'Tin vắn chứng khoắn', 'tin-van-chung-khoan', 'Tin vắn chứng khoắn', 1);
INSERT INTO `content_categories` VALUES (3, 1, 'Tin HOSE', 'tin-hose', 'Tin HOSE', 1);
INSERT INTO `content_categories` VALUES (4, 1, 'Tin từ công ty niêm yết', 'tin-tu-cong-ty-niem-yet', 'Tin từ công ty niêm yết', 1);
INSERT INTO `content_categories` VALUES (5, 0, 'Nhận định thị trường', 'nhan-dinh-thi-truong', 'Tin tức', 1);
INSERT INTO `content_categories` VALUES (6, 5, 'Công ty CK nhận định', 'cong-ty-ck-nhan-dinh', 'Công ty CK nhận định', 1);
INSERT INTO `content_categories` VALUES (7, 5, 'Thị trường', 'thi-truong', 'Thị trường', 1);
INSERT INTO `content_categories` VALUES (8, 5, 'Công ty', 'cong-ty', 'Công ty', 1);
INSERT INTO `content_categories` VALUES (9, 0, 'Kinh tế Việt Nam', 'kinh-te-viet-nam', 'Tin tức', 1);
INSERT INTO `content_categories` VALUES (10, 9, 'Thị trường VN', 'thi-truong-vn', 'Thị trường VN', 1);
INSERT INTO `content_categories` VALUES (11, 9, 'Tài chính - ngân hàng', 'tai-chinh---ngan-hang', 'Tài chính - ngân hàng', 1);
INSERT INTO `content_categories` VALUES (12, 9, 'Bất động sản', 'bat-dong-san', 'Bất động sản', 1);
INSERT INTO `content_categories` VALUES (13, 0, 'Kinh tế thế giới', 'kinh-te-the-gioi', 'Tin tức', 1);
INSERT INTO `content_categories` VALUES (14, 13, 'Chứng khoán', 'chung-khoan', 'Chứng khoán', 1);
INSERT INTO `content_categories` VALUES (15, 13, 'Thị trường TG', 'thi-truong-tg', 'Thị trường TG', 1);
INSERT INTO `content_categories` VALUES (16, 0, 'Kiến thức đầu tư', 'kien-thuc-dau-tu', 'Tin tức', 1);
INSERT INTO `content_categories` VALUES (17, 16, 'Kiến thức cơ bản', 'kien-thuc-co-ban', 'Kiến thức cơ bản', 1);
INSERT INTO `content_categories` VALUES (18, 16, 'Kinh nghiệm đầu tư', 'kinh-nghiem-dau-tu', 'Kinh nghiệm đầu tư', 1);
INSERT INTO `content_categories` VALUES (19, 0, 'Điểm tin UITStock', 'diem-tin-uitstock', 'Điểm tin UITStock', 1);
INSERT INTO `content_categories` VALUES (20, 0, 'Báo cáo phân tích', 'bao-cao-phan-tich', 'Báo cáo phân tích', 1);
INSERT INTO `content_categories` VALUES (21, 0, 'Lịch sự kiện', 'lich-su-kien', 'Lịch sự kiện', 1);
INSERT INTO `content_categories` VALUES (22, 0, 'Thể lệ sàn ảo', 'the-le-san-ao', 'Thể lệ sàn ảo', 1);
INSERT INTO `content_categories` VALUES (23, 22, 'Luật chơi', 'luat-choi', 'Luật chơi', 1);
INSERT INTO `content_categories` VALUES (24, 22, 'Hướng dẫn đặt lệnh', 'huong-dan-dat-lenh', 'Hướng dẫn đặt lệnh', 1);
INSERT INTO `content_categories` VALUES (25, 0, 'Chuyên gia nhận định', 'chuyen-gia-nhan-dinh', 'Chuyên gia nhận định', 1);
INSERT INTO `content_categories` VALUES (26, 25, 'Nhận định', 'nhan-dinh', 'Nhận định', 1);

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
