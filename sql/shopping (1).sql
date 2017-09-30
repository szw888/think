-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-30 10:06:32
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
  `last_login_time` int(11) NOT NULL COMMENT '最后登录时间',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商户账号表' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `b2b_account`
--

INSERT INTO `b2b_account` (`id`, `bis_user_name`, `bis_user_password`, `code`, `bis_id`, `is_main`, `listorder`, `last_login_time`, `create_time`, `update_time`, `status`) VALUES
(19, 'root', 'ee1a6ddaa98df6bce6111095292f8b89', 9787, 33, 1, 0, 0, 1505265860, 1505438654, -1),
(20, 'dawei', 'e5324f162b669a289a4705624473af16', 9779, 34, 1, 0, 1506647057, 1505269305, 1506647057, 1),
(21, 'bainaohui', 'be031fd650bdbc0b1995230efb86890c', 5440, 35, 1, 0, 0, 1505357627, 1505438601, 2),
(22, 'alibaba', '4e58c1035dda4613278de41b04c06a64', 5439, 36, 1, 0, 1506565991, 1505379923, 1506565991, 1);

-- --------------------------------------------------------

--
-- 表的结构 `b2b_admin`
--

CREATE TABLE IF NOT EXISTS `b2b_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT '' COMMENT '用户名',
  `password` char(32) DEFAULT '' COMMENT '密码',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `b2b_admin`
--

INSERT INTO `b2b_admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 1);

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
  `bis_desc` text NOT NULL COMMENT '商户简介',
  `bank_info` varchar(100) NOT NULL COMMENT '银行信息',
  `money` decimal(20,2) DEFAULT '0.00' COMMENT '金额',
  `bank_name` varchar(50) DEFAULT '' COMMENT '提现开户行名称',
  `bank_user` varchar(50) NOT NULL DEFAULT '' COMMENT '提现开户人名称',
  `faren` varchar(20) NOT NULL DEFAULT '' COMMENT '法人',
  `faren_contacts` varchar(20) NOT NULL DEFAULT '' COMMENT '法人联系方式',
  `listorder` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商户表' AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `b2b_bis`
--

INSERT INTO `b2b_bis` (`id`, `bis_name`, `bis_email`, `bis_logo`, `bis_licence_logo`, `city_id`, `city_path`, `bis_desc`, `bank_info`, `money`, `bank_name`, `bank_user`, `faren`, `faren_contacts`, `listorder`, `create_time`, `update_time`, `status`) VALUES
(33, '银基商贸城', '15838345637@qq.com', '/upload\\20170913\\24db1cf671f232245a9b928ab0322c50.jpg', '/upload\\20170913\\a04205a232ccea941d6c5b598863c02a.jpg', 4, '4', '<p>银基商贸城主要经营服装、玩具、家具、旅游用品、应有尽有！！！<br/></p>', '41017687979767667787', '0.00', '建设银行', '建设银行', '李帅', '15838257347', 50, 1505265860, 1505438654, -1),
(34, '大卫城', '15838345637@qq.com', '/upload\\20170913\\17c5811833b61d38ee65507beb012fad.jpg', '/upload\\20170913\\da2b349a91ea47c8e8ce0b20d9613363.jpg', 3, '3,5', '<p>银基商贸城主要经营服装、玩具、家具、旅游用品、化妆品、美食应有尽有！！！<br/></p>', '41017687979767667787', '0.00', '建设银行', '建设银行', '大卫', '15838257347', 50, 1505269305, 1505439623, 1),
(35, '百脑汇', '15732892333@qq.com', '/upload\\20170914\\7b55f3e45990a217b3b015d38a79387d.png', '/upload\\20170914\\96ffbb5db72289fd207cf8dd9d075015.png', 3, '3', '<p>百脑汇主营电子产品。包含手机、相机、电脑、ipad等！</p>', '40343823423412313', '0.00', '农业银行', '农业银行', '张天宇', '15732892333', 50, 1505357627, 1505438601, 2),
(36, '阿里巴巴', '15838257323@qq.com', '/upload\\20170914\\d31cc167bd087a9460525f4e874dae35.png', '/upload\\20170914\\e27bc3cf2612b47a7b26ebbae9cafba9.png', 3, '3,5', '<p>阿里巴巴主要经营零售业、电子产品、美食、互联网、电子商务！</p>', '40343823423412313', '0.00', '网商银行', '网商银行', '马云', '15838257323', 50, 1505379923, 1505438540, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='生活分类表' AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `b2b_cate`
--

INSERT INTO `b2b_cate` (`id`, `cate_name`, `parent_id`, `list_order`, `status`, `create_time`, `update_time`) VALUES
(1, '服装', 0, 300, 1, 0, 1505296125),
(2, '玩具', 0, 200, 1, 0, 1505376666),
(3, '电子产品', 0, 100, 1, 0, 1505376662),
(4, '男装', 1, 1, 1, 0, 1505296477),
(6, '女装', 1, 3, 1, 0, 1505296510),
(7, '手机', 3, 50, 1, 0, 1505296166),
(9, '家用电器', 0, 50, 1, 1505376653, 1506651362),
(10, '洗衣机', 9, 50, 1, 1505376677, 1505376677),
(17, '数码相机', 3, 50, 1, 1505377082, 1505377082);

-- --------------------------------------------------------

--
-- 表的结构 `b2b_city`
--

CREATE TABLE IF NOT EXISTS `b2b_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL COMMENT '城市名称',
  `city_uname` varchar(50) NOT NULL COMMENT '城市英文名称',
  `parent_id` int(11) NOT NULL COMMENT '父id',
  `list_order` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `status` int(11) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `city_name` (`city_name`),
  UNIQUE KEY `city_uname` (`city_uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='城市表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `b2b_city`
--

INSERT INTO `b2b_city` (`id`, `city_name`, `city_uname`, `parent_id`, `list_order`, `create_time`, `update_time`, `status`) VALUES
(3, '河南', 'henan', 0, 10, 1504586866, 1506651340, 1),
(4, '河北', 'hebei', 0, 20, 1504586962, 1504587626, 1),
(5, '郑州', 'zhengzhou', 3, 50, 1504587254, 1506651344, 0),
(6, '沧州', 'shijiazhuang', 4, 30, 1504587354, 1505296581, 1),
(7, '秦皇岛', 'qinhuangdao', 4, 40, 1504587669, 1504587677, 1),
(8, '新密', 'xinmi', 5, 40, 1504588964, 1505296601, -1),
(9, '江苏', '江苏', 0, 50, 1504598713, 1504598713, 1),
(10, '南京', 'nanjing', 9, 50, 1505461860, 1505461871, 1);

-- --------------------------------------------------------

--
-- 表的结构 `b2b_goods`
--

CREATE TABLE IF NOT EXISTS `b2b_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品名称',
  `category_id` int(11) DEFAULT '0' COMMENT '商品分类',
  `category_se_id` varchar(50) NOT NULL DEFAULT '0' COMMENT '商品二级分类',
  `bis_id` int(11) NOT NULL DEFAULT '1' COMMENT '商户id',
  `location_id` varchar(50) NOT NULL DEFAULT '1' COMMENT '门店id',
  `image` varchar(80) NOT NULL DEFAULT '' COMMENT '商品图片',
  `description` text NOT NULL COMMENT '商品描述',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '团购开始时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '团购结束时间',
  `org_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品原价',
  `current_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品团购价',
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属城市',
  `city_path` varchar(10) NOT NULL DEFAULT '0' COMMENT '城市路径',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `b2b_goods`
--

INSERT INTO `b2b_goods` (`id`, `name`, `category_id`, `category_se_id`, `bis_id`, `location_id`, `image`, `description`, `start_time`, `end_time`, `org_price`, `current_price`, `city_id`, `city_path`, `buy_count`, `total_count`, `quan_start_time`, `quan_end_time`, `xpoint`, `ypoint`, `bis_account_id`, `balace_price`, `listorder`, `create_time`, `update_time`, `status`) VALUES
(9, '阿迪达斯运动衣', 1, '4', 34, '26', '/upload\\20170928\\b3ba38ba6c3d5468bc35f0488c1637ee.png', '<p>阿迪达斯运动衣阿迪达斯运动衣阿迪达斯运动衣阿迪达斯运动衣</p>', 1504195200, 1506700800, '200.00', '180.00', 3, '3,5', 1, 400, 1504800000, 1504972800, '113.67590383518', '34.774373364543', 20, '0', 50, 1506568711, 1506651404, 1),
(10, '氨基酸洗面奶', 1, '4', 34, '20,25', '/upload\\20170929\\ffd537003a0f2d46b73256adc9151bb0.jpg', '<p>氨基酸洗面奶氨基酸洗面奶氨基酸洗面奶</p>', 1506647400, 1507219200, '60.00', '50.00', 3, '3,5', 1, 400, 1506787200, 1504454400, '113.68746933896', '34.768086085529', 20, '0', 50, 1506647507, 1506647507, 0),
(11, '333', 1, '', 34, '20,25,26', '/upload\\20170929\\cc087f9aaf77332d311869a3b9a1a86a.png', '<p>444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444</p>', 1505923200, 1506009600, '3.00', '4.00', 4, '4,6', 1, 323, 1506700800, 1504800000, '113.68746933896', '34.768086085529', 20, '0', 50, 1506648800, 1506652438, 0),
(12, '234', 3, '4,6', 34, '20,25,26', '/upload\\20170929\\18e4dd73278043b5c8384727d2327540.png', '<p>234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234234</p>', 1504195200, 1506182400, '34.00', '44.00', 4, '4,6', 1, 2342, 1505404800, 1506009600, '113.68746933896', '34.768086085529', 20, '0', 50, 1506648847, 1506648847, 0);

-- --------------------------------------------------------

--
-- 表的结构 `b2b_location`
--

CREATE TABLE IF NOT EXISTS `b2b_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(20) NOT NULL COMMENT '门店名称',
  `logo` varchar(80) NOT NULL DEFAULT '' COMMENT '门店logo',
  `address` varchar(80) NOT NULL COMMENT '门店地址',
  `telephone` varchar(20) NOT NULL COMMENT '门店电话',
  `contacts` varchar(20) NOT NULL COMMENT '门店联系人',
  `xpoint` varchar(20) NOT NULL COMMENT '门店经度',
  `ypoint` varchar(20) NOT NULL COMMENT '门店纬度',
  `bis_id` int(11) NOT NULL COMMENT '门店所属商户id',
  `open_time` varchar(50) NOT NULL DEFAULT '0' COMMENT '营业时间',
  `location_desc` text NOT NULL COMMENT '门店信息',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='门店表' AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `b2b_location`
--

INSERT INTO `b2b_location` (`id`, `location_name`, `logo`, `address`, `telephone`, `contacts`, `xpoint`, `ypoint`, `bis_id`, `open_time`, `location_desc`, `is_main`, `city_id`, `city_path`, `category_id`, `category_path`, `listorder`, `create_time`, `update_time`, `status`) VALUES
(19, '银基商贸城', '', '河南省郑州市金水区东风路信息学院路小铺新区26号', '400-4000-4000', '李刚', '113.66501529443', '34.807897230738', 33, '8', '<p>物超所值，包退换，质量不好不要钱！！！<br/></p>', 1, 4, '4,', 1, '1,4|6', 50, 1505265860, 1505438654, -1),
(20, '大卫城', '', '河南省郑州市二七区文化路百货大楼', '400-4000-4000', '大卫', '113.68746933896', '34.768086085529', 34, '8', '<p>环境好，人流量大！！！<br/></p>', 1, 3, '3,5', 1, '1,', 50, 1505269305, 1505439623, 1),
(21, '百脑汇', '', '河南省郑州市东风路文化路交叉口向东200米百脑汇', '4445-3400-3343', '张天宇', '113.67734759179', '34.804965566893', 35, '0', '<p>百脑汇主营电子产品。包含手机、相机、电脑、ipad等！</p>', 1, 3, '3,', 3, '3,', 50, 1505357627, 1505438601, 2),
(22, '阿里巴巴', '', '杭州滨江区网商路699号', '4445-3400-3343', '马云', '120.19862349395', '30.195606649759', 36, '24', '<p>阿里巴巴主要经营零售业、电子产品、美食、互联网、电子商务，涉及各行各业！</p>', 1, 3, '3,5', 3, '3,7|17', 50, 1505379923, 1506482495, 1),
(23, '阿里巴巴分店', '/upload\\20170926\\349f71e2fe1fe46ce6b1fae9c8d951d6.jpg', '河南省郑州市金水区东风路丰乐路交叉口世纪联华', '15838257347', '尚战伟', '113.6457156497', '34.803318779999', 36, '8点', '<p>主营服装、日用品、食品<br/></p>', 0, 3, '3,5', 1, '1,4|6', 50, 1506416330, 1506483428, 1),
(24, '百脑汇分店', '/upload\\20170926\\783450177e5f5adc9d29dda73fe66e20.jpg', '河南省郑州市金水区东风路文化路交叉口向东100米路北百脑汇', '15138664821', '青青', '113.67734759179', '34.804965566893', 36, '10点', '<p>主营电子产品，共4层<br/></p>', 0, 3, '3,5', 3, '3,7|17', 50, 1506420109, 1506483432, 1),
(25, '大卫城丹尼斯分店', '/upload\\20170927\\14cc892adb7bdf23a7845412492c3907.jpg', '江苏省南京市秦淮区剪子巷54号', '13528776788', '李世石', '118.7934645598', '32.019232947158', 34, '4点', '<p>本店特价，本地特价啊！！！<br/></p>', 0, 9, '9,10', 9, '9,10', 50, 1506483150, 1506484061, 1),
(26, '大卫城中原第一城', '/upload\\20170928\\be5c04d17de8a25e091f0ccfa5cb3788.png', '河南省郑州市金水区南阳路铭功路向东300米路北新华书店', '15847358727', '李丽丽', '113.67590383518', '34.774373364543', 34, '8点', '<p>大卫城中原第一城大卫城中原第一城大卫城中原第一城大卫城中原第一城</p>', 0, 3, '3,5', 3, '3,7', 50, 1506567060, 1506567093, 1);

-- --------------------------------------------------------

--
-- 表的结构 `b2b_recommend`
--

CREATE TABLE IF NOT EXISTS `b2b_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '推荐位类型',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '推荐位标题',
  `url` varchar(80) NOT NULL DEFAULT '' COMMENT '推荐位地址',
  `img` varchar(80) NOT NULL DEFAULT '' COMMENT '推荐位图片',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '推荐位描述',
  `list_order` mediumint(9) NOT NULL DEFAULT '50',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='推荐位表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `b2b_recommend`
--

INSERT INTO `b2b_recommend` (`id`, `type`, `title`, `url`, `img`, `description`, `list_order`, `create_time`, `update_time`, `status`) VALUES
(1, 0, '首页大图', 'http://www.think.com/admin/rec', '/upload\\20170929\\ae4b219da37e275d64154d6c9f2bf6f4.jpg', '首页大图首页大图首页大图', 100, 1506673604, 1506675744, 1),
(2, 1, '首页底部推荐位', 'http://www.think.com/admin/rec', '/upload\\20170929\\ae4b219da37e275d64154d6c9f2bf6f4.jpg', '首页底部推荐位首页底部推荐位首页底部推荐位', 200, 1506674028, 1506675740, 0),
(3, 2, '首页中部推荐位', 'http://www.think.com/admin/rec', '/upload\\20170929\\f597eedaa9075a5c40f9dd0f004cc817.png', '首页底部推荐位首页底部推荐位首页底部推荐位', 50, 1506677073, 1506677073, 1);

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
