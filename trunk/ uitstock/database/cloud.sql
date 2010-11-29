-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 28, 2010 at 11:17 PM
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
  `id` int(11) NOT NULL,
  `cat_id` int(11) default NULL,
  `user_id` int(11) default NULL,
  `title` varchar(255) default NULL,
  `alias` varchar(255) default NULL,
  `summarize` text,
  `image` varchar(255) default NULL,
  `content` text,
  `create_date` date default NULL,
  `modify_date` date default NULL,
  `publsihed` tinyint(1) default NULL,
  `important` tinyint(1) default NULL,
  `is_related` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `articles`
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
-- Table structure for table `content_categorys`
-- 

CREATE TABLE `content_categorys` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) default NULL,
  `name` varchar(50) default NULL,
  `alias` varchar(50) default NULL,
  `description` text,
  `published` tinyint(1) default NULL,
  `image` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `content_categorys`
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
