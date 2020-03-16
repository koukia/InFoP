CREATE DATABASE IF NOT EXISTS inquiry_form;

DROP TABLE IF EXISTS `inquiry_form`.`inquiry`;
CREATE TABLE `inquiry_form`.`inquiry` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(8) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `inquiry_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
