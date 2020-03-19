CREATE DATABASE IF NOT EXISTS `inquiry_form`;
DROP TABLE IF EXISTS `inquiry_form`.`inquiry`;

CREATE TABLE `inquiry_form`.`inquiry` (
  id int unsigned NOT NULL AUTO_INCREMENT,
  category varchar(50) NULL,
  name varchar(50) NULL,
  phone varchar(11) NULL,
  email varchar(100) NULL,
  inquiry_content text NULL,
  created_at datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
