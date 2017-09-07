-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-04 10:54:42
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- 表的结构 `b2b_account`
--

CREATE TABLE IF NOT EXISTS `b2b_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bis_user_name` varchar(20) NOT NULL COMMENT '商户用户名',
  `bis_user_password` char(32) NOT NULL COMMENT '商户密码',
  `code` smallint(6) NOT NULL COMMENT '加密串',
  `bis_id` int(11) NOT NULL COMMENT '商户id',
  `is_main` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是总管理员',
  `listorder` int(50) NOT NULL COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户账号表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b2b_area`
--

CREATE TABLE IF NOT EXISTS `b2b_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商圈名称',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '城市id',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `listorder` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商圈表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b2b_bis`
--

CREATE TABLE IF NOT EXISTS `b2b_bis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bis_name` varchar(20) NOT NULL DEFAULT '' COMMENT '商户名称',
  `bis_email` varchar(20) NOT NULL DEFAULT '' COMMENT '商户email',
  `bis_logo` varchar(80) NOT NULL DEFAULT '' COMMENT '商户logo',
  `bis_licence_logo` varchar(80) NOT NULL DEFAULT '' COMMENT '商户营业执照',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '商户所属城市',
  `city_path` varchar(50) NOT NULL DEFAULT '' COMMENT '城市路径',
  `bank_info` varchar(100) NOT NULL COMMENT '银行信息',
  `money` decimal(20,2) DEFAULT '0.00' COMMENT '金额',
  `bank_name` varchar(50) DEFAULT '' COMMENT '提现开户行名称',
  `bank_user` varchar(50) NOT NULL DEFAULT '' COMMENT '提现开户人名称',
  `faren` varchar(20) NOT NULL DEFAULT '' COMMENT '法人',
  `contacts` varchar(20) NOT NULL DEFAULT '' COMMENT '法人联系方式',
  `listorder` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b2b_bis_location`
--

CREATE TABLE IF NOT EXISTS `b2b_bis_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(20) NOT NULL COMMENT '门店名称',
  `logo` varchar(50) NOT NULL COMMENT '门店Logo',
  `address` varchar(80) NOT NULL COMMENT '门店地址',
  `telphone` varchar(20) NOT NULL COMMENT '门店电话',
  `contacts` varchar(20) NOT NULL COMMENT '门店联系人',
  `xpoint` varchar(20) NOT NULL COMMENT '门店经度',
  `ypoint` varchar(20) NOT NULL COMMENT '门店纬度',
  `bis_id` int(11) NOT NULL COMMENT '门店所属商户id',
  `open_time` int(11) NOT NULL DEFAULT '0' COMMENT '营业时间',
  `bis_content` text NOT NULL COMMENT '门店信息',
  `is_main` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否是总店',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属城市',
  `city_path` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属分类',
  `category_path` varchar(20) NOT NULL,
  `listorder` int(11) NOT NULL DEFAULT '50',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `bis_id` (`bis_id`),
  KEY `city_id` (`city_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='门店表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b2b_cate`
--

CREATE TABLE IF NOT EXISTS `b2b_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类id',
  `list_order` int(10) unsigned NOT NULL DEFAULT '50' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cate_name` (`cate_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='生活分类表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `b2b_cate`
--

INSERT INTO `b2b_cate` (`id`, `cate_name`, `parent_id`, `list_order`, `status`, `create_time`, `update_time`) VALUES
(1, '服装', 0, 300, 1, 0, 1504217348),
(2, '玩具', 0, 200, 1, 0, 1504217318),
(3, '电子产品', 0, 400, 1, 0, 1504217360),
(4, '男装', 1, 60, 1, 0, 1504217129),
(6, '钢铁侠', 2, 50, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `b2b_city`
--

CREATE TABLE IF NOT EXISTS `b2b_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` int(11) NOT NULL COMMENT '城市名称',
  `city_uname` int(11) NOT NULL COMMENT '城市英文名称',
  `parent_id` int(11) NOT NULL COMMENT '父id',
  `listorder` int(11) NOT NULL COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `status` int(11) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `city_name` (`city_name`),
  UNIQUE KEY `city_uname` (`city_uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b2b_featured`
--

CREATE TABLE IF NOT EXISTS `b2b_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '推荐位类型',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '推荐位标题',
  `url` varchar(30) NOT NULL DEFAULT '' COMMENT '推荐位地址',
  `image` varchar(30) NOT NULL DEFAULT '' COMMENT '推荐位图片',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '推荐位描述',
  `listorder` mediumint(9) NOT NULL DEFAULT '50',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推荐位表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b2b_goods`
--

CREATE TABLE IF NOT EXISTS `b2b_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品名称',
  `category_id` int(11) DEFAULT '0' COMMENT '商品分类',
  `se_category_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品二级分类',
  `bis_id` int(11) NOT NULL DEFAULT '1' COMMENT '商户id',
  `location_id` int(11) NOT NULL DEFAULT '1' COMMENT '门店id',
  `image` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `description` text NOT NULL COMMENT '商品描述',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '团购开始时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '团购结束时间',
  `org_price` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '商品原价',
  `current_price` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '商品现价',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属城市',
  `buy_count` smallint(6) NOT NULL DEFAULT '1' COMMENT '购买数量',
  `total_count` mediumint(9) NOT NULL DEFAULT '0' COMMENT '库存量',
  `quan_start_time` int(11) NOT NULL DEFAULT '0' COMMENT '消费券生效时间',
  `quan_end_time` int(11) NOT NULL DEFAULT '0' COMMENT '消费券失效时间',
  `xpoint` varchar(30) NOT NULL DEFAULT '' COMMENT '经度',
  `ypoint` varchar(30) NOT NULL DEFAULT '' COMMENT '纬度',
  `bis_account_id` int(11) NOT NULL DEFAULT '1' COMMENT '商户账号id',
  `balace_price` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '商品结算价',
  `listorder` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `b2b_user`
--

CREATE TABLE IF NOT EXISTS `b2b_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `code` smallint(6) NOT NULL DEFAULT '9999' COMMENT '加密串',
  `email` varchar(20) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `last_login_ip` varchar(10) NOT NULL COMMENT '最后登录的ip',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='前台用户表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
