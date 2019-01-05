DROP TABLE IF EXISTS `member`;
CREATE TABLE `member`
(
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` char(15) DEFAULT NULL,
  `user_id` char(15) DEFAULT NULL,
  `name` char(15) DEFAULT NULL,
  `nick_name` char(15) DEFAULT NULL,
  `birth` char(8) DEFAULT NULL,
  `sex` char(6) DEFAULT NULL,
  `tel` char(12) DEFAULT NULL,
  `email` char(32) DEFAULT NULL,
  `pw` char(32) DEFAULT NULL,
  `addr_1` varchar(100) DEFAULT NULL,
  `addr_2` varchar(100) DEFAULT NULL,
  `regdate` char(20) DEFAULT NULL,
  `ip` char(20) DEFAULT NULL,

  PRIMARY KEY (`no`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `bbs1_comment`;
CREATE TABLE `bbs1_comment` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` char(10) DEFAULT NULL,
  `bbs1_no` int(11) DEFAULT NULL,
  `user_id` char(15) DEFAULT NULL,
  `name` char(15) DEFAULT NULL,
  `nick_name` char(15) DEFAULT NULL,
  `replys` int(11) DEFAULT NULL,
  `memo` text,
  `regdate` char(14) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

 ALTER TABLE member ADD level INT DEFAULT '3' NOT NULL;

DROP TABLE IF EXISTS `bbs1`;
CREATE TABLE `bbs1` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` char(15) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `user_id` char(15) DEFAULT NULL,
  `name` char(15) DEFAULT NULL,
  `nick_name` char(15) DEFAULT NULL,
  `subject` char(150) DEFAULT NULL,
  `story` text,
  `hit` int(11) DEFAULT NULL,
  `file01` varchar(80) NOT NULL,
  `regdate` char(20) DEFAULT NULL,
  `ip` char(20) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

