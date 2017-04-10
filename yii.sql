#用户
CREATE TABLE `sw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
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
  `inputtime` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`news_id`),
  KEY `catid` (`catid`),
  CONSTRAINT `sw_news_cate` FOREIGN KEY (`catid`) REFERENCES `sw_cate` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



##### alter table `sw_news` add constraint `sw_news_cate` foreign key (`catid`) references `sw_cate`(`catid`) on delete cascade;#外键