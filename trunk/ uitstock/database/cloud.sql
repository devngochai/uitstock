-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 04, 2010 at 12:40 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `articles`
-- 

INSERT INTO `articles` VALUES (1, 2, 1, 0, 'Huy động và cho vay vốn bằng vàng: Vì sao phải siết?', 'alias', 'sum', 'files/avatar/linhnn.jpg', 'content', '2010-12-04', '2010-12-04', 1, 1, 0);

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
INSERT INTO `content_categories` VALUES (18, 16, 'Kiến thức chuyên sâu', 'kien-thuc-chuyen-sau', 'Kiến thức chuyên sâu', 1);
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
