DROP DATABASE IF EXISTS `slimapp`;

CREATE DATABASE IF NOT EXISTS `slimapp`
  CHARACTER SET `utf8`
  COLLATE `utf8_general_ci`;

--
-- Set default database
--
USE `slimapp`;

-- ---------------------------------------------------------
-- ---------------------------------------------------------

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;



INSERT INTO `user` (`first_name`,`last_name`,`email`,`password`)
 VALUES
  ('Justin','Torres','justin@example.org', 'bad'),
  ('Sam','Smith','ssmith@yahoo.com', 'bad'),
  ('Brad','Traversy','brad@test.com', 'bad');


-- ---------------------------------------------------------

-- ---------------------------------------------------------
-- Add access user

FLUSH PRIVILEGES;

DROP USER IF EXISTS 'slimapp'@'localhost';

CREATE USER 'slimapp'@'localhost' IDENTIFIED BY 'slimapp';

GRANT ALL PRIVILEGES ON `slimapp` . * TO 'slimapp'@'localhost';

FLUSH PRIVILEGES;
