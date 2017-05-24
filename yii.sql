#用户
CREATE TABLE `sw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `inputtime` datetime DEFAULT NULL,
  `authKey` varchar(100) DEFAULT NULL,
  `accessToken` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
#SESSION 表
CREATE TABLE `sw_session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
#栏目
CREATE TABLE `sw_cate` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(100) NOT NULL COMMENT '栏目名',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `inputtime` int(10) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
#文章
CREATE TABLE `sw_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL COMMENT '栏目ID',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `inputtime` int(11) NOT NULL,
  `updatetime` int (11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`news_id`),
  KEY `catid` (`catid`),
  CONSTRAINT `sw_news_cate` FOREIGN KEY (`catid`) REFERENCES `sw_cate` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#标签表
CREATE TABLE `sw_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签ID',
  `tagname` varchar(30) NOT NULL COMMENT '标签名',
  `description` varchar(200) NOT NULL COMMENT '描述',
  `inputtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#标签关联表
CREATE TABLE `sw_tag_news` (
  `news_id` int(11) NOT NULL COMMENT '文章ID',
  `tag_id` int(11) NOT NULL COMMENT '标签ID',
  `inputtime` int(11) NOT NULL COMMENT '添加时间',
  KEY `news_id` (`news_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `newstagid` FOREIGN KEY (`news_id`) REFERENCES `sw_news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_news` FOREIGN KEY (`tag_id`) REFERENCES `sw_tag` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
#站点设置
CREATE TABLE `sw_setting` (
  `siteid` tinyint(2) NOT NULL AUTO_INCREMENT COMMENT '站点ID',
  `sitename` varchar(50) NOT NULL COMMENT '站点名称',
  `siteremark` varchar(100) NOT NULL COMMENT '站点描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `sitelink` varchar(50) NOT NULL COMMENT '站点地址',
  `logo` varchar(100) NOT NULL COMMENT 'logo',
  `menus` varchar(200) NOT NULL COMMENT '站点菜单',
  `inputtime` int(11) DEFAULT NULL,
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  `backgroundurls` varchar(255) DEFAULT NULL COMMENT '背景图',
  PRIMARY KEY (`siteid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
#附件表
CREATE TABLE `sw_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '附件ID',
  `filename` varchar(100) NOT NULL COMMENT '附件名称',
  `filepath` varchar(200) NOT NULL COMMENT '附件地址',
  `fileext` varchar(20) NOT NULL COMMENT '扩展名',
  `isimage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否为图片',
  `isthumb` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为缩略图',
  `userid` int(11) NOT NULL DEFAULT '1' COMMENT '用户ID',
  `inputtime` int(11) DEFAULT NULL,
  `updatetime` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



##### alter table `sw_news` add constraint `sw_news_cate` foreign key (`catid`) references `sw_cate`(`catid`) on delete cascade;#外键
# $13$NDIUSAJmTSDZkralZIq/1uSlNSwzQzmeAbwD0vCLbh3BDO6ktFffG