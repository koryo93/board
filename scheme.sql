DROP TABLE IF EXISTS  `bbs_1`;
CREATE TABLE `bbs_1`
(
  `no` INT NOT NULL AUTO_INCREMENT,
  `id` VARCHAR(10) NOT NULL DEFAULT 'test',
  `user_id` VARCHAR(15) NOT NULL,
  `name` VARCHAR(10) NOT NULL,
  `pw` VARCHAR(30) NOT NULL,
  `memo` TEXT NOT NULL,
  `regdate` VARCHAR(20) NOT NULL,
  `ipaddr` VARCHAR(20) NOT NULL,

  PRIMARY KEY(`no`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

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